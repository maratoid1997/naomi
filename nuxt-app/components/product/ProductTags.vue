<template>
    <div class="tags">
        <ul class="tags-list">
            <li class="tags-list__label">{{ $t("tags") }}:</li>
            <li v-for="tag in tags" :key="tag" class="tags-list__item">
                {{ tag }}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        tags: {
            type: Array,
            required: true,
        },
    },
};
</script>

