
<!-- to connect to database, use 
    sudo php -S 127.0.0.1:232
     in phpmyadmin project in study folder-->
<template>
    <AppLayout>
    <template #default>
<div>
    <h1>Login</h1>
    <form @submit.prevent="login">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" v-model="form.email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" v-model="form.password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
        
    </form>
    <div id = "signup">
            <p><strong>Don't have an account? Sign up for free</strong></p>
            <button type='tosignup'><inertia-link href="/signup">Signup</inertia-link></button>
        </div>

</div>
</template>
</AppLayout>
</template>

<script>
import AppLayout from '../Layout/App.vue';
import { InertiaLink } from '@inertiajs/inertia-vue3';
export default {
name: 'Login',
components: {
    AppLayout, 
    InertiaLink,
},
data() {
    return {
        form: {
            email: '',
            password: ''
        }
    };
},
methods: {
    login() {
        // Perform login logic here
        // You can use axios or any other HTTP library to make a request to your Laravel backend
        // Example:
        // axios.post('/login', this.form)
        //   .then(response => {
        //     // Handle successful login
        //   })
        //   .catch(error => {
        //     // Handle login error
        //   });
    }
}
};
</script>