<template>
    <a :href="banner.url" target="_blank" rel="noopener" class="static-bnr">
        <img :src="banner.image" :alt="banner.title">
    </a>
</template>

<script>
export default {
    props: {
        banner: {
            type: Object,
            required: true
        }
    }
};
</script>