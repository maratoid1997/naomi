export const state = () => ({
    item: {
        address: "",
        phone1: "",
        phone2: "",
        email: ""
    }
});

export const getters = {
    getContacts({ item }) {
        return item;
    }
};

export const actions = {
    fetchContactInfo({ commit }) {
        return this.$axios
            .get("/contact")
            .then(({ data: res }) => {
                const { breadcrumbs, page } = res.data;
                
                commit("SET_ITEM", { module: "contact", item: page }, { root: true });
                commit("SET_BREADCRUMBS", { module: "contact", items: breadcrumbs }, { root: true });
            })
            .catch(error => console.log(error));
    },

    submitContactForm(_, formData) {
        return this.$axios
            .post("/application-form/send", formData)
            .catch(error => console.log(error))
    }
};
