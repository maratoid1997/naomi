export const state = () => ({
    cities: []
})

export const getters = {
    getCities({ cities }) {
        return cities.map((city) => ({
            text: city.name,
            value: city.id
        }))
    }
}

export const mutations = {
    SET_CITIES(state, cities) {
        state.cities = cities;
    }
}

export const actions = {
    fetchCities({ commit }) {
        return this.$axios
            .get("/settings/cities")
            .then(({ data: res }) => {
                commit("SET_CITIES", res.data);
            })
            .catch(error => console.log(error))
    }
}