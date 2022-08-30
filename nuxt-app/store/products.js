export const state = () => ({
    breadcrumbs: [],
    details: {},
    similar: [],
    tags: []
});

export const getters = {
    getProduct({ details }) {
        return details;
    },
    getSimilarProducts({ similar }) {
        return similar;
    },
    getTags({ tags }) {
        return tags;
    }
};

export const mutations = {
    SET_PRODUCT(state, product) {
        state.details = product;
    },

    SET_SIMILAR_PRODUCTS(state, products) {
        state.similar = products;
    },

    SET_TAGS(state, tags) {
        state.tags = tags;
    },

    INCREMENT_COUNT({ details }) {
        details.count += 1;
    },

    DECREMENT_COUNT({ details }) {
        if (details.count <= 1) return;
        details.count -= 1;
    }
};

export const actions = {
    fetchProductDetails({ commit, dispatch }, slug) {
        return this.$axios
            .get(`/products/${slug}`)
            .then(({ data: res }) => {
                const { slugs, breadcrumbs, details, tags } = res.data;

                commit("SET_BREADCRUMBS", { module: "products", items: breadcrumbs }, { root: true });
                commit("SET_PRODUCT", details);
                commit("SET_TAGS", tags);
                dispatch("i18n/setRouteParams",
                    {
                        az: {
                            category: slugs.az.split("/")[0],
                            slug: slugs.az.split("/")[1]
                        },
                        ru: {
                            category: slugs.ru.split("/")[0],
                            slug: slugs.ru.split("/")[1]
                        },
                        en: {
                            category: slugs.en.split("/")[0],
                            slug: slugs.en.split("/")[1]
                        }
                    },
                    { root: true }
                );
            })
            .catch(error => console.log(error));
    },

    fetchSimilarProducts({ commit }, { category, slug }) {
        return this.$axios
            .post("/products/similar", {
                parentCategorySlug: category,
                productSlug: slug
            })
            .then(({ data: res }) => {
                commit("SET_SIMILAR_PRODUCTS", res.data);
            })
            .catch(error => console.log(error));
    }
};
