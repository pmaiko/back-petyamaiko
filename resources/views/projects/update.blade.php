@extends('layouts.app')

@section('content')
  <x-alert></x-alert>
  <h1 class="mt-4">Update project {{ $project['id'] }}</h1>

  <form class="div" method="post">
    <div class="col col-4">
      <input
        value="{{ $project['id'] }}"
        name="id"
        type="hidden"
        class="visually-hidden"
      >

      <div class="mt-3 w-100">
        <label
          class="form-label w-100"
        >
          Label
          <input
            value="{{ $project['label'] }}"
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
          >{{ $project['description'] }}</textarea>
        </label>
      </div>
      <div class="mt-3 w-100">
        <x-file_loader
          image="{{ $project['image'] }}"
        />
      </div>
      <div class="mt-3 w-100">
        <label
          class="form-label w-100"
        >
          Views
          <input
            value="{{ $project['views'] }}"
            name="views"
            type="text"
            class="form-control"
          >
        </label>
      </div>
      <div class="mt-3 w-100">
        <label
          class="form-label w-100"
        >
          Likes
          <input
            value="{{ $project['likes'] }}"
            name="likes"
            type="text"
            class="form-control"
          >
        </label>
      </div>
    </div>

    <button
      class="btn btn-success mt-4"
      type="submit"
    >
      Update
    </button>
  </form>
@stop