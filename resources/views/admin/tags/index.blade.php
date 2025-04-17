@extends('backend.layouts.app')
@section('title') Index @endsection
@section('content')
@section('content-header') All Tags @endsection
@section('card-title') Tags @endsection
@section('main-content')
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Tag ID</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($tags as $tag)
                  <tr>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->name}}</td>
                    <td>
                        <a href="{{ route("tags.edit",$tag) }}" class="btn btn-info">Edit</a>
                        <form id="delete-form-{{$tag->id}}" style="display: inline;" method="POST" action="{{ route('tags.destroy', $tag->id) }}">
                          @csrf
                          @method('DELETE')
                          <button type="button" class="btn btn-danger" onclick="confirmation(event, {{$tag->id}})">Delete</button>
                        </form>
                    </td>
                  
                    </tr>
                   @endforeach
                    
                    
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Tag ID</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            
    </section>
    
    <!-- /.content -->
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