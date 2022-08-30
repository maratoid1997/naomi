<template>
    <section class="page">
        <breadcrumbs :items="breadcrumbs" />

        <b-container fluid>
            <b-row>
                <b-col>
                    <section-header :title="page.name" />
                    <div class="editor-body" v-html="page.body" />
                </b-col>
            </b-row>
        </b-container>
    </section>
</template>

<script>
import { mapState, mapGetters } from "vuex";
import Breadcrumbs from "@/components/layout/Breadcrumbs";
import SectionHeader from "@/components/ui/SectionHeader";

export default {
    name: "sttaic-page",
    components: {
        Breadcrumbs,
        SectionHeader
    },
    computed: {
        ...mapState({
            breadcrumbs: ({ staticPages }) => staticPages.breadcrumbs,
        }),
        ...mapGetters({
            page: "staticPages/getPageContent"
        }),
    },
    async asyncData({ store, params }) {
        await store.dispatch("staticPages/fetchPageContent", params.slug);
    }
};
</script>
