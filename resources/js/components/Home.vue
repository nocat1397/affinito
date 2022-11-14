<template>
    <div>
  <!-- <vue-element-loading :active="show" spinner="bar-fade-scale" color="#FF6700" background-color="rgba(255,255,255,1)" :is-full-screen="true"/> -->
    
    <!--slider area start-->
    <section class="slider_section color_two mb-70">
        <carousel class="slider_area" :responsive="{0:{items:1,nav:false,loop:true,dots:false},600:{items:1,nav:false,loop:true,dots:false}}">
            <div class="single_slider d-flex align-items-center" style="background-image: url('/img/bg/1.jpg')">
                <!-- <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider_content">
                                <h1>Fresh Milk Products</h1>
                             
                                <router-link to="/" v-scroll-to="{element:'#products'}">Explore </router-link>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="single_slider d-flex align-items-center" style="background-image: url('/img/bg/2.jpg')"></div>
        </carousel>
    </section>
    <!--slider area end-->
    <!-- <div style="position: absolute; top: 803px; z-index: 1;" class="d-none d-md-block d-lg-block">
        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="1400.000000pt" height="26.000000pt" viewBox="0 0 1400.000000 26.000000" preserveAspectRatio="xMidYMid meet">
        <g transform="translate(0.000000,26.000000) scale(0.100000,-0.100000)" fill="#ffffff" stroke="none">
        <path d="M3740 249 c-14 -6 -38 -12 -55 -14 -206 -26 -243 -34 -300 -64 -33
        -17 -81 -36 -107 -41 -27 -6 -69 -15 -95 -20 -69 -16 -223 -21 -223 -8 0 7
        -15 8 -42 3 -24 -5 -60 -7 -82 -6 -51 2 -98 -14 -126 -44 -23 -24 -28 -25
        -156 -25 -73 0 -179 7 -234 16 -81 13 -113 14 -164 5 -34 -6 -93 -11 -131 -11
        -56 0 -76 5 -114 27 -66 40 -151 73 -186 73 -49 0 -265 -30 -327 -45 -48 -13
        -62 -13 -96 -1 -21 8 -79 17 -127 21 -49 4 -105 15 -125 23 -52 23 -534 20
        -637 -3 -77 -17 -89 -15 -181 39 -14 8 -60 14 -127 14 l-105 2 0 -95 0 -95
        7000 0 7000 0 0 53 c0 52 0 52 -32 54 -18 0 -64 8 -103 17 -116 25 -651 26
        -770 0 -38 -8 -82 -17 -97 -21 -21 -4 -30 1 -44 22 -17 26 -19 27 -83 20 -36
        -4 -102 -7 -146 -6 -44 0 -102 -5 -130 -13 -46 -14 -192 -23 -465 -31 -58 -1
        -148 2 -201 8 -77 9 -110 8 -172 -5 -59 -11 -87 -13 -116 -5 -29 8 -53 7 -94
        -3 -38 -9 -81 -10 -138 -6 -46 4 -133 7 -194 7 -60 0 -131 0 -157 1 -152 3
        -231 1 -298 -6 -62 -7 -82 -6 -107 8 -41 20 -94 20 -205 -1 -131 -25 -248 -3
        -248 47 0 19 -33 25 -171 34 -32 3 -66 9 -78 15 -29 16 -297 3 -312 -16 -6 -7
        -21 -13 -32 -13 -11 0 -30 -8 -41 -19 -31 -27 -139 -35 -160 -12 -14 15 -43
        19 -202 24 -102 4 -224 11 -272 17 -89 11 -202 -1 -310 -31 -37 -10 -45 -9
        -62 6 -16 15 -28 16 -72 10 -29 -5 -84 -7 -121 -6 -38 1 -83 -3 -101 -9 -24
        -8 -41 -8 -61 0 -21 8 -41 8 -76 -1 -33 -9 -52 -9 -61 -2 -14 11 -187 10 -230
        -2 -18 -5 -34 -2 -50 9 -31 22 -100 20 -159 -5 -39 -17 -59 -20 -103 -15 -30
        4 -60 14 -67 22 -8 9 -29 15 -58 14 -25 -1 -71 4 -101 10 -30 6 -71 14 -90 17
        -19 3 -45 13 -58 21 -33 21 -168 9 -274 -24 -50 -16 -109 -27 -150 -28 -47 -2
        -73 -7 -86 -19 -10 -9 -26 -17 -35 -17 -9 0 -17 -7 -17 -15 0 -29 -43 -38
        -127 -26 -135 19 -236 24 -275 13 -32 -9 -48 -6 -120 21 -80 29 -89 30 -230
        28 -116 -1 -154 2 -177 14 -39 20 -56 19 -89 -4 -25 -17 -35 -18 -130 -7 -82
        9 -107 15 -117 30 -12 15 -22 17 -55 12 -37 -6 -41 -4 -50 19 -14 37 -41 31
        -96 -20 -28 -26 -57 -45 -71 -45 -13 0 -23 -4 -23 -10 0 -5 -12 -10 -27 -10
        -19 0 -36 -10 -55 -32 l-26 -33 -40 23 c-48 26 -78 28 -149 5 -50 -16 -56 -16
        -106 0 -30 9 -81 17 -115 17 -34 0 -64 5 -68 11 -4 7 -24 9 -52 6 -32 -3 -53
        0 -76 14 -28 16 -142 46 -271 71 -27 5 -77 19 -110 31 -69 24 -159 31 -195 16z"></path>
        </g>
        </svg>
    </div> -->

    
    <!--product area start-->
    <div class="product_area color_two  mb-60" v-for="tag in tags" :key="tag.id" id="products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header">
                        <div class="section_title">
                           <p>Explore our store</p>
                           <h2>{{tag.name}} Products</h2>
                        </div>
                        
                    </div>
                </div>
            </div> 
            <div class="product_container">  
               <div class="row">
                   <div class="col-12">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="plant1" role="tabpanel">
                               
                                <div v-if="filteredList.length > 0">
                                <carousel class="product_carousel product_column5 d-md-block d-lg-block d-none" :responsive="{0:{items:2,nav:false,loop:false,margin:20,dots:false},600:{items:5,nav:false,margin:20,loop:false,dots:false}}">

                                    <article v-for="product in filteredList" :key="product" v-if="product.tag_id == tag.id">
                                        <figure class="single_product">
                                            <div class="product_thumb"> 
                                                <router-link  class="primary_img" :to="{name: 'Product-Details', params: { name: product.name}}"><img :src="'/images/'+product.images[0].file" alt=""></router-link>
                                                <div class="label_product">
                                                    <!-- <span class="label_sale">Sale</span> -->
                                                    <!-- <span class="label_new">New</span> -->
                                                </div>
                                                <div class="" v-if="product.quantity < 6" style="background: red; color:#fff">
                                                    <p class="text-center">Out of Stock</p>
                                                </div>
                                                <div class="action_links" v-if="product.quantity > 5">
                                                    <ul>
                                                        <li class="add_to_cart" v-if="!userDetails"><router-link :to="{name: 'Product-Details', params: { name: product.name}}" title="Add to Wishlist"><span class="lnr lnr-eye"></span></router-link></li>
                                                        <li class="add_to_cart" v-if="!userDetails"><router-link to="/login" title="Add to Wishlist"><span class="lnr lnr-heart"></span></router-link></li>
                                                        <li class="wishlist" v-if="userDetails"><button class="btn" v-on:click="addToWishlist(product.id)" title="Add to Wishlist"><span class="lnr lnr-heart"></span></button></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><router-link :to="{name: 'Product-Details', params: { name: product.name}}">{{product.name.replace(/-/g," ")}}</router-link></h4>
                                                <!-- <p><router-link to="#">Fruits</router-link></p> -->
                                                <div class="price_box"> 
                                                    <span class="current_price">₹ {{product.amount}}/-</span>
                                                </div>
                                                    <div class="price_box">
                                                        <span v-if="product.quantity > 5" class="">

                                                            <div class="quantity">
                                                            <form class="productToCart">  
                                                                <input type="hidden" name="product_id" :value="product.id">
                                                                <input type="hidden" name="user_id" :value="userDetails.id">
                                                                <a class="minus" id="minus" type="button">-</a>
                                                                <input type="text" class="form-control qty" name="qty" v-model="quantity">
                                                                <a class="plus" type="button" id="plus">+</a>
                                                                <button class="btn btn-orange" id="add" v-if="userDetails" type="button">Add</button>
                                                                <router-link v-if="!userDetails" class="btn btn-orange" to="/login">Add</router-link>
                                                            </form>
                                                            </div>
                                                        </span>
                                                    </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    

                                    
                                </carousel> 
                                <carousel class="product_carousel product_column5 d-block d-md-none d-lg-none" :responsive="{0:{items:2,nav:false,loop:false,margin:20,dots:false},600:{items:5,nav:false,margin:20,loop:false,dots:false}}">

                                    <article v-for="product in filteredList" :key="product" v-if="product.tag_id == tag.id">
                                        <figure class="single_product">
                                            <div class="product_thumb"> 
                                                <div  class="primary_img"><img :src="'/images/'+product.images[0].file" alt=""></div>
                                                <div class="label_product">
                                                    <!-- <span class="label_sale">Sale</span> -->
                                                    <!-- <span class="label_new">New</span> -->
                                                </div>
                                                <div class="" v-if="product.quantity < 6" style="background: red; color:#fff">
                                                    <p class="text-center">Out of Stock</p>
                                                </div>
                                                <div class="action_links" v-if="product.quantity > 5">
                                                    <ul>
                                                        <li class="add_to_cart" v-if="!userDetails"><router-link :to="{name: 'Product-Details', params: { name: product.name}}" title="Add to Wishlist"><span class="lnr lnr-eye"></span></router-link></li>
                                                        <li class="add_to_cart" v-if="!userDetails"><router-link to="/login" title="Add to Wishlist"><span class="lnr lnr-heart"></span></router-link></li>
                                                        <li class="wishlist" v-if="userDetails"><button class="btn" v-on:click="addToWishlist(product.id)" title="Add to Wishlist"><span class="lnr lnr-heart"></span></button></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><router-link :to="{name: 'Product-Details', params: { name: product.name}}">{{product.name.replace(/-/g," ")}}</router-link></h4>
                                                <!-- <p><router-link to="#">Fruits</router-link></p> -->
                                                <div class="price_box"> 
                                                    <span class="current_price">₹ {{product.amount}}/-</span>
                                                </div>
                                                    <div class="price_box">
                                                        <span v-if="product.quantity > 5" class="">

                                                            <div class="quantity">
                                                            <form class="productToCart">  
                                                                <input type="hidden" name="product_id" :value="product.id">
                                                                <input type="hidden" name="user_id" :value="userDetails.id">
                                                                <a class="minus" id="minus" type="button">-</a>
                                                                <input type="text" class="form-control qty" name="qty" v-model="quantity">
                                                                <a class="plus" type="button" id="plus">+</a>
                                                                <button class="btn btn-orange" id="add" v-if="userDetails" type="button">Add</button>
                                                                <router-link v-if="!userDetails" class="btn btn-orange" to="/login">Add</router-link>
                                                            </form>
                                                            </div>
                                                        </span>
                                                    </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    

                                    
                                </carousel> 
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>        
            </div>   
        </div> 
    </div>
    <!--product area end-->

    <!--banner area start-->
    <div class="banner_area banner_gallery2">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <router-link to="/"><img src="/img/bg/product-img/img1.jpg" alt=""></router-link> 
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <router-link to="/"><img src="/img/bg/product-img/img2.jpg" alt=""></router-link> 
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="banner2_sidebar">
                        <div class="banner_thumb mb-30">
                            <router-link to="/"><img src="/img/bg/product-img/img3.jpg" alt=""></router-link> 
                        </div>
                        <div class="banner_thumb">
                            <router-link to="/"><img src="/img/bg/product-img/img4.jpg" alt=""></router-link> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--banner area end-->
    
    <!--banner fullwidth area satrt-->
    <div class="banner_fullwidth color_two mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner_full_content text-center">
                        <!-- <p>Stay Healthy & Fit !</p> -->
                        <!-- <h2>50% OFf <span>on all quality products</span></h2> -->
                        <router-link to="/">discover now</router-link>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
    <!--banner fullwidth area end-->

    <!--custom product area start-->
    
    <!--custom product area end-->
      <!-- <div style="position: relative; top: -155px;">
            <marquee behavior="scroll" direction="left" scrolldelay="200" loop="infinite" >
				<img src="/img/cow.gif" class="cow-gif">
			</marquee>
        </div> -->
     <!--brand area start-->
    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-12">
                </div>
            </div>
        </div>
    </div>
    <!--brand area end-->

    
    </div>
