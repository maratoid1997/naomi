<template>
    <div class="drawer d-lg-none">
        <div class="drawer__body">
            <search-block />

            <div class="drawer-actions flex">
                <div class="drawer-actions__left">
                    <ul class="langs text-uppercase">
                        <li v-for="lang in langs" :key="lang.code">
                            <a :href="switchLocalePath(lang.code)" :class="{ active: lang.code == $i18n.locale }">
                                {{ lang.code }}
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="drawer-actions__right">
                    <ul class="currencies text-uppercase">
                        <li
                            :key="c.id"
                            v-for="c in currencies"
                            :class="{ active: currency == c.name }"
                            @click="changeCurrency(c.name)"
                        >
                            {{ c.name }}
                        </li>
                    </ul>
                </div>
            </div>

            <mobile-menu :menuTree="menuTree" />
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import SearchBlock from "@/components/ui/SearchBlock";
import MobileMenu from "@/components/ui/MobileMenu";

export default {
    components: {
        SearchBlock,
        MobileMenu,
    },
    props: {
        menuTree: {
            type: Array,
            default: () => [],
        },
    },
    computed: {
        ...mapGetters({
            langs: "langs/getLocales",
            currency: "currency/getCurrency",
            currencies: "currency/getCurrencies",
        }),
    },
    methods: {
        changeCurrency(currency) {
            this.$store.commit("currency/SET_CURRENCY", currency);
        },
    },
};
</script>
