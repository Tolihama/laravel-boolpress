<template>
    <div id="blog" class="container">
        <h1 class="mb-3">Articoli</h1>
        <Pagination v-if="pagination.total !== 1" :pagination="pagination" @newCurrentPage="updateCurrentPage" />
        <div class="posts" v-if="posts != null">
            <Post v-for="post in posts" :key="`post-${post.id}`" :post="post" />
        </div>
        <Loader v-else message="Articoli in caricamento"/>
        <Pagination v-if="pagination.total !== 1" :pagination="pagination" @newCurrentPage="updateCurrentPage" />
    </div>
</template>

<script>
import axios from 'axios';

// COMPONENTS IMPORT
import Pagination from '../components/Pagination';
import Post from '../components/Post';
import Loader from '../components/Loader';

export default {
    name: 'Blog',
    components: {
        Pagination,
        Post,
        Loader,
    },
    data() {
        return {
            posts: null,
            pagination: null,
        }
    },
    created() {
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
        updateCurrentPage(newCurrentPage) {
            this.pagination.current = newCurrentPage;
            this.getPosts(newCurrentPage);
        }
    }
}
</script>

<style lang="scss">

</style>