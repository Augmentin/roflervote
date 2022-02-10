import SelectMusic from "./sources/SelectMusic/SelectMusic";

import { createApp } from 'vue'
import router from './router/router'
import store from "./store";
require('./bootstrap');
const app = createApp({});

app.use(store);

app.use(router);
app.component( "select-music",   SelectMusic );

$(document).ready(function() {
    app.mount('#main-page');
});
