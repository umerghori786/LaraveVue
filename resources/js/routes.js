import {createRouter, createWebHistory}  from 'vue-router';

import store from './store/index.js';
import home from "./home/home.vue";
import index from "./index/index.vue";
import book from "./book/book.vue";
import contact from "./contact-us/contact.vue";
import register from "./auth/register.vue";
import login from "./auth/login.vue";
import profile from "./profile/index.vue";

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
	{
		path : "/login",
		name : "login",
		component : login
	},
	{
		path : "/profile",
		name : "profile",
		component : profile,
		meta : {

			requiresAuth  : true
		}
	}


];

const router = createRouter({
    history:createWebHistory(),
    routes
});

router.beforeEach((to , from , next)=>{

	const isAuthenticated = localStorage.getItem('token');
	console.log(isAuthenticated)
	if (to.meta.requiresAuth && !isAuthenticated)
	{
		next('/login')
	} else if ((to.name == 'login' || to.name == 'register') && isAuthenticated)
	{
		next('/');
	} else {

		next();
	}
})

export default router;