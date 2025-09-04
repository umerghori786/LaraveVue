<template>
	
  <loader v-if="!loading"></loader>
	<div class="page-content bg-white">
      
     

   <swiper></swiper>   
   <slider v-bind:books="books"></slider> 
    

    



  </div>
</template>
<script>
import slider from './slider.vue';
import swiper from './swiper.vue';
import loader from '../loader/loader.vue';

export default{

  components: {

    slider,
    swiper,
    loader
  },
  data()
  {
    return{

      books : [],
      loading : false,

    }
  },
  mounted()
  {
    const req = axios(`https://press.escuela-ray-bolivar-sosa.com/api/user/book`)
                      .then((response)=>{
                        this.books = response.data;
                      })
                      .then(()=>{
                        this.loading = true
                      })  
  }
}
</script>
