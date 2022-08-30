<template>
    <div class="brand-card">
        <nuxt-link
            class="brand-card__logo"
            :to="$localePath('brands-id', { id: brand.id })"
        >
            <img class="img-contained" :src="brand.image" :alt="brand.name" />
        </nuxt-link>
    </div>
</template>

<script>
export default {
    props: {
        brand: {
            type: Object,
            required: true
        },
    },
};
</script>
