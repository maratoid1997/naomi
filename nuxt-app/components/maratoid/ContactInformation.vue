<template>
    <div class="contactInformation">
        <h2 class="contactInformation__title">Əlaqə məlumatları</h2>
        <ul class="contactInformation__list">
            <li class="contactInformation__list-item">
                <img src="/icons/location_icon.svg" alt="icon">
                <span>Ağ şəhər ofis binası, AZ1025 Baku</span>
            </li>
            <li class="contactInformation__list-item">
                <img src="/icons/phone_icon.svg" alt="icon">
                <span>+994 50 444 44 44</span>
            </li>
            <li class="contactInformation__list-item">
                <img src="/icons/fax_icon.svg" alt="icon">
                <span>+1 916 444 44 44</span>
            </li>
            <li class="contactInformation__list-item">
                <img src="/icons/email_icon.svg" alt="icon">
                <span>info@homev.az</span>
            </li>
        </ul>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
    .contactInformation {
        width: 831px;
        padding: 35px 40px;
        border: 1px solid #E9EBEF;
        border-radius: 10px;
        &__title {
            font-weight: 500;
            font-size: 22px;
            line-height: 28px;
            color: #363B46;
            margin-bottom: 13px;
        }
        &__list {
            list-style: none;
            margin-bottom: 0;
            &-item {
                font-weight: normal;
                font-size: 18px;
                line-height: 23px;
                color: #363B46;
                & + .contactInformation__list-item {
                    margin-top: 17px;
                }
                img {
                    margin-right: 18px;
                }
            }
        }
    }

    @media (max-width: 992px) {
        .contact {
            .contactInformation {
                padding: 20px;
            }
        }
    }
    @media (max-width: 768px) {
        .contact {
            .contactInformation {
                padding: 35px 40px 40px 40px;
            }
        }
    }
    @media (max-width: 500px) {
        .contact {
            .contactInformation {
                padding: 20px;
            }
        }
    }
</style>
