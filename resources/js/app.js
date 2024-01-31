import './bootstrap';

import { createApp } from 'vue';

const app = createApp({});

import TopMenu from "./Main/Blocks/TopMenu.vue";
import Products from "./Main/Catalogue/Products.vue";

app.component('top-menu', TopMenu);
app.component('products-block', Products);

app.mount('#app');
