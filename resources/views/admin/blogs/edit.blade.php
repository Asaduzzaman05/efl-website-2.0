@extends('layouts.admin')
@section('title', 'Blogs')
@section('admin-content')
<main class="mb-5">
    <div class="container">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading"><i class="fas fa-home"></i> <a href="{{ route('blog.index') }}">Home</a> > Edit Blog</span>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="table-head"><i class="fas fa-cogs me-1"></i>Edit Blog</div>
                    </div>
                    <div class="card-body table-card-body p-3">
                        <form action="{{ route('blog.update', $aisItem->id) }}" id="service_form" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $aisItem->title) }}" required>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="title">Category</label>
                                        <select name="category" id="seasonal" class="style_info  form-control main_style_form seasonal" data-placeholder="Season" title="Season">
                                            <option value="Fashion News">Fashion News</option>
                                            <option value="Fashion Show" >Fashion Show</option>
                                            <option value="Mood Board">Mood Board</option>
                                            <option value="Artworks" >Artworks</option>
                                            <option value="Artworks" >Recent News</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="title">Sub Category</label>
                                        <input type="text" name="subcategory"  class="form-control" placeholder="Type subcategory" value="{{ old('date', $aisItem->subcategory) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">Blog Date</label>
                                <input type="date" name="date" class="form-control" value="{{ old('date', $aisItem->date) }}" >
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="blog-description" class="form-control" rows="2" required>{{ old('description', $aisItem->description) }}</textarea>
                            </div>


                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                <input type="file" name="image" class="form-control">
                                @if($aisItem->image_path)
                                    <div class="mt-2">
                                        <img src="{{ asset($aisItem->image_path) }}" alt="Current Image" style="width: 100px; height: auto;">
                                    </div>
                                @endif
                            </div>

                          <div class="col-md-12">
                            <button type="submit" id="submit_service" class="btn btn-primary">Update</button>
                            <a href="{{ route('blog.index') }}" class="btn btn-secondary">Cancel</a>
                          </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
@push('admin-js')

<script src="{{ asset('public/admin/js/sweetalert2.all.js') }}"></script>
<script>
    tinymce_textarea('blog-description', 400);
        $(document).on('click', '#submit_service', function(e){
            e.preventDefault();
            tinyMCE.triggerSave();

            $('#service_form').submit();
        });
    $('#addBtn').show();
    $('#updateBtn').hide();
    $('#addTitle').show();
    $('#updateTitle').hide();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

  function EditBlog(id){
    event.preventDefault();
    $.ajax({
        type:'GET',
        url:'{{ url("edit-blog") }}/' + id,
        dataType:'json',
        success:function(response){
            $('#addBtn').hide();
            $('#updateBtn').show();
            $('#addTitle').hide();
            $('#updateTitle').show();
            $('#chooseUsStore').removeClass('chooseUsForm');
            $('#chooseUsStore').addClass('chooseUsUpdateForm');
            $('#id').val(response.id);
            $('#title').val(response.title);
            $('#description').val(response.description);
        }

    });
  }
  //update data
  $(document).on('submit','.chooseUsUpdateForm',function(e){
    event.preventDefault();
    var id = $('#id').val();
    var formData = new FormData(this);
      $.ajax({
         type:'POST',
         url:'{{ url("blog.update") }}/' + id,
         data:formData,
         cache:false,
         contentType:false,
         processData:false,
         success:function(data){
           if(data){
             toastr.success('Data Save Successfully');
           }else{
            toastr.error('Something is wrong');
           }
           GetBlog();
           $('.chooseUsUpdateForm')[0].reset();
            $('#addBtn').show();
            $('#updateBtn').hide();
            $('#addTitle').show();
            $('#updateTitle').hide();
            $('#chooseUsStore').removeClass('chooseUsUpdateForm');
            $('#chooseUsStore').addClass('chooseUsForm');
         },
         error:function(error){

            $('#titleError').text(error.responseJSON.errors.title);
            $('#descriptionError').text(error.responseJSON.errors.description);

         }
      });
  });

  //data delete
  function DeleteChoose(id){
    event.preventDefault();
     $.ajax({
        type:'DELETE',
        url:'{{ url("delete-blog") }}/' + id,
        dataType:'json',
        success:function(data){
            if(data){
                toastr.success('Data Delete Successfully');
            }else{
                toastr.error('Something is Worng');
            }
            GetBlog();
        }
     })
  }
    function deleteUser(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to Delete this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
</script>
@endpush
