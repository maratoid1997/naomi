<template>
    <div class="wrapper">
        <app-header/>
        <nuxt/>
        <slider-brands/>
        <subscribe/>
        <app-footer/>
    </div>
</template>

<script>
import AppHeader from "@/components/maratoid/AppHeader";
import Subscribe from "@/components/maratoid/Subscribe";
import AppFooter from "@/components/maratoid/AppFooter";
import SliderBrands from "@/components/maratoid/sliders/SliderBrands";

export default {
    components: {
        AppHeader,
        Subscribe,
        AppFooter,
        SliderBrands,
    },
    data() {
        return {
            // startAnimation: false,
            // animationStart: {
            //     left: 0,
            //     top: 0,
            // },
        };
    },
    // created() {
    //     this.$root.$on("addToCart", (coords) => {
    //         this.animationStart = { ...coords };
    //     });
    //
    //     this.$root.$on("continueShopping", () => {
    //         const userCart = document.querySelector("#user-cart");
    //         const { left, top } = userCart.getBoundingClientRect();
    //         this.startAnimation = true;
    //
    //         this.$anime({
    //             targets: ".animated-thumb",
    //             top: [this.animationStart.top - 50, top],
    //             left: [this.animationStart.left - 50, left],
    //             width: [100, 40],
    //             height: [100, 40],
    //             easing: "easeInOutCubic",
    //             duration: 1200,
    //             complete: () => {
    //                 this.startAnimation = false;
    //             },
    //         });
    //     });
    // },
};
</script>
