<template>
    <article class="p-3 mb-3">
        <!-- Post title -->
        <h2 class="py-3 h3 post-title" v-if="$route.name != 'post-detail'">
            <router-link :to="{name: 'post-detail', params: { slug: post.slug }}">
                {{ post.title }}
            </router-link>
        </h2>
        <h2 class="py-3 h3 post-title" v-else>{{ post.title }}</h2>

        <!-- Post infos -->
        <div class="post-info d-flex align-items-center mb-3">
            <!-- Post Category -->
            <span v-if="post.category !== null" class="cat badge bg-primary p-2 mr-3">
                {{ post.category.name }}
            </span>
            <span v-else class="cat badge bg-secondary p-2 mr-3">Uncategorized</span>

            <!-- Post Date -->
            <div class="date">{{ post.formatted_date }}</div>
        </div>

        <!-- Post content -->
        <div class="post-content mb-3">
            {{ post.content }}
        </div>

        <!-- Post tags -->
        <div class="tags" v-if="post.tags.length !== 0">
            Tag: 
            <span
                v-for="tag in post.tags"
                :key="`post-${post.id}-tag-${tag.id}`"
                class="badge badge-primary mr-2"
            >
                {{ tag.name }}
            </span>
        </div>
    </article>
</template>

<script>
export default {
    name: 'Post',
    props: {
        post: Object,
    },
    methods: {
        formatDate(inputDate) {
            const date = new Date(inputDate);
            return Intl.DateTimeFormat('it-IT').format(date);
        },
    }
}
// cat.id === id ? cat.category_name : null
</script>

<style lang="scss" scoped>
article {
    border-radius: 20px;
    box-shadow: 0 0 10px 1px #ccc;

    .post-title {
        a {
            color: #212529;
            transition: color .4s;
            text-decoration: none;

            &:hover {
                color: #3490dc;
            }
        }
    }

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