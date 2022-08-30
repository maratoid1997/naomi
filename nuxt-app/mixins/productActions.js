export default {
    methods: {
        onAddToFavs(product) {
            if (this.$auth.user) {
                return this.$store.dispatch("favorites/addToFavs", product.id);
            } else {
                return this.$store.dispatch("favorites/addToCookieFavs", product);
            }
        },

        onRemoveFromFavs(id) {
            if (this.$auth.user) {
                return this.$store.dispatch("favorites/removeFromFavs", id);
            } else {
                return this.$store.dispatch("favorites/removeFromCookieFavs", id);
            }
        },

        onAddToCart(product) {
            if (this.$auth.user) {
                return this.$store.dispatch("cart/addToCart", {
                    productId: product.id, qty: product.count 
                });
            } else {
                return this.$store.dispatch("cart/addToCookieCart", product);
            }
        },

        onRemoveFromCart(id) {
            if (this.$auth.user) {
                return this.$store.dispatch("cart/removeFromCart", id);
            } else {
                return this.$store.dispatch("cart/removeFromCookieCart", id);
            }
        }
    }
};
