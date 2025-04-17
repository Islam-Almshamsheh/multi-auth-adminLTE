@extends('backend.layouts.app')

@section('title') Create Post @endsection
@section('content')

@section('content-header') Create Post @endsection
@section('card-title') Post Info @endsection
@section('main-content')
<section class="content">
  <div class="container-fluid">
    <form action="{{ route('user.posts.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add Post</h3>
        </div>

        <div class="card-body">
          <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text"
              id="title"
              name="title"
              value="{{ old('title') }}"
              class="form-control @error('title') is-invalid @enderror">
            @error('title')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="post">Post</label>
            <textarea
              id="post"
              name="post"
              class="form-control @error('post') is-invalid @enderror"
              rows="20">{{ old('post') }}</textarea>
            @error('post')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="category_id">Category</label>
            <select id="category_id"
              name="category_id"
              class="form-control custom-select @error('category_id') is-invalid @enderror">
              <option selected disabled>Select a category</option>
              @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                  {{ $category->name }}
                </option>
              @endforeach
            </select>
            @error('category_id')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
          <label class="required" for="tags">Tags</label>
          <div class="form-check">
          @foreach($tags as $tag)
              <div class="form-check">
                  <input
                      type="checkbox"
                      class="form-check-input @error('tags') is-invalid @enderror"
                      id="tag-{{ $tag->id }}"
                      name="tags[]"
                      value="{{ $tag->id }}"
                      {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                  <label class="form-check-label" for="tag-{{ $tag->id }}">
                      {{ $tag->name }}
                  </label>
              </div>
          @endforeach
          </div>
          @error('tags')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>





          <div class="form-group">
            <label for="image">Upload Image</label>
            <input type="file"
              class="form-control @error('image') is-invalid @enderror"
              id="image"
              name="image">
            @error('image')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

        </div>

        <div class="card-footer">
          <input type="submit" value="Create New Post" class="btn btn-success">
        </div>
      </div>
    </form>
  </div>
</section>
@endsection
@endsection