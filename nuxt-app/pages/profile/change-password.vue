<template>
    <section class="page">
        <breadcrumbs :items="breadcrumbs" />

        <b-container fluid>
            <b-row>
                <b-col>
                    <section-header :title="$t('personal_cabinet')" />

                    <div class="centered-container">
                        <div class="form-container">
                            <b-form @submit.prevent="handleChangePassword" @keyup.enter="handleChangePassword">
                                <b-row>
                                    <b-col sm="6">
                                        <b-form-group :label="$t('form.current_password')" label-for="current-password">
                                            <b-form-input
                                                type="password"
                                                id="current-password"
                                                v-model="form.old_password"
                                                :class="{'is-invalid': $v.form.old_password.$error}"
                                            />
                                            <b-form-invalid-feedback v-if="$v.form.old_password.$error">
                                                {{ $t("form_errors.required") }}
                                            </b-form-invalid-feedback>
                                        </b-form-group>
                                    </b-col>

                                    <b-col sm="6">
                                        <b-form-group :label="$t('form.new_password')" label-for="old-password">
                                            <b-form-input
                                                type="password"
                                                id="old-password"
                                                v-model="form.password"
                                                :class="{'is-invalid': $v.form.password.$error}"
                                            />
                                            <b-form-invalid-feedback v-if="$v.form.password.$error">
                                                {{ $t("form_errors.required") }}
                                            </b-form-invalid-feedback>
                                        </b-form-group>
                                    </b-col>

                                    <b-col sm="6">
                                        <b-form-group :label="$t('form.confirm_new_password')" label-for="confirm-new-password">
                                            <b-form-input
                                                type="password"
                                                id="confirm-new-password"
                                                v-model="form.password_confirmation"
                                                :class="{'is-invalid': $v.form.password_confirmation.$error}"
                                            />
                                            <b-form-invalid-feedback v-if="!$v.form.password_confirmation.required">
                                                {{ $t("form_errors.required") }}
                                            </b-form-invalid-feedback>
                                            <b-form-invalid-feedback v-if="!$v.form.password_confirmation.sameAs">
                                                {{ $t("form_errors.passwords_not_match") }}
                                            </b-form-invalid-feedback>
                                        </b-form-group>
                                    </b-col>

                                    <b-col cols="12">
                                        <div class="form-submit">
                                            <b-button
                                                class="go-back"
                                                variant="secondary"
                                                @click="$router.go(-1)"
                                            >
                                                {{ $t("go_back") }}
                                            </b-button>

                                            <b-button
                                                variant="primary"
                                                @click="handleChangePassword"
                                            >
                                                {{ $t("submit") }}
                                            </b-button>
                                        </div>
                                    </b-col>
                                </b-row>
                            </b-form>
                        </div>
                        <!-- Form contained -->
                    </div>
                </b-col>
            </b-row>
        </b-container>
    </section>
</template>

<script>
import { mapState } from "vuex";
import { required, sameAs } from "vuelidate/lib/validators";
import Breadcrumbs from "@/components/layout/Breadcrumbs";
import SectionHeader from "@/components/ui/SectionHeader";

export default {
    name: "change-password-page",
    middleware: ["auth"],
    components: {
        Breadcrumbs,
        SectionHeader
    },
    data() {
        return {
            pending: false,
            form: {
                password: "",
                newPassword: "",
                confirmNewPassword: ""
            }
        }
    },
    validations: {
        form: {
            old_password: {
                required
            },
            password: {
                required
            },
            password_confirmation: {
                required,
                sameAs: sameAs("password")
            }
        }
    },
    computed: {
        ...mapState({
            breadcrumbs: ({ user }) => user.breadcrumbs
        })
    },
    methods: {
        async handleChangePassword() {
            this.$v.form.$touch();

            if (!this.$v.$invalid && !this.pending) {
                try {
                    this.pending = true;
                    await this.$store.dispatch("user/changePassword", this.form);
                    this.$router.push("/profile");
                    this.$toast.success(this.$t("password_updated"));
                } catch (error) {
                    this.pending = false;
                    this.$toast.error(this.$t("wrong_old_password"));
                };
            } else {
                this.$toast.error(this.$t("invalid_credentials"));
            }
        }
    },
    async asyncData({ store }) {
        await store.dispatch("user/getProfileData");
    },
};
</script>
