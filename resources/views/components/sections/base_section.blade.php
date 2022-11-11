<script>
  const base_section = {
    props: ['id', 'name'],

    data () {
      return {
        isRemove: false
      }
    },

    template: `
      <div class="border border-success bg-light p-3 mt-3">
        <div class="d-flex align-items-center justify-content-between">
          <h3 class="mb-4">
            @{{ name }}
          </h3>
          <button
            v-if="id || id === 0"
            type="button"
            class="btn btn-danger"
            @click="isRemove = !isRemove"
          >
            @{{ isRemove ? 'Cansel remove' : 'Remove' }}
          </button>
        </div>

        <input
          v-if="isRemove"
          value="1"
          type="hidden"
          :name="name + '__delete[' + id + ']'"
          class="visually-hidden"
        >

        <input
          :value="name"
          type="hidden"
          :name="'section_name[' + id + ']'"
          class="visually-hidden"
        >
        <input
          :value="id"
          type="hidden"
          :name="'section_id[' + id + ']'"
          class="visually-hidden"
        >

        <slot></slot>
      </div>
     `
    }
</script>