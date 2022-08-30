<template>
    <div class="user-dropdown">
        <b-dropdown :text="$t('my_account')">
            <b-dropdown-item :to="$localePath('/profile')">
                {{ $t("dashboard") }}
            </b-dropdown-item>
            <b-dropdown-item :to="$localePath('/profile-orders')">
                {{ $t("my_orders") }}
            </b-dropdown-item>
            <b-dropdown-item @click="$auth.logout()">
                {{ $t("logout") }}
            </b-dropdown-item>
        </b-dropdown>
    </div>
</template>
