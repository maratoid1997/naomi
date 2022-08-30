export const state = () => ({
    breadcrumbs: [],
    data: {
        storeAddresses: [],
        deliveryTypes: []
    }
});

export const mutations = {
    SET_CHECKOUT_DATA({ data }, { storeAddresses, deliveryTypes }) {
        data.storeAddresses = storeAddresses;
        data.deliveryTypes = deliveryTypes;
    },
};

export const actions = {
    fastBuy({ rootState, commit, dispatch }, { productId, count, phone }) {
        return this.$axios
            .post("/order/store/express", { productId, count, phone })
            .then(() => {
                if (rootState.auth.user) {
                    commit("REMOVE_ITEM", { module: "cart", id: productId }, { root: true });
                } else {
                    dispatch("cart/removeFromCookieCart", productId, { root: true });
                }
            })
            .catch(error => Promise.reject(error));
    },

    regularBuy({ commit }, reqBody) {
        return this.$axios
            .post("/order/store", reqBody)
            .then(({ data: res }) => {
                this.$cookies.remove("coupon");
                this.$cookies.remove("gift-certificate");
                commit("SET_ITEMS", { module: "cart", items: [] }, { root: true });
                return res;
            })
            .catch(error => Promise.reject(error));
    },

    fetchCheckoutData({ commit }) {
        return this.$axios
            .get("/order/checkout")
            .then(({ data: res }) => {
                const { breadcrumbs, storeAddresses, deliveryTypes } = res.data;

                commit("SET_CHECKOUT_DATA", { storeAddresses, deliveryTypes });
                commit("SET_BREADCRUMBS", { module: "checkout", items: breadcrumbs }, { root: true });
            })
            .catch(error => console.log(error));
    }
}
