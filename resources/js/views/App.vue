<template>
    <div>
        <Header />
        <main class="py-5">
            <div class="container">
                <h1 class="mb-3">Articoli</h1>
                <div class="posts" v-if="posts != null">
                    <Post v-for="post in posts" :key="`post-${post.id}`" :postData="post" />
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
        }
    },
    created() {
        this.getPosts();
    },
    methods: {
        getPosts() {
            console.log('La funzione per la chiamata Axios è correttamente chiamata!');

            axios.get('http://127.0.0.1:8000/api/posts')
                .then(response => {
                    this.posts = response.data;
                })
                .catch(err => console.log(err));
        }
    }
}
</script>

<style lang="scss">

</style>