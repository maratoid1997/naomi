export default {
    methods: {
        onIncrementCount(id) {
            if (this.$auth.user) {
                this.$store.dispatch("cart/incrementCount", id);
            } else {
                this.$store.dispatch("cart/incrementCookieCount", id);
            }
        },

        onDecrementCount(id) {
            if (this.$auth.user) {
                this.$store.dispatch("cart/decrementCount", id);
            } else {
                this.$store.dispatch("cart/decrementCookieCount", id);
            }
        },
    }
}