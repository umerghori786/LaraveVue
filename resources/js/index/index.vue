<template>
	<loader v-if="!loading"></loader>
	<div class="page-content bg-grey">
		<section class="content-inner border-bottom">
			<div class="container">
				<div class="d-flex justify-content-between align-items-center">
					<h4 class="title">Books</h4>
				</div>
				<div class="filter-area m-b30">
					
					<div class="category">
						<div class="filter-category">
							<a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
								<i class="fas fa-list me-2"></i>
								Categories
							</a>
						</div>
						<div class="form-group">
							<i class="fas fa-sort-amount-down me-2 text-secondary"></i>
							<select class="default-select">
								<option>Newest</option>
								<option>1 Day</option>
								<option>1 Week</option>
								<option>3 Weeks</option>
								<option>1 Month</option>
								<option>3 Months</option>
							</select>
						</div>
					</div>
				</div>	
				<div class="acod-content collapse " id="collapseExample">
					<div class="widget widget_services">

						<div v-for="category in categories" class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox1">
							<label class="form-check-label" for="productCheckBox1">
								{{category}}
							</label>
						</div>
						
						
					</div>
				</div>
				
				<list v-bind:books="books"></list>
				<div class="row page mt-0">
					<div class="col-md-6">
						<p class="page-text">Showing 12 from 50 data</p>
					</div>
					<div class="col-md-6">
						<nav aria-label="Blog Pagination">
							<ul class="pagination style-1 p-t20">
								<li class="page-item"><a class="page-link prev" href="javascript:void(0);">Prev</a></li>
								<li class="page-item"><a class="page-link active" href="javascript:void(0);">1</a></li>
								<li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
								<li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
								<li class="page-item"><a class="page-link next" href="javascript:void(0);">Next</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</section>
		
		
		
	</div>
</template>
<script>
import list from './list.vue';
import loader from '../loader/loader.vue';

export default{

	components : {
		list,
		loader
	},
	data()
	{
		return{

			loading : false,
			books : [],
			categories : [],
		}
	},
	mounted()
	{
		const req = axios(`https://dummyjson.com/products`)
					.then((response)=>{

						this.books = response.data.products;
						this.categories = this.books.reduce((acc, item) => {
									   acc.push(item.category);
									   return acc
									}, []);	
						this.categories = [...new Set(this.categories)]
					})
					.then(()=>{
						this.loading = true;
					});
		
		
				
	}
}
</script>