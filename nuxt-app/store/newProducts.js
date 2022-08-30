export const state = () => ({
    breadcrumbs: [],
    items: [],
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
    fetchProducts({ commit }, { filters = {}, isPage = false }) {
        const url = this.$applyParamsToUrl("/products/new", filters);

        return this.$axios
            .get(url)
            .then(({ data: res }) => {
                const { breadcrumbs, products, pagination } = res.data;

                commit("SET_ITEMS", { module: "newProducts", items: products }, { root: true });
                if (isPage) {
                    commit("SET_PAGINATION", { module: "newProducts", pagination: pagination }, { root: true });
                    commit("SET_BREADCRUMBS", { module: "newProducts", items: breadcrumbs }, { root: true });
                }
            })
            .catch(error => console.log(error));
    }
};
