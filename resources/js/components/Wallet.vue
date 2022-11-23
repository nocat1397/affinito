<template>
    <div>
       <section style="background-color: #FCDFBB; height: 200px">
        
       </section>
       <div class="container">
           <div class="card shadow top-card">
               <div class="card-body">
                   <div class="row">
                       <div class="col-md-1 col-3 col-sm-3 pr-0 text-center">
                          <img src="/img/icon/wallet.png">
                       </div>
                       <div class="col-md-9 col-4 col-sm-4 pl-0 text-left">
                          <div class="form-group">
                              <h3 class="mb-0 mt-2">Wallet</h3>
                            <!-- <h4>₹ {{user.wallet.amount}}/-</h4> -->
                          </div>
                       </div>
                       <div class="col-md-2 col-5 col-sm-5 text-right border-left">
                           <div class="form-group">
                               <h5>
                                   Total Balance:
                               </h5>
                               <h4>
                                   ₹ {{user.wallet.amount}}/-
                               </h4>
                           </div>
                       </div>
                   </div>
                   <hr>
                   <div class="form-row">
                       <div class="col-md-12">
                           <h5 class="font-weight-bold">Add Money To Wallet</h5>
                                <form @submit.prevent="addMoney()">
                                    <div class="form-inline">
                                        <input type="number" class="form-control mr-3 money mobile-input" placeholder="₹ Enter Amount" v-model="wallet.amount"> 
                                        <button type="submit" class="btn btn-orange shadow mobile-btn">Add Money</button>
                                    </div>
                                </form>
                       </div>
                   </div>
                   <div class="container-fluid mt-5 p-0">
                       <table class="table table-striped" style="width: 100%">
                           <thead>
                               <tr>
                                   <th>Transictions</th>
                                   <th>Amount</th>
                                   <th class="mobile-td">Status</th>
                               </tr>
                           </thead>
                           <tr v-for="transaction in transactions" :key="transaction.id">
                               <td>
                                   <h4 v-if="transaction.payment_mode == null && transaction.rzp_order_id != null" class="mb-0 pb-0 text-danger failed-wallet"><img class="text-center pb-2" src="/img/icon/addWallet.png" height="40px" width="40px"><br>Failed to Add Money<br><p class="text-muted p-txt">{{moment(transaction.updated_at).format("DD MMM, h:mm A")}}</p></h4>
                                   <h4 v-if="transaction.payment_mode == 'netbanking'" class="mb-0 pb-0 wallet"><img class="text-center pb-2" src="/img/icon/addWallet.png" height="40px" width="40px"><br>Added to Wallet<br><p class="text-muted p-txt">{{moment(transaction.updated_at).format("DD MMM, h:mm A")}}</p></h4>
                                   <h4 v-if="transaction.payment_mode == 'upi'" class="mb-0 pb-0 wallet"><img class="text-center pb-2" src="/img/icon/addWallet.png" height="40px" width="40px"><br>Added to Wallet<br><p class="text-muted p-txt">{{moment(transaction.updated_at).format("DD MMM, h:mm A")}}</p></h4>
                                   <h4 v-if="transaction.payment_mode == 'card'" class="mb-0 pb-0 wallet"><img class="text-center pb-2" src="/img/icon/addWallet.png" height="40px" width="40px"><br>Added to Wallet<br><p class="text-muted p-txt">{{moment(transaction.updated_at).format("DD MMM, h:mm A")}}</p></h4>
                                   <h4 v-if="transaction.payment_mode == 'cash'" class="order mb-0 pb-0"><img class="text-center pb-2" src="/img/icon/minWallet.png" height="40px" width="40px"><br>Paid for Order<br><p class="text-muted p-txt">{{moment(transaction.updated_at).format("DD MMM, h:mm A")}}</p></h4>
                                   <h4 v-if="transaction.payment_mode == 'wallet'" class="order mb-0 pb-0"><img class="text-center pb-2" src="/img/icon/minWallet.png" height="40px" width="40px"><br>Paid for Order<br><p class="text-muted p-txt">{{moment(transaction.updated_at).format("DD MMM, h:mm A")}}</p></h4>
                                   <p class="text-muted p-txt2" v-if="transaction.rzp_order_id != null">Order ID: {{transaction.rzp_order_id}}<br>Transaction ID: trans_{{transaction.id}}<br>Payment Mode: {{transaction.payment_mode}}</p>
                                   <p class="text-muted p-txt2" v-if="transaction.rzp_order_id == null">Order ID: order_{{transaction.order_id}}<br>Transaction ID: trans_{{transaction.id}}<br>Payment Mode: {{transaction.payment_mode}}</p>
                                   <p class="text-muted p-txt2 desk-status" v-if="transaction.payment_mode == null && transaction.rzp_order_id != null">Status: <span class="text-danger">FAILED</span></p>
                                   <p class="text-muted p-txt2 desk-status" v-if="transaction.payment_mode != null && transaction.rzp_order_id != null || transaction.order_id != null">Status: <span class="text-orange">SUCCESS</span></p>
                                   
                                </td>
                               <td class="pr-0 pl-0"><p class="text-muted p-txt3 p-0"><span v-if="transaction.order_id == null">+</span><span v-if="transaction.order_id != null">-</span> ₹{{transaction.amount}}/-</p></td>
                               <td class="mobile-td">
                                   <p class="p-txt3 text-danger" v-if="transaction.payment_mode == null && transaction.rzp_order_id != null">FAILED</p>
                                   <p class="text-muted p-txt3" v-if="transaction.payment_mode != null && transaction.rzp_order_id != null || transaction.order_id != null">SUCCESS</p>
                               </td>
                           </tr>
                       </table>
                   </div>
               </div>
           </div>
       </div>
    </div>
