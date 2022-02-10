<template>
    <div>
        <Header />
        <main class="py-5">
            <router-view></router-view>
        </main>
    </div>
</template>

<script>
// Import components
import Header from '../components/Header';

export default {
    name: 'App',
    components: {
        Header,
    }
}
</script>

<style lang="scss">

</style>