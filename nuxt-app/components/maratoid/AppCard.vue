<template>
    <div class="cardTable">
        <table>
            <thead>
                <tr>
                    <th>Məhsulun şəkli</th>
                    <th>Məhsulun adı</th>
                    <th>Model</th>
                    <th>Qiymət + ƏDV</th>
                    <th>Say</th>
                    <th>Məbləğ</th>
                    <th>Sil</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="cardTable__productWrapperImg">
                            <img class="cardTable__productImg" src="/icons/sliderProduct/icon_01.png" alt="product_img">
                        </div>
                    </td>
                    <td>Xüsusi materialdan hazırlanmış məhsul</td>
                    <td>Məhsul 17</td>
                    <td>
                        <div class="cardTable__priceWrapper">
                            <span class="cardTable__price">50.00</span>
                            <img src="/icons/header/currency_azn.svg" alt="currency_icon">
                            <span class="cardTable__vat">+ 2.00</span>
                            <img src="/icons/header/currency_azn.svg" alt="currency_icon">
                        </div>
                    </td>
                    <td>
                        <div class="cardTable__counter">
                            <img src="/icons/minus.svg" alt="minus_icon" @click="counter--">
                            <span>{{counter}}</span>
                            <img src="/icons/plus.svg" alt="plus_icon" @click="counter++">
                        </div>
                    </td>
                    <td>
                        <div class="cardTable__totalSum">
                            <span>52.00</span>
                            <img src="/icons/header/currency_azn.svg" alt="currency_icon">
                        </div>
                    </td>
                    <td>
                        <img class="cardTable__garbage" src="/icons/garbage.svg" alt="garbage_icon">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            counter: 1,
        }
    }
}
</script>

<style lang="scss" scoped>
    .cardTable {
        margin-top: 18px;
        table {
            width: 100%;
            border: 1px solid #E9EBEF;
            border-radius: 10px;
            thead {
                position: relative;
                font-weight: 500;
                font-size: 20px;
                line-height: 26px;
                color: #363B46;
                &:before {
                    content: '';
                    position: absolute;
                    top: 66px;
                    width: 100%;
                    height: 1px;
                    background-color: #E9EBEF;
                }
                tr {
                    th {
                        padding: 20px;
                        &:first-child {
                            padding: 20px 20px 20px 40px;
                        }
                        &:last-child {
                            padding: 20px 40px 20px 20px;
                        }
                    }
                }
            }
            tbody {
                tr {
                    td {
                        font-weight: normal;
                        font-size: 20px;
                        line-height: 26px;
                        color: #363B46;
                        padding: 20px 20px 40px 20px;
                        &:first-child {
                            padding: 20px 20px 40px 40px;
                        }
                        &:last-child {
                            padding: 20px 40px 40px 20px;
                        }
                    }
                }
            }
        }
        &__productWrapperImg {
            width: 140px;
            height: 140px;
            border: 1px solid #E9EBEF;
            border-radius: 10px;
        }
        &__productImg {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        &__priceWrapper {
            display: flex;
            align-items: center;
            img {
                margin-left: 7px;
            }
        }
        &__vat {
            margin-left: 6px;
        }
        &__counter {
            display: flex;
            justify-content: center;
            padding: 7px 4px;
            border: 1px solid #E9EBEF;
            border-radius: 100px;
            span {
                margin: 0 17px;
            }
            img {
                cursor: pointer;
            }
        }
        &__garbage {
            cursor: pointer;
        }
    }

    @media (max-width: 1300px) {
        .cardTable {
            overflow-x: auto;
            table {
                min-width: 1280px;
            }
        }
    }
</style>
