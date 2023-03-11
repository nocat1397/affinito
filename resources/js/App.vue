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
                                <li><router-link v-on:click.native="canvasClose" to="/Register">Register</router-link></li>
                                <li><span>/</span></li>
                                <li><router-link v-on:click.native="canvasClose" to="/Login">Login</router-link></li>
                            </ul>
                        </div>


                        <div id="menu" class="text-left">
                            <ul class="offcanvas_main_menu">

                                <li class="active" v-if="userDetails">
                                    <router-link v-on:click.native="canvasClose" to="/" style="line-height: unset; color: #c02626; font-weight: bold; font-size: 15px">{{userDetails.name}}</router-link>
                                </li>   
                                <li class="active">
                                    <router-link v-on:click.native="canvasClose" to="/">Home</router-link>
                                </li>
                                <li class="menu-item-has-children" v-if="categories.length > 0"><span class="menu-expand"><i class="fa fa-angle-down"></i></span>
                                    <a href="#">Shop Now</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children" v-for="category in categories" :key="category.index"><span class="menu-expand"><i class="fa fa-angle-down"></i></span>
                                            <a href="#">{{category.name}}</a>
                                            <ul class="sub-menu" v-if="category.products.length > 0">
                                                <li v-for="product in category.products" :key="product.index">
                                                    <router-link v-on:click.native="canvasClose" :to="{name: 'Product-Details', params: { name: product.name}}">{{product.name}}</router-link>
                                                </li>
                                            </ul>
                                        </li>
                                        
                                    </ul>
                                </li>
                                <li class="" v-if="userDetails">        
                                    <router-link v-on:click.native="canvasClose" :to="{name: 'orders', params: { id: userDetails.id}}">Your Orders</router-link>
                                </li>
                                <li class="" v-if="userDetails">
                                    <a v-on:click="canvasClose" @click.prevent="logout">Logout</a>
                                </li>

                                <!-- <li class="menu-item-has-children">
                                    <a href="about.html">about Us</a>
                                </li> -->
                                <li class="">
                                    <router-link v-on:click.native="canvasClose" to="/contact"> Contact Us</router-link> 
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
            
            <!-- <div style="position: absolute; top: 29px; transform: rotate(180deg);">
                <img src="/img/slider/bg-top2.png" class="wave-top">
            </div> -->
            <div  class="header_top">
                <div  class="container">
                    <div  class="row align-items-center">
                        <div class="text-center text-light col-lg-12">
                            <h5 class="top-head">FREE SHIPPING ON ORDERS 500/- +</h5>
                            <!-- <div  class="header_social text-right">
                                <ul >
                                    <li >
                                        <a  href="https://www.facebook.com/pg/QuickNutri/posts/" target="_blank"><i  class="ion-social-facebook"></i></a>
                                    </li> 
                                    <li >
                                        <a  href="https://www.instagram.com/nutriquickin/" target="_blank"><i  class="ion-social-instagram-outline"></i></a></li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            <div class="header_middle header_middle2 sticky-header">
                <div class="container">
                    <div class="row align-items-center">
                       <!-- <div class="col-lg-4 col_search">
                            <autocomplete
                              :search="search"
                              placeholder="Search Products"
                              :get-result-value="getResultValue"
                              @submit="handleSubmit"
                              class="mobail_s_none"
                            ></autocomplete>
                          
                       </div> -->
                        <div class="col-lg-2 col-md-3 col-sm-2 col-3">
                            <div class="logo">
                                <router-link to="/"><img src="/img/logo/logo.png" alt=""></router-link>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-3 col-sm-3 col-1">

                            <div class="main_menu  menu_two color_two menu_position"> 
                                <nav>  
                                    <ul>
                                        <li><router-link class="active" to="/">home</router-link>
                                           
                                        </li>
                                        <li class="mega_items" v-if="categories.length > 0">
                                            <a href="javascript:void(0)" type="button">Shop now<i class="fa fa-angle-down"></i></a>
                                            <div class="mega_menu" v-if="categories.length > 0">
                                                <div class="mb-3">
                                                    <autocomplete
                                                    :search="search"
                                                    placeholder="Search Products"
                                                    :get-result-value="getResultValue"
                                                    @submit="handleSubmit"
                                                    class="mobail_s_none"
                                                    ></autocomplete>
                                                </div>
                                                <ul class="mega_menu_inner row">
                                                    <li class="menu-item-has-children col-md-4" v-for="category in categories" :key="category.index">
                                                        <a href="javascript:void(0)" type="button" class="text-capitalize font-weight-bold">{{category.name}}</a>
                                                        <ul v-if="category.products.length > 0">
                                                            <li v-for="product in category.products" :key="product.index">
                                                                <router-link :to="{name: 'Product-Details', params: { name: product.name}}">{{product.name}}</router-link>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li><router-link to="/contact"> Contact Us</router-link></li>
                                    </ul>  
                                </nav> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-7 col-8">
                            <div class="header_account_area">
                                <div class="header_account_list register main_menu col_search">
                                        <nav>
                                            <span style="font-size: 25px;" class="lnr lnr-magnifier"></span>
                                        </nav>

                                    </div>
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
                                        <!-- <li><router-link to="/Register">Register</router-link></li> -->
                                        <li><span style="font-size: 23px;" class="lnr lnr-user"></span></li>
                                        <!-- <li><router-link to="/Login">Login</router-link></li> -->
                                    </ul>
                                </div>
                                <div class="header_account_list header_wishlist">
                                    <router-link to="/login" v-if="!userDetails"><span class="lnr lnr-heart"></span> <span class="item_count">{{wishlists.length}}</span> </router-link>
                                    <router-link v-if="userDetails" :to="{name: 'wishlist', params: { id: userDetails.id}}"><span class="lnr lnr-heart"></span> <span class="item_count">{{wishlists.length}}</span> </router-link>
                                </div>
                                <div class="header_account_list  mini_cart_wrapper">
                                   <router-link to="/login" v-if="!userDetails"><span class="lnr lnr-cart"></span><span class="item_count">{{carts.length}}</span></router-link>
                                   <router-link v-if="userDetails" :to="{name: 'cart', params: { id: userDetails.id}}"><span class="lnr lnr-cart"></span><span class="item_count">{{carts.length}}</span></router-link>
                                    
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="header_bottom">
                <div class="container">  
                    <div class="row align-items-center">
                        <div class="col-lg-8 offset-lg-2">
                            
                            <div class="main_menu  menu_two color_two menu_position"> 
                                <nav>  
                                    <ul>
                                        <li><router-link class="active" to="/">home</router-link>
                                           
                                        </li>
                                        <li class="mega_items" v-if="categories.length > 0">
                                            <a href="javascript:void(0)" type="button">Shop now<i class="fa fa-angle-down"></i></a>
                                            <div class="mega_menu" v-if="categories.length > 0">
                                                <ul class="mega_menu_inner row">
                                                    <li class="menu-item-has-children col-md-3" v-for="category in categories" :key="category.index">
                                                        <a href="javascript:void(0)" type="button" class="text-capitalize font-weight-bold">{{category.name}}</a>
                                                        <ul v-if="category.products.length > 0">
                                                            <li v-for="product in category.products" :key="product.index">
                                                                <router-link :to="{name: 'Product-Details', params: { name: product.name}}">{{product.name}}</router-link>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li><router-link to="/contact"> Contact Us</router-link></li>
                                    </ul>  
                                </nav> 
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div> -->
        </div> 
    </header>
    <!--header area end-->
    <vue-page-transition name="fade-in-down">
        <router-view :key="$route.fullPath">
        
        </router-view>
    </vue-page-transition>

        <!--footer area start-->
    <footer class="footer_widgets color_two mt-5">
        <div class="footer_top text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-12 col-sm-7">
                        <div class="widgets_container widget_menu">
                            <h3>Shop</h3>
                            <div class="footer_menu">
                            
                                <ul>
                                    <li><router-link to="/policy"> Fruit Bites</router-link></li>
                                    <li><router-link to="/policy"> Fruit Powder</router-link></li>
                                    <li><router-link to="/policy"> Chocolates</router-link></li>
                                    <!-- <li><router-link to="/policy"> Veggies</router-link></li>
                                    <li><router-link to="/policy"> Cheeses</router-link></li>
                                    <li><router-link to="/policy"> Bulk</router-link></li> -->
                                 
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="widgets_container contact_us">
                           <div class="footer_logo">
                               <router-link to="/"><img src="/img/logo/logo.png" alt=""></router-link>
                           </div>
                            <p><span>Address:</span> 1803/4, VU Nagar, Phase -IV, GIDC Estate, Anand, Gujarat 388121.</p>
                            <p><span>Email:</span> <a href="mailto:nutriquickfoods@gmail.com">nutriquickfoods@gmail.com</a></p>
                            <p><span>Call us:</span> <a href="tel:8877224416">+91 8877224416,+91 9537886644,+91 9624365544</a> </p>
                        </div>           -->
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-5">
                        <div class="widgets_container widget_menu">
                            <h3>About</h3>
                            <div class="footer_menu">
                            
                                <ul>
                                    <li><router-link to="/policy"> Why Freeze-Dried</router-link></li>
                                    <li><router-link to="/policy"> Our Story</router-link></li>
                                    <li><router-link to="/policy"> Recipes</router-link></li>
                                    <li><router-link to="/policy"> Blog</router-link></li>
                                    <li><router-link to="/policy"> Newsletter</router-link></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-5">
                        <div class="widgets_container widget_menu">
                            <h3>Info</h3>
                            <div class="footer_menu">
                            
                                <ul>
                                    <li><router-link to="/policy"> FAQs</router-link></li>
                                    <li><router-link to="/policy"> Contact Us</router-link></li>
                                    <li><router-link to="/policy"> Refund Policy</router-link></li>
                                    <li><router-link to="/policy"> Shipping & Returns</router-link></li>
                                    <li><router-link to="/policy"> Become a Dealer</router-link></li>
                                    <li><router-link to="/policy"> Terms of Service</router-link></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-3 col-sm-5">
                        <div class="widgets_container widget_menu">
                           
                            <div class="footer_menu copyright">
                            
                                <ul>
                                    <!-- <li>© {{new Date().getFullYear()}}  <router-link to="/">Affinito</router-link>  . All Rights Reserved</li> -->
                                    <li>©{{new Date().getFullYear()}} Affinito. All rights reserved</li>
                                    <!-- <li><a href="#"><i class="ion-social-facebook"></i></a> <a href="#"><i class="ion-social-instagram-outline"></i></a></li> -->
                                
                                </ul>
                                <div class="header_social">
                            <ul>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-googleplus-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                            </ul>
                        </div>
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
                   
                </div>
            </div>
        </div>
       
        <!-- <div class="footer_bottom ">
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
                                <li><a href=""><img src="/img/icon/paypal2.jpg" alt=""></a></li>
                                <li><a href=""><img src="/img/icon/paypal4.jpg" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>   -->
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
            amount:{},
            categories:{}
        }
    },
    props: {
        userDetails: {},
        carts:{},
        wishlists:{},
        products:{},
        searchProducts:'',
        amount:{},
        categories:{}

    },
    watch: {
        
        // call again the method if the route changes
        '$route': 'fetchUser'
    },
    created() {
        this.fetchUser(),
        this.fetchProducts(),
        this.fetchCategory()
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
            fetchCategory:function(){
            this.axios.get('/api/category').then(response => {
                  this.categories = response.data;
                //   window.location.reload();
                  console.log(response.data)
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
                /*---Off Canvas Menu---*/
            var $offcanvasNav = $('.offcanvas_main_menu'),
                $offcanvasNavSubMenu = $offcanvasNav.find('.sub-menu');
            $offcanvasNavSubMenu.parent().prepend('<span class="menu-expand"><i class="fa fa-angle-down"></i></span>');

            $offcanvasNavSubMenu.slideUp();

            $offcanvasNav.on('click', 'li a, li .menu-expand', function(e) {
                var $this = $(this);
                if ( ($this.parent().attr('class').match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/)) && ($this.attr('href') === '#' || $this.hasClass('menu-expand')) ) {
                    e.preventDefault();
                    if ($this.siblings('ul:visible').length){
                        $this.siblings('ul').slideUp('slow');
                    }else {
                        $this.closest('li').siblings('li').find('ul:visible').slideUp('slow');
                        $this.siblings('ul').slideDown('slow');
                    }
                }
                if( $this.is('a') || $this.is('span') || $this.attr('clas').match(/\b(menu-expand)\b/) ){
                	$this.parent().toggleClass('menu-open');
                }else if( $this.is('li') && $this.attr('class').match(/\b('menu-item-has-children')\b/) ){
                	$this.toggleClass('menu-open');
                }
            });
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
          }, 3000);
        }
}
</script>
<style scoped>
[data-position=below] .autocomplete-result-list {
    z-index: 2!important;
}

</style>
