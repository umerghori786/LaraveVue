<template>
	<div class="row book-grid-row">



		<div class="col-book style-1" v-for="(book , index) in books">
			<div class="dz-shop-card style-1">
				<div class="dz-media" v-for="image in book.images">
					<router-link v-bind:to="{name: 'book',params : {id:book.id}}">
					<img v-if="!image.is_video" v-bind:src="image.url" alt="book">	
					</router-link>								
				</div>
				<div class="bookmark-btn style-2">
					<input class="form-check-input" type="checkbox" id="flexCheckDefault1">
					<label class="form-check-label" for="flexCheckDefault1">
						<i class="flaticon-heart"></i>
					</label>
				</div>
				<div class="dz-content">
					<h5 class="title"><a href="books-grid-view.html">{{book.title}}</a></h5>
					<ul class="dz-tags">
						<li><a href="books-grid-view.html">{{book.category.title}}</a></li>
					</ul>
					<ul class="dz-rating">
						<li><i class="flaticon-star text-yellow"></i></li>	
						<li><i class="flaticon-star text-yellow"></i></li>	
						<li><i class="flaticon-star text-yellow"></i></li>	
						<li><i class="flaticon-star text-yellow"></i></li>		
						<li><i class="flaticon-star text-yellow"></i></li>		
					</ul>
					<div class="book-footer">
						<div class="price">
							<span class="price-num">${{book.discount_price}}</span>
						</div>
						<a class="btn btn-secondary box-btn btnhover2" v-on:click="addToCart(book.id, book.title , book.discount_price,
							book.images.filter((item)=>{if(!item.is_video){ return item}})

						)"><i class="flaticon-shopping-cart-1 m-r10"></i> Add to cart</a>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</template>

<script>
	export default{

		props:{
			 books : Object,
		},
		data()
		{
			return{

				cartObject : this.$store.state.ecommCart,
			}
		},
		methods:{

			addToCart(id , title , price,image_url)
			{
				var cartItem = {id : id , title : title , price : price , quantity : 1 ,image_url : image_url[0].url}

				var check = this.cartObject.some((item)=>{

					return item.id === id
				})
				if(!check)
				{
					this.cartObject.push(cartItem)
				}else{
					this.cartObject.map((item)=>{

						if(item.id === id)
						{
							item.quantity++
						}
					})
				}

				
				this.$store.dispatch('cartObject',JSON.stringify(this.cartObject))
			}
		}
	}
</script>