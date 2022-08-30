<template>
    <div class="advantages ptb-6">
        <b-container fluid>
            <b-row>
                <b-col xl="3" sm="6">
                    <div class="advantage-item flex">
                        <div class="advantage-item__icon">
                            <img src="~/assets/images/icons/truck.svg" alt="Icon dollar">
                        </div>
                        <div class="advantage-item__info">
                            <h3 class="advantage-item__title">{{ $t("advantages.delivery.title") }}</h3>
                            <p class="advantage-item__subtitle">{{ $t("advantages.delivery.subtitle") }}</p>
                        </div>
                    </div>
                </b-col>

                <b-col xl="3" sm="6">
                    <div class="advantage-item flex">
                        <div class="advantage-item__icon">
                            <img src="~/assets/images/icons/headphones.svg" alt="Icon dollar">
                        </div>
                        <div class="advantage-item__info">
                            <h3 class="advantage-item__title">{{ $t("advantages.support.title") }}</h3>
                            <p class="advantage-item__subtitle">{{ $t("advantages.support.subtitle") }}</p>
                        </div>
                    </div>
                </b-col>

                <b-col xl="3" sm="6">
                    <div class="advantage-item flex">
                        <div class="advantage-item__icon">
                            <img src="~/assets/images/icons/medal.svg" alt="Icon dollar">
                        </div>
                        <div class="advantage-item__info">
                            <h3 class="advantage-item__title">{{ $t("advantages.quality.title") }}</h3>
                            <p class="advantage-item__subtitle">{{ $t("advantages.quality.subtitle") }}</p>
                        </div>
                    </div>
                </b-col>

                <b-col xl="3" sm="6">
                    <div class="advantage-item flex">
                        <div class="advantage-item__icon">
                            <img src="~/assets/images/icons/dollar-circle.svg" alt="Icon dollar">
                        </div>
                        <div class="advantage-item__info">
                            <h3 class="advantage-item__title">{{ $t("advantages.cashback.title") }}</h3>
                            <p class="advantage-item__subtitle">{{ $t("advantages.cashback.subtitle") }}</p>
                        </div>
                    </div>
                </b-col>
            </b-row>
        </b-container>
    </div>
</template>
