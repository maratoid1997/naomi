<template>
    <div class="category-card text-center" @click="onCategoryCardClick">
        <nuxt-link
            class="category-card__image"
            :to="{ query: { category: category.slug.replace(/\//g, '') } }"
        >
            <img class="img-contained" :src="category.image" :alt="category.name" />
        </nuxt-link>
        <nuxt-link
            class="category-card__title"
            :to="{ query: { category: category.slug.replace(/\//g, '') } }"
        >
            {{ category.name }}
        </nuxt-link>
    </div>
</template>

<script>
export default {
    props: {
        category: {
            type: Object,
            required: true
        }
    },
    methods: {
        async onCategoryCardClick() {
            await this.$store.dispatch("category/fetchFilteredCategoryData", {
                category: this.category.slug.replace(/\//g, ""),
                refresh: 1
            });
        }
    }
};
</script>
