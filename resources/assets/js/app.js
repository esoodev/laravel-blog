
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

var $ = require("jquery");

require('./bootstrap');
require('./front.js');
require('jquery.cookie');
require('timeago');
require('@fancyapps/fancybox');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('comment-show-component', require('./components/CommentShowComponent.vue'));
Vue.component('widget-category-component', require('./components/WidgetCategoryComponent.vue'));
Vue.component('widget-latest-component', require('./components/WidgetLatestComponent.vue'));
Vue.component('widget-tag-component', require('./components/WidgetTagComponent.vue'));
Vue.component('widget-search-component', require('./components/WidgetSearchComponent.vue'));

const app = new Vue({
    el: '#app'
});
