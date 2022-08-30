<template>
    <section class="page auth-page">
        <b-container fluid>
            <b-row>
                <b-col>
                    <section-header :title="$t('my_account')" />

                    <div class="centered-container">
                        <ul class="auth-tabs">
                            <li class="auth-tabs__item">
                                <nuxt-link :to="$localePath('auth-login')" class="auth-tabs__link">
                                    {{ $t("login") }}
                                </nuxt-link>
                            </li>
                            <li class="auth-tabs__item">
                                <nuxt-link :to="$localePath('auth-register')" class="auth-tabs__link">
                                    {{ $t("register") }}
                                </nuxt-link>
                            </li>
                        </ul>
                        
                        <login-form />
                    </div>
                    <!-- Centered container -->
                </b-col>
            </b-row>
        </b-container>
    </section>
</template>

<script>
import SectionHeader from "@/components/ui/SectionHeader";
import LoginForm from "@/components/auth/LoginForm";

export default {
    name: "login-page",
    components: {
        SectionHeader,
        LoginForm,
    }
};
</script>
