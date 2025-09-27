import './bootstrap';

import {createApp} from 'vue'

import App from './App.vue';
import router from './routes.js';
import store from './store/index.js';

import PrimeVue from 'primevue/config';
import Aura from '@primeuix/themes/aura';
import ToastService from 'primevue/toastservice';

createApp(App).use(router).use(store).use(PrimeVue, {
    theme: {
        preset: Aura
    }
}).use(ToastService).mount("#app");
