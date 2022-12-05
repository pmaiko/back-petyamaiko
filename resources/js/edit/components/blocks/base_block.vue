<template>
  <div class="border border-success bg-light p-3 mt-3">
    <div class="d-flex align-items-center justify-content-between">
      <h3 class="mb-4">
        {{ name }}
      </h3>
      <div>
        <button
          type="button"
          class="btn btn-info mx-1"
          @click="$emit('up')"
        >
          {{ 'up' }}
        </button>
        <button
          type="button"
          class="btn btn-info mx-1"
          @click="$emit('down')"
        >
          {{ 'down' }}
        </button>
        <button
          v-if="id || id === 0"
          type="button"
          class="btn btn-danger mx-1"
          @click="isRemove = !isRemove"
        >
          {{ isRemove ? 'Cansel remove' : 'Remove' }}
        </button>
      </div>
    </div>

    <input
      v-if="isRemove"
      value="1"
      type="hidden"
      :name="`blocks[${id}][remove]`"
      class="visually-hidden"
    >

    <input
      :value="name"
      type="hidden"
      :name="`blocks[${id}][name]`"
      class="visually-hidden"
    >

    <input
      :value="position"
      type="hidden"
      :name="`blocks[${id}][position]`"
      class="visually-hidden"
    >

    <slot></slot>
  </div>
</template>
<script>
import blockMixin from "../../block-mixin.js";

export default {
  mixins: [
    blockMixin
  ],

  data() {
    return {
      isRemove: false
    }
  }
}
</script>