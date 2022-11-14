 <template>
 
        <!-- customer login start -->
    <div class="customer_login">
        <div class="container">
            <div class="row justify-content-center">

                <!--Login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Login</h2>
                        <!-- {{error}} -->
                        <form @submit.prevent="loginUser">
                             <p>   
                                <label>Email or Mobile</label>
                                <input type="text" v-model="login.email" autocomplete="true">
                             </p>
                             <p>   
                                <label>Password</label>
                                <input type="password" v-model="login.password">
                             </p>
                            <div class="login_submit">
                                <button type="submit">Login</button>
                            </div>
                        </form>
                    </div>    
                </div>
                <!--Login area end-->
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
            login:{},
            error:{}
        }
    },
    methods: {
        loginUser() {
            this.axios
                .post('/login', this.login)
                .then(response => (
                    
                    this.$router.push({name: 'home'})
                    // window.location.reload()
                    // console.log(response.data)
                ))
                .catch(error => this.error = error)
                .finally(() => this.loading = false)
        }
    }
}
</script>