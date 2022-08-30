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
  fetchBrandProducts({ commit }, { brandId, filters = {} }) {
      const url = this.$applyParamsToUrl(`/brands/${brandId}/products`, filters);

      return this.$axios
          .get(url)
          .then(({ data: res }) => {
              const { breadcrumbs, products, pagination } = res.data;

              commit("SET_ITEMS", { module: "brandProducts", items: products }, { root: true });
              commit("SET_PAGINATION", { module: "brandProducts", pagination: pagination }, { root: true });
              commit("SET_BREADCRUMBS", { module: "brandProducts", items: breadcrumbs }, { root: true });
          })
          .catch(error => console.log(error));
  }
};
