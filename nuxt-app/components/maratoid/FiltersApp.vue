<template>
    <div class="filters">
        <h2 class="filters__title">Axtarış <span>paneli</span></h2>
        <div class="filters__inner" ref="mainWrapper" >
            <div class="filters__listWrapper active" :class="{'active' : activeId}">
                <div class="filters__listWrapper-head" @click="isActive">
                    <span>Dəri tipi</span>
                    <img class="filters__arrowIcon" src="/icons/header/arrow_down.svg" alt="arrow_icon">
                </div>
                <ul class="filters__list">
                    <li class="filters__list-item">123456789</li>
                    <li class="filters__list-item">123456789</li>
                    <li class="filters__list-item">123456789</li>
                    <li class="filters__list-item">123456789</li>
                    <li class="filters__list-item">123456789</li>
                    <li class="filters__list-item">123456789</li>
                </ul>
            </div>
            <div class="filters__listWrapper" :class="{'active' : activeId}">
                <div class="filters__listWrapper-head" @click="isActive">
                    <span>Aktiv komponent</span>
                    <img class="filters__arrowIcon" src="/icons/header/arrow_down.svg" alt="arrow_icon">
                </div>
                <ul class="filters__list">
                    <li class="filters__list-item">123456789</li>
                    <li class="filters__list-item">123456789</li>
                    <li class="filters__list-item">123456789</li>
                    <li class="filters__list-item">123456789</li>
                    <li class="filters__list-item">123456789</li>
                    <li class="filters__list-item">123456789</li>
                </ul>
            </div>
            <div class="filters__listWrapper" :class="{'active' : activeId}">
                <div class="filters__listWrapper-head" @click="isActive">
                    <span>Brend</span>
                    <img class="filters__arrowIcon" src="/icons/header/arrow_down.svg" alt="arrow_icon">
                </div>
                <ul class="filters__list">
                    <li class="filters__list-item">
                        <input type="checkbox">
                    </li>
                    <li class="filters__list-item">123456789</li>
                    <li class="filters__list-item">123456789</li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            activeId: false,
        }
    },
    methods: {
        isActive(e) {
            const wrapper = this.$refs.mainWrapper.children,
                  parent = e.currentTarget.parentElement;

            if (!parent.classList.contains("active")) {
                wrapper.forEach((wrapperItem) => {
                    wrapperItem.classList.remove('active');
                });
                parent.classList.add("active");
            } else {
                parent.classList.remove("active");
            }
        }
    }
}
</script>

<style lang="scss" scoped>
    .filters {
        &__title {
            font-weight: 300;
            font-size: 25px;
            line-height: 32px;
            color: #363B46;
            margin-bottom: 28px;
            span {
                font-weight: 400;
            }
        }
        &__inner {
            width: 318px;
            height: 717px;
            border: 1px solid #E9EBEF;
            border-radius: 10px;
            padding: 19px 25px 26px 25px;
        }
        &__listWrapper {
            max-height: 48px;
            border-bottom: 1px solid #E9EBEF;
            padding-bottom: 20px;
            transition: all .5s;
            overflow: hidden;
            & + .filters__listWrapper {
                margin-top: 18.5px;
            }
            &.active {
                max-height: 500px;
                .filters__arrowIcon {
                    transform: rotate(0deg);
                }
            }
            &-head {
                display: flex;
                justify-content: space-between;
                align-items: center;
                cursor: pointer;
                span {
                    font-weight: 500;
                    font-size: 22px;
                    line-height: 28px;
                    color: #363B46;
                }
                img {
                    transform: rotate(-90deg);
                    transition: all .5s;
                }
            }
        }
        ul {
            margin: 19px 0 0 0;
            list-style: none;
        }
    }
</style>
