<template>
	<div class="row book-grid-row">



		<div class="col-book style-1" v-for="(book , index) in books">
			<div class="dz-shop-card style-1">
				<div class="dz-media">
					
					<img  v-bind:src="book.thumbnail" alt="book">	
										
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
						<li><a href="books-grid-view.html">{{book.category}}</a></li>
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
							<span class="price-num">${{book.price}}</span>
						</div>
						<a class="btn btn-secondary box-btn btnhover2" v-on:click="addToCart(book.id, book.title, book.price , book.thumbnail)"><i class="flaticon-shopping-cart-1 m-r10"></i> Add to cart</a>
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
				var cartItem = {id : id , title : title , price : price, quantity : 1 , image_url : image_url};

				var check = this.cartObject.some((item)=> item.id === id);

				if(!check)
				{
					this.cartObject.push(cartItem);
				}else{

					this.cartObject.map((item)=>{

						if(item.id === id)
						{
							item.quantity++
						}
					})
				}

				this.$store.dispatch('cartState',JSON.stringify(this.cartObject))
			}
		}
	}
</script>