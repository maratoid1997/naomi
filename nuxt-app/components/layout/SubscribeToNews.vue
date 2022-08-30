<template>
    <div class="subscribe-to-rss">
        <b-container fluid>
            <b-row>
                <b-col md="6">
                    <div class="subscribe-info">
                        <div class="subscribe-info__label">
                            <p>{{ $t("subscribe.title") }}</p>
                            <h3>{{ $t("subscribe.subtitle") }}</h3>
                        </div>
                        <div class="subscribe-info__details">
                            <p>{{ $t("subscribe.details") }}</p>
                        </div>
                    </div>
                </b-col>

                <b-col md="6">
                    <b-form class="subscribe-form" @submit.prevent="handleSubscribe">
                        <b-form-input
                            type="email"
                            v-model="form.email"
                            :placeholder="$t('subscribe.placeholder')"
                        />
                        <button
                            type="submit"
                            class="btn subscribe-form__submit"
                            aria-label="Subscribe to news"
                        >
                            <i class="icon-arrow-right"></i>
                        </button>
                    </b-form>
                </b-col>
            </b-row>
        </b-container>
    </div>
</template>

<script>
import { required, email } from "vuelidate/lib/validators";

export default {
    data() {
        return {
            form: {
                email: "",
            },
        };
    },
    validations: {
        form: {
            pending: false,
            email: {
                required,
                isEmail: email,
            },
        },
    },
    methods: {
        handleSubscribe() {
            this.$v.form.$touch();

            if (!this.$v.$invalid && !this.pending) {
                this.pending = true;
                this.$store
                    .dispatch("home/subscribe", this.form)
                    .then(() => {
                        this.$toast.success(this.$t("email_saved"));
                        this.resetForm();
                    });
            } else {
                this.$toast.error(this.$t("form_errors.email_required"));
            }
        },

        resetForm() {
            this.form.email = "";
            this.pending = false;
            this.$v.$reset();
        },
    },
};
</script>