</template>
<style scoped>
.p-txt {
    font-weight: 400;
    font-size: 14px;
}
.desk-status {
    display: none;
}
.p-txt3 {
    font-weight: 500;
    font-size: 14px;
}

.p-txt2 {
    font-weight: 450;
    font-size: 13px;
    line-height: 1.5;
}
.top-card {
    top:-125px;
}
.btn-orange {
    color: white;
    background: #f7971e;
    transition: 0.3s;
}
.btn-orange:hover {
    color: white;
    background: #000;
}
.table td {
    vertical-align: middle!important;
}
.text-orange {
    color: #f7971e;
}
.money::-webkit-outer-spin-button,
.money::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
@media only screen and (max-width: 599px){
    .mobile-btn {
        margin-left: auto;
        margin-top: 10px;
    }
    .mobile-input {
        margin-right: 0!important;
    }
    .mobile-td {
        display: none;
    }
    .desk-status {
        display: block;
    }
    .p-txt3 {
        padding: 0!important;
    }
}
</style>
<script>
import moment from "moment";
export default {
    data(){
        return{
            user:{},
            wallet:{},
            transactions:{},
            moment:moment
        }
    },
    created(){
        this.fetchWallet();
        this.showStatement();
    },
    methods: {
        fetchWallet() {
            this.axios
            .get(`/api/show-wallet/${this.$route.params.id}`)
            .then((response) => {
                this.user = response.data;
                console.log(response.data);
            });
        },
        addMoney() {
            var user = this.user;
            var userId = this.$route.params.id;
            var xhr = this.axios;
            var swal = this.$fire;
            var router = this.$router;
            this.axios
                .post('/api/addWallet', {user_id:userId, amount:this.wallet.amount})
                .then((response) => {
                     var options = {
                        "key": "rzp_live_NWxi0Wz3mCa9n0", // Enter the Key ID generated from the Dashboard
                        // "key": "rzp_test_s7RstDro0RRmJj", // Enter the Key ID generated from the Dashboard
                        "amount": response.data.amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        "currency": "INR",
                        "name": "Affinito",
                        "order_id": response.data.rzp_order_id,
                        "handler": function(payResponse){
                            // this.paymentDetails = response;
                            xhr
                            .post('/api/makePayment',{payResponse, amount:response.data.amount, id:response.data.id, user_id:userId})
                            .then((response) => {
                                // console.log(response);
                                swal({
                                  title: "Money Successfully Added to the Wallet",
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
        showStatement(){
             this.axios
            .get(`/api/showTransactions/${this.$route.params.id}`)
            .then((response) => {
                this.transactions = response.data;
                console.log(response.data);
            });
        }
    }
}
</script>