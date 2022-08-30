<template>
    <b-modal centered hide-footer size="xl" id="modal-order-status">
        <div class="order-status flex" :class="{success: approved}">
            <div class="order-status__icon">
                <template v-if="approved">
                    <svg height="384pt" viewBox="0 0 384 384" width="384pt" xmlns="http://www.w3.org/2000/svg">
                        <path d="M192 384c105.863 0 192-86.129 192-192 0-18.273-2.55-36.281-7.602-53.527-2.488-8.48-11.343-13.352-19.847-10.864-8.489 2.48-13.344 11.368-10.864 19.848C349.872 161.785 352 176.777 352 192c0 88.223-71.777 160-160 160S32 280.223 32 192 103.777 32 192 32c32.063 0 62.91 9.375 89.207 27.105 7.32 4.942 17.273 3 22.207-4.32 4.938-7.328 3.012-17.273-4.316-22.21C267.496 11.264 230.465 0 192 0 86.137 0 0 86.129 0 192s86.137 192 192 192zm0 0"/>
                        <path d="M356.688 36.688L192 201.368l-52.688-52.68c-6.25-6.247-16.375-6.247-22.625 0-6.246 6.25-6.246 16.375 0 22.625l64 64C183.817 238.44 187.903 240 192 240s8.184-1.559 11.313-4.688l176-176c6.246-6.25 6.246-16.374 0-22.624-6.25-6.247-16.375-6.247-22.625 0zm0 0"/>
                    </svg>
                </template>
                <template v-else>
                    <svg enable-background="new 0 0 551.13 551.13" height="512" viewBox="0 0 551.13 551.13" width="512" xmlns="http://www.w3.org/2000/svg">
                        <path d="m275.565 0c-151.944 0-275.565 123.621-275.565 275.565s123.621 275.565 275.565 275.565 275.565-123.621 275.565-275.565-123.621-275.565-275.565-275.565zm0 516.685c-132.955 0-241.119-108.164-241.119-241.119s108.164-241.12 241.119-241.12 241.12 108.164 241.12 241.119-108.165 241.12-241.12 241.12z"/>
                        <path d="m360.821 165.955-85.256 85.256-85.256-85.256-24.354 24.354 85.256 85.256-85.256 85.256 24.354 24.354 85.256-85.256 85.256 85.256 24.354-24.354-85.256-85.256 85.256-85.256z"/>
                    </svg>
                </template>
            </div>
            <template v-if="approved">
                <p class="order-status__text">{{ $t("order_accepted") }}</p>
            </template>
            <template v-else>
                <p class="order-status__text">{{ $t("order_declined") }}</p>
            </template>
        </div>
    </b-modal>
</template>

<script>
export default {
    name: "modal-order-status",
    props: {
        status: {
            type: String
        }
    },
    computed: {
        approved() {
            return this.status === "APPROVED";
        }
    }
}
</script>

