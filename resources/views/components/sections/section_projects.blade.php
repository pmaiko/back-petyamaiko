<script>
  const section_projects = {
    props: ['id', 'name', 'title'],

    data () {
      return {
      }
    },

    components: {
      base_section
    },

    template: `
    <base_section :name="name" :id="id">
      <div class="mb-3">
        <label
          for="section_projects__title"
          class="form-label"
        >
          Title
        </label>
        <input
          v-model="title"
          :name="'section_projects__title[' + id + ']'"
          id="section_projects__title"
          type="text"
          class="form-control"
        >
      </div>

      <a href="{{ route('projects') }}" class="link-primary">Link</a>
    </base_section>
   `
  }
</script>