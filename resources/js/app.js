import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue';
// import components from '@/components/UI';
import router from "@/router/router";
import { useVuelidate } from "@vuelidate/core";
import vuelidate from 'vuelidate';

const app = createApp(App);

// components.forEach(component => {
//     app.component(component.name, component)
// });

app
    .use(router)
    // .use(vuelidate)
    .mount('body')
