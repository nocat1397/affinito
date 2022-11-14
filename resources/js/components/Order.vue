<template>
    <div>
         <vue-element-loading :active="show" spinner="bar-fade-scale" color="#c02626" background-color="rgba(255,255,255,1)"/>
         <!--shopping cart area start -->
    <div class="shopping_cart_areas">
        <div class="container">  

                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <!-- <th class="product_remove">Delete</th> -->
                                    <th class="product_name">Product</th>
                                    <th class="product_thumb">Name</th>
                                    <th class="product_total">Status</th>
                                    <th class="product_total">Order Id</th>
                                    <th class="product_quantity">Quantity</th>
                                    <th class="product-price">Amount</th>
                                    <th class="product_total">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="purchaser in purchasers" :key="purchaser.id">
                                   <!-- <td class="product_remove"><a v-on:click="removeItem(purchaser.id)"><i class="fa fa-trash-o"></i></a></td> -->
                                    <td class="product_thumb"><router-link :to="{name: 'Product-Details', params: { name: purchaser.product.name}}" v-for="image in images" :key="image.id" v-if="purchaser.product.id == image.id"><img :src="'/images/'+image.images[0].file" alt=""></router-link></td>
                                    <td class="product_name"><a href="#">{{purchaser.product.name.replace(/-/g," ")}}</a></td>
                                    <td class="product_quantity" v-if="purchaser.order.orderstatus_id == 1">Not Confirmed</td>
                                    <td class="product_quantity" v-if="purchaser.order.orderstatus_id == 2">Order Confirmed</td>
                                    <td class="product_quantity" v-if="purchaser.order.orderstatus_id == 3">On The Way</td>
                                    <td class="product_quantity" v-if="purchaser.order.orderstatus_id == 4">Delivered</td>
                                    <td class="product_quantity" v-if="purchaser.order.orderstatus_id == 5">Cancel confirmation pending</td>
                                    <td class="product_quantity" v-if="purchaser.order.orderstatus_id == 6">Return/Refund Confirmed</td>
                                    <td class="product_quantity" v-if="purchaser.order.orderstatus_id == 7">Return/Refund in Progress</td>
                                    <td class="product_quantity" v-if="purchaser.order.orderstatus_id == 8">Return/Refund Delivered</td>
                                    <td class="product_quantity" v-if="purchaser.order.orderstatus_id == 9">Order Cancelled</td>
                                    <td class="product_name"><a>order_{{purchaser.order.id}}</a></td>
                                    <td class="product_quantity">{{purchaser.quantity}}</td>
                                    <td class="product-price">₹ {{purchaser.product.amount*purchaser.quantity}}/-</td>
                                    <td class="product_total"><button class="btn btn-danger btn-sm rounded-pill" type="button" v-if="purchaser.order.orderstatus_id > 4" disabled>Cancel</button>
                                    <button class="btn btn-danger btn-sm rounded-pill" type="button" v-on:click="orderCancel(purchaser.order.id)" v-if="purchaser.order.orderstatus_id <= 4">Cancel</button></td>
                                </tr>
                            </tbody>
                        </table> 
                        <div class="table_desc">
                            <div class="cart_page">
                                  
                            </div>  
                        </div>

                     </div>
                 </div>

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
            purchasers: {},
            userDetails:{},
            images:{},
            quantity:1,
            show:true
        }
    },
    watch: {
        // call again the method if the route changes
		'$route': 'fetchPurchaser'
    },
    created() {
        this.fetchPurchaser(),
        this.fetchUser(),
        this.fetchImages()
    },
    methods: {

        fetchPurchaser() {
            this.axios
            .get(`/api/orders/${this.$route.params.id}`)
            .then((response) => {
                if (this.userDetails) {   
                    this.purchasers = response.data;
                } else {
                    this.$router.push({name: 'home'})
                }
                // console.log(response.data);
            });
        },
        fetchImages() {
            this.axios
            .get(`/api/images`)
            .then((response) => {
                this.images = response.data;
                // console.log(response.data);
            });
        },
        fetchUser:function() {
            this.axios.get('/user').then(response => {
              this.userDetails = response.data;
              console.log(response.data);
            });
        },
        orderCancel(order_id) {
            var status_id = 5;
            this.axios.post('/api/orderCancel', {o_id:order_id, s_id:status_id}).then(response => {
                window.location.reload();
            });
        }
        
    }
}
</script>