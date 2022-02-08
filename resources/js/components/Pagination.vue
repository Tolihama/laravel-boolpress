<template>
    <div class="d-flex align-items-center ml-3 my-4">
        <button
            class="btn btn-primary mr-2"
            :disabled="pagination.current === 1"
            @click="$emit('newCurrentPage', pagination.current - 1)"
        >
            Prev
        </button>

        <button
            class="btn btn-primary mr-2"
            v-for="i in pagination.last"
            :key="`page-${i}`"
            :disabled="pagination.current === i"
            @click="$emit('newCurrentPage', i)"
        >
            {{ i }}
        </button>

        <button
            class="btn btn-primary mr-2"
            :disabled="pagination.current === pagination.last"
            @click="$emit('newCurrentPage', pagination.current + 1)"
        >
            Next
        </button>

        <div class="items_count">
            Elementi: {{ pagination.total }}
        </div>
    </div>
</template>

<script>
export default {
    name: 'Pagination',
    props: {
        pagination: Object,
    }
}
</script>

<style lang="scss" scoped>

</style>