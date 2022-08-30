<template>
    <div class="fast-by">
        <h4 class="fast-by__title">{{ $t("fast_by.title") }}</h4>
        <div class="fast-by__info">
            <p>{{ $t("fast_by.info") }}</p>
        </div>

        <b-form @submit.prevent="handleFastBuy">
            <div class="phone-input">
                <b-form-input value="+994" disabled />
                <client-only>
                    <the-mask
                        class="form-control"
                        mask="(##)-###-##-##"
                        placeholder="(XX)-XXX-XX-XX"
                        v-model="form.phone"
                        required
                    />
                </client-only>
            </div>
            <div class="text-right">
                <b-button variant="secondary" type="submit">
                    {{ $t("fast_by.submit") }}
                </b-button>
            </div>
        </b-form>
    </div>
</template>

<script>
import { required, minLength } from "vuelidate/lib/validators";

export default {
    props: {
        product: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            pending: false,
            form: {
                phone: "",
            },
        };
    },
    validations: {
        form: {
            phone: {
                required,
                minLength: minLength(9)
            },
        },
    },
    methods: {
        async handleFastBuy() {
            this.$v.form.$touch();

            if (!this.$v.$invalid && !this.pending) {
                try {
                    this.pending = true;
                    await this.$store.dispatch("checkout/fastBuy", {
                        productId: this.product.id,
                        count: this.product.count,
                        phone: this.form.phone,
                    });
                    this.pending = false;
                    this.$bvModal.hide("product-modal");
                    this.$bvModal.show("modal-order-status");
                } catch (error) {
                    this.pending = false;
                    this.$toast.error(this.$t("invalid_credentials"));
                }
            }
        },
    },
};
</script>
