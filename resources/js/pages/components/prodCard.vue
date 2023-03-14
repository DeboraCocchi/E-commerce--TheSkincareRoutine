<script>

import { store } from '../../data/store';

export default {
    name:'ProdCard',
    props: {
        product: Object
        },
    data(){
        return{
            store
        }
    },
    methods:{
        addToCart(product){
            if(store.cart.includes(product)){
                alert('Il tuo carrello contiene già questo prodotto!')
            }else{
                store.cart.unshift(product);
            }


        },

    }
}
</script>

<template>
    <div class="dc-card col-3">
        <div class="inner-card card h-100">
            <img v-if="product.image.includes('http')" :src="product.image" :alt="product.slug" class="card-img-top p-0 m-0" />
            <img v-else class="box-image card-img-top p-0 m-0" :src="'http://127.0.0.1:8000/storage/' + product.image" :alt="product.slug" />
            <div class="card-body p-4 d-flex flex-column justify-content-between">
                        <span class="badge bg-light purple">{{product.category.type}}</span>
                      <h4 class="card-title purple">{{product.name}}</h4>
                      <h6 class="card-title darkpurple">{{(product.brand.toUpperCase())}}</h6>
                      <div class="d-flex justify-content-between">
                          <h5><strong>{{new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).format(product.price)}}</strong></h5>
                          <p style="font-size:0.8rem">Cod. prodotto:<br>{{product.code}}</p>
                      </div>
                      <p class="card-text">{{product.description.substr(0,60)}}...</p>
                      <button class="btn btn-dark my-button align-self-end"
                      @click="addToCart(product)"><i class="fa-solid fa-cart-plus me-2"></i>Aggiungi</button>
            </div>

        </div>
     </div>




</template>

<style lang="scss" scoped>
    .dc-card{
        position:relative;
        padding:20px;
        background-color: transparent;
        min-width:300px;
    .inner-card{
         background-color: white;
         img{
            object-fit: cover;
            width:100%;
            height:320px;
        }
        .card-body{
            padding:16px;
        }


    }


    span.badge{
        position:absolute;
        top:16px;
        right:16px;
        box-shadow: 2px 2px 4px rgb(99, 57, 97);
    }

}

</style>
