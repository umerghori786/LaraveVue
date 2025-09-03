<template></template>
<script>
  import Swiper from 'swiper';
  import 'swiper/swiper-bundle.css';

  import slider from "./slider.vue";

  export default {
    name: 'HomeComponent',
    data() {
      return {
        swiperInstance: null
      }
    },
    mounted() {
      this.$nextTick(() => {
        this.initSwiper();
      });
    },
    beforeDestroy() {
      if (this.swiperInstance) {
        this.swiperInstance.destroy(true, true);
      }
    },
    methods: {
      initSwiper() {
        this.swiperInstance = new Swiper('.swiper-container.books-wrapper-3', {
          slidesPerView: 5,
          spaceBetween: 10,
          loop: true,
          pagination: {
            el: '.swiper-pagination-two',
            clickable: true,
          },
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },
          breakpoints: {
            1024: { slidesPerView: 5 },
            768: { slidesPerView: 2 },
            640: { slidesPerView: 1 },
          },
        });
      }
    }
  }
</script>