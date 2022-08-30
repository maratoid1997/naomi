<template>
    <b-form class="inline-form" @submit.prevent="formSubmitted">
        <b-form-group :label="label" >
            <b-form-input
                v-model="inputVal"
                :placeholder="placeholder"
            />
        </b-form-group>
        <b-button type="submit" variant="primary">
            <slot></slot> 
        </b-button>
    </b-form>
</template>

<script>
export default {
    props: {
        value: {
            type: String,
            required: true,
            default: "",
        },
        label: {
            type: String
        },
        placeholder: {
            type: String,
        },
        hasError: {
            type: Boolean,
            default: false,
        },
    },
    computed: {
        inputVal: {
            get() {
                return this.value;
            },
            set(val) {
                this.$emit("input", val);
            },
        },
    },
    methods: {
        formSubmitted() {
            this.$emit("formSubmitted");
        },
    },
};
</script>

<style lang="scss">
.inline-form {
    display: flex;
    align-items: flex-end;

    .form-group {
        width: 100%;
        margin: 0;
    }

    .form-control {
        border-radius: 3px 0 0 3px;
    }

    &.iconed {
        button {
            padding-left: 1.4rem;
            padding-right: 1.4rem;
        }

        i {
            display: inline-block;
            margin:  0;
            transform: translateY(2px);
        }
    }
}
</style>
