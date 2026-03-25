<template>
	<div class="page-content bg-grey">
			<section class="content-inner-1">
				<div class="container">
					<div class="row book-grid-row style-4 m-b60">
						<div class="col">
							<div class="dz-box">
								<div class="dz-media">
									<img v-bind:src="product.thumbnail" alt="book">
								</div>
								<div class="dz-content">
									<div class="dz-header">
										<h3 class="title">{{product.title}}</h3>
										<div class="shop-item-rating">
											<div class="d-lg-flex d-sm-inline-flex d-flex align-items-center">
												<ul class="dz-rating">
													<li><i class="flaticon-star text-yellow"></i></li>	
													<li><i class="flaticon-star text-yellow"></i></li>	
													<li><i class="flaticon-star text-yellow"></i></li>	
													<li><i class="flaticon-star text-yellow"></i></li>		
													<li><i class="flaticon-star text-muted"></i></li>		
												</ul>
												<h6 class="m-b0">{{product.stock}}</h6>
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
											
										</div>
										<p class="text-1">{{product.description}}</p>
										<div class="book-footer">
											<div class="price">
												<h5>${{product.price}}</h5>
												<p class="p-lr10">${{product.discountPercentage}}</p>
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
								<reviews v-bind:reviews="reviews"></reviews>
							</div>
						</div>
						<div class="col-xl-4 mt-5 mt-xl-0">
							<div class="widget">
								<h4 class="widget-title">Related Books</h4>
								<div class="row">
									<div class="col-xl-12 col-lg-6">
										<div class="dz-shop-card style-5">
											<router-link v-bind:to="{name: 'post', params:{id:5}}">
											<div class="dz-media">
												<img src="../../images/books/grid/book15.jpg" alt="">
											</div>
											</router-link>
											<div class="dz-content">
												<h5 class="subtitle">Terrible Madness</h5>
												<ul class="dz-tags">
													<li>THRILLE,</li>
													<li>DRAMA,</li>
													<li>HORROR</li>
												</ul>
												<div class="price">
													<span class="price-num">$45.4</span>
													<del>$98.4</del>
												</div>
												<a href="shop-cart.html" class="btn btn-outline-primary btn-sm btnhover2"><i class="flaticon-shopping-cart-1 me-2"></i> Add to cart</a>
											</div>
										</div>
									</div>
									
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			
			
			
		
		</div>
</template>
<script>
	import reviews from "./reviews.vue";
	export default{
		components:{
			reviews,
		},
		data()
		{
			return{

				product : [],
				reviews: [],
			}
		},
		watch:{
			$route(to,from)
			{	
				this.showPost()
			}
		},
		created()
		{
			this.showPost()
		},
		methods:{
			showPost()
			{
				const req = axios(`https://dummyjson.com/products/${this.$route.params.id}`)
								.then((response)=>{
									this.product = response.data
									this.reviews = response.data.reviews
								})
			}
		}
	}
</script>