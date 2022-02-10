<template>
    <div id="post-detail" class="container">
        <router-link class="btn btn-primary mb-3" :to="{ name: 'posts' }">Torna al blog</router-link>
        <Post v-if="post != null" :post="post" />
        <Loader v-else />
    </div>
</template>

<script>
import axios from 'axios';

// COMPONENTS IMPORT
import Post from '../components/Post';
import Loader from '../components/Loader';

export default {
    name: 'PostDetail',
    components: {
        Post,
        Loader
    },
    data() {
        return {
            post: null,
        }
    },
    created() {
        this.getPostDetail();
    },
    methods: {
        getPostDetail() {
            axios.get(`http://127.0.0.1:8000/api/posts/${this.$route.params.slug}`)
                .then(res => res.data.not_found ? this.$router.push({ name: 'not-found' }) : this.post = res.data)
                .catch(err => console.log(err));
        }
    }
}
</script>

<style lang="scss">

</style>