<template>
    <div class="lang-switcher">
        <img
            :src="require(`~/assets/images/flags/${$i18n.locale}.svg`)"
            :alt="$i18n.locale"
            class="lang-flag"
        />
        <b-dropdown :text="$t('lang_selection')" right>
            <a
                v-for="locale in locales"
                :key="locale.code"
                :href="switchLocalePath(locale.code)"
            >
                {{ locale.code }}
            </a>
        </b-dropdown>
    </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
    computed: {
        ...mapGetters({
            langs: "langs/getLocales"
        }),
        locales() {
            return this.langs.filter((lang) => {
                return lang.code !== this.$i18n.locale;
            });
        },
    },
};
</script>
