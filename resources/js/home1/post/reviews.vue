<template>
	<div class="tab-content">
									<div id="graphic-design-1" class="tab-pane show active">
	                                    <table class="table border book-overview">
	                                       
	                                       
	                                    </table>
	                                </div>
									<div id="developement-1" class="tab-pane">
	                                    <div class="clear" id="comment-list">
											<div class="post-comments comments-area style-1 clearfix">
												<h4 class="comments-title">{{postCount}} COMMENTS</h4>
												<div id="comment">
													<ol class="comment-list">
														
													
													<li v-for="review in reviews" class="comment odd alt thread-even depth-1 comment" id="comment-5">
													   <div class="comment-body" id="div-comment-5">
														  <div class="comment-author vcard">
															 <img src="../../images/profile1.jpg" alt="" class="avatar"/>
															 <cite class="fn">{{review.reviewerName}}</cite> <span class="says">says:</span>
															 <div class="comment-meta">
																<a href="javascript:void(0);">December 28, 2022 at 6:14 am</a>
															 </div>
														  </div>
														  <div class="comment-content dlab-page-text">
															 <p>{{review.comment}}</p>
														  </div>
														  <div class="reply">
															 <a rel="nofollow" class="comment-reply-link" href="javascript:void(0);"><i class="fa fa-reply"></i> Reply</a>
														  </div>
													   </div>
													</li>
												 </ol>
											  </div>
											 
										   </div>
										</div>
										
									</div>
								</div>
</template>
<script>
	export default{

		props:{

			reviews: Object
		},
		computed:{
			postCount()
			{
				return this.reviews.length
			}
		}
	}
</script>