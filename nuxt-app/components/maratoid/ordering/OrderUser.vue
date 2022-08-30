<template>
    <div class="orderUser">
        <div class="tabsWrapper">
            <ul class="tabs" ref="tabs">
                <li class="tab active" @click="changeTabActive">Yeni müştəri</li>
                <li class="tab" @click="changeTabActive">Daimi müştəri</li>
            </ul>
        </div>
        <form>
            <input type="text" placeholder="Ad, Soyad">
            <input type="email" placeholder="Email">
            <input type="number" placeholder="Nömrə">
            <button>Növbəti</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {

        }
    },
    methods: {
        changeTabActive(e) {
            const tabs = [...this.$refs.tabs.children], //Из NodeList конвертируем в array
                target =  e.currentTarget;

            tabs.forEach(item => {
                item.classList.remove('active')
            });
            target.classList.add('active');
        }
    }
}
</script>

<style lang="scss" scoped>
    .orderUser {
        padding: 41px;
        border: 1px solid #E9EBEF;
        border-radius: 10px;
        .tabsWrapper {
            margin-bottom: 25px;
        }
        form {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            input {
                width: 48%;
                height: 42px;
                font-weight: normal;
                line-height: 21px;
                color: rgba(54, 59, 70, 0.4);
                padding: 0 19px;
                border: 1px solid #D8DDE7;
                border-radius: 100px;
                outline: none;
                margin-bottom: 24px;
            }
            button {
                margin-top: 48px;
                font-weight: normal;
                line-height: 21px;
                color: #FFFFFF;
                padding: 0 24px;
                height: 42px;
                background-color: #6C8685;
                border-radius: 100px;
                border: none;
            }
        }
    }

    @media (max-width: 1190px) {
        .ordering {
            .orderUser {
                padding: 20px;
            }
        }
    }
    @media (max-width: 620px) {
        .ordering {
            .orderUser {
                form {
                    input {
                        width: 100%;

                    }
                    &:last-child {
                        margin-bottom: 0;
                    }
                }
            }
        }
    }
    @media (max-width: 425px) {
        .ordering {
            .orderUser {
                padding: 20px 10px;
                form {
                    input {
                        &:last-of-type {
                            margin-bottom: 0;
                        }
                    }
                }
            }
        }
    }
</style>
