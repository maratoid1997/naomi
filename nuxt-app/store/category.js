export const state = () => ({
    data: {
        breadcrumbs: [],
        subCategories: [],
        products: [],
        filters: {},
        banners: {},
        pagination: {
            total_count: 60, // count of all data
            current_page: 1, // current page number
            total_pages: 10, // number of pages to show in pagination
            per_page: 25 // number of data to show in one page
        }
    }
});

export const getters = {
    getSubcategories({ data }) {
        return data.subCategories;
    },
    getProducts({ data }) {
        return data.products;
    },
    getFilters({ data }) {
        return data.filters;
    }
};

export const mutations = {
    SET_CATEGORY_DATA(state, data) {
        state.data = data;
    },
    SET_PRODUCTS({ data }, products) {
        data.products = products;
    },
    SET_FILTERS({ data }, filters) {
        data.filters = filters;
    },
    SET_BANNERS({ data }, banners) {
        data.banners = banners
    },
    SET_PAGE({ data }, page) {
        data.pagination.current_page = page;
    }
};

export const actions = {
    fetchCategoryData({ commit, dispatch }, slug) {
        return this.$axios
            .get(`/categories/${slug}`)
            .then(({ data: res }) => {
                const { slugs } = res.data;

                commit("SET_CATEGORY_DATA", res.data);
                dispatch(
                    "i18n/setRouteParams",
                    {
                        az: { category: slugs.az },
                        ru: { category: slugs.ru },
                        en: { category: slugs.en }
                    },
                    { root: true }
                );
            })
            .catch(error => Promise.reject(error));
    },

    fetchFilteredCategoryData({ commit }, filter) {
        const url = this.$applyParamsToUrl("/filter", filter);
        commit("SET_LOADING", true, { root: true });

        return this.$axios
            .get(url)
            .then(({ data: res }) => {
                const { products, filters, banners, pagination } = res.data;

                if (filters) {
                    commit("SET_FILTERS", filters);
                }
                commit("SET_PRODUCTS", products);
                commit("SET_BANNERS", banners)
                commit("SET_LOADING", false, { root: true });
                commit("SET_PAGINATION", { module: "category", pagination: pagination }, { root: true });
            })
            .catch(error => {
                commit("SET_LOADING", false, { root: true });
                console.log(error);
            });
    }
};
