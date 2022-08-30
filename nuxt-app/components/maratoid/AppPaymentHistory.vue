<template>
    <div class="appPaymentHistory">
        <table>
            <thead>
                <tr>
                    <th>Məhsul kodu</th>
                    <th>Tarix</th>
                    <th>Ödəniş üsulu</th>
                    <th>Ödəniş statusu</th>
                    <th>Sifariş statusu</th>
                    <th class="sum">Məbləğ</th>
                    <th class="details">Ətraflı</th>
                    <th class="delete">İmtina et</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>888888888</td>
                    <td>23.03.2020</td>
                    <td>Plastik kart</td>
                    <td>Ödəniş qaytarıldı</td>
                    <td>Sifariş hazırlanır</td>
                    <td class="sum">
                        <span>100.000.00</span>
                        <img src="/icons/header/currency_azn.svg" alt="currency_icon">
                    </td>
                    <td class="details">
                        <img src="/icons/details_icon.svg" alt="details_icon">
                    </td>
                    <td class="delete">
                        <img src="/icons/delete_icon.svg" alt="delete_icon">
                    </td>
                </tr>
                <tr>
                    <td>888888888</td>
                    <td>23.03.2020</td>
                    <td>Plastik kart</td>
                    <td>Ödəniş qaytarıldı</td>
                    <td>Sifariş hazırlanır</td>
                    <td class="sum">
                        <span>100.000.00</span>
                        <img src="/icons/header/currency_azn.svg" alt="currency_icon">
                    </td>
                    <td class="details">
                        <img src="/icons/details_icon.svg" alt="details_icon">
                    </td>
                    <td class="delete">
                        <img src="/icons/delete_icon.svg" alt="delete_icon">
                    </td>
                </tr>
                <tr>
                    <td>888888888</td>
                    <td>23.03.2020</td>
                    <td>Plastik kart</td>
                    <td>Ödəniş qaytarıldı</td>
                    <td>Sifariş hazırlanır</td>
                    <td class="sum">
                        <span>100.000.00</span>
                        <img src="/icons/header/currency_azn.svg" alt="currency_icon">
                    </td>
                    <td class="details">
                        <img src="/icons/details_icon.svg" alt="details_icon">
                    </td>
                    <td class="delete">
                        <img src="/icons/delete_icon.svg" alt="delete_icon">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
    .appPaymentHistory {
        table {
            width: 100%;
            border: 1px solid #E9EBEF;
            border-radius: 10px;
            thead {
                font-weight: 500;
                font-size: 20px;
                line-height: 26px;
                color: #363B46;
                tr {
                    border-bottom: 1px solid #E9EBEF;
                    th {
                        width: 255px;
                        padding: 20px;
                        &:first-child {
                            padding: 20px 5px 20px 39px;
                        }
                    }
                    .sum, .details, .delete {
                        text-align: center;
                    }
                }
            }
            tbody {
                tr {
                    //display: flex;
                    border-bottom: 1px solid #E9EBEF;
                    td {
                        //display: flex;
                        //justify-content: space-between;
                        padding: 20px;
                        font-weight: normal;
                        font-size: 20px;
                        line-height: 26px;
                        color: #363B46;
                        //width: 20%;
                        &:first-child {
                            padding: 20px 5px 20px 39px;
                        }
                    }
                    .sum {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        img {
                            margin-left: 8px;
                        }
                    }
                    .details, .delete {
                        text-align: center;
                        img {
                            cursor: pointer;
                        }
                    }
                }
            }
        }
    }

    @media (max-width: 992px) {
        .paymentHistory {
            .appPaymentHistory {
                overflow-x: auto;
                table {
                    width: 970px;
                }
            }
        }
    }
</style>
