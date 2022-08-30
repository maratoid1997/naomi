<template>
    <div class="breadcrumbs-container d-none d-md-block">
        <b-container fluid>
            <b-row v-if="items">
                <b-col>
                    <b-breadcrumb>
                        <b-breadcrumb-item
                            v-for="item in items"
                            :key="item.text"
                            :to="item.to === '/' ? $localePath('/index') : $localePath(item.to)"
                        >
                            {{ item.text }}
                        </b-breadcrumb-item>
                    </b-breadcrumb>
                </b-col>
            </b-row>
        </b-container>
    </div>
</template>

<script>
export default {
    props: {
        items: {
            type: Array,
            required: true
        }
    }
};
</script>
