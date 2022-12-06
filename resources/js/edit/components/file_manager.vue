<template>
  <div>
    <button
      class="btn btn-warning"
      type="button"
      @click="openModal"
    >
      Manager
    </button>

    <!-- Modal -->
    <div
      class="modal fade"
      id="fileManagerModal"
      tabindex="-1"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5">FILE MANAGER</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div
                v-for="(file, index) in files"
                :key="file.path"
                class="col col-4 mb-5"
              >
                <div
                  class="card"
                  role="button"
                  :class="{'shadow-lg bg-body rounded border border-3 border-success': active_path === file.path}"
                  @click="onActive(file.path)"
                >
                  <img
                    :src="`/storage/${file.path}`"
                    class="card-img-top"
                    alt="file"
                  >
                  <div class="card-body">
                    <p class="card-text">
                      {{ file.name }}
                    </p>
                  </div>

                  <button
                    type="button"
                    class="btn btn-danger"
                    @click.stop="onRemove(file.path)"
                  >
                    Remove
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button
              type="button"
              class="btn btn-primary"
              data-bs-dismiss="modal"
            >
              Save changes
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data () {
    return {
      files: [],
      active_path: null,
    }
  },

  mounted () {
    this.modal = new bootstrap.Modal(this.$el.querySelector('#fileManagerModal'), {})
  },

  methods: {
    openModal () {
      $.ajax({
        type: "GET",
        url: "/api/storage/all",
        success: (data) => {
          this.files = data
        },
        error: (error) => {
        },
        complete: () => {
        },
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        timeout: 60000
      })

      this.modal.show()
    },

    onActive (path) {
      this.active_path = path
      this.$emit('select', this.active_path)
    },

    onRemove (path) {
      $.ajax({
        type: "DELETE",
        url: `/api/storage/${path}`,
        complete: () => {
        },
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        timeout: 60000
      })

      this.files = this.files.filter(file => file.path !== path)
    }
  }
}
</script>