<template>
  <base_block
    :id="id"
    :name="name"
    :position="position"
  >
    <div class="mb-3">
      <label class="form-label w-100">
        Title

        <input
          v-model="new_title"
          :name="`blocks[${id}][title]`"
          type="text"
          class="form-control"
        >
      </label>
    </div>

    <div class="mb-3">
      <div
        v-for="(item, index) in new_list"
        :key="index"
        class="d-flex p-2 mb-3 align-items-start"
      >
        <div class="p-2 flex-grow-1">
          <div class="mb-3">
            <label
              class="form-label w-100"
            >
              Label

              <input
                v-model="item.label"
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
                v-model="item.description"
                class="form-control"
                rows="3"
              />
            </label>
          </div>
          <div class="mb-3">
            <file_loader
              :name="'image'"
              :image="item.image"
              @input="(value) => item.image = value"
            />
          </div>
        </div>
        <input
          v-if="new_list.length"
          :value="JSON.stringify(new_list)"
          type="hidden"
          :name="`blocks[${id}][list]`"
          class="visually-hidden"
        >
        <button
          type="button"
          class="btn btn-danger"
          aria-label="Remove"
          @click="remove(index)"
        >
          X
        </button>
      </div>
    </div>
    <div class="mb-3">
      <button
        type="button"
        class="btn btn-primary"
        @click="add"
      >
        Add Item
      </button>
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
    list: {}
  },

  components: {
    base_block,
    file_loader
  },

  mixins: [
    blockMixin
  ],

  data () {
    return {
      new_title: this.title,
      new_list: this.list || [],
      item: {
        label: '',
        description: '',
        image: ''
      }
    }
  },

  methods: {
    add () {
      this.new_list.push({ ...this.item })
    },

    remove (index) {
      this.new_list = this.list.filter((item, i) => i !== index)
    }
  }
}
</script>