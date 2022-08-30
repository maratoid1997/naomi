<template>
    <section class="page">
        <breadcrumbs :items="breadcrumbs" />

        <b-container fluid>
            <b-row>
                <b-col>
                    <section-header :title="$t('personal_cabinet')" />

                    <div class="centered-container">
                        <div class="form-container">
                            <b-form @submit.prevent="handleEdit" @keyup.enter="handleEdit">
                                <b-row>
                                    <b-col sm="6">
                                        <b-form-group :label="$t('form.fullname')" label-for="fullname">
                                            <b-form-input
                                                type="text"
                                                id="fullname"
                                                v-model="form.fullname"
                                                :class="{'is-invalid': $v.form.fullname.$error}"
                                            />
                                            <b-form-invalid-feedback v-if="$v.form.fullname.$error">
                                                {{ $t("form_errors.required") }}
                                            </b-form-invalid-feedback>
                                        </b-form-group>
                                    </b-col>

                                    <b-col sm="6">
                                        <b-form-group :label="$t('form.phone_number')" label-for="phone">
                                            <client-only>
                                                <the-mask
                                                    class="form-control"
                                                    mask="(###)-###-##-##"
                                                    placeholder="(XXX)-XXX-XX-XX"
                                                    v-model="form.phone"
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
                                        <b-form-group :label="$t('address')">
                                            <multiple-text-field
                                                :fields="form.address"
                                                :isInvalid="$v.form.address.$error"
                                                @add-field="handleAddField"
                                                @remove-field="handleRemoveField"
                                                @field-update="handleFieldUpdate"
                                            />
                                        </b-form-group>
                                    </b-col>

                                    <b-col sm="6">
                                        <b-form-group :label="$t('city')">
                                            <b-form-select
                                                class="form-control"
                                                v-model="form.city_id"
                                                :options="cities"
                                                :class="{'is-invalid': $v.form.city_id.$error}"
                                            />
                                            <b-form-invalid-feedback v-if="$v.form.city_id.$error">
                                                {{ $t("form_errors.required") }}
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
                                                type="submit"
                                                variant="primary"
                                            >
                                                {{ $t("submit") }}
                                            </b-button>
                                        </div>
                                    </b-col>
                                </b-row>
                            </b-form>
                        </div>
                    </div>
                </b-col>
            </b-row>
        </b-container>
    </section>
</template>

<script>
import { mapState, mapGetters } from "vuex";
import { required } from "vuelidate/lib/validators";
import Breadcrumbs from "@/components/layout/Breadcrumbs";
import SectionHeader from "@/components/ui/SectionHeader";
import MultipleTextField from "@/components/ui/MultipleTextField";

export default {
    name: "edit-info-page",
    middleware: ["auth"],
    components: {
        Breadcrumbs,
        SectionHeader,
        MultipleTextField
    },
    data() {
        return {
            pending: false,
            form: {
                fullname: this.$auth.user.fullname || "",
                phone: this.$auth.user.phone || "",
                city_id: this.$auth.user.city_id || "",
                address: [...this.$auth.user.address],
            }
        }
    },
    validations: {
        form: {
            fullname: { required },
            phone: { required },
            city_id: { required },
            address: { 
                $each: {
                    value: { required }
                }
            }
        }
    },
    computed: {
        ...mapState({
            breadcrumbs: ({ user }) => user.breadcrumbs
        }),
        ...mapGetters({
            cities: "settings/getCities"
        })
    },
    methods: {
        handleAddField() {
            this.form.address.push({ value: "" });
        },

        handleRemoveField(index) {
            this.form.address.splice(index, 1);
        },

        handleFieldUpdate({ value, index }) {
            this.form.address[index].value = value;
        },

        async handleEdit() {
            this.$v.form.$touch();

            if (!this.$v.$invalid && !this.pending) {
                try {
                    this.pending = true;
                    await this.$store.dispatch("user/updateDetails", this.form);
                    this.$router.push("/profile");
                    this.$toast.success(this.$t("details_updated"));
                } catch (error) {
                    this.pending = false;
                    this.$toast.error(this.$t("invalid_credentials"));
                };
            } else {
                this.$toast.error(this.$t("invalid_credentials"));
            }
        }
    },
    async asyncData({ store }) {
        await Promise.all([
            store.dispatch("user/getProfileData"),
            store.dispatch("settings/fetchCities")
        ])
    },
};
</script>
