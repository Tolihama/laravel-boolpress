<template>
    <div id="home">
        <router-link class="btn btn-primary h1" :to="{name: 'posts'}">Vai al blog!</router-link>
    </div>
</template>

<script>
export default {
    name: 'Home'
}
</script>

<style lang="scss">
#home {
    height: 100%;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>