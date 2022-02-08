<template>
    <article class="p-3 mb-3">
        <h2 class="py-3 h3">{{ postData.title }}</h2>
        <div class="post-content mb-3">
            {{ postData.content }}
        </div>
    </article>
</template>

<script>
export default {
    name: 'Post',
    props: {
        postData: Object,
    }
}
</script>

<style lang="scss" scoped>
article {
    border-radius: 20px;
    box-shadow: 0 0 10px 1px #ccc;
}

</style>