<template>
    <div class="currency-switcher">
        <img
            :src="require(`~/assets/images/currencies/${currency}.svg`)"
            alt="Currency icon"
            class="currency-icon"
        />
        <b-dropdown :text="$t('currency_unit')" right>
            <b-dropdown-item v-for="c in currencies" :key="c.id" @click="changeCurrency(c.name)">
                {{ c.name }}
            </b-dropdown-item>
        </b-dropdown>
    </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
    computed: {
        ...mapGetters({
            currencies: "currency/getCurrencies",
            currency: "currency/getCurrency",
        }),
    },
    methods: {
        changeCurrency(currency) {
            this.$store.commit("currency/SET_CURRENCY", currency);
        },
    },
};
</script>
