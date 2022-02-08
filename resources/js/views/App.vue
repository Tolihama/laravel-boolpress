<template>
    <div>
        <Header />
        <main class="py-5">
            <div class="container">
                <h1 class="mb-3">Articoli</h1>
                <div class="posts" v-if="posts != null">
                    <Post v-for="post in posts" :key="`post-${post.id}`" :postData="post" :postCategories="postCategories" />
                </div>
                <Loader v-else message="Articoli in caricamento"/>
            </div>
        </main>
    </div>
</template>

<script>
import axios from 'axios';

// Import components
import Header from '../components/Header';
import Post from '../components/Post';
import Loader from '../components/Loader';

export default {
    name: 'App',
    components: {
        Header,
        Post,
        Loader,
    },
    data() {
        return {
            posts: null,
            postCategories: null,
        }
    },
    created() {
        // this.getPostCategories();
        this.getPosts();
    },
    methods: {
        getPosts() {
            axios.get('http://127.0.0.1:8000/api/posts')
                .then(response => this.posts = response.data.data)
                .catch(err => console.log(err));
        },
        getPostCategories() {
            axios.get('http://127.0.0.1:8000/api/posts/categories')
                .then(response => {
                    console.log(response.data);
                })
                .catch(err => console.log(err));
        },
    }
}
</script>

<style lang="scss">

</style>