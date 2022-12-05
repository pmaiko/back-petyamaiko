<template>
  <base_block
    :id="id"
    :name="name"
    :position="position"
  >
    <div class="mb-3">
      <label
        class="form-label w-100"
      >
        Title
        <input
          :value="title"
          :name="`blocks[${id}][title]`"
          type="text"
          class="form-control"
        >
      </label>
    </div>
    <div class="mb-3">
      <label
        class="form-label w-100"
      >
        Description
        <textarea
          :name="`blocks[${id}][description]`"
          class="form-control"
          rows="3"
        >{{ description }}</textarea>
      </label>
    </div>
    <div class="mb-3">
      <label
        class="form-label w-100"
      >
        Button Label
        <input
          :value="button_label"
          :name="`blocks[${id}][button_label]`"
          type="text"
          class="form-control"
        >
      </label>
    </div>
    <div class="mb-3">
      <label
        class="form-label w-100"
      >
        Hint
        <input
          :value="hint"
          :name="`blocks[${id}][hint]`"
          type="text"
          class="form-control"
        >
      </label>
    </div>
    <div class="mb-3">
      <file_loader
        :name="`blocks[${id}][image]`"
        :image="image"
      />
    </div>
  </base_block>
</template>

<script>
import base_block from "./base_block.vue"
import file_loader from "../file_loader.vue"

import blockMixin from "../../block-mixin.js";

export default {
  props: {
    title: String,
    description: String,
    button_label: String,
    hint: String,
    image: String
  },

  components: {
    base_block,
    file_loader
  },

  mixins: [
    blockMixin
  ]
}
</script>