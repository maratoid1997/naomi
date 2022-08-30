<template>
    <div class="animated-thumb">
        <img :src="product.image" alt="Product thumb" />
    </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
    computed: {
        ...mapGetters({
            product: "cart/getItem",
        }),
    },
}
</script>
