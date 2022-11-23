<template>
    <div>
        <vue-element-loading :active="show" spinner="bar-fade-scale" color="#FF6700" background-color="rgba(255,255,255,1)"/>
         <!--shopping cart area start -->
    <div class="shopping_cart_area mt-70">
        <div class="container">  
            <form action="#"> 
                <div class="row">
                    <div class="col-12">
                        <div class="container p-0 d-md-none d-lg-none">
                            <table class="table table-striped" style="width: 100%">
                                <tr v-for="cart in carts" :key="cart.id">
                                    <td class="mobile-td-sm">
                                        <router-link :to="{name: 'Product-Details', params: { name: cart.product.name}}" v-for="image in images" :key="image.id" v-if="cart.product.id == image.id"><img :src="'/images/'+image.images[0].file" alt="" height="50px"></router-link>
                                    </td>
                                    <td>
                                        <h4 class="mb-0">{{cart.product.name.replace(/-/g," ")}} <span v-if="cart.product.quantity > 5" class="text-success p-txt3">In Stock</span><span v-if="cart.product.quantity < 6" class="text-success p-txt3">Out of Stock</span></h4>
                                        <p class="pt-0 mb-0 p-txt3 text-muted">{{cart.product.description}}</p>
                                        <p class="text-danger pt-0 pb-1 mb-0 p-txt3">₹ {{cart.product.amount * cart.quantity}}/-</p>
                                        <span v-if="cart.product.quantity > 5" class="old_price"><input value="-" class="minus"><input type="number" class="qty" min="1" max="100" v-model="cart.quantity"><input class="plus" value="+"></span>
                                        <p class=" mb-0 p-txt3"><a v-on:click="removeItem(cart.id)" class="btn btn-danger mr-2 rounded"><i class="fa fa-trash-o"></i></a><button class="btn btn-dark rounded" type="button" v-on:click="updateCart(cart.id,cart.quantity,cart.product.id)">Save</button></p>
                                        <!-- <p class="pb-0 mb-0">{{cart.product.description}}</p> -->

                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="table_desc d-none d-md-block d-lg-block">
                            <div class="cart_page">
                                <table>
                                    <thead>
                                        <tr>
                                            <!-- <th class="product_remove">Delete</th> -->
                                            <th class="product_name">Product</th>
                                            <th class="product_thumb">Name</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                            <th class="product_total">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-if="carts.length == 0">
                                           <td class="product_remove" colspan="6">Your cart is empty</td>
                                        </tr>
                                        <tr v-for="cart in carts" :key="cart.id">
                                            <!-- <td>{{carts.index}}</td> -->
                                            <td class="product_thumb"><router-link :to="{name: 'Product-Details', params: { name: cart.product.name}}" v-for="image in images" :key="image.id" v-if="cart.product.id == image.id"><img :src="'/images/'+image.images[0].file" alt=""></router-link></td>
                                            <td class="product_name"><a href="#">{{cart.product.name.replace(/-/g," ")}}</a></td>
                                            <td class="product-price">₹ {{cart.product.amount}}/{{cart.product.amount_unit}}</td>
                                            <td class="product_quantity"><label>Quantity</label><input type="hidden" v-model="cart.id"> <input min="1" max="100" v-model="cart.quantity" type="number"></td>
                                            <td class="product-price">₹ {{cart.product.amount * cart.quantity}}/-</td>
                                            <td class="product_total"><a v-on:click="removeItem(cart.id)" class="btn btn-danger mr-2 rounded-circle"><i class="fa fa-trash-o"></i></a><button class="btn btn-dark rounded-pill" type="button" v-on:click="updateCart(cart.id,cart.quantity,cart.product.id)">Save</button></td>


                                        </tr>
                                    </tbody>
                                </table>   
                            </div>  
                        </div>

                     </div>
                 </div>
                 <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code left d-none d-md-block d-lg-block">
                                <h3>Coupon</h3>
                                <div class="coupon_inner">   
                                    <p>Enter your coupon code if you have one.</p>                                
                                    <input placeholder="Coupon code" type="text">
                                    <button type="submit">Apply coupon</button>
                                </div>    
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Cart Totals</h3>
                                <div class="coupon_inner">
                                   <div class="cart_subtotal">
                                       <p>Subtotal</p>
                                       <p class="cart_amount">₹ {{total}}.00</p>
                                   </div>
                                   <!-- <div class="cart_subtotal ">
                                       <p>Shipping</p>
                                       <p class="cart_amount"><span>Flat Rate:</span> £255.00</p>
                                   </div> -->
                                   <a></a>

                                   <div class="cart_subtotal">
                                       <p>Total</p>
                                       <p class="cart_amount">₹ {{total}}.00</p>
                                   </div>
                                   <div class="checkout_btn">
                                       <button type="button" v-on:click="buyNow()" v-if="carts.length !== 0">Place Order</button>
                                       <router-link to="/" v-if="carts.length == 0" class="disabled">Place Order</router-link>
                                   </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
            </form> 
        </div>     
    </div>
     <!--shopping cart area end -->
    </div>
