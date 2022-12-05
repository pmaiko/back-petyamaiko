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

    <a
      href="route('projects')"
      class="link-primary"
    >
      Link
    </a>

  </base_block>
</template>
<script>
import base_block from "./base_block.vue"

import blockMixin from "../../block-mixin.js";

export default {
  props: {
    title: String
  },

  components: {
    base_block
  },

  mixins: [
    blockMixin
  ]
}

</script>