@extends('layouts.dashboard')

@section('content')
  <h1>Edit Post</h1>

  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="POST">
    @method('PUT')
    @csrf

    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title" value="{{ old('title') ? old('title') : $post->title }}">
    </div>
    <div class="form-group">
      <label for="category_id">Category</label>
      <select type="text" class="form-control" name="category_id" id="category_id">
        <option value="">Nessuna</option>
        @foreach ($categories as $category)
          <option value="{{ $category->id }}"
            {{ $post->category && old('category_id', $post->category->id) == $category->id ? 'selected' : '' }}>
            {{ $category->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="my-3">
      <h4>Tags</h4>

      @foreach ($tags as $tag)
      <div class="form-check">
        <input name="tags[]" class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="tag-{{ $tag->id }}"  {{ $post->tags->contains($tag) ? 'checked' : ''}} >
        <label class="form-check-label" for="tag-{{ $tag->id }}">
          {{ $tag->name }}
        </label>
      </div>
      @endforeach

    </div>


    <div class="form-group">
      <label for="content">Content</label>
      <textarea type="text" class="form-control" name="content" id="content" rows="10">{{ old('content') ? old('content') : $post->content }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form> 
@endsection