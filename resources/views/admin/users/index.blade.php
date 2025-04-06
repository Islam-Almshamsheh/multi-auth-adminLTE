@extends('backend.layouts.app')
@section('title')
Index
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Users</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Email(s)</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        <a href="{{ route("users.show",$user) }}" class="btn btn-info">Show</a>
                        <a href="{{ route("users.edit",$user) }}" class="btn btn-info">Edit</a>
                        <!-- <a onclick="confirmation(event)"
                           href="{{ route("users.destroy",$user) }}" class="btn btn-info" style="background:red;">
                           Delete
                        </a> -->
                        <form id="delete-form-{{$user->id}}" style="display: inline;" method="POST" action="{{ route('users.destroy', $user->id) }}">
                          @csrf
                          @method('DELETE')
                          <button type="button" class="btn btn-danger" onclick="confirmation(event, {{$user->id}})">Delete</button>
                        </form>
                    </td>
                  </tr>
                   @endforeach
                    
                    
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Email(s)</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
@endsection
@section("script")
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
function confirmation(ev, userId) {
  ev.preventDefault();  // Prevent the default form submission
  var form = document.getElementById('delete-form-' + userId);  // Get the form associated with this user

  swal({
    title: "Are you sure to delete this?",
    text: "You will not be able to revert this!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      form.submit();  // If confirmed, submit the form
    }
  });
}
</script>
@endsection