</template>
<style scoped>
@media only screen and (max-width: 599px){
    .mobile-td-sm {
        width: 34%;
    }
    .p-txt3 {
        font-weight: 500;
        font-size: 14px;
    }
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
    /* height: 20px; */
    background: #f2f2f2;
    border-radius: 0px;
    /* padding: 8px 5px 8px 5px; */
    border: 1px solid #ddd;
    display: inline-block;
    vertical-align: middle;
    text-align: center;
    cursor: pointer;
}
.qty{
	height: 26px;
    width: 42px;
    text-align: center;
    font-size: 13px;
    border: 1px solid #ddd;
    border-radius: 0px;
    display: inline-block;
    vertical-align: middle;
    padding: 0!important;
}
    }
</style>
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
            carts: {},
            userDetails:{},
            images:{},
            show:true,
            amount:{}
       
        }
    },
    watch: {
        // call again the method if the route changes
		'$route': 'fetchCart'
    },
    created() {
        this.fetchCart(),
        this.fetchUser(),
        this.fetchImages()
    },
    computed: {
        total: function(){
        //   console.log(this.carts);
          return this.carts.reduce(function(total, item){
          
            return total + (item.quantity * item.product.amount); 
          },0)
        },
        
    },
    methods: {

        fetchCart() {
            this.axios
            .get(`/api/cart/${this.$route.params.id}`)
            .then((response) => {
                if (this.userDetails) {   
                    this.carts = response.data;
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
        updateCart(id,qty,p_id) {

            this.axios.post('/api/updateCart', {cart_id:id, quantity:qty, user_id:this.userDetails.id, product_id:p_id}).then(response => {
                this.$fire({
                  title: "Cart Updated Successfully",
                  type: "success",  
                  timer: 3000,
                  showCancelButton: false,
                  showConfirmButton: false
                });
            //   window.location.reload();
              console.log(response.data)
            });
        },
        removeItem(cart_id) {
            this.axios.post('/api/removeCartProduct', {cart_id:cart_id}).then(response => {
              window.location.reload();
              console.log(response.data)
            });
        },
        buyNow(){
            var user = this.userDetails;
            var userId = this.$route.params.id;
            var xhr = this.axios;
            var swal = this.$fire;
            var router = this.$router;
            var carts = this.carts;
            this.amount = this.carts.reduce(function(amount, item){
                return amount + (item.quantity * item.product.amount)
            },0);
            // console.log(this.amount);
            // return false;
            this.axios
                .post('/api/makeOrder', {user_id:userId, amount:this.amount})
                .then((response) => {
                    // console.log(response.data);
                    // return false;
                     var options = {
                        "key": "rzp_live_NWxi0Wz3mCa9n0", // Enter the Key ID generated from the Dashboard
                        "amount": response.data.amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        "currency": "INR",
                        "name": "Affinito",
                        "order_id": response.data.rzp_order_id,
                        "handler": function(payResponse){
                            // this.paymentDetails = response;
                            xhr
                            .post('/api/makePayment',{carts, payResponse, amount:response.data.amount, id:response.data.id, user_id:userId})
                            .then((response) => {
                                // console.log(response);
                                swal({
                                  title: "Payment Successfull",
                                  text: "Your Order_ID is "+response.data.rzp_order_id,
                                  type: "success",  
                                  timer: 3000,
                                  showCancelButton: false,
                                  showConfirmButton: false
                                });
                                router.go();
                            });
                        //    return response;
                        },
                        "prefill": {
	                    	"name": user.name, // pass customer name
	                    	"email": user.email,// customer email
	                    	"contact": user.mobile //customer phone no.
	                    },
                        "theme": {
                            "color": "#f7971e"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                        rzp1.open();
                
                });
        },
        createOrder(payment_mode) {
            var xhr = this.axios;
            var swal = this.$fire;
            var router = this.$router;
            var userId = this.$route.params.id;
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
                                    console.log(response);
                                    swal({
                                      title: "Payment Successfull",
                                      text: "Your Order_ID is "+response.data.order_id,
                                      type: "success",
                                      showCloseButton: true,
                                      showCancelButton: false,
                                      showConfirmButton: false
                                    });
                                    // router.push('/');
                                });
                    })

        }
        
    }
}
</script>