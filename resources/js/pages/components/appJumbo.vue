<template>
    <section class="jumbotron">
        <img src="https://images.unsplash.com/photo-1524901548305-08eeddc35080?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80" alt="">
    </section>
</template>

<script>
export default {
    name:'Jumbotron'
}
</script>

<style lang="scss" scoped>
     .jumbotron{
       width:100vw;
       height:90vh;
       padding-top:120px;
       img{
           width:100%;
           height:100%;
            object-fit: cover;
            object-position: center;
       }


   }
</style>
