<template>
	<div id="developement-1" class="tab-pane">
        <div class="clear" id="comment-list">
			<div class="post-comments comments-area style-1 clearfix">
				<h4 class="comments-title">{{reivewslength}} COMMENTS</h4>
				<div id="comment">
				 <ol class="comment-list">
					<li class="comment even thread-even depth-1 comment" id="comment-2" v-for="(review, index) in getReviews">
							<div class="comment-body">
							  <div class="comment-author vcard">
									<img src="../images/profile4.jpg" alt="" class="avatar"/>
									<cite class="fn">{{review.name}}</cite> <span class="says">says:</span>
									<div class="comment-meta">
										<a href="javascript:void(0);">December 28, 2022 at 6:14 am</a>
									</div>
							  </div>
						  <div class="comment-content dlab-page-text">
							 <p>{{review.content}}</p>
						  </div>
						  <div class="reply">
							 <a rel="nofollow" class="comment-reply-link" href="javascript:void(0);"><i class="fa fa-reply"></i> Reply</a>
						  </div>
					   </div>
					   <ol class="children">
						  <li class="comment byuser comment-author-w3itexpertsuser bypostauthor odd alt depth-2 comment" id="comment-3">
							 <div class="comment-body" id="div-comment-3">
								<div class="comment-author vcard">
								   <img src="../images/profile3.jpg" alt="" class="avatar"/>
								   <cite class="fn">Celesto Anderson</cite> <span class="says">says:</span>
								   <div class="comment-meta">
									  <a href="javascript:void(0);">December 28, 2022 at 6:14 am</a>
								   </div>
								</div>
								<div class="comment-content dlab-page-text">
								   <p>Donec suscipit porta lorem eget condimentum. Morbi vitae mauris in leo venenatis varius. Aliquam nunc enim, egestas ac dui in, aliquam vulputate erat.</p>
								</div>
								<div class="reply">
								   <a class="comment-reply-link" href="javascript:void(0);"><i class="fa fa-reply"></i> Reply</a>
								</div>
							 </div>
						  </li>
					   </ol>
					</li>
					
				 </ol>
			  </div>
			  <div class="default-form comment-respond style-1" id="respond">
				 <h4 class="comment-reply-title" id="reply-title">LEAVE A REPLY <small> <a rel="nofollow" id="cancel-comment-reply-link" href="javascript:void(0)" style="display:none;">Cancel reply</a> </small></h4>
				 <div class="clearfix">
				 	<span v-if="errors.length > 0">{{errors}}</span>
					<form v-on:submit.prevent="reviewSubmit()" method="post" id="comments_form" class="comment-form" novalidate>
					   <p class="comment-form-author"><input id="name" placeholder="Author" name="author" type="text" v-model="formdata.name"></p>
					   <p class="comment-form-email"><input id="email" required="required" placeholder="Email" name="email" type="email" v-model="formdata.email"></p>
					   <p class="comment-form-comment"><textarea v-model="formdata.content" id="comments" placeholder="Type Comment Here" class="form-control4" name="comment" cols="45" rows="3" required="required"></textarea></p>
					   <input type="hidden" v-model="formdata.product_id">
					   <p class="col-md-12 col-sm-12 col-xs-12 form-submit">
						  <button id="submit" type="submit" class="submit btn btn-primary filled">
						  Submit Now <i class="fa fa-angle-right m-l10"></i>
						  </button>
					   </p>
					</form>
				 </div>
			  </div>
		   </div>
		</div>
		
	</div>
</template>
<script>
	export default{

		props : {
			data : Object,
		},
		data()
		{
			return{

				getReviews : [],
				reivewslength : 0,
				formdata: {name:null , content:null, product_id:null , rating:5},
				errors : [],
			}
		},
		mounted()
		{
			this.getReviews = this.data.reviews;
			this.reivewslength = this.data.reviews.length
			this.formdata.product_id = this.data.productId
		},
		methods:{

			reviewSubmit()
			{	
				this.errors = [];
				if(!this.formdata.name)
				{
					this.errors.push('Name Required')
				}
				if(!this.formdata.email)
				{
					this.errors.push('email Required')
				}
				if(!this.formdata.content)
				{
					this.errors.push('content Required')
				}
			}
		}
	}
</script>