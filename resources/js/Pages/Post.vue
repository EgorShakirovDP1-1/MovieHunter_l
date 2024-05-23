<template>
    <AppLayout>
<template #default>
    <div id="post">
        <h1>Post your film over here!</h1>
        <form class="form mt-5" @submit.prevent="form.post('post')">
            <div class="form-group"></div>
            <label for="title" class="text-dark">Title:</label><br>
            <input v-model="form.title" type="text" name="title" id="title" class="form-control">
            <div v-if="errors.title" class="d-block mt-2">
                <span class="fs-5 text-danger">
                    {{ errors.title }}
                </span>
            </div>
            <div class="form-group mt-3">
                <label for="description" class="text-dark">Description:</label><br>
                <input v-model="form.description" type="text" name="description" id="description" class="form-control">
                <div v-if="errors.description" class="d-block mt-2">
                    <span class="fs-5 text-danger">
                        {{ errors.description }}
                    </span>
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="rating" class="text-dark">Rating:</label><br>
                <input v-model="form.rating" type="number" name="rating" id="rating" class="form-control">
                <div v-if="errors.rating" class="d-block mt-2">
                    <span class="fs-5 text-danger">
                        {{ errors.rating }}
                    </span>
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="image" class="text-dark">Image:</label><br>
                <input v-model="form.image" type="text" name="image" id="image" class="form-control">
                <div v-if="errors.image" class="d-block mt-2">
                    <span class="fs-5 text-danger">
                        {{ errors.image }}
                    </span>
                </div>
            </div>
            <div class="d-flex justify-content-end align-items-center my-3">
                <div class="form-group
                ms-3">
                    <button type="submit" :disabled="form.processing" class="btn btn-warning text-primary py-2 px-3">Post!</button>
                </div>
            </div>
            
        </form>
    </div>

</template>

    </AppLayout>
    </template>
<script>
import AppLayout from '../Layout/App.vue';
import { InertiaLink, useForm } from '@inertiajs/inertia-vue3';
export default {
    name: 'Post',
    components: {
        AppLayout,
        InertiaLink,
    },
    props: {
        errors: Object,
    },
    setup() {
        const form = useForm({
            title: '',
            description: '',
            rating: '',
            image: '',
        });
        return {
            form,
        };
    },
};

</script>
