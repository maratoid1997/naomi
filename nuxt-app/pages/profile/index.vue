<template>
    <section class="page">
        <breadcrumbs :items="breadcrumbs" />

        <b-container fluid>
            <b-row>
                <b-col>
                    <section-header :title="$t('personal_cabinet')" />

                    <div class="centered-container">
                        <ul class="user-details">
                            <li class="user-details__item flex">
                                <div class="user-details__key">{{ $t("form.fullname") }}</div>
                                <div class="user-details__value">{{ $auth.user.fullname || "" }}</div>
                            </li>
                            <li class="user-details__item flex">
                                <div class="user-details__key">{{ $t("form.email") }}</div>
                                <div class="user-details__value">{{ $auth.user.email || "" }}</div>
                            </li>
                            <li class="user-details__item flex">
                                <div class="user-details__key">{{ $t("form.phone_number") }}</div>
                                <div class="user-details__value">{{ $auth.user.phone || "" }}</div>
                            </li>
                            <li
                                class="user-details__item flex"
                                v-for="(address, index) in $auth.user.address"
                                :key="index"
                            >
                                <div class="user-details__key">{{ $t("address") }} {{ index > 0 ? index + 1 : "" }}</div>
                                <div class="user-details__value">{{ address.value }}</div>
                            </li>
                            <li class="user-details__item flex">
                                <div class="user-details__key">{{ $t("form.password") }}</div>
                                <div class="user-details__value" v-if="$auth.user.login_type === 'local'">
                                    <nuxt-link class="edit-password" :to="$localePath('/profile-change-password')">
                                        <i class="icon-pencil"></i>
                                        {{ $t("edit") }}
                                    </nuxt-link>
                                </div>
                            </li>
                        </ul>

                        <div class="edit-user-info">
                            <nuxt-link class="btn btn-primary" :to="$localePath('/profile-edit')">
                                <i class="icon-pencil"></i>
                                {{ $t("edit_information") }}
                            </nuxt-link>
                        </div>
                    </div>
                </b-col>
            </b-row>
        </b-container>
    </section>
</template>

<script>
import { mapState } from "vuex";
import Breadcrumbs from "@/components/layout/Breadcrumbs";
import SectionHeader from "@/components/ui/SectionHeader";

export default {
    name: "profile-page",
    middleware: ["auth"],
    components: {
        Breadcrumbs,
        SectionHeader
    },
    computed: {
        ...mapState({
            breadcrumbs: ({ user }) => user.breadcrumbs
        })
    },
    async asyncData({ store }) {
        await store.dispatch("user/getProfileData");
    },
};
</script>
