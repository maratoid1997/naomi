<template>
    <div class="paymentHistory">
        <div class="container">
            <app-payment-history/>
        </div>
    </div>
</template>

<script>
import AppPaymentHistory from "@/components/maratoid/AppPaymentHistory";

export default {
    components: {
        AppPaymentHistory
    }
}
</script>

<style lang="scss" scoped>
    .paymentHistory {
        margin-top: 18px;
    }

    @media (max-width: 1200px) {
        .paymentHistory {
            .container {
                max-width: 1175px;
            }
        }
    }
</style>
