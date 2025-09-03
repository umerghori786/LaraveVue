import {createRouter, createWebHistory}  from 'vue-router';

import home from "./home/home.vue";
import index from "./index/index.vue";
import book from "./book/book.vue";

const routes = [

	{
		path: "/",
		name : "home",
		component : home
	},
	{
		path : "/books",
		name: "books",
		component : index
	},
	{
		path : "/book/show/:id",
		name : 'book',
		component : book
	}


];

const router = createRouter({
    history:createWebHistory(),
    routes
});


export default router;