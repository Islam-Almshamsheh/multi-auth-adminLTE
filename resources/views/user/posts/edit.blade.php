@extends('backend.layouts.app')
@section('title') Edit Post @endsection
@section('content')
@section('content-header') Edit Your Post @endsection
@section('card-title') Your Post Info @endsection
@section('main-content')
        <form method="POST" action="{{ route('user.posts.update',$post) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="card-body">
            <!-- title Field -->
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text"
                     class="form-control @error('title') is-invalid @enderror"
                     id="title"
                     name="title"
                     value="{{ old('title', $post->title) }}">
              @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Post Field -->
            <div class="form-group">
              <label for="post">Post</label>
              <textarea type=""
                     class="form-control @error('post') is-invalid @enderror"
                     id="post"
                     name="post"
                     rows="20"
                     >{{ old('post', $post->post) }}</textarea>
              @error('post')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Category Selection -->
            <div class="form-group">
              <label for="category_id">category</label>
              <select class="form-control @error('category_id') is-invalid @enderror"
                      id="category_id"
                      name="category_id">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}"{{ $post->category_id == $category->id ? 'selected' : '' }}> {{ $category->name}} </option>
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
                                {{ in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())) ? 'checked' : '' }}>
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



            <!-- image Field -->
            <div class="form-group">
            <label for="image">Image</label>
            <input type="file"
              class="form-control @error('image') is-invalid @enderror"
              id="image"
              name="image"
              value="{{ $post->image }}">
            @error('image')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @if ($post->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image" height="100">
                </div>
            @endif
          </div>
         </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
@endsection
@endsection
