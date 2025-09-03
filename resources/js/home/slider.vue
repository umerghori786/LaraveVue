<template>
	
	<!-- Book Sale -->
	<section class="content-inner-1">
	    <div class="container">
	        <div class="section-head book-align">
	            <h2 class="title mb-0">Books on Sale</h2>
	            <div class="pagination-align style-1">
	                <div class="swiper-button-prev"><i class="fa-solid fa-angle-left"></i></div>
	                <div class="swiper-pagination-two"></div>
	                <div class="swiper-button-next"><i class="fa-solid fa-angle-right"></i></div>
	            </div>
	        </div>
	        <div class="swiper-container books-wrapper-3 swiper-four">
	            <div class="swiper-wrapper">


	                <div class="swiper-slide" v-for="(book , index) in books">
	                    <div class="books-card style-3 wow fadeInUp" data-wow-delay="0.1s">
	                        <div class="dz-media" v-for="image in book.images">
	                        	<router-link v-bind:to="{name: 'book',params : {id:book.id}}">
	                            <img v-if="!image.is_video" v-bind:src="image.url"  alt="book" />
	                            </router-link>
	                        </div>
	                        <div class="dz-content">
	                            <h5 class="title"><a href="books-grid-view.html">{{book.title}}</a></h5>
	                            <ul class="dz-tags">
	                                <li><a href="books-grid-view.html">{{book.category.title}}</a></li>
	                                
	                            </ul>
	                            <div class="book-footer">
	                                
	                                <div class="price">
	                                    <span class="price-num">${{book.discount_price}}</span>
	                                    
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                
	            </div>
	        </div>
	    </div>
	</section>
	<!-- Book Sale End -->
</template>
<script>
	export default{

		props:{
			 books : Object
		}
	}
</script>