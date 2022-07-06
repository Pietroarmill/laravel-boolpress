@extends('layouts.dashboard')

@section('content')
  <h1>{{ $post->title }}</h1>
  <p>Slug: {{ $post->slug }}</p>
  <p>{{ $post->content }}</p>
  <div>
    <a class="btn btn-primary "href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Edit</a>
    <a class="btn btn-danger" href="">Delete</a>
  </div>
@endsection