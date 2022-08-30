<template>
    <div class="applicationForm">
        <form>
            <div class="applicationForm__head">
                <h2 class="applicationForm__title">Müraciət formu</h2>
            </div>
            <div class="applicationForm__footer">
                <div class="inputWrapper">
                    <input
                        type="text"
                        placeholder="Ad, Soyad"
                        :class="{'error' : $v.name.$error}"
                        v-model="name"
                        @blur="$v.name.$touch()"
                    >
                    <div class="invalidInput" v-if="!$v.name.required">Name field is required</div>
                </div>
                <div class="inputWrapper">
                    <input
                        type="email"
                        placeholder="Email"
                        :class="{'error' : $v.email.$error}"
                        v-model="email"
                        @blur="$v.email.$touch()"
                    >
                    <div class="invalidInput" v-if="!$v.email.required">Email field is required</div>
                    <div class="invalidInput" v-if="!$v.email.email">This field should be an email</div>
                </div>
                <div class="inputWrapper">
                    <input
                        type="tel"
                        placeholder="Nömrə"
                        :class="{'error' : $v.telNum.$error}"
                        v-model="telNum"
                        @blur="$v.telNum.$touch()"
                    >
                    <div class="invalidInput" v-if="!$v.telNum.required">Tel number field is required</div>
                </div>
                <div class="inputWrapper">
                    <input type="text" name="status" placeholder="Status">
                </div>
                <textarea placeholder="Mesajınız"></textarea>
            </div>
            <div class="applicationForm__btnWrapper">
                <button>Göndər</button>
            </div>
        </form>
    </div>
</template>

<script>
import { required, email } from "vuelidate/lib/validators";

export default {
    data() {
        return {
            name: '',
            telNum: '',
            email: '',
        }
    },
    validations: {
        email: {
            required,
            email
        },
        name: {
            required,
        },
        telNum: {
            required,
        }
    }
}
</script>

<style lang="scss" scoped>
    .applicationForm {
        width: 831px;
        border: 1px solid #E9EBEF;
        border-radius: 10px;
        form {
            padding: 35px 40px 40px 40px;
            .inputWrapper {
                input {
                    width: 100%;
                    height: 42px;
                    padding: 0 19px;
                    border: 1px solid #D8DDE7;
                    font-weight: normal;
                    line-height: 21px;
                    color: rgba(54, 59, 70, 0.4);
                    border-radius: 100px;
                    outline: none;
                }
            }
            textarea {
                width: 100%;
                height: 150px !important;
                font-weight: normal;
                line-height: 21px;
                color: rgba(54, 59, 70, 0.4);
                padding: 9px 19px;
                border: 1px solid #D8DDE7;
                border-radius: 20px;
                outline: none;
            }
        }
        &__title {
            font-weight: 500;
            font-size: 22px;
            line-height: 28px;
            color: #363B46;
            margin-bottom: 20px;
        }
        &__footer {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        &__btnWrapper {
            display: flex;
            justify-content: flex-end;
            margin-top: 24px;
            button {
                font-weight: normal;
                line-height: 21px;
                color: #FFFFFF;
                padding: 10.5px 25px;
                background-color: #6C8685;
                border-radius: 100px;
                border: none;
                outline: none;
            }
        }
    }

    @media (max-width: 992px) {
        .contact {
            .applicationForm {
                form {
                    padding: 20px;
                }
            }
        }
    }
    @media (max-width: 768px) {
        .contact {
            .applicationForm {
                form {
                    padding: 35px 40px 40px 40px;
                }
            }
        }
    }
    @media (max-width: 500px) {
        .contact {
            .applicationForm {
                form {
                    padding: 20px;
                    input {
                        width: 100%;
                    }
                }
            }
        }
    }
</style>
