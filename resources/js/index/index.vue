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
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox1">
							<label class="form-check-label" for="productCheckBox1">
								Architecture
							</label>
						</div>
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox2">
							<label class="form-check-label" for="productCheckBox2">
								Art
							</label>
						</div>
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox3">
							<label class="form-check-label" for="productCheckBox3">
								Action
							</label>
						</div>
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox4">
							<label class="form-check-label" for="productCheckBox4">
								Biography & Autobiography
							</label>
						</div>
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox5">
							<label class="form-check-label" for="productCheckBox5">
								Body, Mind & Spirit
							</label>
						</div>
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox6">
							<label class="form-check-label" for="productCheckBox6">
								Business & Economics
							</label>
						</div>
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox7">
							<label class="form-check-label" for="productCheckBox7">
								Children Fiction
							</label>
						</div>
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox8">
							<label class="form-check-label" for="productCheckBox8">
								Children Non-Fiction
							</label>
						</div>
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox9">
							<label class="form-check-label" for="productCheckBox9">
								Comics & Graphic Novels
							</label>
						</div>
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox10">
							<label class="form-check-label" for="productCheckBox10">
								Cooking
							</label>
						</div>
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox11">
							<label class="form-check-label" for="productCheckBox11">
								Crafts & Hobbies
							</label>
						</div>
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox12">
							<label class="form-check-label" for="productCheckBox12">
								Design
							</label>
						</div>
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox13">
							<label class="form-check-label" for="productCheckBox13">
								Drama
							</label>
						</div>
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox14">
							<label class="form-check-label" for="productCheckBox14">
								Education
							</label>
						</div>
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox15">
							<label class="form-check-label" for="productCheckBox15">
								Family & Relationships
							</label>
						</div>						
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox16">
							<label class="form-check-label" for="productCheckBox16">
								Fiction
							</label>
						</div>
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox17">
							<label class="form-check-label" for="productCheckBox17">
								Foreign Language Study
							</label>
						</div>
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox18">
							<label class="form-check-label" for="productCheckBox18">
								Games
							</label>
						</div>
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox19">
							<label class="form-check-label" for="productCheckBox19">
								Gardening
							</label>
						</div>
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox20">
							<label class="form-check-label" for="productCheckBox20">
								Health & Fitness
							</label>
						</div>
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox21">
							<label class="form-check-label" for="productCheckBox21">
								History
							</label>
						</div>
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox22">
							<label class="form-check-label" for="productCheckBox22">
								House & Home
							</label>
						</div>
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox23">
							<label class="form-check-label" for="productCheckBox23">
								Humor
							</label>
						</div>
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox24">
							<label class="form-check-label" for="productCheckBox24">
								Literary Collections
							</label>
						</div>
						<div class="form-check search-content">
							<input class="form-check-input" type="checkbox" value="" id="productCheckBox25">
							<label class="form-check-label" for="productCheckBox25">
								Mathematics
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
		}
	},
	mounted()
	{
		const req = axios(`https://press.escuela-ray-bolivar-sosa.com/api/user/book`)
					.then((response)=>{

						this.books = response.data;
					})
					.then(()=>{
						this.loading = true;
					})
	}
}
</script>