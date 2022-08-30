export default {
    methods: {
        async applyCoupon() {
            this.$v.form1.$touch();

            if (!this.$v.form1.$invalid && !this.pending) {
                try {
                    this.pending = true;
                    await this.$store.dispatch("cart/applyCoupon", {
                        coupon: this.form1.coupon,
                        products: this.products
                    });
                    this.pending = false;
                    
                    if (this.hasProductInPromo) {
                        this.$toast.success(this.$t("coupon_applied"));
                    } else {
                        this.$toast.error(this.$t("no_product_in_promo"));
                    }
                } catch (error) {
                    this.pending = false;
                    if (error.response.status === 429) {
                        this.$toast.error(this.$t("too_many_requests"));
                    } else {
                        this.$toast.error(this.$t("coupon_expired"));
                    }
                }
            } else {
                this.$toast.error(this.$t("coupon_required"));
            }
        },

        async applyGiftCertificate() {
            this.$v.form2.$touch();

            if (!this.$v.form2.$invalid && !this.pending) {
                try {
                    this.pending = true;
                    await this.$store.dispatch("cart/applyGiftCertificate", this.form2.giftCertificate);
                    this.pending = false;
                    this.$toast.success(this.$t("gift_certificate_applied"));
                } catch (error) {
                    this.pending = false;
                    if (error.response.status === 429) {
                        this.$toast.error(this.$t("too_many_requests"));
                    } else {
                        this.$toast.error(this.$t("gift_certificate_expired"));
                    }
                }
            } else {
                this.$toast.error(this.$t("gift_certificate_required"));
            }
        },
    }
}