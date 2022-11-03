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
    action="/pages/edit/{{ $page['id'] }}"
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

    const MyComponent = {
      template: '1212323'
    }

    createApp({
      components: {
        MyComponent
      },

      data() {
        return {
          sections: [
            {
              label: 'NULL',
              value: null
            },
            {
              label: 'section_main_banner',
              value: 'section_main_banner'
            }
          ]
        }
      },

      template: `
          <select class="form-select" aria-label="select section">
            <option
              v-for="(section, index) in sections"
              key="index"
              :selected="!index"
              :value="section.value"
            >
              @{{ section.label }}
            </option>
          </select>
          <MyComponent></MyComponent>
          @{{ message }}
      `
    }).mount('#app')
  </script>
@stop