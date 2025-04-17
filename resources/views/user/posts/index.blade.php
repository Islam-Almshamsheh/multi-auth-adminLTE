@extends('backend.layouts.app')
@section('title') Index @endsection
@section('content')
@section('content-header') All Posts @endsection
@section('card-title') {{auth()->user()->name }}-Posts @endsection
@section('main-content')
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Related Tags</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($userPosts as $post)
                  <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->category->name ?? 'No Category'}}</td>
                    <td>
                        @if ($post->tags->isNotEmpty())
                          {{ $post->tags->pluck('name')->join(', ') }}
                        @else
                          No Tags
                        @endif
                    </td>
                    <td>
                        <a href="{{ route("user.posts.show",$post) }}" class="btn btn-info">Show</a>

                        <a href="{{ route("user.posts.edit",$post) }}" class="btn btn-info">Edit</a>
                        
                        <form id="delete-form-{{ $post->id }}" style="display: inline;" method="POST" action="{{ route('user.posts.destroy', $post->id) }}">
                          @csrf
                          @method('DELETE')
                          <button type="button" class="btn btn-danger" onclick="confirmation(event, {{ $post->id }})">Delete</button>
                        </form>
                    </td>
                  
                  </tr>
                   @endforeach
                    
                    
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Related Tags</th>
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