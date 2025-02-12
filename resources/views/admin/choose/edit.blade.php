@extends('layouts.admin')
@section('title', 'Blog Update')
@push('admin-css')

@endpush
@section('admin-content')
    <main>
        <div class="container">
            <div class="heading-title p-2 my-2">
                <span class="my-3 heading "><i class="fas fa-home"></i> <a class=""
                        href="{{ route('admin.index') }}">Home</a> >Update News</span>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header py-1"><span style="font-size: 14px;
                            font-weight: 600;
                            color: #0e2c96;">Add Client</span> </div>
                        <div class="card-body table-card-body my-table">
                            <form action="{{ route('client.update',$clients->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <strong><label>Tilte</label><span class="color-red">*</span> <span
                                                        class="my-label">:</span> </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" name="photo_name" value="{{ $clients->title }}"
                                                    placeholder="Title"
                                                    class="form-control my-form-control @error('title') is-invalid @enderror">
                                                @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <strong><label>Image</label> <span class="my-label">:</span> </strong>
                                            </div>
                                            <div class="col-md-7 mt-1">
                                                <input name="image" type="file"
                                                    class="form-control form-control-sm @error('image') is-invalid @enderror"
                                                    id="image" type="file" onchange="readURL(this);">
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-3 mt-1">
                                                <img class="form-controlo img-thumbnail" src="#" id="previewImage"
                                                    style="width: 100px;height: 80px; background: #3f4a49;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-sm float-right mt-2">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
        @push('admin-js')
            <script src="{{ asset('public/admin/js/sweetalert2.all.js') }}"></script>
            <script>
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#previewImage')
                                .attr('src', e.target.result)
                                .width(100);
                        };
                        reader.readAsDataURL(input.files[0]);
                    }
                }
                document.getElementById("previewImage").src = "{{ asset('public/'.$clients->image) }}";
            </script>

            <script src="{{ asset('public/admin/js/ckeditor.js') }}"></script>
            <script>
                ClassicEditor
                    .create(document.querySelector('#description'))
                    .catch(error => {
                        console.error(error);
                    });
            </script>
        @endpush
