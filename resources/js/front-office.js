// IMPORT DEPENDENCIES
import Vue from 'vue';
import App from './views/App';

// IMPORT ROUTER
import router from './routes';

// INIT VUE ISTANCE
const root = new Vue({
    el: '#root',
    router,
    render: h => h(App),
});