<template>
    <header>
        <div class="container d-flex justify-content-between align-items-center py-4">
            <div class="title h1 m-0">
                <router-link :to="{ name: 'home'}">BoolPress Blog</router-link>
            </div>
            <div class="cp">
                <a class="btn btn-secondary" href="/admin">Vai al CP</a>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: 'Header',
}
</script>

<style lang="scss" scoped>
header {
    background-color: aquamarine;
}

</style>