export const state = () => ({
    menu: [],
    hero: [],
    banners: {
        small: [],
        medium: [],
        large: []
    },
    pages: []
});

export const getters = {
    getMenu({ menu }) {
        return menu;
    },
    getPages({ pages }) {
        return pages;
    },
    getHero({ hero }) {
        return hero;
    },
    getBanners({ banners }) {
        return banners;
    }
};

export const mutations = {
    SET_MENU(state, data) {
        state.menu = data;
    },
    SET_PAGES(state, data) {
        state.pages = data;
    },
    SET_HERO(state, data) {
        state.hero = data;
    },
    SET_BANNERS(state, data) {
        state.banners = data
    }
};

export const actions = {
    fetchMenu({ commit }) {
        return this.$axios
            .get("/settings/header")
            .then(({ data: res }) => {
                commit("SET_MENU", res.data);
            })
            .catch(error => console.log(error));
    },

    fetchStaticPages({ commit }) {
        return this.$axios
            .get("/pages")
            .then(({ data: res }) => {
                commit("SET_PAGES", res.data);
            })
            .catch(error => console.log(error));
    },

    fetchHeroSlider({ commit }) {
        return this.$axios
            .get("/hero-slider")
            .then(({ data: res }) => commit("SET_HERO", res.data))
            .catch(error => console.log(error));
    },

    fetchBanners({ commit }) {
        return this.$axios
            .get("/banners")
            .then(({ data: res }) => commit("SET_BANNERS", res.data))
            .catch(error => console.log(error))
    },

    subscribe(_, formData) {
        return this.$axios
            .post("/campaigns/email/store", formData)
            .catch(error => console.log(error));
    }
};
