@extends('backend.layouts.app')
@section('title') Dashboard @endsection
@section('content')
    @section('content-header') Info @endsection
    @section('card-title') Personal Information @endsection
    @section('main-content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">User Name</span>
                <span class="info-box-number">
                  {{ auth()->user()->name }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-envelope"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Email</span>
                <span class="info-box-number"> {{ auth()->user()->email }}</span>
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
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-id-badge"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">ID</span>
                <span class="info-box-number">{{ auth()->user()->id }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-tie"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Role</span>
                <span class="info-box-number">{{ auth()->user()->role }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">{{ auth()->user()->role }} - Dashboard</h5>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                   welcome {{ auth()->user()->name }} to {{ auth()->user()->role }} - Dashboard
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
     @endsection
@endsection
