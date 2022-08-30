export const state = () => ({
    items: [
        { id: 1, code: "azn" },
        { id: 2, code: "usd" },
        { id: 3, code: "rub" }
    ],
    selected: "azn"
});

export const getters = {
    getLocales({ items }) {
        return items;
    },
};

export const actions = {
    fetchLocales({ commit }) {
        return this.$axios
            .get("/settings/locales")
            .then(({ data: res }) => {
                commit("SET_ITEMS", { module: "langs", items: res.data }, { root: true })
            })
            .catch(error => console.log(error));
    }
};