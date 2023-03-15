<template>
   <Header />
    <section class="error">
        <div class="container text-center">
            <h4 class="pt-5"> La risorsa cercata non è disponibile <i class="fa-regular fa-face-frown"></i></h4>
        </div>
    </section>
    <Footer />
</template>

<script>
import Header from './components/appHeader.vue';
import Footer from './components/appFooter.vue';

export default {
    name:'ErrorPage',
    components: {
        Header,
        Footer,
    },
}
</script>

<style lang="scss" scoped>
    .error{
        height:calc(100vh - 270px);
        width:100vw;
        background-color: #ffd2e6;
        position:relative;
        top:120px;
        margin-bottom:120px;
        h4{
            color:#E65C85;
        }
    }
</style>
