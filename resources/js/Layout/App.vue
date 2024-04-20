
<script>
import { App as InertiaApp } from '@inertiajs/inertia-vue3';
import Navbar from './components/Navbar.vue'; // Navbar component is imported here
import { InertiaProgress } from '@inertiajs/progress';
InertiaProgress.init();

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

