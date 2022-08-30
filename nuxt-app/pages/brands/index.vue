<template>
    <section class="page">
        <breadcrumbs :items="breadcrumbs" />

        <b-container fluid>
            <b-row>
                <b-col>
                    <section-header :title="$t('brands')" />
                </b-col>
            </b-row>

            <div class="grid-list">
                <b-row cols="2" cols-xl="5" cols-lg="4" cols-md="3">
                    <b-col v-for="brand in brands" :key="brand.id">
                        <brand-card :brand="brand" />
                    </b-col>
                </b-row>
            </div>
        </b-container>
    </section>
</template>

<script>
import { mapState, mapGetters } from "vuex";
import Breadcrumbs from "@/components/layout/Breadcrumbs";
import SectionHeader from "@/components/ui/SectionHeader";
import BrandCard from "@/components/brands/BrandCard";

export default {
    name: "brands-page",
    nuxtI18n: {
        paths: {
            az: "/brendler",
            ru: "/brendi",
            en: "/brands",
        },
    },
    components: {
        Breadcrumbs,
        SectionHeader,
        BrandCard,
    },
    computed: {
        ...mapState({
            breadcrumbs: (state) => state.brands.breadcrumbs,
        }),
        ...mapGetters({
            brands: "brands/getBrands",
        }),
    },
};
</script>
