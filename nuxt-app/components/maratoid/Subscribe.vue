<template>
    <section class="subscribe">
        <div class="subscribe__left">
            <div class="subscribe__left-first">
                <div class="subscribe__left-first-title">Xəbərlər</div>
                <div class="subscribe__left-first-subtitle">Abunə ol</div>
            </div>
            <div class="subscribe__left-second">
                <div class="subscribe__left-second-text">Günlük yeniliklərdən xəbərdar olmaq üçün abunə olun</div>
            </div>
        </div>
        <div class="subscribe__right">
            <div class="searchInputWrapper">
                <input class="searchInput" type="text" placeholder="Axtar">
                <button class="searchInputIconWrapper">
                    <svg class="searchInputIcon" width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.1 0.890497C10.0515 0.838356 9.99299 0.796491 9.92798 0.767385C9.86296 0.73828 9.79277 0.722527 9.72155 0.72106C9.65033 0.719593 9.57955 0.732443 9.51339 0.758847C9.44724 0.785251 9.38706 0.824672 9.33642 0.874771C9.28579 0.92487 9.24573 0.984628 9.21862 1.0505C9.19151 1.11637 9.17791 1.18702 9.17862 1.25824C9.17933 1.32947 9.19434 1.39983 9.22275 1.46515C9.25116 1.53047 9.2924 1.58942 9.34402 1.6385L13.177 5.4715H0.529024C0.459396 5.47123 0.390405 5.48477 0.326039 5.51132C0.261673 5.53787 0.203206 5.57692 0.154018 5.6262C0.10483 5.67548 0.065895 5.73402 0.0394632 5.79844C0.0130314 5.86285 -0.000373295 5.93187 2.3577e-05 6.0015C-0.000635735 6.07153 0.0125388 6.141 0.0387915 6.20593C0.0650441 6.27086 0.103858 6.32996 0.153007 6.37985C0.202155 6.42974 0.260671 6.46944 0.325198 6.49667C0.389724 6.52389 0.45899 6.53811 0.529024 6.5385H13.178L9.34502 10.3645C9.24679 10.4658 9.19185 10.6014 9.19185 10.7425C9.19185 10.8836 9.24679 11.0192 9.34502 11.1205C9.39435 11.1707 9.45318 11.2106 9.51808 11.2378C9.58298 11.265 9.65265 11.279 9.72302 11.279C9.7934 11.279 9.86307 11.265 9.92797 11.2378C9.99287 11.2106 10.0517 11.1707 10.101 11.1205L14.842 6.3795C14.8921 6.33093 14.9319 6.2728 14.9591 6.20855C14.9863 6.14431 15.0003 6.07526 15.0003 6.0055C15.0003 5.93574 14.9863 5.86668 14.9591 5.80244C14.9319 5.7382 14.8921 5.68007 14.842 5.6315L10.1 0.890497Z" fill="#6C8685"/>
                    </svg>
                </button>
            </div>
        </div>
    </section>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
    .subscribe {
        display: flex;
        margin-top: 50px;
        width: 100%;
        height: 120px;
        padding: 28px 115px;
        background-color: #F8ECEC;
        &__left {
            display: flex;
            width: 50%;
            height: 100%;
            &-first {
                padding-right: 50px;
                border-right: 1px solid #FFFFFF;
                &-title {
                    font-weight: normal;
                    font-size: 20px;
                    line-height: 26px;
                    color: #6C8685;
                    opacity: 0.7;
                }
                &-subtitle {
                    font-weight: 500;
                    font-size: 26px;
                    line-height: 33px;
                    color: #363B46;
                }
            }
            &-second {
                display: flex;
                align-items: center;
                padding-left: 50px;
                &-text {
                    font-weight: normal;
                    font-size: 18px;
                    line-height: 23px;
                    color: rgba(54, 59, 70, 0.7);
                }
            }
        }
        &__right {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            width: 50%;
            height: 100%;
            .searchInputWrapper {
                .searchInput {
                    width: 392px;
                }
                svg {
                    path {
                        fill: #FFFFFF;
                    }
                }
            }
        }
    }

    @media (max-width: 1200px) {
        .subscribe {
            padding: 28px 45px;
        }
    }
    @media (max-width: 1024px) {
        .subscribe {
            padding: 28px 15px;
            &__right {
                .searchInputWrapper {
                    .searchInput {
                        width: 350px;
                    }
                }
            }
        }
    }
    @media (max-width: 992px) {
        .subscribe {
            &__left {
                &-first {
                    padding-right: 30px;
                }
                &-second {
                    padding-left: 30px;
                }
            }
            &__right {
                .searchInputWrapper {
                    .searchInput {
                        width: 300px;
                    }
                }
            }
        }
    }
    @media (max-width: 820px) {
        .subscribe {
            flex-direction: column;
            height: 190px;
            &__left {
                justify-content: center;
                width: 100%;
            }
            &__right {
                justify-content: center;
                margin-top: 40px;
                width: 100%;
                .searchInputWrapper {
                    .searchInput {
                        width: 342px;
                    }
                }
            }
        }
    }
    @media (max-width: 375px) {
        .subscribe {
            &__right {
                .searchInputWrapper {
                    .searchInputIconWrapper {
                        width: 34px;
                        .searchInputIcon {
                            width: 13px;
                            height: 10px;
                        }
                    }
                }
            }
        }
    }
</style>
