@extends('layouts.admin')
@section('title', 'management Update')
@section('admin-content')
<main>
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{route('admin.index')}}">Home</a> > Update management Member</span>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-user-plus"></i>
            management form
        </div>
        <div class="card-body table-card-body p-3 mytable-body">
            <form action="{{route('management.update', $management)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                     <div class="col-md-6">
                         <div class="row">
                            <div class="col-md-4">
                                <label> Name </label>
                            </div>
                            <div class="col-md-1 text-right">
                                 <span class="clone">:</span>
                             </div>
                            <div class="col-md-7">
                                 <input type="text" name="name" value="{{ $management->name }}" class="form-control my-form-control @error('name') is-invalid @enderror">
                                 @error('name')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                             </div>
                             <div class="col-md-4">
                                <label> Facebook </label>
                            </div>
                            <div class="col-md-1 text-right">
                                 <span class="clone">:</span>
                             </div>
                             <div class="col-md-7">
                                <input type="url" value="{{ $management->facebook }}" name="facebook" class="form-control my-form-control  @error('facebook') is-invalid @enderror" >
                                @error('facebook')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                             </div>
                             <div class="col-md-4">
                                <label> Twitter </label>
                            </div>

                            <div class="col-md-1 text-right">
                                 <span class="clone">:</span>
                             </div>
                             <div class="col-md-7">
                                <input type="url" value="{{ $management->twitter }}" name="twitter" class="form-control my-form-control  @error('twitter') is-invalid @enderror" >
                                @error('twitter')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                             </div>

                             <div class="col-md-4">
                                <label> Linkedin </label>
                            </div>
                            <div class="col-md-1 text-right">
                                 <span class="clone">:</span>
                             </div>
                             <div class="col-md-7">
                                <input type="url" value="{{ $management->linkedin }}" name="linkedin" class="form-control my-form-control  @error('linkedin') is-invalid @enderror" >
                                @error('linkedin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                             </div>
                             <div class="col-md-4">
                                <label> Instagram </label>
                            </div>
                            <div class="col-md-1 text-right">
                                 <span class="clone">:</span>
                             </div>
                             <div class="col-md-7">
                                <input type="url" value="{{ $management->instagram }}" name="instagram" class="form-control my-form-control  @error('instagram') is-invalid @enderror" >
                                @error('instagram')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                             </div>
                         </div>
                     </div>
                     <div class="col-md-6">
                        <div class="row right-row">
                             <div class="col-md-4">
                                <label>Designation </label>
                            </div>
                            <div class="col-md-1 text-right">
                                 <span class="clone">:</span>
                             </div>
                             <div class="col-md-7">
                                <input type="text" value="{{ $management->designation }}" name="designation" class="form-control my-form-control  @error('designation') is-invalid @enderror" >
                                @error('designation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                             </div>
                             <div class="col-md-4">
                                <label>Image </label>
                            </div>

                            <div class="col-md-1 text-right">
                                 <span class="clone">:</span>
                             </div>
                             <div class="col-md-5">
                                <input type="file" class="form-control my-form-control  @error('image') is-invalid @enderror" id="image" name="image" onchange="readURL(this);">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-2 ps-0">
                                <img class="form-controlo img-thumbnail w-100" src="#" id="previewImage" style="height:80px; background: #3f4a49;">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-sm mt-2 float-right" value="Update">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
   </div>

    </div>
</main>
@endsection
@push('admin-js')
<script src="{{ asset('public/admin/js/ckeditor.js') }}"></script>
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
                    .width(100);

            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src="{{ asset('public/'.$management->image) }}";

</script>

@endpush
