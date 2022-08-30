<template>
    <div class="section-header flex">
        <h2 class="section-header__title">{{ title }}</h2>
        <nuxt-link
            v-if="linkPath"
            :to="$localePath(linkPath)"
            class="section-header__link"
        >
            {{ $t("show_all") }}
            <i class="icon-arrow-right"></i>
        </nuxt-link>
    </div>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            required: true,
        },
        linkPath: {
            type: String,
        },
    },
};
</script>
