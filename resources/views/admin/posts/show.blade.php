@extends('layouts.dashboard')

@section('content')
  <h1>{{ $post->title }}</h1>
  <p>Slug: {{ $post->slug }}</p>
  <p>Category: {{ $category ? $category->name : 'nessuna categoria' }}</p>
  <p><strong>Tags: </strong>
  
    @forelse ($post->tags as $tag)
        {{ $tag->name }} {{ $loop->last ? '' : ', ' }}
    @empty
        nessuno
    @endforelse
  
  </p>
  <p>{{ $post->content }}</p>


  <div class="d-flex">
    <a class="btn btn-primary mr-2"href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Edit</a>

    <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="POST">
      @csrf
      @method('DELETE')

      <button type="submit" class="btn btn-danger">Delete</button>
    </form>
  </div>
@endsection