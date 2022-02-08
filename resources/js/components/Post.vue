<template>
    <article class="p-3 mb-3">
        <h2 class="py-3 h3">{{ postData.title }}</h2>
        <div class="post-info d-flex align-items-center mb-3">
            <!-- Post Category -->
            <span v-if="postData.category_id !== null" class="cat badge bg-primary p-2 mr-3">
<!--                 {{ getPostCategoryName(postData.category_id) }} -->
            </span>
            <span v-else class="cat badge bg-secondary p-2 mr-3">Uncategorized</span>

            <!-- Post Date -->
            <div class="date">{{ formatDate(postData.created_at) }}</div>
        </div>
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
        postCategories: Array,
    },
    methods: {
        formatDate(inputDate) {
            const date = new Date(inputDate);
            return Intl.DateTimeFormat('it-IT').format(date);
        },
        getPostCategoryName(id) {

        }
    }
}
</script>

<style lang="scss" scoped>
article {
    border-radius: 20px;
    box-shadow: 0 0 10px 1px #ccc;

    .post-info {
        .cat {
            color: #fff;
            
            &::before {
                content: '\f07c';
                font-family: 'Font Awesome 5 Free';
                font-weight: 700;
                margin-right: .5rem;
            }
        }

        .date {
            &::before {
                content: '\f073';
                font-family: 'Font Awesome 5 Free';
                font-weight: 700;
                margin-right: .5rem;
            }
        }
    }
}

</style>