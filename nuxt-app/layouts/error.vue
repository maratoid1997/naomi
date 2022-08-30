<template>
    <section class="page">
        <breadcrumbs :items="breadcrumbs" />

        <b-container fluid>
            <b-row>
                <b-col>
                    <section-header :title="$t('page_not_found')" />

                    <div class="not-found text-center">
                        <img src="~/assets/images/404.png" alt="Not found" />
                        <p>{{ $t("page_not_found") }}</p>
                        
                        <a :href="localePath('index')">
                            <b-button variant="outline-primary">
                                <i class="icon-arrow-left"></i>
                                {{ $t("back_to_home") }}
                            </b-button>
                        </a>
                    </div>
                </b-col>
            </b-row>
        </b-container>
    </section>
</template>

<script>
import Breadcrumbs from "@/components/layout/Breadcrumbs";
import SectionHeader from "@/components/ui/SectionHeader";

export default {
    components: {
        Breadcrumbs,
        SectionHeader,
    },
    data() {
        return {
            breadcrumbs: [
                {
                    text: "Ana səhifə",
                    to: "/",
                },
                {
                    text: "Səhifə tapılmadı",
                    active: true,
                },
            ],
        };
    },
};
</script>
