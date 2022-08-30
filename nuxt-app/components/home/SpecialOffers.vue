<template>
    <div class="special-offers ptb-6">
        <b-container fluid>
            <b-row>
                <b-col xl="4" md="6" v-for="banner in banners" :key="banner.id">
                    <special-offer :banner="banner" />
                </b-col>
            </b-row>
        </b-container>
    </div>
</template>

<script>
import SpecialOffer from "@/components/ui/SpecialOffer";

export default {
    props: {
        banners: {
            type: Array,
            required: true,
        },
    },
    components: {
        SpecialOffer,
    },
};
</script>
