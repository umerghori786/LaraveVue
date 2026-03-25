<template>
	
  	<loader v-if="!loading"></loader>
	<div class="page-content bg-white">
      
     
   	<slider v-bind:posts="posts"></slider>	
   <swiper></swiper>   
  


  </div>
</template>
<script>
import slider from './slider.vue';
import swiper from '../home/swiper.vue';
import loader from "../loader/loader.vue";

export default{

	components: {

		slider,
		swiper,
		loader
	},
	data()
	{
		return{
			loading: false,
			posts : [],
		}
	},
	mounted()
	{
		const req = axios(`https://dummyjson.com/posts`)
					 	.then((response)=>{

					 		this.posts = response.data.posts.slice(0, 5);
					 	})
					 	.then(()=>{
					 		this.loading = true
					 	})
	}
}
</script>
