<template>
    <nav>
        <ul>
            <li><inertia-link href="/">Home</inertia-link></li>
            <li><inertia-link href="/movies">Movies</inertia-link></li>
            <li><inertia-link href="/Login">Login</inertia-link></li>
            <li><inertia-link href="/favorites">Favorites</inertia-link></li>
        </ul>
    </nav>
</template>

<script>
// @ts-ignore
import { InertiaLink } from '@inertiajs/inertia-vue3';

export default {
    name: 'Navbar',
    components: {
        InertiaLink
    }
}
</script>

<style scoped>
nav {
    background-color: #f8f8f8;
    padding: 10px;
}

ul {
    list-style-type: none;
    display: flex;
    justify-content: space-between;
}

li {
    margin-right: 10px;
}

a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
}
</style>