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
    fetchProducts({ commit }, isPage = false) {
        return this.$axios
            .get("/products/new")
            .then(({ data: res }) => {
                const { breadcrumbs, products, pagination } = res.data;

                commit("SET_ITEMS", { module: "bestSellingProds", items: products }, { root: true });
                if (isPage) {
                    commit("SET_PAGINATION", { module: "bestSellingProds", pagination: pagination }, { root: true });
                    commit("SET_BREADCRUMBS", { module: "bestSellingProds", items: breadcrumbs }, { root: true });
                }
            })
            .catch(error => console.log(error));
    }
};
