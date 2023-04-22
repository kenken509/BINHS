import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import {ZiggyVue} from 'ziggy'
import '../css/app.css'
import '@fortawesome/fontawesome-free/css/all.css'

//prime vue
import PrimeVue from 'primevue/config';
import 'primevue/resources/themes/tailwind-light/theme.css'
import "primevue/resources/primevue.min.css";
import "primeicons/primeicons.css";
import InputText from 'primevue/inputtext';
import Avatar from 'primevue/avatar';
import Menu from 'primevue/menu';
import Tooltip from 'primevue/tooltip';
import Sidebar from 'primevue/sidebar'
import Button from 'primevue/button';

//flowbite
// import { 
//   initAccordions, 
//   initCarousels, 
//   initCollapses, 
//   initDials, 
//   initDismisses, 
//   initDrawers, 
//   initDropdowns, 
//   initModals, 
//   initPopovers, 
//   initTabs, 
//   initTooltips } from 'flowbite'
  import { initFlowbite } from 'flowbite'


//tailwind elements
const tailElem = async () => {
  await import("tw-elements");
};







createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin) 
      .use(ZiggyVue)
      .use(tailElem)
      .use(initFlowbite)
      .use(PrimeVue, {ripple: true})
      .component('InputText', InputText)
      .component('Avatar', Avatar)
      .component('Menu',Menu)
      .component('Sidebar', Sidebar)
      .component('Button', Button)
      .directive('tooltip', Tooltip)
      .mount(el)
  },
  
})
