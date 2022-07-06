@extends('layouts.dashboard')

@section('content')


<h1>Lista posts</h1>

<div class="row row-cols-4">
  @foreach ($posts as $post)
  <div class="col">
    <div class="card mb-3" style="width: 18rem;">
      {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
      <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        {{-- <p class="card-text">{{ $post->content }}</p> --}}
        <a href="{{ route('admin.posts.show', ['post' => $post->id ]) }}" class="btn btn-primary">Apri post</a>
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection