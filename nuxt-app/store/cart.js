import { findItemIndex, isItemExists } from "./utils";

export const state = () => ({
    loading: false,
    breadcrumbs: [],
    items: [],
    item: {},
    coupon: {
        id: null,
        code: "",
        rate: 0
    },
    giftCertificate: {
        id: null,
        code: "",
        price: 0
    }
});

export const getters = {
    getItem({ item }) {
        return item;
    },
    getItems({ items }) {
        return items;
    },
    getItemsCount({ items }) {
        let totalCount = 0;
        items.forEach(item => totalCount += item.count);
        return totalCount;
    },
    getSubtotal({ items }) {
        let subtotal = 0;
        items.forEach(item => {
            if (item.sale_price) {
                subtotal += parseFloat(item.sale_price, 10) * item.count;
            } else {
                subtotal += parseFloat(item.price, 10) * item.count;
            }
        });
        return subtotal;
    },
    getTotalWithPromo({ items }) {
        let total = 0;
        items.forEach(item => {
            if (item.hasPromo) {
                if (item.sale_price) {
                    total += parseFloat(item.sale_price, 10) * item.count;
                } else {
                    total += parseFloat(item.price, 10) * item.count;
                }
            }
        });
        return total;
    },
    getTotal({ coupon, giftCertificate }, getters) {
        let total = getters.getSubtotal;
        let totalWithPromo = getters.getTotalWithPromo
        
        if (coupon.rate !== 0) total -= (totalWithPromo * (coupon.rate / 100)).toFixed(2);
        if (giftCertificate.price !== 0) total -= giftCertificate.price;

        return total;
    }
};

export const mutations = {
    SET_LOADING(state, loading) {
        state.loading = loading;
    },

    INCREMENT_COUNT({ items }, id) {
        const index = findItemIndex(items, id);
        items[index].count += 1;
    },

    DECREMENT_COUNT({ items }, id) {
        const index = findItemIndex(items, id);
        if (items[index].count <= 1) return;
        items[index].count -= 1;
    },

    CLEAR_ITEM(state) {
        state.item = {};
    },

    SET_COUPON(state, data) {
        state.coupon = data;
    },

    SET_GIFT_CERTIFICATE(state, data) {
        state.giftCertificate = data;
    }
};

export const actions = {
    addToCookieCart({ commit }, product) {
        const cart = this.$cookies.get("cart");
        commit("SET_LOADING", true);

        if (cart && cart.length) {
            if (!isItemExists(cart, product.id)) {
                this.$cookies.set("cart", [...cart, product], { maxAge: 3600 });
                commit("SET_ITEM", { module: "cart", item: product }, { root: true });
                commit("SET_ITEMS", { module: "cart", items: [...cart, product] }, { root: true });
                setTimeout(() => {
                    commit("SET_LOADING", false);
                }, 200);
            }
        } else {
            this.$cookies.set("cart", [product], { maxAge: 3600 });
            commit("SET_ITEM", { module: "cart", item: product }, { root: true });
            commit("SET_ITEMS", { module: "cart", items: [product] }, { root: true });
            setTimeout(() => {
                commit("SET_LOADING", false);
            }, 200);
        }
    },

    removeFromCookieCart({ commit }, productId) {
        const cart = this.$cookies.get("cart");
        const index = findItemIndex(cart, productId);
        cart.splice(index, 1);
        commit("SET_LOADING", true);

        this.$cookies.set("cart", cart, { maxAge: 3600 });
        commit("SET_ITEMS", { module: "cart", items: cart }, { root: true });
        setTimeout(() => {
            commit("SET_LOADING", false);
        }, 200);
    },

    incrementCookieCount({ state, commit }, productId) {
        commit("INCREMENT_COUNT", productId);
        this.$cookies.set("cart", state.items, { maxAge: 3600 });
    },

    decrementCookieCount({ state, commit }, productId) {
        commit("DECREMENT_COUNT", productId);
        this.$cookies.set("cart", state.items, { maxAge: 3600 });
    },

    addToCart({ rootState, commit }, { productId, qty = 1 }) {
        const { id: userId } = rootState.auth.user;
        commit("SET_LOADING", true);

        return this.$axios
            .post("/cart/add", { productId, qty, userId })
            .then(({ data: res }) => {
                commit("ADD_ITEM", { module: "cart", item: res.data }, { root: true });
                commit("SET_ITEM", { module: "cart", item: res.data }, { root: true });
                commit("SET_LOADING", false);
            })
            .catch(error => {
                commit("SET_LOADING", false);
                return Promise.reject(error);
            });
    },

    incrementCount({ state, commit, dispatch }, productId) {
        commit("SET_LOADING", true, { root: true });
        commit("INCREMENT_COUNT", productId);
        const index = findItemIndex(state.items, productId);

        return dispatch("updateCount", { productId, qty: state.items[index].count })
            .then(() => commit("SET_LOADING", false, { root: true }))
            .catch(() => commit("DECREMENT_COUNT", productId));
    },

    decrementCount({ state, commit, dispatch }, productId) {
        commit("SET_LOADING", true, { root: true });
        commit("DECREMENT_COUNT", productId);
        const index = findItemIndex(state.items, productId);

        return dispatch("updateCount", { productId, qty: state.items[index].count })
            .then(() => commit("SET_LOADING", false, { root: true }))
            .catch(() => commit("INCREMENT_COUNT", productId));
    },

    updateCount({ rootState }, { productId, qty }) {
        const { id: userId } = rootState.auth.user;

        return this.$axios
            .post("/cart/quantity/update", { productId, qty, userId })
            .catch(error => console.log(error));
    },

    removeFromCart({ rootState, commit }, productId) {
        const { id: userId } = rootState.auth.user;
        commit("SET_LOADING", true, { root: true });
        commit("SET_LOADING", true);

        return this.$axios
            .delete(`/cart/${productId}/delete`, { data: { userId } })
            .then(() => {
                commit("SET_LOADING", false);
                commit("SET_LOADING", false, { root: true });
                commit("REMOVE_ITEM", { module: "cart", id: productId }, { root: true });
            })
            .catch(error => {
                commit("SET_LOADING", false);
                commit("SET_LOADING", false, { root: true });
                console.log(error);
            });
    },

    fetchCartItems({ commit }) {
        return this.$axios
            .get("/cart")
            .then(({ data: res }) => {
                const { breadcrumbs, products, taxes } = res.data;

                if (products.length) {
                    commit("SET_ITEMS", { module: "cart", items: products }, { root: true });
                }
                commit("SET_BREADCRUMBS", { module: "cart", items: breadcrumbs }, { root: true });
            })
            .catch(error => console.log(error));
    },

    mergeCartItems(_, items) {
        return this.$axios
            .post("/cart/sync", items)
            .then(() => this.$cookies.remove("cart"))
            .catch(error => console.log(error));
    },

    applyCoupon({ commit }, { coupon, products }) {
        return this.$axios
            .post("/coupon/validate", { code: coupon.toString(), products })
            .then(({ data: res }) => {
                const { promo, products } = res.data;

                commit("SET_COUPON", promo);
                commit("SET_ITEMS", { module: "cart", items: products }, { root: true });
                this.$cookies.set("coupon", coupon);
            })
            .catch(error => Promise.reject(error));
    },

    applyGiftCertificate({ commit }, giftCertificate) {
        return this.$axios
            .post("/gift-certificate/validate", { code: giftCertificate.toString() })
            .then(({ data: res }) => {
                commit("SET_GIFT_CERTIFICATE", res.data);
                this.$cookies.set("gift-certificate", giftCertificate);
            })
            .catch(error => Promise.reject(error));
    },
};
