<template>
    <div class="container fade" id="loginForm">
        <div class="py-5 text-center">
            <div class="login-logo">
                <img class="d-block mx-auto mb-4" src="https://morph-digital.com/media/2022/10/logo-twolines@2x.png"
                    alt="">
            </div>
            <h2 class="fw-light">Admin Page</h2>
        </div>
        <div class="row justify-content-center">
            <div class="form-signin col-sm-4">
                <div class="border border-info border-1 border-opacity-25 rounded p-4">
                    <div class="form-floating mb-2">
                        <input type="email" name="email" id="email" v-model="email" class="form-control"
                            placeholder="name@example.com" required="" value="">
                        <label for="email">Email Address</label>
                        <div class="invalid-feedback">
                            Valid email is required
                        </div>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" id="floatingPassword" v-model="password"
                            class="form-control" placeholder="Password" value="" required="">
                        <label for="floatingPassword">Password</label>
                        <div class="invalid-feedback">
                            Password is required
                        </div>
                    </div>
                    <div class="form-check text-start my-3">
                        <input type="checkbox" class="form-check-input" name="remember_me" value="remember-me"
                            id="flexCheckDefault">
                        <label for="flexCheckDefault" class="form-check-label">
                            Remember me
                        </label>
                    </div>
                    <button class="btn btn-success w-100 py-2 btnLogin" @click="loggedIn()">Sign in</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex';

export default {
    data: () => {
        return {
            email: '',
            password: '',
        }
    },
    methods: {
        ...mapActions(['login']),
        loggedIn() {
            if (this.email.trim() == '' || this.password.trim() == '') return this.alert("Text field cannot be empty.", "Woops!", "danger");

            axios.post('api/login', {
                email: this.email,
                password: this.password
            }).then(response => {
                if (response.data.status) {

                    const token = response.data.token;

                    // Store token in localStorage
                    localStorage.setItem('token', token);

                    // axios.interceptors.request.use(config => {
                    //     const token = localStorage.getItem('token');
                    //     if (token) {
                    //         config.headers.Authorization = `Bearer ${token}`;
                    //     }
                    //     return config;
                    // });
                    
                    this.alert(response.data.message, "Successful!", "success");

                    setTimeout(() => {
                        this.$store.commit('setToken');
                        this.$router.push('/dashboard');
                    }, 1500);
                } else {
                    this.alert(response.data.message, "Failed!", "danger");
                }
            }).catch(error => {
                console.log(error);
            });

        }
    },
    mounted() {
        setTimeout(() => {
            $('#loginForm').addClass('show');
        }, 300);
    },
}
</script>

<style lang="css">
@import "../../../css/app.css";
</style>