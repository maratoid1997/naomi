<template>
    <div class="contact-details">
        <div class="section-header">
            <h2 class="section-header__title text-center">
                {{ $t("contact_info") }}
            </h2>
        </div>

        <ul class="contact-info">
            <li class="contact-info__item" v-if="contacts.address">
                <i class="icon-marker"></i>
                {{ contacts.address }}
            </li>
            <li class="contact-info__item" v-if="contacts.phone1">
                <i class="icon-mobile"></i>
                {{ contacts.phone1 }}
            </li>
            <li class="contact-info__item" v-if="contacts.phone2">
                <i class="icon-phone"></i>
                {{ contacts.phone2 }}
            </li>
            <li class="contact-info__item" v-if="contacts.email">
                <i class="icon-mail"></i>
                {{ contacts.email }}
            </li>
        </ul>
    </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
    computed: {
        ...mapGetters({
            contacts: "contact/getContacts",
        }),
    },
};
</script>
