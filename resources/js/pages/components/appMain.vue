<script>
import ProdCard from './prodCard.vue';
import { store } from '../../data/store';
export default {
    name:'Main',
    data(){
        return{
            store
        }
    },
    components:{
        ProdCard
    },

}
</script>
<template>
        <main>

            <section class="about">
                    <div class="container-fluid">
                        <div class="row justify-content-center" id="about-us">
                            <h2 class="text-center monoton purple">ABOUT  &nbsp;&nbsp;US</h2>
                            <div class="col-4">
                                <div class="brand-card d-flex flex-column align-items-center h-100">
                                    <h3 class="purple my-3">MAKEUP</h3>
                                    <div class="img-container">
                                        <img src="/img/makeup.png" alt="makeup">
                                    </div>
                                    <p class="mt-3 text-center">Rilassati e scopri la bellezza che c'è in te con i nostri prodotti di makeup, skincare e candele profumate. Scegli tra una vasta selezione di brand di alta qualità e regalati momenti di benessere e bellezza ogni giorno.</p>

                                </div>

                            </div>
                            <div class="col-4">
                                <div class="brand-card d-flex flex-column align-items-center h-100">
                                    <h3 class="purple my-3">SKINCARE</h3>
                                    <div class="img-container">
                                        <img src="/img/skincare.png" alt="skincare">
                                    </div>
                                    <p class="mt-3 text-center">Prendersi cura di sé è essenziale per il benessere mentale e fisico. Investire tempo ed energia in se stessi è un atto di amore e di rispetto verso il proprio corpo e la propria mente.</p>
                                </div>

                            </div>
                            <div class="col-4">
                                <div class="brand-card d-flex flex-column align-items-center h-100">
                                    <h3 class="purple my-3">BEAUTY</h3>
                                    <div class="img-container">
                                        <img src="/img/beauty.png" alt="beauty">
                                    </div>
                                    <p class="mt-3 text-center">Scopri le tendenze più recenti e i prodotti essenziali per la cura della pelle, tutti disponibili solo da noi. Consegna veloce e gratuita su ordini superiori a $50. <br>Entra nel nostro mondo di bellezza e lasciati ispirare!</p>

                                </div>

                            </div>
                        </div>
                    </div>
            </section>
            <div class="container-fluid text-center p-0">

                <section id="shop">
                    <h2 class="purple monoton">SHOP</h2>
                    <div class="row flex-wrap justify-content-around">
                        <div class="col-4 offset-8">
                            <div class="input-group mb-3 me-2">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass purple"></i></span>
                                <input type="text" class="form-control" placeholder="Cerca nel sito..." aria-label="Carca nel sito" aria-describedby="basic-addon1" v-model="store.searchbar">
                            </div>
                        </div>
                        <ProdCard
                            v-for="product in store.products"
                            :key="product.id" :product="product"
                            v-show="product.name.toLowerCase().includes(store.searchbar.toLowerCase())||product.brand.toLowerCase().includes(store.searchbar.toLowerCase())||product.category.type.toLowerCase().includes(store.searchbar.toLowerCase())" />

                    </div>
                </section>


            </div>
        </main>

</template>


<style lang="scss" scoped>
    main{
        z-index: 5;
        background-color: #ffd6e2;
        #about-us{
                background-color: #ffd6e2;
                padding:30px;
            .col-4{
                padding:10px;
                .brand-card{
                    background-color: white;
                    border-radius:1.3rem;
                    width:90%;
                    padding:30px;
                    margin:0 auto;

                }
                .img-container{
                    border: 1px solid #e65c85;
                    background-color:#ffd6e2;;
                    padding:0;
                    border-radius:50%;
                    height:250px;
                    width:250px;
                    img{
                    height:100%;
                    object-fit: cover;
                    }
                }

            }
        }
        #shop{
            padding:30px 30px 120px;
            background-color: rgb(248, 233, 233);
        }

    }

</style>
