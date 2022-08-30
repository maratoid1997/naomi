<template>
    <main>
        <app-slider/>
        <first-banner/>
        <slider-product-mini/>
        <slider-product/>
        <second-banner/>
        <slider-product-mini/>
        <features/>
        <third-banner/>
    </main>
</template>

<script>
import AppSlider from "@/components/maratoid/sliders/SpecialOffers";
import FirstBanner from "@/components/maratoid/banners/FirstBanner";
import SliderProductMini from "@/components/maratoid/sliders/SliderProductMini";
import SliderProduct from "@/components/maratoid/sliders/SliderProduct";
import SecondBanner from "@/components/maratoid/banners/SecondBanner";
import Features from "@/components/maratoid/Features";
import ThirdBanner from "@/components/maratoid/banners/ThirdBanner";
import SliderBrands from "@/components/maratoid/sliders/SliderBrands";
import Subscribe from "@/components/maratoid/Subscribe";

// import { mapGetters } from "vuex";
// import AppHeader from "../components/maratoid/AppHeader";
import HeroSlider from "@/components/home/HeroSlider";
import SpecialOffers from "@/components/home/SpecialOffers";
import ProductsSlider from "@/components/ProductsSlider";
import SectionHeader from "@/components/ui/SectionHeader";
import ProductCard from "@/components/products/ProductCard";
import Advantages from "@/components/home/Advantages";
import StaticBanner from "@/components/ui/StaticBanner";
import ModalProductView from "@/components/ui/ModalProductView";
import ModalOrderStatus from "@/components/layout/ModalOrderStatus";
// import Brands from "../components/maratoid/Brands";

export default {
    name: "home-page",
    components: {
        AppSlider,
        FirstBanner,
        SliderProductMini,
        SliderProduct,
        SecondBanner,
        Features,
        ThirdBanner,
        SliderBrands,
        Subscribe,
    },
    data() {
        return {

        };
    },
    // computed: {
    //     ...mapGetters({
    //         heroSlider: "home/getHero",
    //         banners: "home/getBanners",
    //         newProducts: "newProducts/getItems",
    //         bestSelling: "bestSellingProds/getItems"
    //     }),
    //     smallBannersTop() {
    //         return this.banners && this.banners.small.slice(0, 3);
    //     },
    //     smallBannersBottom() {
    //         return this.banners && this.banners.small.slice(0, 3);
    //     }
    // },
    // async mounted() {
    //     const { order_status, access_token } = this.$route.query;
    //
    //     if (access_token) {
    //         await this.$store.dispatch("user/getDetails", access_token);
    //         await this.$auth.setUserToken(`Bearer ${access_token}`);
    //     }
    //
    //     if (order_status) {
    //         this.orderStatus = order_status;
    //         this.$bvModal.show("modal-order-status");
    //     }
    // },
    // async asyncData({ store, query }) {
    //     await Promise.all([
    //         store.dispatch("home/fetchHeroSlider"),
    //         store.dispatch("home/fetchBanners"),
    //         store.dispatch("newProducts/fetchProducts", { filters: {} }),
    //     ]);
    // },
};
</script>
