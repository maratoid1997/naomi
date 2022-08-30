import Vue from 'vue'
import YmapPlugin from 'vue-yandex-maps'

const settings = {
    apiKey: "887ea9ff-33c3-41ae-8fac-3545136a39ee",
    lang: 'ru_RU',
    version: "2.1"
};

Vue.use(YmapPlugin, settings);
