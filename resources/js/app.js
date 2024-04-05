// Path: resources/js/app.js
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

import { Ziggy } from './ziggy.js';
import App from './Layout/App.vue'; // Import App.vue

createInertiaApp({
  
  resolve: name => import(`./Pages/${name}.vue`),
  setup({ el, app, props, plugin }) {
    const vueApp = createApp({ 
      render: () => h(app, props)
    })
    .use(plugin)
    .use(ZiggyVue, Ziggy) // Use ZiggyVue plugin
    .mount(el);
  },
});