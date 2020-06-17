/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueI18n from 'vue-i18n';
import Locale from './vue-i18n-locales.generated';
Vue.use(VueI18n);
const lang = document.documentElement.lang.substr(0, 2);
window.i18n = new VueI18n({
    locale: lang,
    messages: Locale
});

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('trade-form', require('./components/TradeForm.vue').default);

Vue.component('dropdown', require('./components/Dropdown.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    i18n,
});
