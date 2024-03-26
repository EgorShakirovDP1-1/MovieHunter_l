
<script>
import { App as InertiaApp } from '@inertiajs/inertia-vue3';
import Navbar from './components/Navbar.vue'; // Navbar component is imported here


export default {
  
   components: {
 
   Navbar,
   
   },
}
</script>
<template>
  <div id="app">
  <Navbar />  

   <slot/>
   
 </div>
 
</template>

