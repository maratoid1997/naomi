<template>
    <div class="contact">
        <div class="container">
            <div class="contact__inner">
                <div class="contact__left">
                    <application-form/>
                </div>
                <div class="contact__right">
                    <div class="contact__right-head">
                        <contact-information/>
                    </div>
                    <div class="contact__right-footer">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d943.565718406173!2d49.89558735679417!3d40.38211441863547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307d22f1660e07%3A0xe7be75297b2fadc3!2sHunerGroup!5e0!3m2!1sen!2s!4v1629456707108!5m2!1sen!2s" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ApplicationForm from "@/components/maratoid/ApplicationForm";
import ContactInformation from "@/components/maratoid/ContactInformation";

export default {
    components: {
        ApplicationForm,
        ContactInformation
    }
}
</script>

<style lang="scss" scoped>
    .contact {
        margin-top: 18px;
        &__inner {
            display: flex;
            justify-content: space-between;
        }
        &__left {
            width: 49%;
        }
        &__right {
            display: flex;
            justify-content: space-between;
            flex-direction: column;
            width: 49%;
            &-footer {
                width: 100%;
                height: 200px;
            }
        }
        iframe {
            width: 100%;
            height: 100%;
            border-radius: 10px;
            border: none;
        }
        .applicationForm, .contactInformation {
            width: 100%;
        }
    }

    @media (max-width: 1200px) {
        .contact {
            .container {
                max-width: 1160px;
            }
        }
    }
    @media (max-width: 768px) {
        .contact {
            &__inner {
                flex-direction: column;
            }
            &__left, &__right {
                width: 100%;
            }
            &__right {
                margin-top: 30px;
                &-footer {
                    margin-top: 30px;
                }
            }
        }
    }
</style>
