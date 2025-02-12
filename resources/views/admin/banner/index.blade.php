@extends('layouts.admin')
@section('title', 'Slider')
@section('admin-content')
<main>
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{route('admin.index')}}">Home</a> >Slider</span>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-user-plus"></i>
            Slider
        </div>
        <div class="card-body table-card-body p-3 mytable-body">
            <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            {{-- <div class="col-md-2">
                                <strong><label>Title One</label> <span class="float-right">:</span></strong>
                            </div>
                            <div class="col-md-10">
                                <input type="text" value="" name="slider_title_one" class="form-control @error('slider_title_one') is-invalid @enderror">
                                @error('slider_title_one')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <strong><label>Title Two</label> <span class="float-right">:</span></strong>
                            </div>
                            <div class="col-md-10">
                                <input type="text" value="" name="slider_title_two" class="form-control @error('slider_title_two') is-invalid @enderror"">
                                @error('slider_title_two')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Slider Image </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="file" name="images[]" multiple class="form-control   @error('image') is-invalid @enderror" onchange="readURL(this);">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    {{-- <span>N.B: 350 X 1435 px</span> --}}
                                </div>
                                <div class="col-md-12 text-center mt-2">
                                    <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="height:120px;width:140px; background: #3f4a49;">
                                </div>
                            </div>
                     </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary mt-2 float-right" value="Submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
   </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="table-head text-left"><i class="fas fa-table me-1"></i>Slider <a href="" class="float-right text-decoration-none"><i class="fas fa-print"></i></a></div>

            </div>
            <div class="card-body table-card-body p-3">
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="pending">
                       <table id="first_table">
                        <thead class="text-center bg-light">
                            <tr>
                                <th>SL</th>
                                {{-- <th>Title One</th>
                                <th>Title Two</th> --}}
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                        @foreach ($sliders as $slider)
                            @php

                                $imagePaths = json_decode($slider->image_path, true) ?? [];
                            @endphp

                            @foreach ($imagePaths as $index => $imagePath)
                                <tr>
                                    <td class="text-center">{{ $loop->parent->iteration }}.{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('public/uploads/slider/' . $imagePath) }}" class="tbl-image" alt="Slider Image">
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form id="delete-form-{{ $slider->id }}-{{ $index }}" action="{{ route('slider.image.delete', $slider->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="image_index" value="{{ $index }}">
                                            <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this image?')">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach

                        </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </div>
</main>
@endsection
@push('admin-js')
{{-- <script src="{{ asset('summernote/summernote-bs4.min.js') }}"></script> --}}
<script src="{{ asset('public/admin/js/ckeditor.js') }}"></script>
<script src="{{ asset('public/admin/js/sweetalert2.all.js') }}"></script>
<script>
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
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload=function(e) {
                $('#previewImage')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(80);


            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src="/noimage.png";

</script>
<script>
// multiple image
$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#slider_image").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove</span>" +
            "</span>").insertAfter("#slider_image");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
</script>

@endpush
