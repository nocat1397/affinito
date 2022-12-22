<template>
    <div>
    <!--header area start-->
    
       <!--offcanvas menu area start-->
    <div class="off_canvars_overlay">
                
    </div>
    <div class="offcanvas_menu offcanvas_two">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <a v-on:click="canvasOpen"><i class="icon-menu"></i></a>
                    </div>
                    <div class="offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a v-on:click="canvasClose"><i class="icon-x"></i></a>  
                        </div>
                        <div class="header_social text-right">
                            <ul>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-googleplus-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                            </ul>
                        </div>
                        
                        <div class="search_container">
                            <div>
                                <autocomplete
                                  :search="search"
                                  placeholder="Search Products"
                                  :get-result-value="getResultValue"
                                  @submit="handleSubmit"
                                ></autocomplete>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <ul v-if="!userDetails" class="d-inline-flex">
                                <li><router-link to="/Register">Register</router-link></li>
                                <li><span>/</span></li>
                                <li><router-link to="/Login">Login</router-link></li>
                            </ul>
                        </div>


                        <div id="menu" class="text-left">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active" v-if="userDetails">
                                    <router-link to="/" style="line-height: unset; color: #c02626; font-weight: bold; font-size: 15px">{{userDetails.name}}</router-link>
                                </li>   
                                <li class="menu-item-has-children">
                                    <router-link to="/">Home</router-link>
                                </li>
                                <!-- <li class="menu-item-has-children" v-if="userDetails">        
                                    <router-link :to="{name: 'wallet', params: { id: userDetails.id}}">Wallet</router-link>
                                </li> -->
                                <li class="menu-item-has-children" v-if="userDetails">        
                                    <router-link :to="{name: 'orders', params: { id: userDetails.id}}">Your Orders</router-link>
                                </li>
                                <li class="menu-item-has-children" v-if="userDetails">
                                    <a @click.prevent="logout">Logout</a>
                                </li>

                                <!-- <li class="menu-item-has-children">
                                    <a href="about.html">about Us</a>
                                </li> -->
                                <li class="menu-item-has-children">
                                    <router-link to="/contact"> Contact Us</router-link> 
                                </li>
                            </ul>
                        </div>
                        <div class="call-support">
                            <p><a href="tel:917069969299">+91 7069969299</a></p>
                        </div>
                        <div class="offcanvas_footer">
                                                    
                            <span><a href="mailto:nutriquickfoods@gmail.com"><i class="fa fa-envelope-o"></i> nutriquickfoods@gmail.com</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--offcanvas menu area end-->
    
    <header>
        <div class="main_header header_two">
            <div class="header_top">
                <div class="container">
                    <div class="row align-items-center">
                       
                        <div class="col-lg-12">
                            <div class="header_social text-right">
                                <ul>
                                    <!-- <li><a href="#"><i class="ion-social-twitter"></i></a></li> -->
                                    <!-- <li><a href="#"><i class="ion-social-googleplus-outline"></i></a></li> -->
                                    <!-- <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li> -->
                                    <li><a href="https://www.facebook.com/pg/QuickNutri/posts/" target="_blank"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="https://www.instagram.com/nutriquickin/" target="_blank"><i class="ion-social-instagram-outline"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div style="position: absolute; top: 29px; transform: rotate(180deg);">
                <img src="/img/slider/bg-top2.png" class="wave-top">
            </div> -->
            <div class="header_middle header_middle2">
                <div class="container">
                    <div class="row align-items-center">
                       <div class="col-lg-4 col_search">
                            <autocomplete
                              :search="search"
                              placeholder="Search Products"
                              :get-result-value="getResultValue"
                              @submit="handleSubmit"
                              class="mobail_s_none"
                            ></autocomplete>
                           <!-- <div class="search_container mobail_s_none">
                                <form action="#">
                                    <div class="search_box">
                                        <input placeholder="Search here..." type="text" v-model="search">
                                         <button type="submit"><span class="lnr lnr-magnifier"></span></button>
                                    </div>
                                </form>
                             
                            </div> -->
                       </div>
                        <div class="col-lg-4 col-md-3 col-sm-3 col-3">
                            <div class="logo">
                                <router-link to="/"><img src="/img/logo/logo.png" alt=""></router-link>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-7 col-8">
                            <div class="header_account_area">
                                <div class="header_account_list register main_menu">
                                    <nav>

                                    <ul v-if="userDetails">
                                        <li>
                                            <router-link to="/" style="line-height: unset">{{userDetails.name}}<i class="fa fa-angle-down"></i></router-link>
                                            <ul class="sub_menu">
                                                <li style="display: block!important"><router-link :to="{name: 'orders', params: { id: userDetails.id}}" class="text-dark">Your Orders</router-link></li>
                                                <!-- <li style="display: block!important"><router-link :to="{name: 'wallet', params: { id: userDetails.id}}" class="text-dark">Wallet</router-link></li> -->
                                                <li style="display: block!important"><a  @click.prevent="logout" class="text-dark">Logout</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    </nav>
                                    <ul v-if="!userDetails">
                                        <li><router-link to="/Register">Register</router-link></li>
                                        <li><span>/</span></li>
                                        <li><router-link to="/Login">Login</router-link></li>
                                    </ul>
                                </div>
                                <div class="header_account_list header_wishlist">
                                    <router-link to="/login" v-if="!userDetails"><span class="lnr lnr-heart"></span> <span class="item_count">{{wishlists.length}}</span> </router-link>
                                    <router-link v-if="userDetails" :to="{name: 'wishlist', params: { id: userDetails.id}}"><span class="lnr lnr-heart"></span> <span class="item_count">{{wishlists.length}}</span> </router-link>
                                </div>
                                <div class="header_account_list  mini_cart_wrapper">
                                   <router-link to="/login" v-if="!userDetails"><span class="lnr lnr-cart"></span><span class="item_count">{{carts.length}}</span></router-link>
                                   <router-link v-if="userDetails" :to="{name: 'cart', params: { id: userDetails.id}}"><span class="lnr lnr-cart"></span><span class="item_count">{{carts.length}}</span></router-link>
                                    <!--mini cart-->
                                    <!-- <div class="mini_cart">
                                        <div class="cart_gallery">
                                            <div class="cart_close">
												<div class="cart_text">
													<h3>cart</h3>
												</div>
												<div class="mini_cart_close">
													<a href="javascript:void(0)"><i class="icon-x"></i></a>
												</div>
											</div>
                                            <div class="cart_item">
                                               <div class="cart_img">
                                                   <a href="#"><img src="/img/s-product/product.jpg" alt=""></a>
                                               </div>
                                                <div class="cart_info">
                                                    <a href="#">Primis In Faucibus</a>
                                                    <p>1 x <span> $65.00 </span></p>    
                                                </div>
                                                <div class="cart_remove">
                                                    <a href="#"><i class="icon-x"></i></a>
                                                </div>
                                            </div>
                                            <div class="cart_item">
                                               <div class="cart_img">
                                                   <a href="#"><img src="/img/s-product/product2.jpg" alt=""></a>
                                               </div>
                                                <div class="cart_info">
                                                    <a href="#">Letraset Sheets</a>
                                                    <p>1 x <span> $60.00 </span></p>    
                                                </div>
                                                <div class="cart_remove">
                                                    <a href="#"><i class="icon-x"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mini_cart_table">
                                            <div class="cart_table_border">
                                                <div class="cart_total">
                                                    <span>Sub total:</span>
                                                    <span class="price">$125.00</span>
                                                </div>
                                                <div class="cart_total mt-10">
                                                    <span>total:</span>
                                                    <span class="price">$125.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mini_cart_footer">
                                           <div class="cart_button">
                                                <a href="cart.html"><i class="fa fa-shopping-cart"></i> View cart</a>
                                            </div>
                                            <div class="cart_button">
                                                <a href="checkout.html"><i class="fa fa-sign-in"></i> Checkout</a>
                                            </div>

                                        </div>
                                    </div> -->
                                    <!--mini cart end-->
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header_bottom sticky-header">
                <div class="container">  
                    <div class="row align-items-center">
                        <div class="col-lg-8 offset-lg-2">
                            <!--main menu start-->
                            <div class="main_menu  menu_two color_two menu_position"> 
                                <nav>  
                                    <ul>
                                        <li><router-link class="active" to="/">home</router-link>
                                           
                                        </li>

                                        <li><router-link to="/contact"> Contact Us</router-link></li>
                                    </ul>  
                                </nav> 
                            </div>
                            <!--main menu end-->
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </header>
    <!--header area end-->
    <vue-page-transition name="fade-in-down">
        <router-view>
        
        </router-view>
    </vue-page-transition>

        <!--footer area start-->
    <footer class="footer_widgets color_two">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-7">
                        <div class="widgets_container contact_us">
                           <div class="footer_logo">
                               <router-link to="/"><img src="/img/logo/logo.png" alt=""></router-link>
                           </div>
                           <!-- <p class="footer_desc"><span class="text-uppercase bg-orange p-1 text-white">affinito organic products private limited</span><br>Namaste! We are Organic products supplier.</p> -->
                            <p><span>Address:</span> 1803/4, VU Nagar, Phase -IV, GIDC Estate, Anand, Gujarat 388121.</p>
                            <p><span>Email:</span> <a href="mailto:nutriquickfoods@gmail.com">nutriquickfoods@gmail.com</a></p>
                            <p><span>Call us:</span> <a href="tel:8877224416">+91 8877224416,+91 9537886644,+91 9624365544</a> </p>
                        </div>          
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-5">
                        <div class="widgets_container widget_menu">
                            <h3>Information</h3>
                            <div class="footer_menu">
                            
                                <ul>
                                    <!-- <li><a href="">About Us</a></li> -->
                                    <!-- <li><router-link :to="{name: 'orders', params: { id: userDetails.id}}">Deli very Information</router-link></li> -->
                                    <li><router-link to="/policy"> Privacy Policy</router-link></li>
                                    <li><router-link to="/refund"> Refund Policy</router-link></li>
                                    <li><router-link to="/terms"> Terms & Conditions</router-link></li>
                                    <li><router-link to="/contact"> Contact Us</router-link></li>
                                    <!-- <li><a href="#"> Site Map</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-2 col-md-3 col-sm-4">
                        <div class="widgets_container widget_menu">
                            <h3>Extras</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="">Brands</a></li>
                                    <li><a href="">  Gift Certificates</a></li>
                                    <li><a href="">Affiliate</a></li>
                                    <li><a href="">Specials</a></li>
                                    <li><a href="">Returns</a></li>
                                    <li><a href=""> Order History</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="widgets_container widget_newsletter">
                            <h3>Sign up newsletter</h3>
                            <p class="footer_desc">Get updates by subscribe our weekly newsletter</p>
                            <div class="subscribe_form">
                                <form id="mc-form" class="mc-form footer-newsletter" @submit.prevent="addNewsletter">
                                    <input id="mc-email" type="email" autocomplete="off" placeholder="Enter your email" v-model="email"/>
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
        </div>
       
        <div class="footer_bottom ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-7">
                        <div class="copyright_area">
                            <p>Copyright  © {{new Date().getFullYear()}}  <router-link to="/">Affinito</router-link>  . All Rights Reserved.Design by  <router-link to="/">Affinito</router-link></p>
                        </div>
                    </div>    
                    <div class="col-lg-6 col-md-5">    
                        <div class="footer_payment">
                            <ul>
                                <!-- <li><a href="#"><img src="/img/icon/paypal1.jpg" alt=""></a></li> -->
                                <li><a href=""><img src="/img/icon/paypal2.jpg" alt=""></a></li>
                                <!-- <li><a href="#"><img src="/img/icon/paypal3.jpg" alt=""></a></li> -->
                                <li><a href=""><img src="/img/icon/paypal4.jpg" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
         <!-- <footer class="footer-bottom fixed-bottom d-md-none d-lg-none" v-if="carts.length !== 0" id="showPlaceorder"> -->
         <!-- <footer class="footer-bottom fixed-bottom d-md-none d-lg-none" id="showPlaceorder" v-on:click="checkCart();">
           
              <a class="btn btn-success btn-sm shadow" style="width: 100%;height: 45px;font-size: 18px;padding-top: 8px;"><img src="/img/icon/order.png" height="20" width="20"> Place Your Order
            
              </a>
           
        </footer>  -->
    </footer>
    <!--footer area end-->
   <!--Payment create Modal -->
