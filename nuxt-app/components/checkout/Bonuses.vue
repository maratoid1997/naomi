<template>
    <b-form @input="emitFormData">
        <b-row>
            <b-col sm="6">
                <inline-form
                    class="iconed"
                    :label="$t('coupon')"
                    v-model="form1.coupon"
                    :hasError="$v.form1.coupon.$error"
                    @formSubmitted="applyCoupon"
                >
                    <i class="icon-check"></i>
                </inline-form>
            </b-col>

            <b-col sm="6">
                <inline-form
                    class="iconed"
                    :label="$t('gift_certificate')"
                    v-model="form2.giftCertificate"
                    :hasError="$v.form2.giftCertificate.$error"
                    @formSubmitted="applyGiftCertificate"
                >
                    <i class="icon-check"></i>
                </inline-form>
            </b-col>
        </b-row>
    </b-form>
</template>

<script>
import { mapGetters } from "vuex";
import { required } from "vuelidate/lib/validators";
import Bonuses from "@/mixins/bonuses";

import InlineForm from "@/components/ui/InlineForm";

export default {
    mixins: [Bonuses],
    components: {
        InlineForm
    },
    data() {
        return {
            pending: false,
            form1: {
                coupon: "",
            },
            form2: {
                giftCertificate: "",
            },
        }
    },
    validations: {
        form1: {
            coupon: {
                required,
            },
        },
        form2: {
            giftCertificate: {
                required,
            },
        },
    },
    computed: {
        ...mapGetters({
            products: "cart/getItems",
        }),
        isValid() {
            return true;
        }
    },
    methods: {
        emitFormData() {
            this.$emit("stepUpdated", {
                data: {
                    couponId: 12,
                    certificateId: 14
                },
                valid: this.isValid
            });
        }
    }
};
</script>
