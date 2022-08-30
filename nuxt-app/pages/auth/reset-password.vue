<template>
    <section class="page auth-page">
        <b-container fluid>
            <b-row>
                <b-col>
                    <section-header :title="$t('my_account')" />

                    <div class="centered-container">
                        <div class="form-container">
                            <b-form @submit.prevent="handleUpdatePassword" @keyup.enter="handleUpdatePassword">
                                <b-row>

                                    <b-col sm="6">
                                        <b-form-group :label="$t('form.new_password')" label-for="old-password">
                                            <b-form-input
                                                type="password"
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
                                            <b-button variant="primary" @click="handleUpdatePassword">
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
import { required, sameAs } from "vuelidate/lib/validators";
import SectionHeader from "@/components/ui/SectionHeader";

export default {
    name: "update-password-page",
    components: {
        SectionHeader
    },
    data() {
        return {
            pending: false,
            form: {
                email: "",
                password: "",
                password_confirmation: "",
                token: "",
            }
        }
    },
    validations: {
        form: {
            password: {
                required
            },
            password_confirmation: {
                required,
                sameAs: sameAs("password")
            }
        }
    },
    methods: {
        async handleUpdatePassword() {
            this.$v.form.$touch();

            if (!this.$v.$invalid && !this.pending) {
                try {
                    this.pending = true;
                    await this.$store.dispatch("user/resetPassword", this.form);
                    this.$router.push(this.localeRoute("auth-login"));
                    this.$toast.success(this.$t("password_updated"));
                } catch (error) {
                    this.pending = false;
                    this.$toast.error(this.$t("invalid_credentials"));
                };
            } else {
                this.$toast.error(this.$t("invalid_credentials"));
            }
        }
    },
    mounted() {
        const { email, token } = this.$route.query;
        this.form.email = email;
        this.form.token = token;
    }
};
</script>
