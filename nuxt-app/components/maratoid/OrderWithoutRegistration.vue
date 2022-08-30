<template>
    <div class="orderWithoutRegistration">
        <h2 class="orderWithoutRegistration__title">Rəsmiləşdirmə olmadan sifariş</h2>
        <div class="orderWithoutRegistration__descr">
            Əlaqə nömrənizi qeyd edin və bizim məsləhətçi sifarişin rəsmiləşdirilməsi ilə bağlı bütün məsələləri həll edəcək.
        </div>
        <input type="tel">
        <div class="btnWrapper">
            <button>Bir klikə al</button>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
    .orderWithoutRegistration {
        display: flex;
        flex-direction: column;
        width: 300px;
        padding: 24px 21px 29px 21px;
        border: 1px solid #E9EBEF;
        border-radius: 10px;
        &__title {
            font-weight: 500;
            font-size: 18px;
            line-height: 23px;
            color: #363B46;
        }
        &__descr {
            margin-top: 10px;
            font-weight: 300;
            line-height: 21px;
            color: #2A272E;
        }
        input {
            margin-top: 19px;
            border: 1px solid #D8DDE7;
            padding: 0 15px;
            border-radius: 100px;
            outline: none;
        }
        .btnWrapper {
            display: flex;
            justify-content: flex-end;
            margin-top: 15px;
            button {
                font-weight: normal;
                line-height: 21px;
                color: #FFFFFF;
                width: 113px;
                height: 42px;
                background-color: #FFACAC;
                border-radius: 100px;
                border: none;
            }
        }
    }
</style>
