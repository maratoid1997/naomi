<template>
    <div class="authorization">
        <div class="tabsWrapper">
            <ul class="tabs" ref="tabs">
                <li class="tab" :class="{'active': !active}" @click="active = false">Qeydiyyat</li>
                <li class="tab" :class="{'active': active}" @click="active = true">Daxil ol</li>
            </ul>
        </div>
        <form class="registration" v-if="!active" :class="{'active' : !active}">
            <div class="inputWrapper">
                <input
                    type="text"
                    placeholder="Ad, Soyad"
                    :class="{'error' : $v.name.$error}"
                    v-model="name"
                    @blur="$v.name.$touch()"
                >
                <div class="invalidInput" v-if="!$v.name.required && $v.name.$dirty">Name field is required</div>
            </div>
            <div class="inputWrapper">
                <input
                    type="email"
                    placeholder="Email"
                    :class="{'error' : $v.email.$error}"
                    v-model="email"
                    @blur="$v.email.$touch()"
                >
                <div class="invalidInput" v-if="!$v.email.required && $v.email.$dirty">Email field is required</div>
                <div class="invalidInput" v-if="!$v.email.email && $v.email.$dirty">This field should be an email</div>
<!--                <div class="invalidInput" v-if="!$v.email.uniqEmail && $v.$dirty">Данная почта уже зарегистрирована</div>-->
            </div>
            <div class="inputWrapper">
                <input
                    type="number"
                    placeholder="Nömrə"
                    :class="{'error' : $v.telNum.$error}"
                    v-model="telNum"
                    @blur="$v.telNum.$touch()"
                >
                <div class="invalidInput" v-if="!$v.telNum.required && $v.telNum.$dirty">Tel number field is required</div>
            </div>
            <div class="inputWrapper">
                <input
                    type="text"
                    placeholder="Şəhər"
                    :class="{'error' : $v.city.$error}"
                    v-model="city"
                    @blur="$v.city.$touch()"
                >
                <div class="invalidInput" v-if="!$v.city.required && $v.city.$dirty">City field is required</div>
            </div>
            <div class="inputWrapper">
                <input
                    type="text"
                    placeholder="Ünvan"
                    :class="{'error' : $v.address.$error}"
                    v-model="address"
                    @blur="$v.address.$touch()"
                >
                <div class="invalidInput" v-if="!$v.address.required && $v.address.$dirty">Address field is required</div>
            </div>
            <div class="inputWrapper">
                <input
                    type="password"
                    placeholder="Şifrə"
                    :class="{'error' : $v.password.$error}"
                    v-model="password"
                    @blur="$v.password.$touch()"
                >
                <div class="invalidInput" v-if="!$v.password.required && $v.password.$dirty">Password field is required</div>
                <div class="invalidInput" v-if="!$v.password.minLength">
                    Minimum {{ $v.password.$params.minLength.min }} simvol olmalidi: {{ password.length}}
                </div>
            </div>
            <div class="inputWrapper">
                <input
                    type="password"
                    placeholder="Şifrənin təkrarı"
                    :class="{'error' : $v.confirmPassword.$error}"
                    v-model="confirmPassword"
                    @blur="$v.confirmPassword.$touch()"
                >
                <div class="invalidInput" v-if="!$v.confirmPassword.required && $v.confirmPassword.$dirty">Password field is required</div>
                <div class="invalidInput" v-if="!$v.confirmPassword.sameAs">Parol yanliwdir!</div>
            </div>
            <button type="submit" :disabled="$v.$invalid">Təsdiqlə</button>
        </form>
        <form class="enter" v-if="active" :class="{'active' : active}">
            <div class="inputWrapper">
                <input type="email" placeholder="Email">
            </div>
            <div class="inputWrapper">
                <input type="password" placeholder="Şifrə">
            </div>
            <div class="enter__footer">
                <div class="social">
                    <a class="social__link" href="#0">
                        <img src="/icons/fb.svg" alt="social_icon">
                    </a>
                    <a class="social__link" href="#0">
                        <img src="/icons/google.svg" alt="social_icon">
                    </a>
                </div>
                <button>Daxil ol</button>
            </div>
        </form>
    </div>
</template>

<script>
import { email, required, minLength, sameAs } from "vuelidate/lib/validators";

export default {
    data() {
        return {
            name: '',
            email: '',
            telNum: '',
            city: '',
            address: '',
            password: '',
            confirmPassword: '',
            active: false,
        }
    },
    validations: {
        email: {
            required,
            email,
            uniqEmail: function (newEmail) {
                return newEmail !== 'test@mail.ru'
            }
        },
        name: {
            required,
        },
        telNum: {
            required,
        },
        city: {
            required,
        },
        address: {
            required,
        },
        password: {
            required,
            minLength: minLength(6)
        },
        confirmPassword: {
            required,
            sameAs: sameAs('password'),
        }
    },
}
</script>

<style lang="scss" scoped>
    .authorization {
        max-width: 831px;
        margin: 0 auto;
        padding: 41px;
        border: 1px solid #E9EBEF;
        border-radius: 10px;
        .tabsWrapper {
            margin-bottom: 25px;
        }
        form {
            display: none;
            justify-content: space-between;
            flex-wrap: wrap;
            &.active {
                display: flex;
            }
            .inputWrapper {
                input {
                    width: 100%;
                    height: 42px;
                    padding: 0 19px;
                    border: 1px solid #D8DDE7;
                    border-radius: 100px;
                    outline: none;
                    //margin-bottom: 24px;
                    font-weight: normal;
                    line-height: 21px;
                    color: silver;
                }
            }
            button {
                margin-top: 66px;
                font-weight: normal;
                line-height: 21px;
                color: #FFFFFF;
                background-color: #6C8685;
                padding: 0 17px;
                height: 42px;
                border-radius: 100px;
                border: none;
            }
        }
        .enter {
            &__footer {
                display: flex;
                justify-content: space-between;
                width: 100%;
                .social {
                    &__link {
                        & + .social__link {
                            margin-left: 24px;
                        }
                    }
                }
            }
            button {
                margin-top: 0;
            }
        }
    }

    @media (max-width: 666px) {
        .registration {
            form.registration {
                input {
                    width: 100%;
                    &:last-of-type {
                        margin-bottom: 0;
                    }
                }
                button {
                    margin-top: 30px;
                }
            }
        }
    }
    @media (max-width: 475px) {
        .registration {
            .authorization {
                padding: 20px;
            }
            form.enter {
                input {
                    width: 100%;
                }
            }
        }
    }
    @media (max-width: 375px) {
        .registration {
            .authorization {
                padding: 20px 10px;
            }
        }
    }
</style>
