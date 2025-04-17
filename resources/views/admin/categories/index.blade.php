@extends('backend.layouts.app')
@section('title') Index @endsection
@section('content')
@section('content-header') All Categories @endsection
@section('card-title') Categories @endsection
@section('main-content')
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Category ID</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($categories as $category)
                  <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{ route("categories.edit",$category) }}" class="btn btn-info">Edit</a>
                        <form id="delete-form-{{$category->id}}" style="display: inline;" method="POST" action="{{ route('categories.destroy', $category->id) }}">
                          @csrf
                          @method('DELETE')
                          <button type="button" class="btn btn-danger" onclick="confirmation(event, {{$category->id}})">Delete</button>
                        </form>
                    </td>
                    </tr>
                   @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Category ID</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  </tr>
                  </tfoot>
                </table>
              </div>
    </section>
@endsection {{-- closes main-content --}}
@endsection {{-- closes content --}}

@section("script")
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
function confirmation(ev, id) {
  ev.preventDefault();
  var form = document.getElementById('delete-form-' + id);

  swal({
    title: "Are you sure to delete this?",
    text: "You will not be able to revert this!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      form.submit();
    }
  });
}
</script>
@endsection