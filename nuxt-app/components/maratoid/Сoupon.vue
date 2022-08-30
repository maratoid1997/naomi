<template>
    <div class="coupon">
        <h2 class="coupon__title">Kupon kodu istifadəsi</h2>
        <input type="text" placeholder="Kupon kodunu daxil edin">
        <button>Təsdiqlə</button>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
    .coupon {
        &__title {
            font-weight: 500;
            font-size: 25px;
            line-height: 32px;
            color: #363B46;
            margin-bottom: 0;
        }
        input {
            margin-top: 20px;
            min-width: 307px;
            font-weight: normal;
            line-height: 21px;
            color: rgba(54, 59, 70, 0.4);
            padding: 9.5px 20px;
            border: 1px solid #D8DDE7;
            border-radius: 100px;
            outline: none;
        }
        button {
            margin-left: 24px;
            font-weight: normal;
            line-height: 21px;
            padding: 10.5px 25px;
            color: #FFFFFF;
            background-color: #6C8685;
            border-radius: 100px;
            border: none;
            outline: none;
        }
    }

    @media (max-width: 1420px) {
        .cart {
            &__footer {
                &-left {
                    .coupon {
                        width: 630px;
                        input {
                            width: 70%;
                            min-width: unset;
                        }
                    }
                }
            }
        }
    }
    @media (max-width: 460px) {
        .cart {
            &__footer {
                &-left {
                    .coupon {
                        button {
                            margin-left: 10px;
                        }
                    }
                }
            }
        }
    }
    @media (max-width: 410px) {
        .cart {
            &__footer {
                &-left {
                    .coupon {
                        input {
                            width: 60%;
                        }
                    }
                }
            }
        }
    }
</style>
