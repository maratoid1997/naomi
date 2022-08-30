<template>
    <div class="myInformation">
        <div class="myInformation__left">
            <ul class="myInformation__list">
                <li class="myInformation__list-item">
                    <span class="myInformation__list-key">Ad, Soyad</span>
                    <span class="myInformation__list-value">Rəşid Rəşidov</span>
                </li>
                <li class="myInformation__list-item">
                    <span class="myInformation__list-key">Email</span>
                    <span class="myInformation__list-value">info@info.az</span>
                </li>
                <li class="myInformation__list-item">
                    <span class="myInformation__list-key">Nömrə</span>
                    <span class="myInformation__list-value">+994 50 444 44 44</span>
                </li>
                <li class="myInformation__list-item">
                    <span class="myInformation__list-key">Ünvan</span>
                    <span class="myInformation__list-value">Ağ şəhər ofis binası, AZ1025 Baku</span>
                </li>
                <li class="myInformation__list-item">
                    <span class="myInformation__list-key">Şifrə</span>
                    <span class="myInformation__list-value">
                        <img class="myInformation__list-edit" src="/icons/edit_icon.svg" alt="edit_icon">
                        Düzəliş et
                    </span>
                </li>
            </ul>
            <div class="myInformation__edit">
                <img src="/icons/edit_icon-white.svg" alt="edit_icons">
                <span>Məlumatlara düzəliş et</span>
            </div>
        </div>
        <div class="myInformation__right">
            <ul class="myInformation__list">
                <li class="myInformation__list-item">
                    <span class="myInformation__list-key">Ballarım</span>
                    <span class="myInformation__list-value">10</span>
                </li>
                <li class="myInformation__list-item">
                    <span class="myInformation__list-key">Status</span>
                    <span class="myInformation__list-value status">Bronze</span>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
    .myInformation {
        display: flex;
        justify-content: space-between;
        &__left {
            position: relative;
            width: 49%;
            padding: 36px 40px;
            border: 1px solid #E9EBEF;
            border-radius: 10px;
        }
        &__right {
            width: 49%;
            padding: 36px 40px;
            border: 1px solid #E9EBEF;
            border-radius: 10px;
            height: max-content;
        }
        &__list {
            list-style: none;
            margin-bottom: 0;
            &-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding-bottom: 15px;
                border-bottom: 1px solid #E9EBEF;
                & + .myInformation__list-item {
                    margin-top: 15px;
                }
                &:last-child {
                    padding-bottom: 0;
                    border-bottom: none;
                }
            }
            &-key {
                font-size: 18px;
                line-height: 23px;
                color: #363B46;
                opacity: 0.7;
            }
            &-value {
                font-weight: normal;
                font-size: 18px;
                line-height: 23px;
                color: #363B46;
                &.status {
                    color: #CD7F32;
                }
            }
            &-edit {
                margin-right: 8px;
            }
        }
        &__edit {
            position: absolute;
            right: 0;
            bottom: -68px;
            display: flex;
            align-items: center;
            padding: 10.5px 21.5px;
            font-weight: normal;
            line-height: 21px;
            color: #FFFFFF;
            background-color: #6C8685;
            border-radius: 100px;
            cursor: pointer;
            img {
                margin-right: 10px;
            }
        }
    }

    @media (max-width: 992px) {
        .personalArea {
            .myInformation {
                position: relative;
                flex-direction: column;
                &__left,  &__right {
                    width: 100%;
                }
                &__left {
                    position: unset;
                    margin-bottom: 30px;
                }
            }
        }
    }
    @media (max-width: 500px) {
        .personalArea {
            .myInformation {
                &__left, &__right {
                    padding: 20px;
                }
                &__list {
                    &-key {
                        padding-right: 20px;
                    }
                    &-value {
                        text-align: right;
                    }
                }
            }
        }
    }
</style>
