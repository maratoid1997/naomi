<template>
    <div class="continueShopping">
        <a class="back" href="#0">
            <img src="/icons/arrow_left.svg" alt="arrow_left">
            <span>Alış verişə davam et</span>
        </a>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
    .continueShopping {
        .back {
            display: flex;
            align-items: center;
            height: 42px;
            padding: 0 30px;
            border: 1px solid rgba(108, 134, 133, 0.7);
            border-radius: 100px;
            text-decoration: none;
            img {
                margin-right: 9px;
            }
            span {
                font-weight: normal;
                line-height: 21px;
                color: #6C8685;
            }
        }
    }
    .cart {
        .continueShopping {
            position: absolute;
            left: 0;
            bottom: 0;
        }
    }
    .blackout {
        .customModal {
            .continueShopping {
                .back > img {
                    order: 2;
                    margin: 0 0 0 9px;
                    transform: rotate(180deg);
                }
            }
        }
    }
</style>
