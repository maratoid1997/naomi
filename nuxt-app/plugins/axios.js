export default function({ app, $axios }) {
    $axios.onRequest(config => {
        config.headers["locale"] = app.i18n.locale;
        config.headers["currency"] = app.store.getters["currency/getCurrency"];
        config.headers['Access-Control-Allow-Origin'] = "*";
    });
}
