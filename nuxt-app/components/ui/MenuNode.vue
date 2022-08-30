<template>
    <li @click.stop="toggle" :class="{ open: isOpen, 'has-childs': hasChilds }">
        <template v-if="hasChilds">
            <template v-if="node.path">
                <nuxt-link :to="$localePath('category', { category: node.path.split('/').pop() })">
                    {{ node.name }}
                </nuxt-link>
            </template>
            <template v-else>
                <span>{{ node.name }}</span>
            </template>
            <slot></slot>
        </template>

        <template v-else>
            <nuxt-link
                v-if="isChild"
                :to="$localePath(
                    'category',
                    { category: parentPath.split('/').pop() },
                    { category: node.path.split('/').pop() }
                )"
            >
                {{ node.name }}
            </nuxt-link>
            <nuxt-link v-else :to="$localePath(node.path)">
                {{ node.name }}
            </nuxt-link>
        </template>
    </li>
</template>

<script>
export default {
    props: {
        parentPath: {
            type: String,
            default: ""
        },
        node: {
            type: Object,
        },
        isChild: {
            type: Boolean,
        },
    },
    watch: {
        $route() {
            this.isOpen = false;
        },
    },
    data() {
        return {
            isOpen: false,
        };
    },
    computed: {
        hasChilds() {
            return this.node.children && this.node.children.length;
        },
    },
    methods: {
        toggle() {
            this.isOpen = !this.isOpen;
        },
    },
};
</script>
