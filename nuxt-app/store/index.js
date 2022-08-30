import Vue from "vue";
import { findItemIndex } from "./utils";

export const state = () => ({
    loading: false
});

export const mutations = {
    SET_LOADING(state, boolean) {
        state.loading = boolean;
    },

    SET_ITEMS(state, { module, items }) {
        Vue.set(state[module], "items", items);
    },

    SET_ITEM(state, { module, item }) {
        Vue.set(state[module], "item", item);
    },

    SET_BREADCRUMBS(state, { module, items }) {
        state[module].breadcrumbs = items;
    },

    SET_PAGINATION(state, { module, pagination }) {
        state[module].pagination = pagination;
    },

    SET_PAGINATION_PAGE(state, { module, page }) {
        state[module].pagination.current_page = page;
    },

    ADD_ITEM(state, { module, item }) {
        state[module].items.push(item);
    },

    REMOVE_ITEM(state, { module, id }) {
        const index = findItemIndex(state[module].items, id);
        state[module].items.splice(index, 1);
    }
};

export const actions = {
    async nuxtServerInit({ state, commit, dispatch }) {
        // Requests for layout elements
        await dispatch("home/fetchMenu");
        await dispatch("langs/fetchLocales");
        await dispatch("currency/fetchCurrency");
        await dispatch("brands/fetchBrands");
        await dispatch("home/fetchStaticPages");
        await dispatch("contact/fetchContactInfo");

        // Checking for cookies
        const favs = this.$cookies.get("favorites");
        const cart = this.$cookies.get("cart");

        if (!state.auth.loggedIn) {
            favs && commit("SET_ITEMS", { module: "favorites", items: favs });
            cart && commit("SET_ITEMS", { module: "cart", items: cart });
        } else {
            if (favs && favs.length > 0) {
                await dispatch("favorites/mergeFavsItems", favs);
            }

            if (cart && cart.length > 0) {
                await dispatch("cart/mergeCartItems", cart);
            }

            await dispatch("favorites/fetchFavsItems");
            await dispatch("cart/fetchCartItems");
        }
    }
};
