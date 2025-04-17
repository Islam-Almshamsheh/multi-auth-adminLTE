@extends('backend.layouts.app')
@section('title') Edit Tag @endsection
@section('content')
@section('content-header') Edit Tag @endsection
@section('card-title') Tag Info @endsection
@section('main-content')
        <form method="POST" action="{{ route('tags.update', $tag->id) }}">
          @csrf
          @method('PUT')
          <div class="card-body">
            <!-- Name Field -->
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text"
                     class="form-control @error('name') is-invalid @enderror"
                     id="name"
                     name="name"
                     value="{{ old('name', $tag->name) }}">
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
         </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
@endsection
@endsection
