export default function({ app, $auth }) {
    $auth.onRedirect(() => {
        (async () => {
            const favs = app.$cookies.get("favorites");
            const cart = app.$cookies.get("cart");

            if (!$auth.loggedIn) {
                app.store.commit("SET_ITEMS", { module: "favorites", items: [] });
                app.store.commit("SET_ITEMS", { module: "cart", items: [] });
                app.store.commit("cart/SET_COUPON", { code: "", rate: 0 });
                app.$cookies.remove("coupon");
                app.$cookies.remove("gift-certificate");
            } else {
                if (favs && favs.length > 0) {
                    await app.store.dispatch("favorites/mergeFavsItems", favs);
                }

                if (cart && cart.length > 0) {
                    await app.store.dispatch("cart/mergeCartItems", cart);
                }

                await app.store.dispatch("favorites/fetchFavsItems");
                await app.store.dispatch("cart/fetchCartItems");
            }
        })();
    });
}
