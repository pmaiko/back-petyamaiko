<template>
  <quill-editor
    v-model:content="editor"
    :contentType="'html'"
    theme="snow"
    @update:content="onInput"
  ></quill-editor>
  {{ editor }}
</template>

<script>

export default {
  components: {},

  props: {
    value: {
      default: ''
    }
  },

  data () {
    return {
      editor: ''
    }
  },

  watch: {
    value: {
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