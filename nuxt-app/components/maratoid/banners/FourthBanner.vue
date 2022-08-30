<template>
    <section class="fourthBanner">
        <div class="fourthBanner__left">
            <img src="/img/banners/fourthBanner/img_01.png" alt="banner">
        </div>
        <div class="fourthBanner__right">
            <img src="/img/banners/fourthBanner/img_02.png" alt="banner">
        </div>
    </section>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
    .fourthBanner {
        display: flex;
        justify-content: space-between;
        width: 100%;
        height: 170px;
        &__left, &__right {
            width: 660px;
            height: 100%;
            img {
                width: 100%;
                height: 100%;
                border-radius: 10px;
            }
        }
    }
</style>
