<script>
import Header from './components/appHeader.vue';
import Jumbotron from './components/appJumbo.vue';
import Footer from './components/appFooter.vue';
import Main from './components/appMain.vue';
import axios from 'axios';
import { store } from "../data/store";

export default {
    name:'Home',
    components: {
        Header,
        Jumbotron,
        Main,
        Footer,
    },
    data() {
        return {
            store,
        }
    },
    methods:{
         getProds() {
            axios.get(store.apiUrl).then((result) => {
                // console.log(result.data.products);
                store.products = result.data.products;
            });
        },
    },
    mounted(){
        this.getProds()
    }
}
</script>

<template>
    <Header />
    <Jumbotron />
    <Main />
    <Footer />
</template>

<style lang="scss">
    html{
        scroll-behavior: smooth;
    }
     body{
        overflow-x: hidden;
    }
    .pink{
        color:#ffd6e2;

    }
    .purple{
        color:#E65C85;;

    }

    .darkpurple{
        color:#89374f;
    }




</style>
