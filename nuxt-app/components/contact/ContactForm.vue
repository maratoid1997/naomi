<template>
    <div class="form-container">
        <div class="section-header">
            <h2 class="section-header__title text-center">
                {{ $t("contact_form") }}
            </h2>
        </div>

        <b-form @submit.prevent="handleSubmit">
            <b-row>
                <b-col sm="6">
                    <b-form-group :label="$t('form.fullname')" label-for="fullname">
                        <b-form-input
                            type="text"
                            id="fullname"
                            v-model="form.fullname"
                            :class="{'is-invalid': $v.form.fullname.$error}"
                            autocomplete="off"
                        />
                        <b-form-invalid-feedback v-if="$v.form.fullname.$error">
                            {{ $t("form_errors.required") }}
                        </b-form-invalid-feedback>
                    </b-form-group>
                </b-col>

                <b-col sm="6">
                    <b-form-group :label="$t('form.email')" label-for="email">
                        <b-form-input
                            type="email"
                            id="email"
                            v-model="form.email"
                            :class="{'is-invalid': $v.form.email.$error}"
                            autocomplete="off"
                        />
                        <b-form-invalid-feedback v-if="!$v.form.email.required">
                            {{ $t("form_errors.required") }}
                        </b-form-invalid-feedback>
                        <b-form-invalid-feedback v-if="!$v.form.email.isEmail">
                            {{ $t("form_errors.not_email") }}
                        </b-form-invalid-feedback>
                    </b-form-group>
                </b-col>

                <b-col sm="6">
                    <b-form-group :label="$t('form.phone_number')" label-for="phone">
                        <client-only>
                            <the-mask
                                id="phone"
                                class="form-control"
                                mask="(###)-###-##-##"
                                v-model="form.phone"
                                placeholder="(XXX)-XXX-XX-XX"
                                :class="{'is-invalid': $v.form.phone.$error}"
                                autocomplete="off"
                            />
                        </client-only>
                        <b-form-invalid-feedback v-if="$v.form.phone.$error">
                            {{ $t("form_errors.required") }}
                        </b-form-invalid-feedback>
                    </b-form-group>
                </b-col>

                <b-col sm="6">
                    <b-form-group :label="$t('form.topic')" label-for="status">
                        <b-form-input
                            type="text"
                            id="status"
                            v-model="form.status"
                            autocomplete="off"
                        />
                    </b-form-group>
                </b-col>

                <b-col cols="12">
                    <b-form-group :label="$t('form.message')" label-for="message" >
                        <b-form-textarea
                            id="message"
                            rows="5"
                            v-model="form.message"
                            :class="{'is-invalid': $v.form.message.$error}"
                            autocomplete="off"
                        >
                        </b-form-textarea>
                        <b-form-invalid-feedback v-if="$v.form.message.$error">
                            {{ $t("form_errors.required") }}
                        </b-form-invalid-feedback>
                    </b-form-group>
                </b-col>

                <b-col cols="12">
                    <div class="form-submit">
                        <b-button
                            variant="primary"
                            @click.prevent="handleSubmit"
                        >
                            {{ $t("send") }}
                        </b-button>
                    </div>
                </b-col>
            </b-row>
        </b-form>
    </div>
</template>

<script>
import { required, email, minLength } from "vuelidate/lib/validators";

export default {
    data() {
        return {
            pending: false,
            form: {
                fullname: "",
                email: "",
                phone: "",
                topic: "",
                message: ""
            }
        }
    },
    validations: {
        form: {
            fullname: {
                required
            },
            email: {
                required,
                isEmail: email
            },
            phone: {
                required,
                minLength: minLength(10)
            },
            message: {
                required
            }
        }
    },
    methods: {
        async handleSubmit() {
            this.$v.form.$touch();

            if (!this.$v.$invalid && !this.pending) {
                try {
                    this.pending = true;
                    await this.$store.dispatch("contact/submitContactForm", this.form);
                    this.$toast.success(this.$t("message_sended"));
                    this.resetForm();
                } catch (error) {
                    this.$toast.error(this.$t("invalid_credentials"));
                    this.pending = false;
                }
            } else {
                this.$toast.error(this.$t("invalid_credentials"));
            }
        },

        resetForm() {
            this.form.fullname = "";
            this.form.email = "";
            this.form.phone = "";
            this.form.status = "";
            this.form.message = "";
            this.$v.$reset();
        }
    }
};
</script>
