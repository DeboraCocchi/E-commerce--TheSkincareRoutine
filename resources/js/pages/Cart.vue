<script>
import Header from './components/appHeader.vue';
import Footer from './components/appFooter.vue';
import { store } from './../data/store';

export default {
    name:'Cart',
    components: {
        Header,
        Footer,
    },
     data(){
        return{
            store,

        }
    },
    methods:{
        updateTotal(){
            store.total=0;
            let myQuantities=document.getElementsByClassName('quantity')
            for(let i=0;i<myQuantities.length;i++){
                let rowValue = myQuantities[i].value * parseFloat(store.cart[i].price);
                store.total += rowValue;
            }
        },
        removeElement(){
            let myRemoveBtns = document.getElementsByClassName('remove-item');
            for(let i=0;i<myRemoveBtns.length;i++){
                myRemoveBtns[i].addEventListener('click', function(){
                    store.cart.splice(i,1)
                })
            }
        },
        emptyCart(){
                store.cart=[];
                console.log(store.cart);
        },
        fakeProceed(){
            alert('Grazie per il tuo acquisto')

        }
    },

    mounted(){
       this.updateTotal();
    }
}
</script>

<template>
     <Header />
    <section class="cart">
        <div class="cart-card p-4">
            <h2 class="purple monoton">Carrello:</h2>

            <div class="" v-if="store.cart.length>0">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Immagine</th>
                        <th scope="col">Prodotto</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Quantità</th>
                        <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="product in store.cart" :key="product.id" :product="product">
                            <td><img :src="product.image" alt="{{product.name}}" class="thumb-image"></td>
                            <td>{{product.name}} - {{product.brand}}</td>
                            <td><p class="price">{{new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).format(product.price)}}</p></td>
                            <td><input type="number" min="1" class="quantity" value="1" @change="updateTotal()"></td>
                            <td><button class="btn btn-warning remove-item" @click="removeElement()">Rimuovi</button></td>
                        </tr>
                    </tbody>
                </table>

                <div class="cart-total d-flex justify-content-between pe-5 px-2 mt-5">
                    <div>
                        <strong class="cart-total-title purple">Totale carrello</strong>&nbsp;
                        <span class="cart-total-price">{{new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).format(store.total)}}</span>
                    </div>
                    <div class="buttons">
                        <a class="btn btn-dark me-2" type="button" href="/" @click="fakeProceed(),emptyCart()">PROCEDI CON L'ACQUISTO</a>
                    <button class="btn btn-danger" type="button" id="empty-cart" @click.prevent="emptyCart()">Svuota carrello</button>
                    </div>

                </div>

            </div>

            <div v-else>
                <i class="fa-regular fa-face-frown"></i>&nbsp; Non hai ancora inserito prodotti nel tuo carrello
            </div>
        </div>
    </section>
    <Footer />
</template>

<style lang="scss" scoped>
    section.cart{
        background-color: #ffd6e2;
        padding:160px 0 30px;
        min-height:calc(100vh - 150px);
        .cart-card{
            background-color:white;
            border-radius: 0.8rem;
            box-shadow:4px 4px 6px #555;
            margin:0 auto;
            width:70%;
            overflow: hidden ;
            .cart-table-container{
                overflow-y:auto;
            }
        }
        .thumb-image{
            height:90%;
            aspect-ratio: 1 / 1;
            max-height: 60px;;
            object-fit: cover;

        }
        table tbody{
            overflow-y:auto;
        }
    }
</style>
