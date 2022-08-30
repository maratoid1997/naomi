<template>
    <div class="personalArea">
        <div class="container">
            <div class="tabsWrapper">
                <ul class="tabs" ref="tabs">
                    <li class="tab" :class="{'active' : !active}" @click="active = false">Loyallıq proqramı</li>
                    <li class="tab" :class="{'active' : active}" @click="active = true">Məlumatlarım</li>
                </ul>
            </div>
            <div class="personalArea__contentWrapper">
                <div class="personalArea__content" :class="{'active' : !active}">
                    <div class="loyaltyProgram">
                        Stop your co-workers in their tracks with the stunning new 30-inch diagonal HP LP3065 Flat Panel Monitor.
                        This flagship monitor features best-in-class performance and presentation features on a huge wide-aspect
                        screen while letting you work as comfortably as possible - you might even forget you’re at the office.
                        Stop your co-workers in their tracks with the stunning new 30-inch diagonal HP LP3065 Flat Panel Monitor.
                        This flagship monitor features best-in-class performance and presentation features on a huge wide-aspect
                        screen while letting you work as comfortably as possible - you might even forget you’re at the office.
                        Stop your co-workers in their tracks with the stunning new 30-inch diagonal HP LP3065 Flat Panel Monitor.
                        Stop your co-workers in their tracks with the stunning new 30-inch diagonal HP LP3065 Flat Panel Monitor.
                        Stop your co-workers in their tracks with the stunning new 30-inch diagonal HP LP3065 Flat Panel Monitor.
                    </div>
                </div>
                <div class="personalArea__content" :class="{'active' : active}">
                    <my-information/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import MyInformation from "@/components/maratoid/MyInformation";

export default {
    components: {
        MyInformation,
    },
    data() {
        return {
            active: false,
            // tabs: ['Loyallıq proqramı', 'Məlumatlarım'],
            // content: 'Loyallıq proqramı',
        }
    },
    methods: {
        // changeTabActive(e) {
        //     const tabs = [...this.$refs.tabs.children], //Из NodeList конвертируем в array
        //           target =  e.currentTarget;
        //
        //    this.content = target.innerText
        //
        //     tabs.forEach((item) => {
        //         item.classList.remove('active');
        //     });
        //     target.classList.add('active');
        // }
    },
    // mounted() {
    //     this.$refs.tabs.firstElementChild.classList.add('active');
    // },
}
</script>

<style lang="scss" scoped>
    .personalArea {
        margin-top: 19px;
        padding-bottom: 50px;
        .tabsWrapper {
            .tabs {
                .tab {
                    width: 148px;
                }
            }
        }
        &__contentWrapper {
            margin-top: 25px;
        }
        &__content {
            display: none;
            &.active {
                display: block;
            }
            .loyaltyProgram {
                font-weight: 300;
                font-size: 18px;
                line-height: 23px;
                color: #363B46;
            }
        }
    }

    @media (max-width: 1200px) {
        .personalArea {
            .container {
                max-width: 1716px;
            }
        }
    }
    @media (max-width: 992px) {
        .personalArea {
            padding-bottom: 70px;
        }
    }
</style>
