<template>
    <div class="sumDetails">
        <ul class="sumDetails__list">
            <li class="sumDetails__list-item">
                <span class="sumDetails__info">Sub-Total</span>
                <span class="sumDetails__price">
                    52.00
                    <img src="/icons/header/currency_azn.svg" alt="currency_icon">
                </span>
            </li>
            <li class="sumDetails__list-item">
                <span class="sumDetails__info">Eco Tax (-2.00)</span>
                <span class="sumDetails__price">
                    2.00
                    <img src="/icons/header/currency_azn.svg" alt="currency_icon">
                </span>
            </li>
            <li class="sumDetails__list-item">
                <span class="sumDetails__info">VAT (20%)</span>
                <span class="sumDetails__price">
                    10.00
                    <img src="/icons/header/currency_azn.svg" alt="currency_icon">
                </span>
            </li>
            <li class="sumDetails__list-item">
                <span class="sumDetails__info">Kupon</span>
                <span class="sumDetails__price">
                    -2.00
                    <img src="/icons/header/currency_azn.svg" alt="currency_icon">
                </span>
            </li>
            <li class="sumDetails__list-item">
                <span class="sumDetails__info">Hədiyyə sertifikatı</span>
                <span class="sumDetails__price">
                    -2.00
                    <img src="/icons/header/currency_azn.svg" alt="currency_icon">
                </span>
            </li>
            <li class="sumDetails__list-item">
                <span class="sumDetails__info">Total</span>
                <span class="sumDetails__price">
                    58.00
                    <img src="/icons/header/currency_azn.svg" alt="currency_icon">
                </span>
            </li>
        </ul>
        <div class="sumDetails__footer">
            <button>Sifarişi rəsmiləşdir</button>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
    .sumDetails {
        width: 432px;
        padding: 21px 25px 25px 25px;
        border: 1px solid #E9EBEF;
        border-radius: 10px;
        &__list {
            list-style: none;
            margin-bottom: 0;
            &-item {
                display: flex;
                justify-content: space-between;
                padding-bottom: 21px;
                border-bottom: 1px solid #E9EBEF;
                & + .sumDetails__list-item {
                    margin-top: 21px;
                }
            }
        }
        &__price {
            display: flex;
            align-items: center;
            img {
                margin-left: 7px;
            }
        }
        &__footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 26px;
        }
        button {
            font-weight: normal;
            line-height: 21px;
            color: #FFFFFF;
            padding: 10.5px 25px;
            background-color: #6C8685;
            border-radius: 100px;
            border: none;
            outline: none;
        }
    }
</style>
