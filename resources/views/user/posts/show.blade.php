@extends('backend.layouts.app')
@section('title') Show Info @endsection
@section("content")
    
    @section('content-header') Post Info @endsection
    @section('card-title') Post Information @endsection
    @section('main-content')
      <div class="container-fluid">
        <section class="content">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Post Title</span>
                <span class="info-box-number">
                  {{ $post->title }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Author</span>
                <span class="info-box-number"> {{ $post->user->name }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-folder-open"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Category</span>
                <span class="info-box-number">{{ $post->category->name }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-tags"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tags</span>
                <span class="info-box-number">
                @if ($post->tags->isNotEmpty())
                {{ \Illuminate\Support\Str::limit($post->tags->pluck('name')->join(', '), 20, '...') }}
                @else
                  No Tags
                @endif
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        
        <!-- Post Content Card -->
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card shadow rounded">
                <div class="card-header bg-secondary text-white">
                Post Content
                </div>
                <div class="card-body">
                <p style="white-space: pre-wrap;">{{ $post->post }}</p>
                </div>
            </div>
            </div>
        </div>
        </div>

        <!-- New Row for the Image Card -->
        <div class="row mt-4">
          <div class="col-12 col-md-6 offset-md-3">
            <div class="card shadow rounded">
              <div class="card-header text-center bg-primary text-white">
                Post Image
              </div>
              <div class="card-body text-center">
                <img src="{{ asset('storage/' . $post->image) }}" 
                    alt="Post Image" 
                    class="img-fluid rounded" 
                    style="max-height: 300px; object-fit: cover;">
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('user.posts.index') }}" class="btn btn-primary">back to posts</a>
        </div>
    </section>
    @endsection {{-- end main-content --}}
@endsection {{-- end content --}}