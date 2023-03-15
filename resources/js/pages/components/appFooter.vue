<script>
export default {
    name:'Footer'
}
</script>
<template>
    <footer>
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-6 h-100 text-center p-3"><img src="/img/logo-no-round.png" alt="logo-skincare-routine" class="header-logo"></div>
                <div class="col-3 p-3 text-center">
                    <h6 class="purple">THE SKINCARE ROUTINE</h6>
                    <p>Via delle Rose, 10<br>Quartiere San Giorgio<br>00144 Roma, Italia</p>
                </div>
                <div class="col-3 d-flex pink justify-content-center align-items-center">
                    <a href="#"><i class="fa-brands fa-facebook me-4"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram me-4"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter me-4"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </footer>
</template>


<style lang="scss" scoped>
    footer{
        z-index: 1;
        position:relative;
        bottom:0;
        left:0;
        width:100vw;
        height:150px;
        background-color: black;
        color:white;
        .col-3:not(.col-3:last-of-type){
            border-right:1px dotted #ffd6e2;
        }
        .col-3{
            a{
                color:#ffd6e2;
                font-size:1.8rem;
                transition: all .3s ease-in-out;
                &:hover{
                    color:#E65C85;
                }
            }
        }
        .col-6{
            border-right:1px dotted #ffd6e2;
            img{
                width:250px;
                height:100%;
                object-fit: cover;
            }

        }
    }
</style>
