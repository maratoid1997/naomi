<template>
    <b-form @change="emitFormData">
        <b-form-group
            :label="$t('payment')"
            label-for="payment"
            class="payment-methods"
        >
            <b-row>
                <b-col sm="6">
                    <div class="payment-method">
                        <input type="radio" id="plastic-card" v-model="form.paymentType" value="1">
                        <label for="plastic-card">
                            {{ $t("payment_method.plastic_card") }}
                            <div class="payment-method__icon">
                                <img src="~/assets/images/icons/plastic-card.png" alt="Plastic card">
                            </div>
                        </label>
                    </div>
                </b-col>

                <b-col sm="6">
                    <div class="payment-method">
                        <input type="radio" id="cash-card" v-model="form.paymentType" value="3">
                        <label for="cash-card">
                            {{ $t("payment_method.cash") }}
                            <div class="payment-method__icon">
                                <img src="~/assets/images/icons/cash.png" alt="Cash">
                            </div>
                        </label>
                    </div>
                </b-col>
            </b-row>
        </b-form-group>
    </b-form>
</template>

<script>
export default {
    data() {
        return {
            form: {
                paymentType: "3"
            }
        };
    },
    computed: {
        isValid() {
            return true;
        }
    },
    methods: {
        emitFormData() {
            this.$emit("stepUpdated", {
                data: this.form,
                valid: this.isValid
            });
        }
    },
    mounted() {
        this.$emit("stepUpdated", {
            data: this.form,
            valid: this.isValid
        });
    }
};
</script>
