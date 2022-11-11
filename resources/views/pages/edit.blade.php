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

  <x-sections.base_section />
  <x-sections.section_main_banner />
  <x-sections.section_services />
  <x-sections.section_projects />

  <script>
    const { createApp } = Vue

    createApp({
      components: {
        section_main_banner,
        section_services,
        section_projects
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
              value: 'section_main_banner',
            },
            {
              label: 'section_services',
              value: 'section_services'
            },
            {
              label: 'section_projects',
              value: 'section_projects'
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
        <component :is="selected" :name="selected" />
        <div class="sections">
          <component
            v-for="section in sections"
            :key="section.id"
            :is="section.name"
            v-bind="section"
          />
        </div>
        @{{ message }}
      `
    }).mount('#app')
  </script>
@stop