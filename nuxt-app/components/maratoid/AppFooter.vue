<template>
    <footer class="footer">
        <div class="footer__head">
            <div class="footer__info">
                <h2 class="footer__title">Məlumat</h2>
                <ul class="footer__info-list">
                    <li class="footer__info-list-item">
                        <a class="footer__info-list-link" href="#0">Əlaqə</a>
                    </li>
                    <li class="footer__info-list-item">
                        <a class="footer__info-list-link" href="#0">Filial</a>
                    </li>
                    <li class="footer__info-list-item">
                        <a class="footer__info-list-link" href="#0">Xüsusi</a>
                    </li>
                    <li class="footer__info-list-item">
                        <a class="footer__info-list-link" href="#0">Saytın xəritəsi</a>
                    </li>
                    <li class="footer__info-list-item">
                        <a class="footer__info-list-link" href="#0">Bloq</a>
                    </li>
                </ul>
            </div>
            <div class="footer__additionally">
                <h2 class="footer__title">Əlavə</h2>
                <ul class="footer__additionally-list">
                    <li class="footer__additionally-list-item">
                        <a class="footer__additionally-list-link" href="#0">Brendlər</a>
                    </li>
                    <li class="footer__additionally-list-item">
                        <a class="footer__additionally-list-link" href="#0">Hədiyyələr</a>
                    </li>
                    <li class="footer__additionally-list-item">
                        <a class="footer__additionally-list-link" href="#0">Brendlər</a>
                    </li>
                    <li class="footer__additionally-list-item">
                        <a class="footer__additionally-list-link" href="#0">Hədiyyələr</a>
                    </li>
                    <li class="footer__additionally-list-item">
                        <a class="footer__additionally-list-link" href="#0">Brendlər</a>
                    </li>
                </ul>
            </div>
            <div class="footer__myAccount">
                <h2 class="footer__title">Hesabım</h2>
                <ul class="footer__myAccount-list">
                    <li class="footer__myAccount-list-item">
                        <a class="footer__myAccount-list-link" href="#0">Hesabım</a>
                    </li>
                    <li class="footer__myAccount-list-item">
                        <a class="footer__myAccount-list-link" href="#0">Sifarişlərim</a>
                    </li>
                    <li class="footer__myAccount-list-item">
                        <a class="footer__myAccount-list-link" href="#0">Seçilmişlər</a>
                    </li>
                    <li class="footer__myAccount-list-item">
                        <a class="footer__myAccount-list-link" href="#0">Xəbərlər</a>
                    </li>
                    <li class="footer__myAccount-list-item">
                        <a class="footer__myAccount-list-link" href="#0">Məlumatlar</a>
                    </li>
                </ul>
            </div>
            <div class="footer__contactInformation">
                    <h2 class="footer__title">Əlaqə məlumatları</h2>
                    <ul class="footer__contactInformation-list">
                        <li class="footer__contactInformation-list-item">
                            <a class="footer__contactInformation-list-link" href="#0">
                                <img src="/icons/footer/icon_01.svg" alt="icon">
                                <span>Ağ şəhər ofis binası, AZ1025 Baku</span>
                            </a>
                        </li>
                        <li class="footer__contactInformation-list-item">
                            <a class="footer__contactInformation-list-link" href="#0">
                                <img src="/icons/footer/icon_02.svg" alt="icon">
                                <span>+994 50 444 44 44</span>
                            </a>
                        </li>
                        <li class="footer__contactInformation-list-item">
                            <a class="footer__contactInformation-list-link" href="#0">
                                <img src="/icons/footer/icon_03.svg" alt="icon">
                                <span>+1 916 444 44 44</span>
                            </a>
                        </li>
                        <li class="footer__contactInformation-list-item">
                            <a class="footer__contactInformation-list-link" href="#0">
                                <img src="/icons/footer/icon_04.svg" alt="icon">
                                <span>info@homev.az</span>
                            </a>
                        </li>
                    </ul>
                </div>
        </div>
        <div class="footer__bottom">
            <div class="footer__bottom-social">
                <ul class="footer__bottom-list">
                    <li class="footer__bottom-list-item">
                        <a class="footer__bottom-list-link" href="#0">
                            <img src="/icons/footer/fb.svg" alt="">
                        </a>
                    </li>
                    <li class="footer__bottom-list-item">
                        <a class="footer__bottom-list-link" href="#0">
                            <img src="/icons/footer/youtube.svg" alt="">
                        </a>
                    </li>
                    <li class="footer__bottom-list-item">
                        <a class="footer__bottom-list-link" href="#0">
                            <img src="/icons/footer/twitter.svg" alt="">
                        </a>
                    </li>
                    <li class="footer__bottom-list-item">
                        <a class="footer__bottom-list-link" href="#0">
                            <img src="/icons/footer/google.svg" alt="">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer__bottom-copyright">Powered by Naomi</div>
            <div class="footer__bottom-plasticCards">
                <img src="/icons/footer/master_card.svg" alt="card_icon">
                <img src="/icons/footer/visa_card.svg" alt="card_icon">
            </div>
        </div>
    </footer>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
    .footer {
        width: 100%;
        padding: 40px 243px 28px 115px;
        background-color: #6C8685;
        &__head {
            display: flex;
            justify-content: space-between;
            padding-bottom: 40px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        &__title {
            font-weight: 500;
            font-size: 22px;
            line-height: 28px;
            color: #F8ECEC;
            margin-bottom: 23px;
        }
        ul {
            list-style: none;
            margin-bottom: 0;
            li {
                & + li {
                    margin-top: 17px;
                }
                a {
                    font-weight: normal;
                    font-size: 18px;
                    line-height: 23px;
                    color: #FFFFFF;
                    img {
                        margin-right: 15px;
                    }
                }
            }
        }
        &__bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 26px 0 0 0;
            &-list {
                display: flex;
                align-items: center;
                &-item {
                    & + .footer__bottom-list-item {
                        margin-top: 0;
                        margin-left: 20px;
                    }
                }
            }
            &-copyright {
                font-weight: normal;
                font-size: 18px;
                line-height: 23px;
                color: #FFFFFF;
            }
            &-plasticCards {
                img {
                    & + img {
                        margin-left: 25px;
                    }
                }
            }
        }
    }

    @media (max-width: 1440px) {
        .footer {
            padding: 40px 115px 28px 115px;
        }
    }

    @media (max-width: 1200px) {
        .footer {
            padding: 40px 80px 28px 80px;
        }
    }

    @media (max-width: 1024px) {
        .footer {
            padding: 40px 40px 28px 40px;
            &__head {
                flex-wrap: wrap;
            }
            &__info {
                &-list {
                    &-item {
                        padding: 0 10px;
                    }
                }
            }
            &__head > div {
                width: 50%;
                &:nth-child(3), &:nth-child(4) {
                    margin-top: 100px;
                }
            }
        }
    }

    @media (max-width: 666px) {
        .footer {
            &__head {
                flex-wrap: unset;
                flex-direction: column;
            }
            &__head > div {
                width: 100%;
                & + div {
                    margin-top: 50px !important;
                }
            }
            &__info {
                &-list {
                    &-item {
                        padding: 0;
                    }
                }
            }
            &__bottom {
                flex-direction: column;
            }
            &__bottom > div {
                &:nth-child(2) {
                    order: 3;
                    margin-top: 30px;
                }
                &:nth-child(3) {
                    order: 2;
                    margin-top: 30px;
                }
            }
        }
    }

</style>
