<template>
  <div class="multiple-text-field-wrapper">
    <div
      class="multiple-text-field"
      :class="{ 'is-invalid': isInvalid }"
      v-for="(item, index) in fields"
      :key="index"
    >
      <b-form-group>
        <b-form-input
          :value="item.value"
          @input="handleInput($event, index)"
          :class="{ 'is-invalid': isInvalid }"
          autocomplete="off"
        />

        <button class="add-field" type="button" @click="addField">
          <i class="icon-plus"></i>
        </button>
      </b-form-group>
      <button class="remove-field" type="button" @click="removeField(index)">
        <i class="icon-trash"></i>
      </button>
    </div>
    <div class="invalid-feedback">{{ $t("form_errors.required") }}</div>
  </div>
</template>

<script>
export default {
  name: "MultipleTextField",
  props: {
    fields: {
      type: Array,
      required: true
    },
    isInvalid: {
      type: Boolean,
      default: false
    }
  },
  computed: {
    last_field() {
      return this.fields[this.fields.length - 1];
    },
    has_fields() {
      return this.fields.length > 0;
    },
    has_last_field_value() {
      return this.last_field.value !== "";
    },
    can_add_field() {
      return !this.has_fields || this.has_last_field_value;
    },
    can_remove_field() {
      return this.fields.length > 1;
    }
  },
  methods: {
    handleInput(value, index) {
      this.$emit("field-update", { value, index });
    },

    addField() {
      this.can_add_field && this.$emit("add-field");
    },

    removeField(index) {
      this.can_remove_field && this.$emit("remove-field", index);
    }
  }
}
</script>
