<script>
import { store } from '../../data/store';

export default {
    name:'Header',
    data(){
        return{
            store
        }
    },

}
</script>
<template>
    <header>
        <div class="container-fluid h-100">
            <div class="row h-100 justify-content-between">
                <div class="col-4 logo h-100">
                    <router-link :to="{name:'home'}">
                        <img src="/img/skincare-routine-logo.png" alt="logo-skincare-routine" class="header-logo">
                    </router-link>
                </div>
                <div class="col-8 navbar-links h-100">
                    <ul class="d-flex align-items-center justify-content-end h-100">
                        <li class="me-4">
                            <a href="/#about-us">The Skincare Routine</a>
                        </li>
                        <li>
                            <a href="/#shop" class="me-4">Shop</a>
                        </li>
                        <li class="me-5"><a href="/login" id="login-button" >Accedi</a></li>
                        <li class="pink"> <router-link :to="{name:'cart'}"><i class="fa-solid fa-cart-shopping"></i>&nbsp;( {{store.cart.length}} )</router-link></li>
                    </ul>

                </div>
            </div>
        </div>
    </header>

</template>


<style lang="scss" scoped>
   header{
       height:120px;
       background-color:rgba(0, 0, 0, 0.928);
       width:100vw;
       top:0;
       left:0;
       position:fixed;
       z-index:99;
       padding:4px 40px;

       & *{
           max-height:100%;
       }
       img.header-logo{
           max-height:100%;
           object-fit:contain;
       }
       ul{
           list-style: none;
           a{
               text-decoration: none;
               color:#e65c85;
               font-size:1.1rem;
               text-transform: uppercase;
               transition:all .3s ease-in-out;
               &:hover:not(#login-button){
                   color:#ffd6e2;
               }
           }
           #login-button{
               padding:4px 8px;
               border:1px solid #e65c85;
               border-radius: 25px;
               background-color: #ffd6e2

           }
           .fa-cart-shopping{
               font-size:1.5rem;
           }
       }

   }

</style>
