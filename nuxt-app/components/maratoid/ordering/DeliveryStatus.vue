<template>
    <div class="deliveryStatus">
        <ul class="deliveryStatus__list">
            <li class="deliveryStatus__list-item active">
                <div class="deliveryStatus__list-number">1</div>
                <div class="deliveryStatus__list-text">Şəxsi məlumat</div>
            </li>
            <li class="deliveryStatus__list-item">
                <div class="deliveryStatus__list-number">2</div>
                <div class="deliveryStatus__list-text">Çatdırılma</div>
            </li>
            <li class="deliveryStatus__list-item">
                <div class="deliveryStatus__list-number">3</div>
                <div class="deliveryStatus__list-text">Ödəniş</div>
            </li>
            <li class="deliveryStatus__list-item">
                <div class="deliveryStatus__list-number">4</div>
                <div class="deliveryStatus__list-text">Bonuslar və endirimlər</div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
    .deliveryStatus {
        display: flex;
        justify-content: center;
        &__list {
            display: flex;
            list-style: none;
            margin-bottom: 0;
            &-item {
                display: flex;
                align-items: center;
                flex-direction: column;
                width: 100px;
                &.active {
                    .deliveryStatus__list-number {
                        color: #FFFFFF;
                        border: none;
                        background-color: #FFACAC;
                    }
                    .deliveryStatus__list-text {
                        color: #FFACAC;
                    }
                }
                & + .deliveryStatus__list-item {
                    margin-left: 55px;
                }
                &:last-child {
                    .deliveryStatus__list-number {
                        &::after {
                            display: none;
                        }
                    }
                }
            }
            &-number {
                position: relative;
                display: flex;
                justify-content: center;
                align-items: center;
                width: 50px;
                height: 50px;
                font-weight: 500;
                font-size: 22px;
                line-height: 28px;
                color: #D8DDE7;
                border-radius: 100%;
                border: 1px solid #D8DDE7;
                &:after {
                    content: '';
                    position: absolute;
                    top: 50%;
                    transform: translateY(-50%);
                    right: -90px;
                    width: 78px;
                    height: 2px;
                    background-color: #D8DDE7;
                }
            }
            &-text {
                margin-top: 14px;
                font-weight: normal;
                font-size: 18px;
                line-height: 23px;
                text-align: center;
                color: #D8DDE7;
            }
        }
    }

    @media (max-width: 620px) {
        .ordering {
            .deliveryStatus {
                &__list {
                    &-item {
                        display: none;
                        &.active {
                            display: flex;
                        }
                        & + .deliveryStatus__list-item {
                            margin-left: 0;
                        }
                    }
                    &-number {
                        &:after {
                            display: none;
                        }
                    }
                }
            }
        }
    }
</style>
