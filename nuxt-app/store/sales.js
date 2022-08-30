export const state = () => ({
    items: [],
    breadcrumbs: [],
    pagination: {
        total_count: 60, // count of all data
        current_page: 1, // current page number
        total_pages: 10, // number of pages to show in pagination
        per_page: 25 // number of data to show in one page
    }
});

export const getters = {
    getItems({ items }) {
        return items;
    }
};

export const actions = {
    fetchProducts({ commit }, filters = {}) {
        const url = this.$applyParamsToUrl("/products/sale", filters);

        return this.$axios
            .get(url)
            .then(({ data: res }) => {
                const { breadcrumbs, products, pagination } = res.data;

                commit("SET_ITEMS", { module: "sales", items: products }, { root: true });
                commit("SET_PAGINATION", { module: "sales", pagination: pagination }, { root: true });
                commit("SET_BREADCRUMBS", { module: "sales", items: breadcrumbs }, { root: true });
            })
            .catch(error => console.log(error));
    }
};
