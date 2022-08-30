<template>
    <div class="registration">
        <div class="container">
            <app-authorization/>
        </div>
    </div>
</template>

<script>
import AppAuthorization from "@/components/maratoid/AppAuthorization";

export default {
    components: {
        AppAuthorization
    }
}
</script>

<style lang="scss" scoped>
    .registration {
        margin-top: 18px;
    }

    @media (max-width: 992px) {
        .registration {
            .container {
                max-width: 992px;
            }
        }
    }
</style>
