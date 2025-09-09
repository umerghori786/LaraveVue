import {createRouter, createWebHistory}  from 'vue-router';

import home from "./home/home.vue";
import index from "./index/index.vue";
import book from "./book/book.vue";
import contact from "./contact-us/contact.vue";
import register from "./auth/register.vue";

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
	},
	{
		path : "/contact-us",
		name : 'contact-us',
		component : contact
	},
	{
		path : "/register",
		name : "register",
		component : register
	},


];

const router = createRouter({
    history:createWebHistory(),
    routes
});


export default router;