export const state = () => ({
    items: [],
    item: {},
    orderProducts: []
})

export const mutations = {
    SET_ORDER_PRODUCTS(state, items) {
        state.orderProducts = items;
    }
}

export const actions = {
    login(_, formData) {
        return this.$auth.loginWith("local", { data: formData });
    },

    socialLogin({ dispatch }, { strategy, token }) {
        return this.$axios
            .post(`/auth/${strategy}`, { access_token: token })
            .then(async ({ data: res }) => {
                await this.$auth.setStrategy("local");
                await this.$auth.strategy.token.set(res.data.access_token);
                await dispatch("getDetails");
            })
            .catch(error => console.log(error));
    },

    register(_, formData) {
        return this.$axios
            .post("/auth/register", formData)
            .catch(error => Promise.reject(error));
    },

    getDetails(_, token) {
        if (token) {
            return this.$axios
                .get("/auth/details", {
                    headers: { Authorization: `Bearer ${token}` }
                })
                .then(({ data: res }) => {
                    this.$auth.setUser(res.data);
                });
        } else {
            return this.$axios
                .get("/auth/details")
                .then(({ data: res }) => {
                    this.$auth.setUser(res.data);
                });
        }
    },

    updateDetails(_, formData) {
        return this.$axios
            .post("/auth/details/update", formData)
            .then(() => this.$auth.fetchUser())
            .catch(error => Promise.reject(error));
    },

    changePassword(_, formData) {
        return this.$axios
            .post("/auth/password/update", formData)
            .catch(error => Promise.reject(error));
    },

    forgotPassword(_, formData) {
        return this.$axios
            .post("/password/forgot", formData)
            .then(() => Promise.resolve())
            .catch(error => Promise.reject(error));
    },

    resetPassword(_, formData) {
        return this.$axios
            .post("/password/reset", formData)
            .then(() => Promise.resolve())
            .catch(error => Promise.reject(error));
    },

    getProfileData({ commit }) {
        return this.$axios
            .get("/auth/profile")
            .then(({ data: res }) => {
                commit("SET_BREADCRUMBS", { module: "user", items: res.data }, { root: true });
            })
            .catch(error => console.log(error));
    },

    getOrderHistory({ commit }) {
        return this.$axios
            .get("/order/history")
            .then(({ data: res }) => {
                const { breadcrumbs, orders } = res.data;
                commit("SET_BREADCRUMBS", { module: "user", items: breadcrumbs }, { root: true });
                commit("SET_ITEMS", { module: "user", items: orders }, { root: true });
            })
            .catch(error => console.log(error))
    },

    getOrderDetails({ commit }, id) {
        return this.$axios
            .get("/order/history/" + id)
            .then(({ data: res }) => {
                const { breadcrumbs, order, items } = res.data;
                commit("SET_BREADCRUMBS", { module: "user", items: breadcrumbs }, { root: true });
                commit("SET_ITEM", { module: "user", item: order }, { root: true });
                commit("SET_ORDER_PRODUCTS", items);
            })
            .catch(error => console.log(error))
    },

    rejectOrder(_, id) {
        return this.$axios
            .post(`/order/${id}/refund`)
            .then(({ data: res }) => {
                console.log(res.data);
                return Promise.resolve();
            })
            .catch(error => console.log(error))
    }
};
 