<template>
    <footer class="footer">
        <div class="footer-top">
            <b-container fluid>
                <b-row>
                    <b-col lg="3" md="4" sm="6" cols="12">
                        <div class="company-info">
                            <nuxt-link class="logo" :to="$localePath('index')">
                                <img src="~/assets/images/footer-logo.svg" alt="Logo">
                            </nuxt-link>
                            <p class="company-desc" v-if="contacts.companyInfo">
                                {{ contacts.companyInfo }}
                            </p>
                            <ul class="social-links">
                                <li class="social-links__item">
                                    <a
                                        href="https://facebook.com"
                                        rel="noopener"
                                        target="_blank"
                                        aria-label="Facebook"
                                        class="social-links__link"
                                    >
                                        <i class="icon-facebook"></i>
                                    </a>
                                </li>
                                <li class="social-links__item">
                                    <a
                                        href="https://youtube.com"
                                        rel="noopener"
                                        target="_blank"
                                        aria-label="Youtube"
                                        class="social-links__link"
                                    >
                                        <i class="icon-youtube"></i>
                                    </a>
                                </li>
                                <li class="social-links__item">
                                    <a
                                        href="https://twitter.com"
                                        rel="noopener"
                                        target="_blank"
                                        aria-label="Twitter"
                                        class="social-links__link"
                                    >
                                        <i class="icon-twitter"></i>
                                    </a>
                                </li>
                                <li class="social-links__item">
                                    <a
                                        href="https://instagram.com"
                                        rel="noopener"
                                        target="_blank"
                                        aria-label="Instagram"
                                        class="social-links__link"
                                    >
                                        <i class="icon-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </b-col>

                    <b-col lg="3" md="4" sm="6" cols="6">
                        <ul class="footer-links">
                            <li class="footer-links__label">
                                {{ $t("menu") }}
                            </li>
                            <template v-if="menu">
                                <li
                                    v-for="menuItem in menu"
                                    :key="menuItem.id"
                                    class="footer-links__item"
                                >
                                    <nuxt-link
                                        class="footer-links__link"
                                        :to="menuItem.path ? $localePath(menuItem.path) : $localePath('index')"
                                    >
                                        {{ menuItem.name }}
                                    </nuxt-link>
                                </li>
                            </template>
                        </ul>
                    </b-col>

                    <b-col lg="3" md="4" sm="6" cols="6">
                        <ul class="footer-links">
                            <li class="footer-links__label">
                                {{ $t("useful_links") }}
                            </li>
                            <li
                                v-for="page in pages"
                                :key="page.id"
                                class="footer-links__item"
                            >
                                <template v-if="page.path">
                                    <nuxt-link
                                        class="footer-links__link"
                                        :to="$localePath('pages-slug', { slug: page.path.split('/').pop() })"
                                    >
                                        {{ page.name }}
                                    </nuxt-link>
                                </template>
                            </li>
                        </ul>
                    </b-col>
                    
                    <b-col lg="3" md="4" sm="6" cols="6">
                        <ul class="footer-contacts d-none d-sm-block">
                            <li class="footer-contacts__label">
                                {{ $t("contact_info") }}
                            </li>
                            <li class="footer-contacts__item" v-if="contacts.address">
                                <i class="icon-marker"></i>
                                {{ contacts.address }}
                            </li>
                            <li class="footer-contacts__item" v-if="contacts.phone1">
                                <i class="icon-mobile"></i>
                                {{ contacts.phone1 }}
                            </li>
                            <li class="footer-contacts__item" v-if="contacts.phone2">
                                <i class="icon-phone"></i>
                                {{ contacts.phone2 }}
                            </li>
                            <li class="footer-contacts__item" v-if="contacts.email">
                                <i class="icon-mail"></i>
                                {{ contacts.email }}
                            </li>
                        </ul>
                    </b-col>
                </b-row>
            </b-container>
        </div>

        <div class="footer-bottom">
            <b-container fluid>
                <b-row>
                    <b-col>
                        <p class="copyrights">
                            Powered by <strong>Homev</strong>
                        </p>
                    </b-col>

                    <b-col>
                        <div class="card-types flex">
                            <img src="~/assets/images/icons/mastercard.svg" alt="Master card" />
                            <img src="~/assets/images/icons/visa.svg" alt="Visa" />
                        </div>
                    </b-col>
                </b-row>
            </b-container>
        </div>
    </footer>
</template>

<script>
import { mapGetters } from "vuex";

export default {
    computed: {
        ...mapGetters({
            menu: "home/getMenu",
            pages: "home/getPages",
            contacts: "contact/getContacts",
        }),
    },
};
</script>
