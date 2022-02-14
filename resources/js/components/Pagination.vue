<template>
    <div class="d-flex align-items-center ml-3 my-4">
        <!-- First page -->
        <button
            class="btn btn-primary mr-2"
            :disabled="pagination.current === 1"
            @click="$emit('newCurrentPage', 1)"
        >
            <i class="fas fa-angle-double-left"></i>
        </button>

        <!-- Prev page -->
        <button
            class="btn btn-primary mr-2"
            :disabled="pagination.current === 1"
            @click="$emit('newCurrentPage', pagination.current - 1)"
        >
            <i class="fas fa-angle-left"></i>
        </button>

        <!-- Middle pages in range -->
        <button
            class="btn btn-primary mr-2"
            v-for="i in pageRange"
            :key="`page-${i}`"
            :disabled="pagination.current === i"
            @click="$emit('newCurrentPage', i)"
        >
            {{ i }}
        </button>

        <!-- Next page -->
        <button
            class="btn btn-primary mr-2"
            :disabled="pagination.current === pagination.last"
            @click="$emit('newCurrentPage', pagination.current + 1)"
        >
            <i class="fas fa-angle-right"></i>
        </button>

        <!-- Last page -->
        <button
            class="btn btn-primary mr-2"
            :disabled="pagination.current === pagination.last"
            @click="$emit('newCurrentPage', pagination.last)"
        >
            <i class="fas fa-angle-double-right"></i>
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
    },
    computed: {
        pageRange() {
            const pagesInRange = [];
            if(this.pagination.last > 3) {
                if(this.pagination.current === 1) {
                    pagesInRange.push(this.pagination.current, this.pagination.current + 1, this.pagination.current + 2);
                } else if(this.pagination.current === this.pagination.last) {
                    pagesInRange.push(this.pagination.current - 2, this.pagination.current - 1, this.pagination.current);
                } else {
                    pagesInRange.push(this.pagination.current);
                }
            } else {
                for(let i = 1; i <= this.pagination.last; i++) {
                    pagesInRange.push(i);
                }
            }

            return pagesInRange;
        }
    }
}
</script>

<style lang="scss" scoped>

</style>