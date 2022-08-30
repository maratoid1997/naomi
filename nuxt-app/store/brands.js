export const state = () => ({
    items: [],
    breadcrumbs: []
});

export const getters = {
    getBrands(state) {
        return state.items;
    }
};

export const actions = {
    fetchBrands({ commit }) {
        return this.$axios
            .get("/brands")
            .then(({ data: res }) => {
                commit("SET_ITEMS", { module: "brands", items: res.data.brands }, { root: true });
                commit("SET_BREADCRUMBS", { module: "brands", items: res.data.breadcrumbs }, { root: true });
            })
            .catch(error => console.log(error));
    }
};