</template>
<style scoped>
.qty::-webkit-outer-spin-button,
.qty::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
.btn-orange {
    color: white;
    background: #c02626;
    transition: 0.3s;
    border-radius: 5px;
    margin-left: 10px;
    line-height: 1.2;
}
.btn-orange:hover {
    color: white;
    background: #000;
}
.number{
	margin:100px;
}
.minus, .plus{
	width: 20px;
    background: #f2f2f2;
    border-radius: 5px;
    border: 1px solid #ddd;
    display: inline-block;
    vertical-align: middle;
    text-align: center;
    cursor: pointer;
    line-height: 2;
}

.qty{
	height: 20px;
    width: 26px;
    text-align: center;
    font-size: 11px;
    border: 1px solid #ddd;
    border-radius: 5px;
    display: inline-block;
    vertical-align: middle;
    padding: 0!important;
    margin-left: -4px;
    margin-right: -4px;
}
</style>
<script>

import carousel from 'vue-owl-carousel';
import VueElementLoading from 'vue-element-loading';

export default {
    data() {
        return {
            products:{},
            userDetails:{},
            search:null,
            show:true,
            quantity:1,
            qty:{},
            tags:[]
        }
    },
     mounted() {
        window.scrollTo({
          top: 0,
          left: 0,
          behavior: 'smooth'
        });
        
        setTimeout(() => {
          this.show = false
        }, 2000);
        
    
    },
    components : { carousel,VueElementLoading },
    
    computed: {
      filteredList() {
        if (this.search) {    
            return this.products.filter(product => {
                return product.name.toLowerCase().includes(this.search.toLowerCase())
            })
        }else{
            return this.products;
        }
      }
    },
    watch: {
        '$route': 'fetchProducts'
    },
    created() {
        this.fetchProducts(),
        this.fetchUser()
        this.fetchTags()
    },
    methods: {

        fetchProducts:function(){
            this.axios.get('api/products').then(response => {
                  this.products = response.data;

                });
        },
        fetchTags:function(){
            this.axios.get('api/tags').then(response => {
                  this.tags = response.data;
                    console.log(response.data);
                });
        },
        fetchUser:function() {
            this.axios.get('/user').then(response => {
              this.userDetails = response.data;

            });
        },

        // addToCart(id,zdnfjk) {
        //     console.log(this.quantity);
        //     return false;
        //     // this.product_id = id;
        //     // this.cart.user_id = this.userDetails.id;
        //     this.axios.post('api/addCart', {product_id:id, user_id:this.userDetails.id, qty:this.quantity}).then(response => {
        //         console.log(response.data);
        //         this.$fire({
        //           title: "Product Added Successfully",
        //           type: "success",  
        //           timer: 3000,
        //           showCancelButton: false,
        //           showConfirmButton: false
        //         });
        //         $('#showPlaceorder').show();
        //     //   window.location.reload();
        //     //   console.log(response.data)
        //     });
        // },
        addToWishlist(id) {

            this.axios.post('api/addWishlist', {product_id:id, user_id:this.userDetails.id}).then(response => {
                this.$fire({
                  title: "Wishlist Added Successfully",
                  type: "success",  
                  timer: 3000,
                  showCancelButton: false,
                  showConfirmButton: false
                });
            //   window.location.reload();
            //   console.log(response.data)
            });
        },
       

    },
    
}
</script>
    
