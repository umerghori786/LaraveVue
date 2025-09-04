<template>
	
	<div class="page-content bg-grey">
		<section class="content-inner-1">
			<div class="container">
				<div class="row book-grid-row style-4 m-b60">
					<div class="col">
						<div class="dz-box" >
							<div v-for="image in book.images">
							<div class="dz-media"  v-if="!image.is_video">
								<img  v-bind:src="image.url" alt="book">
							</div>
							</div>
							<div class="dz-content">
								<div class="dz-header">
									<h3 class="title">{{book.title}}</h3>
									<div class="shop-item-rating">
										<div class="d-lg-flex d-sm-inline-flex d-flex align-items-center">
											<ul class="dz-rating">
												<li><i class="flaticon-star text-yellow"></i></li>	
												<li><i class="flaticon-star text-yellow"></i></li>	
												<li><i class="flaticon-star text-yellow"></i></li>	
												<li><i class="flaticon-star text-yellow"></i></li>		
												<li><i class="flaticon-star text-muted"></i></li>		
											</ul>
											<h6 class="m-b0">4.0</h6>
										</div>
										<div class="social-area">
											<ul class="dz-social-icon style-3">
												<li><a href="https://www.facebook.com/dexignzone" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
												<li><a href="https://twitter.com/dexignzones" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
												<li><a href="https://www.whatsapp.com/" target="_blank"><i class="fa-brands fa-whatsapp"></i></a></li>
												<li><a href="https://www.google.com/intl/en-GB/gmail/about/" target="_blank"><i class="fa-solid fa-envelope"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="dz-body">
									<div class="book-detail">
										<ul class="book-info">
											<li>
												<div class="writer-info">
													<img src="../images/profile2.jpg" alt="book">
													<div>
														<span>Writen by</span>Kevin Smiley
													</div>
												</div>
											</li>
											<li><span>Publisher</span>Printarea Studios</li>
											<li><span>Year</span>2019</li>
										</ul>
									</div>
									<p class="text-1" v-html="book.long_description"></p>
									
									<div class="book-footer">
										<div class="price">
											<h5>${{book.discount_price}}</h5>
											
										</div>
										<div class="product-num">
											<div class="quantity btn-quantity style-1 me-3">
												<input id="demo_vertical2" type="text" value="1" name="demo_vertical2"/>
											</div>
											<a href="shop-cart.html" class="btn btn-primary btnhover2"><i class="flaticon-shopping-cart-1"></i> <span>Add to cart</span></a>
											<div class="bookmark-btn style-1 d-none d-sm-block">
												<input class="form-check-input" type="checkbox" id="flexCheckDefault1">
												<label class="form-check-label" for="flexCheckDefault1">
													<i class="flaticon-heart"></i>
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xl-8">
						<div class="product-description tabs-site-button">
                            <ul class="nav nav-tabs">
                                <li><a data-bs-toggle="tab" href="#graphic-design-1" class="active">Details Product</a></li>
                                <li><a data-bs-toggle="tab" href="#developement-1">Customer Reviews</a></li>
                            </ul>
							<div class="tab-content">
								<div id="graphic-design-1" class="tab-pane show active">
                                    <table class="table border book-overview">
                                        <tr>
                                            <th>Book Title</th>
                                            <td>{{book.title}}</td>
                                        </tr>
                                        <tr>
                                            <th>Author</th>
                                            <td>Napoleon Rich</td>
                                        </tr>
                                        
                                        
                                        <tr class="tags">
                                            <th>Tags</th>
                                            <td>
												<a href="javascript:void(0);" class="badge">Drama</a>
												<a href="javascript:void(0);" class="badge">Advanture</a>
												<a href="javascript:void(0);" class="badge">Survival</a>
												<a href="javascript:void(0);" class="badge">Biography</a>
												<a href="javascript:void(0);" class="badge">Trending2022</a>
												<a href="javascript:void(0);" class="badge">Bestseller</a>
											</td>
                                        </tr>
                                    </table>
                                </div>
								<reviews v-if="loading" v-bind:data="propsData"></reviews>
							</div>
						</div>
					</div>
					<relateables></relateables>
				</div>
			</div>
		</section>
		
		
		
	</div>

</template>
<script>
	import reviews from './reviews.vue';
	import relateables from './relateables.vue';

	export default{

		components:{
			reviews,
			relateables
		},
		data()
		{
			return{

				book : [],
				loading : false,
				propsData : {reviews : null , productId : null}
			}
		},
		watch:{
			$route(to,from)
			{
				this.showBook()
			}
		},
		created()
		{
			this.showBook()
		},
		methods:{
			showBook()
			{	
				const req = axios(`https://press.escuela-ray-bolivar-sosa.com/api/user/book/${this.$route.params.id}`)
							.then((response)=>{

								this.book = response.data;
								this.propsData.reviews = response.data.reviews;
								this.propsData.productId = response.data.id;
							})
							.then(()=>{
								this.loading = true;
							})	
			}
		}
	}
</script>