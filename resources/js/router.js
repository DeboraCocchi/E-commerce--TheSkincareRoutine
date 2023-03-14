import {createRouter, createWebHistory} from "vue-router";
import Home from './pages/Home.vue';
import Cart from './pages/Cart.vue';

const router = createRouter({
    history:createWebHistory(),
    linkExactActiveClass:'active',
    routes:[
        {
            path:'/',
            name:'home',
            component: Home
        },
        {
            path:'/cart',
            name:'cart',
            component: Cart
        },
    ]});
    export {router};
