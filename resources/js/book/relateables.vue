<template>
	<div class="col-xl-4 mt-5 mt-xl-0">
		<div class="widget">
			<h4 class="widget-title">Related Books</h4>
			<div class="row">
				<div class="col-xl-12 col-lg-6">
					<div class="dz-shop-card style-5">
						<div class="dz-media">
							<router-link v-bind:to="{name: 'book',params : {id:5}}">
							<img src="../images/books/grid/book15.jpg" alt="">
							</router-link>
						</div>
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
				<div class="col-xl-12 col-lg-6">
					<div class="dz-shop-card style-5">
						<div class="dz-media">
							<router-link v-bind:to="{name: 'book',params : {id:2}}">
							<img src="../images/books/grid/book3.jpg" alt="">
							</router-link>
						</div>
						<div class="dz-content">
							<h5 class="subtitle">Battle Drive</h5>
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
				<div class="col-xl-12 col-lg-6">
					<div class="dz-shop-card style-5">
						<div class="dz-media">
							<router-link v-bind:to="{name: 'book',params : {id:3}}">
							<img src="../images/books/grid/book5.jpg" alt="">
							</router-link>
						</div>
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
</template>