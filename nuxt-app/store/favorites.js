import { isItemExists, findItemIndex } from "./utils";

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
    },
    getItemsCount({ items }) {
        return items.length;
    }
};

export const actions = {
    addToCookieFavs({ commit }, product) {
        const favs = this.$cookies.get("favorites");

        if (favs && !isItemExists(favs, product.id)) {
            this.$cookies.set("favorites", [...favs, product], { maxAge: 3600 });
            commit("SET_ITEMS", { module: "favorites", items: [...favs, product] }, { root: true });
        } else {
            this.$cookies.set("favorites", [product], { maxAge: 3600 });
            commit("SET_ITEMS", { module: "favorites", items: [product] }, { root: true });
        }
    },

    removeFromCookieFavs({ commit }, productId) {
        const favs = this.$cookies.get("favorites");
        const index = findItemIndex(favs, productId);
        favs.splice(index, 1);

        this.$cookies.set("favorites", favs, { maxAge: 3600 });
        commit("SET_ITEMS", { module: "favorites", items: favs }, { root: true });
    },

    addToFavs({ rootState, commit }, productId) {
        const { id: userId } = rootState.auth.user;

        return this.$axios
            .post("/wishlist/add", { productId, userId })
            .then(({ data: res }) => {
                commit("ADD_ITEM", { module: "favorites", item: res.data }, { root: true });
            })
            .catch(error => console.log(error));
    },

    removeFromFavs({ rootState, commit }, productId) {
        const { id: userId } = rootState.auth.user;

        return this.$axios
            .delete(`/wishlist/${productId}/delete`, { data: { userId } })
            .then(() => {
                commit("REMOVE_ITEM", { module: "favorites", id: productId }, { root: true })
            })
            .catch(error => console.log(error));
    },

    fetchFavsItems({ commit }, filters = {}) {
        const url = this.$applyParamsToUrl("/wishlist", filters);
        
        return this.$axios
            .get(url)
            .then(({ data: res }) => {
                const { breadcrumbs, products, pagination } = res.data;

                if (products.length) {
                    commit("SET_ITEMS", { module: "favorites", items: products }, { root: true });
                }
                commit("SET_BREADCRUMBS", { module: "favorites", items: breadcrumbs }, { root: true });
                commit("SET_PAGINATION", { module: "favorites", pagination: pagination }, { root: true });
            })
            .catch(error => console.log(error));
    },

    mergeFavsItems(_, items) {
        return this.$axios
            .post("/wishlist/sync", items)
            .then(() => this.$cookies.remove("favorites"))
            .catch(error => console.log(error));
    }
};
