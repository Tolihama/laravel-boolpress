<template>
    <div class="d-flex flex-column justify-content-center align-items-center p-5">
        <div class="spinner-border" role="status">
            <span class="sr-only">{{ message }}</span>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Loader',
    props: {
        message: String,
    }
}
</script>

<style lang="scss" scoped>

</style>