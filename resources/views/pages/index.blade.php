@extends('layouts.app')

@section('content')
  <a
    href="{{ route('pages.create') }}"
    class="btn btn-success"
  >
    Create
  </a>

  <table class="table mt-5">
    <thead>
    <tr>
      @foreach(array_keys($pages[0]) as $key)
        <th scope="col">{{ $key }}</th>
      @endforeach
      <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($pages as $index => $page)
      <tr>
        <th>{{ $page['id'] }}</th>
        <td>{{ $page['title'] }}</td>
        <td>{{ $page['description'] }}</td>
        <td>{{ $page['alias'] }}</td>
        <td>{{ $page['created_at'] }}</td>
        <td>{{ $page['updated_at'] }}</td>
        <td><a href="{{ route('pages.edit', $page['id']) }}">edit</a></td>
      </tr>
    @endforeach
    </tbody>
  </table>
@stop