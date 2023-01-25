@extends('layouts.app')

@section('content')
  <a
    href="{{ route('projects.create') }}"
    class="btn btn-success"
  >
    Create
  </a>

  <div class="row mt-5">
    @foreach($projects as $project)
      <div class="col col-3 mb-4">
        <div class="card h-100">
          <img
            src="{{ $project['image'] }}"
            class="img-fluid"
            alt="project"
            style="max-height: 250px; object-fit: cover"
          >
          <div class="card-body">
            <h5 class="card-title">{{ $project['label'] }}</h5>
            <p class="card-text">{{ $project['description'] }}</p>
            <div class="mt-3">
              <div>
                Url: <a href="{{ $project['url'] }}" target="_blank">{{ $project['url'] }}</a>
              </div>
            </div>
            <div class="mt-3">
              <div>
                Views: {{ $project['views'] }}
              </div>
              <div class="mt-1">
                Likes: {{ $project['likes'] }}
              </div>
            </div>
            <div class="mt-3">
              <div>
                Created: {{ $project['created_at'] }}
              </div>
              @if($project['updated_at'])
                <div class="mt-1">
                  Updated: {{ $project['updated_at'] }}
                </div>
              @endif
            </div>
            <div class="d-flex mt-3">
              <a
                href="{{ route('projects.update', $project['id']) }}"
                class="btn btn-primary me-3"
              >
                Edit
              </a>
              <form
                action="{{ route('projects.delete', $project['id']) }}"
                method="post"
              >
                <input
                  value="{{ $project['id'] }}"
                  name="id"
                  type="hidden"
                  class="visually-hidden"
                >
                <button
                  type="submit"
                  class="btn btn-danger"
                >
                  Remove
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

@stop