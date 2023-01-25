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
          v-model="title"
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
        Label
        <input
          v-model="label"
          :name="`blocks[${id}][label]`"
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
        <Editor
          v-model="description"
          :name="`blocks[${id}][description]`"
          type="text"
          class="form-control"
        />
      </label>
    </div>

    <div class="mb-3">
      <label
        class="form-label w-100"
      >
        Button text
        <input
          v-model="buttonText"
          :name="`blocks[${id}][buttonText]`"
          type="text"
          class="form-control"
        >
      </label>
    </div>
    <div class="mb-3">
      <file_loader
        label="Button link"
        :name="`blocks[${id}][buttonLink]`"
        :image="buttonLink"
      />
    </div>
  </base_block>
</template>
<script>
import Editor from "../Editor.vue";
import base_block from "./base_block.vue"
import file_loader from "../file_loader.vue"

import blockMixin from "../../block-mixin.js";

export default {
  props: {
    title: String,
    label: String,
    description: String,
    buttonText: String,
    buttonLink: String
  },

  components: {
    Editor,
    base_block,
    file_loader
  },

  mixins: [
    blockMixin
  ]
}

</script>