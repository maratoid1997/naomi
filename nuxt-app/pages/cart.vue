<template>
    <div class="cart">
        <div class="container">
            <div class="cart__head">
                <app-card/>
            </div>
            <div class="cart__footer">
                <div class="cart__footer-left">
                    <coupon/>
                    <gift-certificate/>
                    <continue-shopping/>
                </div>
                <div class="cart__footer-right">
                    <sum-details/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AppCard from "@/components/maratoid/AppCard";
import Coupon from "@/components/maratoid/Сoupon"
import GiftCertificate from "@/components/maratoid/GiftCertificate";
import SumDetails from "@/components/maratoid/SumDetails";
import ContinueShopping from "@/components/maratoid/ContinueShopping";

export default {
    components: {
        AppCard,
        Coupon,
        GiftCertificate,
        SumDetails,
        ContinueShopping,
    }
}
</script>

<style lang="scss" scoped>
    .cart {
        &__footer {
            display: flex;
            justify-content: space-between;
            margin-top: 42px;
            &-left {
                position: relative;
                display: flex;
            }
        }
        .giftCertificate {
            margin-left: 100px;
        }
    }

    @media (max-width: 1455px) {
        .cart {
            &__footer {
                &-left {
                    .giftCertificate {
                        margin-left: 50px;
                    }
                }
            }
        }
    }
    @media (max-width: 1420px) {
        .cart {
            &__footer {
                &-left {
                    flex-direction: column;
                    .giftCertificate {
                        margin: 50px 0 0 0;
                    }
                }
            }
        }
    }
    @media (max-width: 1200px) {
        .cart {
            .container {
                max-width: 1135px;
            }
        }
    }
    @media (max-width: 1100px) {
        .cart {
            &__footer {
                position: relative;
                flex-direction: column;
                padding-bottom: 100px;
                &-left {
                    position: unset;
                    .giftCertificate {
                        margin: 30px 0 0 0;
                    }
                }
                &-right {
                    margin-top: 50px;
                    .sumDetails {
                        width: 100%;
                    }
                }
            }
        }
    }
    @media (max-width: 666px) {
        .cart {
            &__footer {
                &-left {
                    .coupon {
                        width: 100%;
                    }
                    .giftCertificate {
                        width: 100%;
                    }
                }
            }
        }
    }
    @media (max-width: 460px) {
        .cart {
            &__footer {
                &-left {
                    .coupon, .giftCertificate {
                        button {
                            margin-left: 5px;
                        }
                    }
                }
            }
        }
    }
</style>
