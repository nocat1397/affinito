<template>
    <div>
        <vue-element-loading :active="show" spinner="bar-fade-scale" color="#FF6700" background-color="rgba(255,255,255,1)"/>
         <!--shopping cart area start -->
    <div class="shopping_cart_area mt-70">
        <div class="container">  
            <form action="#"> 
                <div class="row">
                    <div class="col-12">

                        <div class="table_desc">
                            <div class="cart_page">
                                <table>
                                    <thead>
                                        <tr>
                                            <!-- <th class="product_remove">Delete</th> -->
                                            <th class="product_name">Product</th>
                                            <th class="product_thumb">Name</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_total">Status</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-if="wishlists.length == 0">
                                           <td class="product_remove" colspan="6">No wishlists</td>
                                        </tr>
                                        <tr v-for="wishlist in wishlists" :key="wishlist.id">
                                           <!-- <td class="product_remove"><a v-on:click="removeItem(wishlist.id)"><i class="fa fa-trash-o"></i></a></td> -->
                                            <td class="product_thumb"><router-link :to="{name: 'Product-Details', params: { name: wishlist.product.name}}" v-for="image in images" :key="image.id" v-if="wishlist.product.id == image.id"><img :src="'/images/'+image.images[0].file" alt=""></router-link></td>
                                            <td class="product_name"><a href="#">{{wishlist.product.name}}</a></td>
                                            <td class="product-price">₹ {{wishlist.product.amount}}/{{wishlist.product.amount_unit}}</td>
                                            <td class="product_quantity" v-if="wishlist.product.quantity !== NULL">In Stock</td>
                                            <td class="product_quantity" v-if="wishlist.product.quantity == NULL">Out Of Stock</td>
                                            <td class="product_quantity"><label>Quantity</label><input min="1" max="100" v-model="quantity" type="number"></td>
                                            <td class="product_total"><a v-on:click="removeItem(wishlist.id)" class="btn btn-danger rounded-circle mr-2"><i class="fa fa-trash-o"></i></a><button class="btn btn-dark rounded-pill" type="button" v-on:click="addToCart(quantity,wishlist.product.id)">Add</button></td>


                                        </tr>
                                    </tbody>
                                </table>   
                            </div>  
                            <!-- <div class="cart_submit">
                                <button type="submit">update cart</button>
                            </div>       -->
                        </div>

                     </div>
                 </div>
                 
            </form> 
        </div>     
    </div>
     <!--shopping cart area end -->
    </div>
</template>
<script>
import VueElementLoading from 'vue-element-loading'
export default {
    components:{
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
        }, 2000);
    },
    data() {
        return {
            wishlists: {},
            userDetails:{},
            images:{},
            quantity:1,
            show:true
        }
    },
    watch: {
        // call again the method if the route changes
		'$route': 'fetchWishlist'
    },
    created() {
        this.fetchWishlist(),
        this.fetchUser(),
        this.fetchImages()
    },
    methods: {

        fetchWishlist() {
            this.axios
            .get(`/api/wishlist/${this.$route.params.id}`)
            .then((response) => {
                if (this.userDetails) {   
                    this.wishlists = response.data;
                }
                console.log(response.data);
            });
        },
        fetchImages() {
            this.axios
            .get(`/api/images`)
            .then((response) => {
                this.images = response.data;
                console.log(response.data);
            });
        },
        fetchUser:function() {
            this.axios.get('/user').then(response => {
              this.userDetails = response.data;
            });
        },
        addToCart(qty,p_id) {

            this.axios.post('/api/addCart', {quantity:qty, user_id:this.userDetails.id, product_id:p_id}).then(response => {
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
        },
        removeItem(wishlist_id) {
            this.axios.post('/api/removeWishlist', {wishlist_id:wishlist_id}).then(response => {
              window.location.reload();
              console.log(response.data)
            });
        }
        
    }
}
</script>