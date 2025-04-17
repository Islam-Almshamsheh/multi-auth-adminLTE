@extends('backend.layouts.app')

@section('title') Tag Category @endsection
@section('content')
@section('content-header') Tag Category @endsection
@section('card-title') Tag Info @endsection

@section('main-content')
<section class="content">
  <div class="container-fluid">
    <form action="{{ route('tags.store') }}" method="POST">
      @csrf

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add Tag</h3>
        </div>

        <div class="card-body">
          <div class="form-group">
            <label for="name">Tag Name</label>
            <input type="text"
              id="name"
              name="name"
              value="{{ old('name') }}"
              class="form-control @error('name') is-invalid @enderror">
            @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success">Create Tag</button>
        </div>
      </div>
    </form>
  </div>
</section>
@endsection
@endsection
