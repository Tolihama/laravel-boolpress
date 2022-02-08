<template>
    <div>
        <Header />
        <main class="py-5">
            <div class="container">
                <h1 class="mb-3">Articoli</h1>
                <Pagination v-if="pagination != null" :pagination="pagination" @newCurrentPage="updateCurrentPage" />
                <div class="posts" v-if="posts != null">
                    <Post v-for="post in posts" :key="`post-${post.id}`" :postData="post" :postCategories="postCategories" />
                </div>
                <Loader v-else message="Articoli in caricamento"/>
                <Pagination v-if="pagination != null" :pagination="pagination" @newCurrentPage="updateCurrentPage" />
            </div>
        </main>
    </div>
</template>

<script>
import axios from 'axios';

// Import components
import Header from '../components/Header';
import Pagination from '../components/Pagination';
import Post from '../components/Post';
import Loader from '../components/Loader';

export default {
    name: 'App',
    components: {
        Header,
        Pagination,
        Post,
        Loader,
    },
    data() {
        return {
            posts: null,
            pagination: null,
            postCategories: null,
        }
    },
    created() {
        this.getPostCategories();
        this.getPosts();
    },
    methods: {
        getPosts(page = 1) {
            axios.get(`http://127.0.0.1:8000/api/posts?page=${page}`)
                .then(response => {
                    this.posts = response.data.data;
                    this.pagination = {
                        current: response.data.current_page,
                        last: response.data.last_page,
                        total: response.data.total
                    }
                })
                .catch(err => console.log(err));
        },
        getPostCategories() {
            axios.get('http://127.0.0.1:8000/api/posts/categories')
                .then(response => {
                    this.postCategories = response.data;
                })
                .catch(err => console.log(err));
        },
        updateCurrentPage(newCurrentPage) {
            this.pagination.current = newCurrentPage;
            this.getPosts(newCurrentPage);
        }
    }
}
</script>

<style lang="scss">

</style>