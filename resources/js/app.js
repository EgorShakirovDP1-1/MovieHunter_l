/*import { createApp, h } from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

const el = document.getElementById('app');

createApp({
  render: () =>
    h(InertiaApp, {
      initialPage: JSON.parse(el.dataset.page),
      resolveComponent: (name) => require(`./Pages/${name}`).default,
    }),
})
  .mixin({ methods: { route } })
  .use(InertiaPlugin)
  .mount(el);

InertiaProgress.init({ color: '#4B5563' });*/

/*import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';



createInertiaApp({
  resolve: name => {
   // const pages = import.meta.glob('./Pages/**//*.vue', { eager: true })  
    return pages[`./Pages/${name}.vue`]
  },
  
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})*/


import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import App from './Layout/App.vue'; // Import App.vue





createInertiaApp({
  resolve: name => import(`./Pages/${name}.vue`),
  setup({ el, app, props, plugin }) {
    createApp({ 
      render: () => h(app, props)
    })
      
      .use(plugin)
      .mount(el);
  },
});