<div class="modal fade" id="orderConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header bg-orange border border-0">
        <h4 class="modal-title text-white" id="exampleModalLongTitle">Select Payment Mode</h4>
      </div>
      <div class="modal-body text-center">
        <button type="button" class="btn btn-primary bg-primary shadow" @click.prevent="createOrder('wallet')">Wallet</button>
        <button type="button" class="btn btn-success bg-success shadow" @click.prevent="createOrder('cash')">Cash</button>
      </div>

    </div>
  </div>
</div>
   
    </div>
</template>

<script>
import '@trevoreyre/autocomplete-vue/dist/style.css'
export default {
    
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            userDetails:{},
            carts:{},
            products:{},
            searchProducts:'',
            email:'',
            amount:{}
        }
    },
    props: {
        userDetails: {},
        carts:{},
        wishlists:{},
        products:{},
        searchProducts:'',
        amount:{}

    },
    watch: {
        
        // call again the method if the route changes
        '$route': 'fetchUser'
    },
    created() {
        this.fetchUser(),
        this.fetchProducts()
    },
    methods:{
       search(input) {
        if (input.length < 1) { return [] }
        return this.axios.get(`/api/searchProducts/${input}`).then(response => {
           var products = response.data;
        //    console.log(this.products);
        return products.filter(search => {
            
          return search.name.toLowerCase()
            .startsWith(input.toLowerCase())
        })
       })
    },

    // We want to display the name 
    getResultValue(result) {
      return result.name
    },
    handleSubmit(result) {
      this.$router.push({name: 'Product-Details', params: { name: result.name}})
    },
    checkCart(){
        this.axios
        .get(`/api/cart/${this.userDetails.id}`)
        .then((response) => {
            if(response.data.length != 0){
               $('#orderConfirmation').modal('show');
            } else {
                swal({
                    title: "Your Cart is Empty!",
                    text: "Please, Add product to the cart.",
                    icon: "warning",
                    timer: 3000,
                    buttons:false
                });
            }
            // console.log(response.data);
        });
    },
            fetchUser:function() {
                this.axios.get('/user').then(response => {
                  this.userDetails = response.data;
                    this.axios
                    .get(`/api/cart/${response.data.id}`)
                    .then((response) => {
                        this.carts = response.data;
                        this.axios
                            .get(`/api/wishlist/${this.userDetails.id}`)
                            .then((response) => {  
                                this.wishlists = response.data;
                                console.log();
                            });
                    });
                });
            },
            fetchProducts:function(){
            this.axios.get('api/products').then(response => {
                  this.products = response.data;
                //   window.location.reload();
                //   console.log(response.data)
                });
            },
            addNewsletter:function() {
                this.axios.post('api/addNewsletter',{email:this.email}).then(response => {
                    this.$fire({
                        title: "Successful",
                        text: "Thanks for contacting us!",
                        type: "success",
                        timer: 3000,
                        showCloseButton: true,
                        showCancelButton: false,
                        showConfirmButton: false
                    });
                    $('#mc-form').trigger('reset');
                })
                .catch(error => console.log(error))
                .finally(() => this.loading = false)
            },

            logout:function(){
               axios.post('/logout').then(response => {
                  if (response.status === 302 || 401) {
                    window.location.reload();
                  }
                  else {
                    // throw error and go to catch block
                  }
                }).catch(error => {

              });
            },

            canvasOpen(){
                $('.offcanvas_menu_wrapper,.off_canvars_overlay').addClass('active')
            },
            canvasClose(){
                $('.offcanvas_menu_wrapper,.off_canvars_overlay').removeClass('active')
            },
            createOrder(payment_mode) {
                var xhr = this.axios;
                var swal = this.$fire;
                var router = this.$router;
                var userId = this.userDetails.id;
                var modalHide = $('#orderConfirmation').hide();
                    this.axios
                        .get(`/api/cart/${this.userDetails.id}`)
                        .then((response) => {
                            this.carts = response.data;
                            var carts = this.carts;
                            this.amount = this.carts.reduce(function(amount, item){
                                return amount + (item.quantity * item.product.amount)
                            },0);
                                 xhr
                                    .post('/api/payment',{carts, amount:this.amount, user_id:userId,mode:payment_mode})
                                    .then((response) => {
                                        // console.log(response.data);
                                        if (response.data != 'error') {
                                            
                                            swal({
                                                title: "Payment Successfull",
                                                text: "Your Order_ID is "+response.data.order_id,
                                                type: "success",
                                                timer: 3000,
                                                showCloseButton: true,
                                                showCancelButton: false,
                                                showConfirmButton: false
                                            });
                                            router.go();
                                        } else {

                                            swal({
                                                title: "Low Wallet Balance",
                                                text: "Please, Add money to the wallet",
                                                type: "warning",
                                                timer: 3000,
                                                showCloseButton: true,
                                                showCancelButton: false,
                                                showConfirmButton: false
                                            });
                                            modalHide;
                                            router.push('/wallet/'+userId);
                                            }

                                    });
                        })

            }
            
        },
        mounted: function () {
          window.setInterval(() => {
            this.fetchUser()
          }, 3000)
        }
}
</script>
<style scoped>
[data-position=below] .autocomplete-result-list {
    z-index: 2!important;
}

</style>
