<template>
    <div class="breadCrumb">
        <ul class="breadCrumb__list">
            <li class="breadCrumb__list-item">
                <a class="breadCrumb__list-link" href="#0">
                    <img class="breadCrumb__homeIcon" src="icons/breadCrumbHome_icon.svg" alt="breadCrumb__icon">
                </a>
                <img class="breadCrumb__arrowIcon" src="/icons/header/arrow_down.svg" alt="arrow_icon">
            </li>
            <li class="breadCrumb__list-item active">
                <a class="breadCrumb__list-link" href="#0">Body care</a>
                <img class="breadCrumb__arrowIcon" src="/icons/header/arrow_down.svg" alt="arrow_icon">
            </li>
        </ul>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
    .breadCrumb {
        &__list {
            display: flex;
            list-style: none;
            &-item {
                display: flex;
                align-items: center;
                &.active {
                    .breadCrumb__list-link {
                        color: #6C8685;
                    }
                }
                & + .breadCrumb__list-item {
                    margin-left: 10px;
                }
                &:last-child {
                    .breadCrumb__arrowIcon {
                        display: none;
                    }
                }
            }
            &-link {
                display: flex;
                font-weight: normal;
                font-size: 18px;
                line-height: 23px;
                color: #363B46;
                text-decoration: none;
            }
         }
        &__arrowIcon {
            margin-left: 10px;
            width: 10px;
            height: 10px;
            transform: rotate(-90deg);
        }
    }
</style>
