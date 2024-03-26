<template>
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
    </div>
</template>

<script>
export default {
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