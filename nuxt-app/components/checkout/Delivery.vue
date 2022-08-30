<template>
    <b-form @change="handleChange">
        <b-row>
            <b-col cols="12">
                <b-form-group :label="$t('delivery')" label-for="delivery">
                    <b-form-radio-group v-model="form.deliveryType.id" class="radio-group">
                        <b-form-radio
                            v-for="type in deliveryTypes"
                            :key="type.id"
                            :value="type.value"
                        >
                            {{ type.text }}
                        </b-form-radio>
                    </b-form-radio-group>
                </b-form-group>
            </b-col>

            <b-col sm="6">
                <b-form-group :label="$t('store_address')" label-for="address">
                    <b-form-select
                        v-model="form.storeAddressId"
                        :options="storeAddresses"
                        id="address"
                        :disabled="disableAddress"
                    />
                </b-form-group>
            </b-col>
        </b-row>
    </b-form>
</template>

<script>
import { mapState } from "vuex";

export default {
    data() {
        return {
            form: {
                deliveryType: {
                    id: 3,
                },
                storeAddressId: null,
            },
        };
    },
    computed: {
        ...mapState({
            deliveryTypes: (state) => state.checkout.data.deliveryTypes,
            storeAddresses: (state) => state.checkout.data.storeAddresses,
        }),
        selectedDelivery() {
            const index = this.deliveryTypes.findIndex(item => item.value == this.form.deliveryType.id);
            return this.deliveryTypes[index];
        },
        isValid() {
            if (this.selectedDelivery.self && this.form.storeAddressId == null) {
                return false;
            } else {
                return true;
            }
        },
        disableAddress() {
            return !this.selectedDelivery.self;
        },
    },
    methods: {
        handleChange() {
            if (!this.selectedDelivery.self) {
                this.form.storeAddressId = null;
            }

            this.$nextTick(() => {
                this.emitFormData();
            });
        },
        
        emitFormData() {
            this.$emit("stepUpdated", {
                data: {
                    deliveryType: {
                        id: this.form.deliveryType.id,
                        price: this.selectedDelivery.price,
                    },
                    storeAddressId: this.form.storeAddressId
                },
                valid: this.isValid,
            });
        },
    },
    mounted() {
        this.$emit("stepUpdated", {
            data: {
                deliveryType: {
                    id: this.form.deliveryType.id,
                    price: this.selectedDelivery.price,
                },
                storeAddressId: this.form.storeAddressId
            },
            valid: this.isValid,
        });
    },
};
</script>
