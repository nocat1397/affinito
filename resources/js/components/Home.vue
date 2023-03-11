<template>
    <div>
  <!-- <vue-element-loading :active="show" spinner="bar-fade-scale" color="#FF6700" background-color="rgba(255,255,255,1)" :is-full-screen="true"/> -->
    
    <!--slider area start-->
    <section class="slider_section color_two mb-70">
        <carousel class="slider_area" :responsive="{0:{items:1,autoplay:true,nav:false,loop:true,dots:false},600:{items:1,autoplay:true,nav:false,loop:true,dots:false}}" v-if="banners.length > 0">
            <div class="single_slider d-flex align-items-center" :id="'banner'+banner.id" v-for="banner in banners" :key="banner.id"></div>
        </carousel>
    </section>
    <!--slider area end-->

    
    <!--product area start-->
        <div class="product_area color_two  mb-60"  id="products">
        <div class="container">
          
            <!-- <div class="row">
                <div class="col-12">
                    <div class="product_header" v-if="categories.length > 0">
                        <div class="section_title">
                           <p>Shop By Categories</p>
                           <h2>Categories</h2>
                        </div>
                        <div class="product_tab_btn">
                            <ul class="nav" role="tablist" id="nav-tab">
                                <li>
                                    <a class="active" data-toggle="tab" href=".allCat" role="tab" aria-controls="allCat" aria-selected="true"> 
                                       All
                                    </a>
                                </li>
                                <li v-for="category in categories" :key="category.id">
                                    <a class="" data-toggle="tab" :href="'.category'+category.id" role="tab" :aria-controls="'category'+category.id" aria-selected="false"> 
                                       {{category.name}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>  -->
            <div class="product_container ">  
                <div class="section_title">
                           <!-- <p>Best Sellers</p> -->
                           <h1>Best Sellers</h1>
                        </div>
                <div v-if="filteredList.length > 0">
                            <carousel class=" product_carousel product_column5" :responsive="{0:{items:1,autoplay:false,nav:false,loop:false,dots:false},600:{items:3,autoplay:false,nav:true,loop:false,dots:false,margin:20},1000:{items:3,autoplay:false,nav:true,loop:false,dots:false,margin:20}}">
                            <article v-for="product in filteredList" :key="product">
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
               </div>
                    
                
            </div>   

            <div class="row mt-5">
                <div class="col-12">
                    <div class="product_header" v-if="categories.length > 0">
                        <div class="section_title">
                           <p>Shop By Categories</p>
                           <h1>Categories</h1>
                        </div>
                    </div>
                        
                    </div> 
                        <div class="col-md-4 mb-3" v-for="category in categories" :key="category.id">
                            <div class="card shadow p-3 card-new1">
                                <div class="card-head pt-2 pb-2 text-center">
                               <h2 style="font-weight: 600;"> {{category.name}}</h2>
                            </div>
                            <div class="card-body text-center pb-2">
                                <img :src="'/category/'+category.file" style="width:auto; height: 37vh;" alt="">
                                <a href="#" class="w-50 mt-3 btn btn-orange">Shop Now</a>
                            </div>
                            </div>

                        </div>
                        <!-- <div class="col-md-4 mb-3">
                            <div class="card shadow p-3 card-new">
                                <div class="card-head pt-2 pb-2 text-center">
                               <h2 style="font-weight: 600;">Fruit Powders</h2>
                            </div>
                            <div class="card-body text-center pb-2">
                                <img src="/img/bg/product-img/3.jpg" style="width:auto; height: 37vh;" alt="">
                                <a href="#" class="w-50 mt-3 btn btn-orange">Shop Now</a>
                            </div>
                            </div>

                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card shadow p-3 card-new">
                                <div class="card-head pt-2 pb-2 text-center">
                               <h2 style="font-weight: 600;">Chocolates</h2>
                            </div>
                            <div class="card-body text-center pb-2">
                                <img src="/img/bg/product-img/img3.jpg" style="width:auto; height: 37vh;" alt="">
                                <a href="#" class="w-50 mt-3 btn btn-orange">Shop Now</a>
                            </div>
                            </div>

                        
                    </div> -->
           </div>
        </div> 
    </div>
   
    <!--product area end-->

    <!--banner area start-->
    <!-- <div class="banner_area banner_gallery2">
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
    </div> -->
    <!--banner area end-->
    
    <!--banner fullwidth area satrt-->
    <!-- <div class="banner_fullwidth color_two mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner_full_content text-center">
                       
                        <router-link to="/">discover now</router-link>
                    </div>
                </div>
            </div>
        </div>
      
    </div> -->

    <div class="newsletter">
        <div class="">
            <div class="row">
              <div class="subscribenews">
                <h1 class="discount_size">Take 15% OFF Your First Purchase</h1>
                <div class="subscribe_form sub_form m-auto mt-4">
                    <form id="mc-form" class="mc-form text-light footer-newsletter" @submit.prevent="addNewsletter">
                        <input id="mc-email" class="text-light" type="email" autocomplete="off" placeholder="Enter your email" v-model="email"/>
                        <button id="mc-submit" type="submit">Subscribe</button>
                    </form>
                    <!-- mailchimp-alerts Start -->
                    <div class="mailchimp-alerts text-centre">
                        <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                        <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                        <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                    </div><!-- mailchimp-alerts end -->
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
            banners:{},
            userDetails:{},
            search:null,
            show:true,
            quantity:1,
            qty:{},
            categories:{}
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
        this.fetchUser(),
        this.fetchBanners(),
        this.fetchCategories()
    },
    methods: {

        fetchProducts:function(){
            this.axios.get('api/products').then(response => {
                  this.products = response.data;
                console.log(response.data);
                });
        },
        fetchBanners:function(){
            this.axios.get('api/banners').then(response => {
                  this.banners = response.data;

                });
        },
        fetchCategories:function(){
            this.axios.get('api/category').then(response => {
                  this.categories = response.data;
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
    
