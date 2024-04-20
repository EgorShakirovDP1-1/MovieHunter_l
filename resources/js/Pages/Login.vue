
<!-- to connect to database, use 
    sudo php -S 127.0.0.1:232
     in phpmyadmin project in study folder-->
<template>
    <AppLayout>
    <template #default>
<div>
    <h1>Login</h1>
    <form class="form mt-5" @submit.prevent="form.post('login')">
                    <h1>Login</h1>
                    <div class="form-group mt-3">
                        <label for="email" class="text-dark">Email:</label><br>
                        <input v-model="form.email" type="email" name="email" id="email" class="form-control">
                        <div v-if="errors.email" class="d-block mt-2">
                            <span class="fs-5 text-danger">
                                {{ errors.email }}
                            </span>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="password" class="text-dark">Password:</label><br>
                        <input v-model="form.password" type="password" name="password" id="password" class="form-control">
                        <div v-if="errors.password" class="d-block mt-2">
                            <span class="fs-5 text-danger">
                                {{ errors.password }}
                            </span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end align-items-center my-3">
                        <div class="text-right">
                            <a :href="route('register')" class="text-dark lead">Register here</a>
                        </div>
                        <div class="form-group ms-3">
                            <button type="submit" :disabled="form.processing" class="btn btn-warning text-primary py-2 px-3">Login!</button>
                        </div>
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
import { InertiaLink, useForm } from '@inertiajs/inertia-vue3';
export default {
    components: {
        AppLayout,
        InertiaLink,
    },
    props: {
        errors: Object,
    },
    setup() {
        const form = useForm({
            email: "",
            password: "",
        });

        return { form };
    },
};
</script>