// DEPENDENCIES
import Vue from 'vue';
import VueRouter from 'vue-router';

// PAGES IMPORT
import Home from './pages/Home';
import Blog from './pages/Blog';
import PostDetail from './pages/PostDetail';

// VUE ROUTES COMPONENT ACTIVATE
Vue.use(VueRouter);

// ROUTES LIST
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/posts',
            name: 'posts',
            component: Blog
        },
        {
            path: '/posts/:slug',
            name: 'post-detail',
            component: PostDetail
        }
    ]
});

// EXPORT ROUTES
export default router;