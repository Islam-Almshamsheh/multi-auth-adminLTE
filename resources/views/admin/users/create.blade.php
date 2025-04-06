@extends('backend.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Create User</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- general form elements -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">User Info</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form method="POST" action="{{ route("users.store") }}">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text"
              name="name"
              class="form-control @error('name') is-invalid @enderror"
              id="name"
              placeholder="Name"
              value="{{ old('name') }}">
              @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email"
              name="email"
              class="form-control @error('email') is-invalid @enderror"
              id="email"
              placeholder="Email"
              value="{{ old('email') }}">
              @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password"
              name="password"
              class="form-control @error('password') is-invalid @enderror"
              id="password"
              placeholder="Password"
              value="{{ old('password') }}">
              @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="password_confirmation">Password</label>
              <input type="password"
              name="password_confirmation"
              class="form-control @error('password_confirmation')is-invalid @enderror"
              id="password_confirmation"
              placeholder="Confirm Password">
              @error('password_confirmation')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
                  <label for="role">User role</label>
                  <select class="custom-select form-control-border @error('role') is-invalid @enderror"
                   id="role"
                   name="role"
                   value="{{ old('role') }}">
                    <option value="admin" {{ old('role') == "admin" ? 'selected': '' }}>Admin</option>
                    <option value="user" {{ old('role') == "user" ? 'selected': '' }}>User</option>
                  </select>
                  @error('role')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
        </form>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
