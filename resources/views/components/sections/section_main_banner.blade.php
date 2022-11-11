<script>
  const section_main_banner = {
    props: ['id', 'name', 'title', 'description', 'button_label', 'hint', 'image'],

    components: {
      base_section
    },

    template: `
    <base_section :id="id" :name="name">
      <div class="mb-3">
        <label
          for="section_main_banner__title"
          class="form-label"
        >
          Title
        </label>
        <input
          :value="title"
          :name="'section_main_banner__title[' + id + ']'"
          id="section_main_banner__title"
          type="text"
          class="form-control"
        >
      </div>
      <div class="mb-3">
        <label
          for="section_main_banner__description"
          class="form-label">
          Description
        </label>
        <textarea
          :name="'section_main_banner__description[' + id + ']'"
          id="section_main_banner__description"
          class="form-control"
          rows="3"
        >@{{ description }}</textarea>
      </div>
      <div class="mb-3">
        <label
          for="section_main_banner__button_label"
          class="form-label"
        >
          Button Label
        </label>
        <input
          :value="button_label"
          :name="'section_main_banner__button_label[' + id + ']'"
          id="section_main_banner__button_label"
          type="text"
          class="form-control"
        >
      </div>
      <div class="mb-3">
        <label
          for="section_main_banner__hint"
          class="form-label"
        >
          Hint
        </label>
        <input
          :value="hint"
          :name="'section_main_banner__hint[' + id + ']'"
          id="section_main_banner__hint"
          type="text"
          class="form-control"
        >
      </div>
      <div class="mb-3">
        <label
          for="section_main_banner__image"
          class="form-label"
        >
          Image
        </label>
        <input
          value=""
          :name="'section_main_banner__image[' + id + ']'"
          id="section_main_banner__image"
          type="file"
          class="form-control"
        >
      </div>
    </base_section>
   `
  }
</script>