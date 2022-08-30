<template>
    <div class="ordering">
        <div class="container">
            <div class="ordering__head">
                <delivery-status/>
            </div>

            <div class="ordering__main">
                <div class="ordering__left">
                    <order-user/>
                </div>

                <div class="ordering__right">
                    <order-data/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import DeliveryStatus from "@/components/maratoid/ordering/DeliveryStatus";
import OrderUser from "@/components/maratoid/ordering/OrderUser";
import OrderData from "@/components/maratoid/ordering/OrderData";

export default {
    components: {
        DeliveryStatus,
        OrderUser,
        OrderData
    }
}
</script>

<style lang="scss" scoped>
    .ordering {
        margin-top: 19px;
        &__left {
            width: 49%;
        }
        &__right {
            width: 49%;
        }
        &__main {
            display: flex;
            justify-content: space-between;
            margin-top: 35px;
        }
    }

    @media (max-width: 1200px) {
        .ordering {
            .container {
                max-width: 1175px;
            }
        }
    }
    @media (max-width: 992px) {
        .ordering {
            &__main {
                flex-direction: column;
            }
            &__left, &__right {
                width: 100%;
            }
            &__right {
                margin-top: 30px;
            }
        }
    }
</style>
