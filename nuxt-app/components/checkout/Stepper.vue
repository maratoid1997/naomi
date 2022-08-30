<template>
    <div class="stepper flex">
        <div class="stepper__item flex" :class="{ active: activeStep == 1 }">
            <div class="stepper__num">
                <span>1</span>
            </div>
            <div class="stepper__label">
                {{ $t("personal_info") }}
            </div>
        </div>

        <div class="stepper__item flex" :class="{ active: activeStep == 2 }">
            <div class="stepper__num">
                <span>2</span>
            </div>
            <div class="stepper__label">
                {{ $t("delivery") }}
            </div>
        </div>

        <div class="stepper__item flex" :class="{ active: activeStep == 3 }">
            <div class="stepper__num">
                <span>3</span>
            </div>
            <div class="stepper__label">
                {{ $t("bonuses_and_discounts") }}
            </div>
        </div>

        <div class="stepper__item flex" :class="{ active: activeStep == 4 }">
            <div class="stepper__num">
                <span>4</span>
            </div>
            <div class="stepper__label">
                {{ $t("payment") }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        activeStep: {
            type: Number,
            default: 1,
        },
    },
};
</script>
