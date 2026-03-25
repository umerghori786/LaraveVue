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


	                <div class="swiper-slide" v-for="post in posts">
	                    <div class="books-card style-3 wow fadeInUp" data-wow-delay="0.1s">
	                        <div class="dz-media" >
	                        	
	                            <img src="https://dummyjson.com/icon/abc123/150" alt="book" />
	                            
	                        </div>
	                        <div class="dz-content">
	                            <h5 class="title"><a href="books-grid-view.html">{{post.title}}</a></h5>
	                            <ul class="dz-tags">
	                                <li><a href="books-grid-view.html">{{post.views}}</a></li>
	                                
	                            </ul>
	                            <div class="book-footer">
	                                
	                                <div class="price">
	                                    <span class="price-num">$1456</span>
	                                    
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
			posts : Object
		}
	}
</script>