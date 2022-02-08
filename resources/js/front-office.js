// IMPORT DEPENDENCIES
import Vue from 'vue';
import App from './views/App';

// INIT VUE ISTANCE
const root = new Vue({
    el: '#root',
    render: h => h(App),
});