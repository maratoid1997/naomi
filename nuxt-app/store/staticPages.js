export const state = () => ({
  breadcrumbs: [],
  item: {
    name: "",
    body: ""
  }
});

export const getters = {
  getPageContent({ item }) {
    return item;
  }
};

export const actions = {
  fetchShippingInfo({ commit }) {
    return this.$axios
      .get("/shipping-payment")
      .then(({ data: res }) => {
          const { breadcrumbs, page } = res.data;
          
          commit("SET_ITEM", { module: "staticPages", item: page }, { root: true });
          commit("SET_BREADCRUMBS", { module: "staticPages", items: breadcrumbs }, { root: true });
      })
      .catch(error => console.log(error));
  },

  fetchPageContent({ commit, dispatch }, slug) {
    return this.$axios
      .get(`/pages/${slug}`)
      .then(({ data: res }) => {
          const { breadcrumbs, page, slugs } = res.data;

          dispatch(
            "i18n/setRouteParams",
            {
              az: { slug: slugs.az.split("/").pop() },
              ru: { slug: slugs.ru.split("/").pop() },
              en: { slug: slugs.en.split("/").pop() }
            },
            { root: true }
          );
          commit("SET_ITEM", { module: "staticPages", item: page }, { root: true });
          commit("SET_BREADCRUMBS", { module: "staticPages", items: breadcrumbs }, { root: true });
      })
      .catch(error => console.log(error));
  },
};