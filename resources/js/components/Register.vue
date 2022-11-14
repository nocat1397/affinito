 <template>
 
        <!-- customer login start -->
    <div class="customer_login">
        <div class="container">
            <div class="row justify-content-center">

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Register</h2>
                        <form @submit.prevent="registerUser">
                            <div class="form-row">
                                <div class="col-md-6 col-lg-6">
                                    <p>
                                        <label>First Name</label>
                                        <input type="text" v-model="register.fname">
                                    </p>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <p>
                                        <label>Last Name</label>
                                        <input type="text" v-model="register.lname">
                                    </p>
                                </div>

                            </div>
                             <p>   
                                <label>Mobile Number</label>
                                <input type="text" v-model="register.mobile">
                             </p>
                             <p>   
                                <label>Address</label>
                                <textarea type="text" rows="3" v-model="register.address"></textarea>
                             </p>
                             <div class="form-row">
                                <div class="col-md-6 col-lg-6">
                                    <p>
                                        <label>City</label>
                                        <input type="text" v-model="register.city">
                                    </p>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <p>
                                        <label>Pincode</label>
                                        <input type="text" v-model="register.pincode">
                                    </p>
                                </div>

                            </div>
                             <p>   
                                <label>Email ID</label>
                                <input type="text" v-model="register.email">
                             </p>
                             <p>   
                                <label>Password</label>
                                <input type="password" v-model="register.password">
                             </p>
                            <div class="login_submit">
                                <button type="submit">Register</button>
                            </div>
                        </form>
                    </div>    
                </div>
                <!--register area end-->
            </div>
        </div>    
    </div>
    <!-- customer login end -->

 </template>
<script>
export default {
     mounted() {
        window.scrollTo({
          top: 0,
          left: 0,
          behavior: 'smooth'
        });
    },
    data(){
        return {
            register:{}
        }
    },
    methods: {
        registerUser() {
            this.axios
                .post('/registerUser', this.register)
                .then(response => (
                this.$fire({
                  text: "You Have Successfully Registered.!",
                  type: "success",  
                  timer: 3000,
                  showCancelButton: false,
                  showConfirmButton: false
                }),
                    this.$router.push({name: 'home'}),
                    console.log(response.data)
                ))
                .catch(error => console.log(error))
                .finally(() => this.loading = false)
        }
    }
}
</script>