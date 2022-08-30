<template>
    <section class="page auth-page">
        <b-container fluid>
            <b-row>
                <b-col>
                    <section-header :title="$t('my_account')" />

                    <div class="centered-container">
                        <div class="form-container">
                            <b-form @submit.prevent="handleForgotPassword" @keyup.enter="handleForgotPassword">
                                <b-row>
                                    <b-col cols="12">
                                        <b-form-group :label="$t('form.email')" label-for="email">
                                            <b-form-input
                                                type="email"
                                                id="email"
                                                v-model="form.email"
                                                :class="{'is-invalid': $v.form.email.$error}"
                                            />
                                            <b-form-invalid-feedback v-if="!$v.form.email.required">
                                                {{ $t("form_errors.required") }}
                                            </b-form-invalid-feedback>
                                            <b-form-invalid-feedback v-if="!$v.form.email.isEmail">
                                                {{ $t("form_errors.not_email") }}
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
                                                @click="handleForgotPassword"
                                            >
                                                {{ $t("send") }}
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
import { required, email } from "vuelidate/lib/validators";
import SectionHeader from "@/components/ui/SectionHeader";

export default {
    name: "change-password-page",
    components: {
        SectionHeader
    },
    data() {
        return {
            pending: false,
            form: {
                email: ""
            }
        }
    },
    validations: {
        form: {
            email: {
                required,
                isEmail: email
            },
        }
    },
    computed: {
        ...mapState({
            breadcrumbs: (state) => state.auth.user.breadcrumbs
        })
    },
    methods: {
        async handleForgotPassword() {
            this.$v.form.$touch();

            if (!this.$v.$invalid && !this.pending) {
                try {
                    this.pending = true;
                    await this.$store.dispatch("user/forgotPassword", this.form);
                    this.$toast.success(this.$t("check_email"));
                } catch (error) {
                    this.pending = false;
                    this.$toast.error(this.$t("invalid_credentials"));
                }
            } else {
                this.$toast.error(this.$t("invalid_credentials"));
            }
        }
    }
};
</script>
