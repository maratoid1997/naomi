export const state = () => ({
    items: [
        { name: "azn", rate: 1 },
        { name: "usd", rate: 1.7000 },
        { name: "rub", rate: 0.0233 }
    ],
    selected: "azn"
});

export const getters = {
    getCurrencies({ items }) {
        return items;
    },
    getCurrency({ selected }) {
        return selected;
    },
    getCurrencyId({ items, selected }) {
        const index = items.findIndex(item => item.name == selected);
        return items[index].id;
    }
};

export const mutations = {
    SET_CURRENCIES(state, items) {
        state.items = items;
    },
    SET_CURRENCY(state, currency) {
        state.selected = currency;
    }
};

export const actions = {
    fetchCurrency({ commit }) {
        return this.$axios
            .get("/currency/fetch")
            .then(({ data: res }) => commit("SET_CURRENCIES", res.data))
            .catch(error => console.log(error));
    }
};
