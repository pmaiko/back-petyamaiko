@extends('layouts.app')

@section('content')
  <x-alert></x-alert>
  <h1 class="mt-4">Create project</h1>

  <form class="div" method="post">
    <div class="col col-4">
      <div class="mt-3 w-100">
        <label
          class="form-label w-100"
        >
          Label
          <input
            name="label"
            type="text"
            class="form-control"
          >
        </label>
      </div>
      <div class="mt-3 w-100">
        <label
          class="form-label w-100"
        >
          Description
          <textarea
            name="description"
            type="text"
            rows="3"
            class="form-control"
          ></textarea>
        </label>
        <label
          class="form-label w-100"
        >
          Url
          <input
            name="url"
            type="text"
            class="form-control"
          >
        </label>
      </div>
      <div class="mt-3 w-100">
        <x-file_loader />
      </div>
    </div>

    <button
      class="btn btn-success mt-4"
      type="submit"
    >
      Save
    </button>
  </form>
@stop