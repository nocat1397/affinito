<template>
    <div>
        <vue-element-loading :active="show" spinner="bar-fade-scale" color="#FF6700" background-color="rgba(255,255,255,1)"/>
            <!--product details start-->
    <div class="product_details mt-70 mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">


                    <div class="product-details-tab">
                        <!-- <div id="img-1" class="zoomWrapper single-zoom text-center">
                            <a v-for="image in product.images" :key="image.id" :id="'image'+index">
                                <img id="zoom1" :src="'/images/'+image.file" :data-zoom-image="'/images/'+image.file" alt="big-1">
                            </a>
                        </div> -->
                        <div class="single-zoom-thumb">
                            <carousel class="s-tab-zoom single-product-active" id="gallery_01" :responsive="{0:{items:1,nav:true,loop:false,dots:true,},600:{items:1,nav:true,loop:false,dots:true}}">
                                <img v-for="image in product.images" :key="image.id" :src="'/images/'+image.file" alt="zo-th-1"/>
                            </carousel>
                            <div class="" v-if="product.quantity < 6" style="background: red; color:#fff">
                                <p class="text-center">Out of Stock</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                       <form action="#">
                           
                            <h1 class="text-capitalize font-weight-bold"><a href="#">{{product.name.replace(/-/g," ")}}</a></h1>
                            
                            <!-- <div class=" product_ratting">
                                <ul>
                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                    <li class="review"><a href="#"> (customer review ) </a></li>
                                </ul>
                                
                            </div> -->
                            <div class="price_box">
                                <span class="current_price">₹ {{product.amount}}/-</span>
                                <span class="">(Inclusive Taxes)</span>
                                
                            </div>
                            <div class="product_desc">
                                <p>{{product.description}}</p>
                            </div>
                            <div class="product_variant quantity">
                                <label>quantity</label>
                                <div class="input-group">
                                    <input min="1" max="100" v-model="quantity" type="number">
                                    <div class="input-group-append">
                                        <label class="pt-2 pl-1 text-uppercase">{{product.quantity_unit}}</label>
                                    </div>
                                </div>
                                <button class="button" type="button" @click.prevent="login" v-if="!userDetails && product.quantity > 5">add to cart</button>  
                                <button class="button" type="button" v-if="!userDetails && product.quantity < 6">Out Of Stock</button>  
                                <button class="button" type="button" v-if="userDetails && product.quantity < 6">Out Of Stock</button>  
                                <button class="button" type="button" v-if="userDetails && product.quantity > 6" v-on:click="addToCart(product.id,quantity)">add to cart</button>  
                            </div>
                            <div v-if="product.features !== null && product.features.length > 0">
                                <h4 class="bg-orange pt-2 pb-2 pl-1 text-white shadow"> Description</h4>
                                <ul style="list-style: inside">
                                    <li v-for="feature in product.features" :key="feature">{{feature}}</li> 
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <!--product details end-->
    
    <!--product info start-->
    <div class="product_d_info mb-65 d-none">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">   
                        <div class="product_info_button">    
                            <ul class="nav" role="tablist">
                                <li class="p-desc">
                                    <a class="active text-white" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Description</a>
                                </li>
                               
                                <!-- <li>
                                   <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews (1)</a>
                                </li> -->
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel" >
                                <div class="product_info_content">
                                    <p class="p-desc">{{product.description}}</p>
                                </div>    
                            </div>
                            <div class="tab-pane fade" id="rew" role="tabpanel" >
                                <div class="reviews_wrapper">
                                    <h2>1 review for Donec eu furniture</h2>
                                    <div class="reviews_comment_box">
                                        <div class="comment_thmb">
                                            <img src="assets/img/blog/comment2.jpg" alt="">
                                        </div>
                                        <div class="comment_text">
                                            <div class="reviews_meta">
                                                <div class="star_rating">
                                                    <ul>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                    </ul>   
                                                </div>
                                                <p><strong>admin </strong>- September 12, 2018</p>
                                                <span>roadthemes</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="comment_title">
                                        <h2>Add a review </h2>
                                        <p>Your email address will not be published.  Required fields are marked </p>
                                    </div>
                                    <div class="product_ratting mb-10">
                                       <h3>Your rating</h3>
                                        <ul>
                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                               <li><a href="#"><i class="icon-star"></i></a></li>
                                               <li><a href="#"><i class="icon-star"></i></a></li>
                                               <li><a href="#"><i class="icon-star"></i></a></li>
                                               <li><a href="#"><i class="icon-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product_review_form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="review_comment">Your review </label>
                                                    <textarea name="comment" id="review_comment" ></textarea>
                                                </div> 
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="author">Name</label>
                                                    <input id="author"  type="text">

                                                </div> 
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="email">Email </label>
                                                    <input id="email"  type="text">
                                                </div>  
                                            </div>
                                            <button type="submit">Submit</button>
                                         </form>   
                                    </div> 
                                </div>     
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
        </div>    
    </div>  
    <!--product info end-->
    </div>
</template>
<style scoped>

</style>
<script>
import carousel from 'vue-owl-carousel';
import VueElementLoading from 'vue-element-loading';
import '@trevoreyre/autocomplete-vue/dist/style.css';
export default {
    components:{
        carousel,
        VueElementLoading
    },
    mounted() {
        window.scrollTo({
          top: 0,
          left: 0,
          behavior: 'smooth'
        });
        setTimeout(() => {
          this.show = false
        }, 500);
        $("#zoom_03").elevateZoom({
	gallery:'gallery_01',
	cursor: 'pointer',
  easing : true,
	galleryActiveClass: 'active',
	imageCrossfade: true,
	loadingIcon: 'https://www.elevateweb.co.uk/spinner.gif'
});

//pass the images to Fancybox
$("#zoom_03").bind("click", function(e) {
	var ez = $('#zoom_03').data('elevateZoom');
	$.fancybox(ez.getGalleryList());
	return false;
});
    },
    data() {
        return {
            product: {},
            userDetails:{},
            quantity:1,
            show:true
        }
    },
    watch: {
        // call again the method if the route changes
		'$route': 'fetchProduct'
    },
    created() {
        this.fetchProduct(),
        this.fetchUser()
    },
    methods: {
        search(input) {
            if (input.length < 1) { return [] }
             return this.axios.get(`/api/searchProducts/${input}`).then(response => {
                 var products = response.data;
                 console.log(this.products);
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
        fetchProduct() {
            this.axios
            .get(`/api/product-details/${this.$route.params.name}`)
            .then((response) => {
                this.product = response.data[0];
                console.log(response.data[0]);
            });
        },
        fetchUser:function() {
            this.axios.get('/user').then(response => {
              this.userDetails = response.data;
            //   window.location.reload();
            //   console.log(response.data)
            });
        },
        login:function() {
            this.$router.push("/login");
        },
        addToCart(product_id,qty){
            this.axios.post('/api/addCart', {product_id:product_id, user_id:this.userDetails.id,quantity:qty}).then(response => {
                this.$fire({
                  title: "Product Added Successfully",
                  type: "success",  
                  timer: 3000,
                  showCancelButton: false,
                  showConfirmButton: false
                });
            //   window.location.reload();
              console.log(response.data)
            });
        }
    }
}
</script>