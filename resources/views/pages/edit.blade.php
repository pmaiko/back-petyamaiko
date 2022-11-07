@extends('layouts.app')

@section('content')
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  @if(session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif

  <h1 class="mb-4">
    {{ $page['alias'] }}
  </h1>

  <ul
    class="nav nav-tabs"
    role="tablist"
  >
    <li
      class="nav-item border-secondary border-opacity-25"
      role="presentation"
    >
      <button
        class="nav-link active"
        id="general-tab"
        data-bs-toggle="tab"
        data-bs-target="#general-tab-pane"
        type="button"
        role="tab"
        aria-controls="general-tab-pane"
        aria-selected="true"
      >
        General
      </button>
    </li>
    <li
      class="nav-item border-secondary border-opacity-25"
      role="presentation"
    >
      <button
        class="nav-link"
        id="sections-tab"
        data-bs-toggle="tab"
        data-bs-target="#sections-tab-pane"
        type="button"
        role="tab"
        aria-controls="sections-tab-pane"
        aria-selected="false"
      >
        Sections
      </button>
    </li>
  </ul>

  <form
    method="post"
    class="px-4 py-4 border border-top-0 border-secondary border-opacity-25 bg-white"
  >
    <div class="tab-content">
      <div
        class="tab-pane fade show active"
        id="general-tab-pane"
        role="tabpanel"
        aria-labelledby="general-tab"
        tabindex="0"
      >
        <div>
          <h3 class="mb-5">
            General
          </h3>
          <div class="mb-3">
            <label
              for="title"
              class="form-label"
            >
              Title
            </label>
            <input
              value="{{ $page['title'] }}"
              name="title"
              id="title"
              type="text"
              class="form-control"
            >
          </div>
          <div class="mb-3">
            <label
              for="description"
              class="form-label">
              Description
            </label>
            <textarea
              name="description"
              id="description"
              class="form-control"
              rows="3"
            >{{ $page['description'] }}</textarea>
          </div>
          <div class="mb-3">
            <label
              for="alias"
              class="form-label"
            >
              Alias
            </label>
            <input
              placeholder="{{ $page['alias'] }}"
              name="alias"
              id="alias"
              type="text"
              class="form-control"
              disabled
            >
          </div>
        </div>
      </div>
      <div
        class="tab-pane fade"
        id="sections-tab-pane"
        role="tabpanel"
        aria-labelledby="sections-tab"
        tabindex="0"
      >
        <div id="app">
        </div>
      </div>
    </div>

    <button class="btn btn-success mt-4">
      Save
    </button>
  </form>

  <script>
    const { createApp } = Vue

    const section_main_banner = {
      props: ['id', 'title', 'description', 'button_label', 'hint', 'image'],
      template: `
         <div class="border border-success bg-light p-3 mt-3">
          <h3 class="mb-4">
            section_main_banner
          </h3>
          <input value="true" type="hidden" name="section_main_banner[]" class="visually-hidden">
          <input :value="id" type="hidden" name="section_main_banner.id[]" class="visually-hidden">
          <div class="mb-3">
            <label
              for="section_main_banner_title"
              class="form-label"
            >
              Title
            </label>
            <input
              :value="title"
              name="section_main_banner_title[]"
              id="section_main_banner_title"
              type="text"
              class="form-control"
            >
          </div>
          <div class="mb-3">
            <label
              for="section_main_banner_description"
              class="form-label">
              Description
            </label>
            <textarea
              name="section_main_banner_description[]"
              id="section_main_banner_description"
              class="form-control"
              rows="3"
            >@{{ description }}</textarea>
          </div>
          <div class="mb-3">
            <label
              for="section_main_banner_button_label"
              class="form-label"
            >
              Button Label
            </label>
            <input
              :value="button_label"
              name="section_main_banner_button_label[]"
              id="section_main_banner_button_label"
              type="text"
              class="form-control"
            >
          </div>
          <div class="mb-3">
            <label
              for="section_main_banner_hint"
              class="form-label"
            >
              Hint
            </label>
            <input
              :value="hint"
              name="section_main_banner_hint[]"
              id="section_main_banner_hint"
              type="text"
              class="form-control"
            >
          </div>
          <div class="mb-3">
            <label
              for="section_main_banner_image"
              class="form-label"
            >
              Image
            </label>
            <input
              value=""
              name="section_main_banner_image[]"
              id="section_main_banner_image"
              type="file"
              class="form-control"
            >
          </div>
        </div>
      `
    }

    createApp({
      components: {
        section_main_banner
      },

      data() {
        return {
          sectionsList: [
            {
              label: 'NULL',
              value: null
            },
            {
              label: 'section_main_banner',
              value: 'section_main_banner'
            }
          ],

          sections: {!! json_encode($sections) !!},

          selected: null
        }
      },

      template: `
        <select
          v-model="selected"
          class="form-select"
          aria-label="select section"
        >
          <option
            v-for="(section, index) in sectionsList"
            key="index"
            :selected="!index"
            :value="section.value"
          >
            @{{ section.label }}
          </option>
        </select>
        <component :is="selected" />
        <div class="sections">
          <component
            v-for="section in sections"
            :key="section.id"
            :is="section.section_name"
            v-bind="section.data"
          />
        </div>
        @{{ message }}
      `
    }).mount('#app')
  </script>
@stop