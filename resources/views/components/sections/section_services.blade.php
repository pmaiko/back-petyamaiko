<script>
  const section_services = {
    props: ['id', 'name', 'title', 'list'],

    data () {
      return {
        new_title: this.title,
        new_list: this.list || [],
        item: {
          label: '',
          description: ''
        }
      }
    },

    components: {
      base_section
    },

    methods: {
      add () {
        this.new_list.push({ ...this.item })
      },

      remove (index) {
        this.new_list = this.list.filter((item, i) => i !== index)
      }
    },

    template: `
    <base_section :name="name" :id="id">
      <div class="mb-3">
        <label
          for="section_services__title"
          class="form-label"
        >
          Title
        </label>
        <input
          v-model="new_title"
          :name="'section_services__title[' + id + ']'"
          id="section_services__title"
          type="text"
          class="form-control"
        >
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
                for="section_services__label"
                class="form-label"
              >
                Label
              </label>
              <input
                v-model="item.label"
                id="section_services__label"
                class="form-control"
              >
            </div>
            <div class="mb-3">
              <label
                for="section_services__description"
                class="form-label"
              >
                Description
              </label>
              <textarea
                v-model="item.description"
                id="section_services__description"
                class="form-control"
                rows="3"
              />
            </div>
          </div>
          <input
            v-if="new_list.length"
            :value="JSON.stringify(new_list)"
            type="hidden"
            :name="'section_services__list[' + id + ']'"
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
    </base_section>
   `
  }
</script>