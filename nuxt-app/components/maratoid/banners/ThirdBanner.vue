<template>
    <section class="thirdBanner">
        <img src="/img/banners/thirdBanner/img.jpg" alt="banner_img">
    </section>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
    .thirdBanner {
        display: flex;
        margin-top: 50px;
        width: 100%;
        height: 404px;
        padding: 0 115px;
        img {
            width: 100%;
            border-radius: 10px;
        }
    }

    @media (max-width: 1920px) {
        .thirdBanner {
            padding: 0 45px;
        }
    }
    @media (max-width: 1600px) {
        .thirdBanner {
            height: 350px;
        }
    }
    @media (max-width: 1200px) {
        .thirdBanner {
            height: 300px;
        }
    }
    @media (max-width: 1024px) {
        .thirdBanner {
            padding: 0 15px;
        }
    }
    @media (max-width: 900px) {
        .thirdBanner {
            height: 270px;
        }
    }
    @media (max-width: 768px) {
        .thirdBanner {
            height: 250px;
        }
    }
    @media (max-width: 630px) {
        .thirdBanner {
            height: 230px;
        }
    }
    @media (max-width: 555px) {
        .thirdBanner {
            height: 210px;
        }
    }
    @media (max-width: 470px) {
        .thirdBanner {
            height: 190px;
        }
    }
    @media (max-width: 425px) {
        .thirdBanner {
            height: 170px;
        }
    }
</style>
