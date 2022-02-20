import SelectMusic from "./sources/SelectMusic/SelectMusic";

import { createApp } from 'vue'
import router from './router/router'
import store from "./store";
import Main from "./sources/SelectMusic/Main";
require('./bootstrap');
const app = createApp({});

app.use(store);

app.use(router);
app.component( "main-page",   Main );

$(document).ready(function() {
    app.mount('#main-page');
});
