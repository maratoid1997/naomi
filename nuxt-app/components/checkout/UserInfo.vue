<template>
    <b-form @change="handleChange">
        <b-row>
            <b-col sm="6">
                <b-form-group :label="$t('form.fullname')">
                    <b-form-input
                        type="text"
                        v-model="form.fullname"
                        :class="{'is-invalid': $v.form.fullname.$error}"
                    />
                    <b-form-invalid-feedback v-if="$v.form.fullname.$error">
                        {{ $t("form_errors.required") }}
                    </b-form-invalid-feedback>
                </b-form-group>
            </b-col>
            <b-col sm="6">
                <b-form-group :label="$t('form.email')">
                    <b-form-input
                        type="email"
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
            <b-col sm="6">
                <b-form-group :label="$t('form.phone_number')">
                    <client-only>
                        <the-mask
                            class="form-control"
                            mask="(###)-###-##-##"
                            v-model="form.phone"
                            :class="{'is-invalid': $v.form.phone.$error}"
                            placeholder="(XXX)-XXX-XX-XX"
                        />
                    </client-only>
                    <b-form-invalid-feedback v-if="$v.form.phone.$error">
                        {{ $t("form_errors.required") }}
                    </b-form-invalid-feedback>
                </b-form-group>
            </b-col>

            <b-col sm="6">
                <div class="form-group">
                    <legend class="bv-no-focus-ring col-form-label pt-0">{{ $t('address') }}</legend>

                    <button
                        type="button"
                        class="form-group__action"
                        v-if="user.address.length"
                        v-b-tooltip.hover
                        :title="$t('other_address')"
                        @click="setCustomAddress"
                    >
                        <i class="icon-pencil"></i>
                    </button>
                    
                    <template v-if="user.address.length && !otherAddress">
                        <b-form-select
                            v-model="form.shippingAddress"
                            :options="userAddresses"
                            :class="{'is-invalid': $v.form.shippingAddress.$error}"
                        />
                    </template>
                    <template v-else>
                        <b-form-input
                            ref="custom-address"
                            type="text"
                            v-model="form.shippingAddress"
                            :class="{'is-invalid': $v.form.shippingAddress.$error}"
                        />
                    </template>

                    <b-form-invalid-feedback v-if="$v.form.shippingAddress.$error">
                        {{ $t("form_errors.required") }}
                    </b-form-invalid-feedback>
                </div>
            </b-col>

        </b-row>
    </b-form>
</template>

<script>
import { required, email, minLength } from "vuelidate/lib/validators";

export default {
    props: {
        user: {
            type: Object,
            default: () => ({
                fullname: "",
                email: "",
                phone: "",
                shippingAddress: "",
            })
        }
    },
    data() {
        return {
            otherAddress: false,
            form: {
                ...this.user,
                shippingAddress: this.user.address ? this.user.address[0].value : ""
            },
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
            shippingAddress: {
                required
            }
        }
    },
    computed: {
        isValid() {
            return !this.$v.$invalid;
        },
        userAddresses() {
            if (this.user && this.user.address.length) {
                return this.user.address.map(address => ({
                    text: address.value, value: address.value
                }))
            } else {
                return []
            }
        }
    },
    methods: {
        setCustomAddress() {
            this.otherAddress = !this.otherAddress;

            if (this.otherAddress) {
                this.form.shippingAddress = "";
                this.$nextTick(() => {
                    this.$refs["custom-address"].focus();
                })
            } else {
                this.form.shippingAddress = this.user.address[0].value;
            }

            this.emitFormData();
        },

        handleChange() {
            this.$nextTick(() => {
                this.emitFormData();
            })
        },

        emitFormData() {
            this.$emit("stepUpdated", {
                data: this.form,
                valid: this.isValid
            });
        }
    },
    mounted() {
        this.$auth.user && this.$emit("stepUpdated", {
            data: this.form,
            valid: this.isValid
        });
    }
};
</script>
