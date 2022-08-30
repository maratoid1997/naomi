export default ({ app, store }, inject) => {
    inject("localePath", (url = "", params = {}, query = {}) => {
        return app.localePath({ name: url.replace("/", ""), params, query }, app.i18n.locale);
    });

    inject("calculatePrice", (price) => {
        const currencies = store.getters["currency/getCurrencies"];
        const selected = store.getters["currency/getCurrency"];
        const index = currencies.findIndex(currency => currency.name == selected);
        let result = (price / currencies[index].rate);
        
        return `${result.toFixed(2)} <i class="icon-${selected}"></i>`;
    });

    inject("calculatePercent", (price, percent) => {
        const currencies = store.getters["currency/getCurrencies"];
        const selected = store.getters["currency/getCurrency"];
        const index = currencies.findIndex(currency => currency.name == selected);
        let result = (price / currencies[index].rate) * (percent / 100);
        
        return `${result.toFixed(2)} <i class="icon-${selected}"></i>`;
    });

    inject("applyParamsToUrl", (url, query) => {
        if (query) {
            let queryEntities = "";
            url.indexOf("?") == -1 ? (url += "?") : (url += "&");

            Object.keys(query).forEach(key => {
                if (Array.isArray(query[key]) && query[key].length > 0) {
                    query[key].forEach(subkey => {
                        queryEntities += `${key}[]=${subkey}&`;
                    })
                } else {
                    if (query[key].length != 0) {
                        queryEntities += `${key}=${query[key]}&`;
                    }
                }
            });

            if (queryEntities.slice(-1) === "&") {
                queryEntities = queryEntities.slice(0, -1);
            }

            return url + queryEntities;
        }

        return url;
    });
};
