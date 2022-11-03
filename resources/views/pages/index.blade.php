@extends('layouts.app')

@section('content')
  <a
    href="{{ route('pages.create') }}"
    class="btn btn-success"
  >
    Create
  </a>
@stop