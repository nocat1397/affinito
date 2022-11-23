<template>
    <div class="mt-5 mb-5 pt-5 pb-auto">
        {{paymentDetails}}
    </div>
</template>
<script>
export default {
    data() {
        return {
            carts:{},
            userDetails:{},
            total:{},
            paymentDetails:null
        }
    },
    watch: {
        // call again the method if the route changes
		'$route': 'fetchCart'
    },
    created(){
        this.fetchCart(),
        this.fetchUser()
    },
    methods: {
        fetchUser:function() {
            var xhr = this.axios;
            this.axios.get('/user').then(response => {
                this.userDetails = response.data;
                this.axios
                    .get(`/api/cart/${this.userDetails.id}`)
                    .then((response) => {
                        // console.log(this.userDetails.id);
                        this.carts = response.data;
                            var carts = this.carts;
                        this.total = this.carts.reduce(function(total, item){
                           
                        var options = {
                            "key": "rzp_live_NWxi0Wz3mCa9n0", // Enter the Key ID generated from the Dashboard
                            "amount": (total + (item.quantity * item.product.amount))*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                            "currency": "INR",
                            "name": "Affinito",
                            "handler": function(payResponse){
                                // this.paymentDetails = response;
                                xhr
                                .post('/api/payment',{payResponse, carts, amount:total + (item.quantity * item.product.amount)})
                                .then((response) => {
                                    console.log(response)
                                });
                            //    return response;
                            },
                            "modal": {
                                "ondismiss": function() {
                                    alert(`Payment Failed`)
                                }
                            },
                            "notes": {
                                "address": "Razorpay Corporate Office"
                            },
                            "theme": {
                                "color": "#3399cc"
                            }
                        };
                        var rzp1 = new Razorpay(options);
                            rzp1.open();

                            return total + (item.quantity * item.product.amount);
                        },0)
                    });
                    
            });
        },
        
        fetchCart() {
            this.axios
            .get(`/api/cart/${this.userDetails.id}`)
            .then((response) => {
                console.log(this.userDetails.id);
                this.carts = response.data;
            });
        }
        
    }
}
</script>