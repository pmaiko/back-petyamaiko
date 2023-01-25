<template>
  <quill-editor
    v-model:content="editor"
    :contentType="'html'"
    theme="snow"
    @update:content="onInput"
  ></quill-editor>
  <input :value="editor" :name="name" type="hidden" class="visually-hidden">
</template>

<script>

export default {
  components: {},

  props: {
    name: {},
    modelValue: {
      default: ''
    }
  },

  data () {
    return {
      editor: this.modelValue
    }
  },

  watch: {
    modelValue: {
      immediate: true,
      handler (value) {
        this.editor = value
      }
    }
  },

  methods: {
    onInput () {
      this.$emit('value', this.editor)
    }
  }
}
</script>