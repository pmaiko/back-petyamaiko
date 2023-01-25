<template>
  <label
    class="form-label"
  >
    Image
  </label>

  <div class="input-group">
    <input
      v-model="filePath"
      :name="name"
      type="text"
      class="visually-hidden"
    >
    <input
      type="file"
      class="form-control"
    >
    <button
      class="btn btn-primary"
      type="button"
      @click="load"
    >
      Load
    </button>
    <file_manager
      @select="onSelect"
    />
  </div>

  <div class="mt-3">
    <div
      v-if="loading"
      class="spinner-border text-danger"
      role="status"
    >
      <span class="sr-only">Loading...</span>
    </div>

    <img :src="filePath" alt="" class="d-block" style="width: 150px; height: 150px; object-fit: contain;">
  </div>
</template>
<script>
import file_manager from './file_manager.vue'

export default {
  props: ['name', 'image'],

  components: {
    file_manager
  },

  data () {
    return {
      filePath: this.image || null,
      percent: 0,
      loading: false
    }
  },

  watch: {
    filePath (value) {
      this.$emit('input', value)
    }
  },

  methods: {
    onSelect (path) {
      this.filePath = '/storage/' + path
    },

    load(event) {
      const elFile = event.target.previousSibling
      const elText = event.target.previousSibling.previousSibling

      const formData = new FormData();
      formData.append('file', elFile.files[0], elFile.files[0].name);

      this.loading = true
      $.ajax({
        type: "POST",
        url: "/api/image-loader",
        xhr: () => {
          const _Xhr = $.ajaxSettings.xhr();
          if (_Xhr.upload) {
            _Xhr.upload.addEventListener('progress', (event) => {
              this.percent = 0;
              const position = event.loaded || event.position;
              const total = event.total;
              if (event.lengthComputable) {
                this.percent = Math.ceil(position / total * 100);
              }
            }, false);
          }
          return _Xhr;
        },
        success: (path) => {
          this.filePath = '/storage/' + path
        },
        error: (error) => {
          this.filePath = null;
        },
        complete: () => {
          this.loading = false
        },
        async: true,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        timeout: 60000
      })
    }
  }
}
</script>