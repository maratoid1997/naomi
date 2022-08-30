<template>
    <section class="products">
        <bread-crumb/>
        <h2 class="products__title">Kateqoriyalar</h2>
        <slider-product-mini/>
        <div class="products__wrapper">
            <div class="container">
                <div class="products__content">
                    <div class="products__content-left">
                        <filters-app/>
                    </div>
                    <div class="products__content-right">
                        <div class="products__content-right-head">
                            <h2 class="products__content-title">Məhsullar</h2>
                        </div>
                        <div class="products__content-right-main">
                            <products v-for="(item, i) in products" :product="item" :key="i"/>
                            <third-banner/>
<!--                            <products v-for="i in 8" :key="'_'+i"/>-->
<!--                            <fourth-banner/>-->
<!--                            <products v-for="i in 4" :key="'_'+i"/>-->
                        </div>
                    </div>
                </div>
                <custom-modals v-model="modalActive" :class="{'active' : modalActive === true}"/>
            </div>
        </div>
    </section>
</template>

<script>
import SliderProductMini from "@/components/maratoid/sliders/SliderProductMini";
import FiltersApp from "@/components/maratoid/FiltersApp";
import Products from "@/components/maratoid/products/Product";
import ThirdBanner from "@/components/maratoid/banners/ThirdBanner";
import FourthBanner from "@/components/maratoid/banners/FourthBanner";
import CustomModals from "@/components/maratoid/modals/CustomModals";
import BreadCrumb from "../../components/maratoid/BreadCrumb";

export default {
    components: {
        SliderProductMini,
        FiltersApp,
        Products,
        ThirdBanner,
        FourthBanner,
        CustomModals,
        BreadCrumb,
    },
    data() {
      return {
          modalActive: false,
          products: [
              {
                  id: 1,
                  name: "1111",
                  desc: 'osrifwaio rwapgwarg 1111'
              },
              {
                  id: 2,
                  name: "2222",
                  desc: 'osrifwaio rwapgwarg wapgprgwpa'
              },
              {
                  id: 3,
                  name: "33333",
                  desc: 'osrifwaio rwapgwarg 3333'
              },
              {
                  id: 4,
                  name: "44444",
                  desc: 'osrifwaio rwapgwarg wapgprgwpa'
              },
              {
                  id: 5,
                  name: "5555",
                  desc: 'osrifwaio rwapgwarg wapgprgwpa'
              },
          ]
      }
    },
    // methods: {
    //     onChange(newValue) {
    //         this.$emit('input', newValue);
    //     }
    // },
    // props: ['modalActive']
}
</script>

<style lang="scss" scoped>
    .products {
        &__title {
            margin-top: 24px;
            font-weight: 500;
            font-size: 25px;
            line-height: 32px;
            color: #363B46;
            padding-left: 115px;
            margin-bottom: 0;
        }
        &__wrapper {
            display: flex;
            margin-top: 42px;
        }
        &__content {
            display: flex;
            &-title {
                font-weight: 500;
                font-size: 25px;
                line-height: 32px;
                color: #363B46;
                margin: 0 0 28px 24px;
            }
            &-right {
                &-main {
                    display: flex;
                    flex-wrap: wrap;
                    .thirdBanner {
                        margin-top: 25px;
                        padding: 0 0 50px 24px;
                    }
                    .fourthBanner {
                        margin: 25px 0 50px 0;
                        padding-left: 24px;
                    }
                }
            }
        }
        .product {
            margin: 0 0 25px 24px;
        }
        .breadCrumb {
            margin: 22px 0 0 115px;
        }
    }
</style>
