<template>
    <AppLayout>
        <template #default>
            <div>
                <h1>Signup</h1>
                <form @submit="signup">
                    <ul>
  <li><input v-model="form.name" type="text" placeholder="Name"></li>
  <li><input v-model="form.email" type="email" placeholder="Email"></li>
  <li><input v-model="form.password" type="password" placeholder="Password"></li>
</ul>
<button @click="signup">Sign Up</button>
</form>
                <div id="login">
                    <p><strong>Have an account? Register Here</strong></p>
                    <button><inertia-link href="/login">Login</inertia-link></button>
                </div>
            </div>
        </template>
    </AppLayout>
</template>
<script>
import { Inertia } from '@inertiajs/inertia'
import AppLayout from '../Layout/App.vue';
import { InertiaLink } from '@inertiajs/inertia-vue3';
import { route } from 'ziggy-js';
export default {
  

  name: 'Signup',
  components: {
    AppLayout,
    InertiaLink,
  },
  data() {
    return {
      form: {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        // Add other form fields here
      },
    };
  },
  
  methods: {
  signup(event) {
    event.preventDefault();
    this.$inertia.post(route('register'), this.form)
      .then(response => {
        if (response.status === 200) {
          // Handle successful registration
        } else {
          // Handle errors
        }
      });
  },
}
};
</script>



