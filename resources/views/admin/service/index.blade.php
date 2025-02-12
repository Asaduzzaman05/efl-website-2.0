@extends('layouts.admin')
@section('title', 'Product')
@section('admin-content')
    <main class="mb-5">
        <div class="container ">
            <div class="heading-title p-2 my-2">
                <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> >Add Product</span>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="table-head"><i class="fas fa-cogs me-1"></i>Product Form</div>
                        </div>
                        <div class="card-body table-card-body p-3">
                            <form id="serviceForm" class="serviceStore" action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="image"> Image</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" type="file" size="100" name="image" onchange="readURL(this);">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="form-group mt-2 mb-2">
                                            <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 100px;height: 80px; background: #3f4a49;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="image">Main Image</label>
                                                <input type="file" class="form-control @error('big_image') is-invalid @enderror" id="big_image" type="file" size="100" name="big_image" onchange="readMainURL(this);">
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        <div class="form-group mt-2 mb-2">
                                            <img class="form-controlo img-thumbnail" src="#" id="previewMainImage" style="width: 100px;height: 80px; background: #3f4a49;">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="name"> Name <span class="text-danger">*</span> </label>
                                        <input type="text" name="name" id="name" value=""
                                            class="form-control form-control-sm shadow-none" placeholder="Enter name">
                                        <span id="nameError" class="text-danger"> </span>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="name"> Description <span class="text-danger">*</span> </label>
                                        <textarea name="description" id="description" cols="3" rows="6"
                                            class="form-control form-control-sm shadow-none @error('description') is-invalid @enderror"></textarea>
                                        <span id="descriptionError" class="text-danger"> </span>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    </div>
                                    <input type="hidden" id="id">
                                    <button type="submit" class="btn btn-primary btn-sm" id="addBtn">Submit</button>
                                    <button type="submit" class="btn btn-primary btn-sm" id="updateBtn">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="table-head"><i class="fas fa-table me-1"></i>Solution List</div>
                        </div>
                        <div class="card-body table-card-body p-3">
                            <table id="datatablesSimple">
                                <thead class="text-center bg-light">
                                    <tr>
                                        <th>SL</th>
                                        <th>Solution Name</th>
                                        <th>Description</th>
                                        <th>Icon Image</th>
                                        <th>Main Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="serviceBody">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('admin-js')
    <script src="{{ asset('public/admin/js/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('public/admin/js/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            });
    </script>
    <script>
        $('#addBtn').show();
        $('#updateBtn').hide();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
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
      //main image
         function readMainURL(input) {
             if (input.files && input.files[0]) {
                 var reader = new FileReader();
                 reader.onload=function(e) {
                     $('#previewMainImage')
                         .attr('src', e.target.result)
                         .width(100)
                         .height(80);
                 };
                 reader.readAsDataURL(input.files[0]);
             }
         }
         document.getElementById("previewMainImage").src="/noimage.png";
     </script>
    <script>
    // get Product
        function GetSolution(){
           $.ajax({
               url: '{{ route("service.show") }}',
               type:'GET',
               dataType: 'json',
               success:function(response){
                console.log(response.name);
                data = ''
                $.each(response, function(key, value) {
                    var key = key + 1
                    data = data + '<tr>'
                    data = data + '<td>'+key+'</td>'
                    data = data + '<td>'+value.name+'</td>'
                    data = data + '<td>'+value.description+'</td>'
                    data = data + '<td>'
                    data = data + '<img class="w-50" src="'+value.imageUrl+'">'
                    data = data + '</td>'
                    data = data + '<td>'
                    data = data + '<img class="w-50" src="'+value.imageUrls+'">'
                    data = data + '</td>'
                    data = data + '<td>'
                    data = data + '<a href="" class="btn btn-edit me-1" onclick="editService('+value.id+')"><i class="fas fa-pencil-alt"></i></a>'
                    data = data + '<a href="" class="btn btn-delete" onclick="deleteService(' + value.id +')" ><i class="fas far fa-trash-alt"></i></a>'
                    data = data + '<td>'
                    data = data + '</tr>'
                })
                $('#serviceBody').html(data);
               }
           })
        }
        GetSolution();

    // clear data
        function clearData(){
            $('#name').val('');
            $('#description').val('');
            $('#image').val('');
            $('#previewImage').val('');
            // $('#categoryError').text('');
        }
    // Service Store
    $(document).on('submit', '.serviceStore', function(e){
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url:'{{ route("service.store") }}',
                type: 'POST',
                data: formData,
                cache:false,
                contentType:false,
                processData:false,
                success:function(res){
                   console.log(res);
                   toastr.success('success.res');
                   clearData();
                   GetSolution();
                },
                error:function(error){
                    // $('#nameError').text(error.responseJSON.errors.name);

                }
            })
        })

      // Service edit

      function editService(id){
            event.preventDefault();
            $.ajax({
                url:'{{ url("service-edit") }}/' +id,
                type:'GET',
                dataType: 'json',
                success:function(response){
                    $('#addBtn').hide();
                    $('#updateBtn').show();
                    $('#serviceForm').removeClass('serviceStore');
                    $('#serviceForm').addClass('serviceUpdate');
                    $('#id').val(response.id);
                    // $('#categoryId').val(response.solution_category_id);
                    $('#name').val(response.name);
                    $('#description').val(response.description);
                    $('#previewImage').attr('src',response.imageUri);
                    $('#previewMainImage').attr('src',response.imageUris);
                    // selectedCategory();
                }
            });
        }
    // update Service
    $(document).on('submit', '.serviceUpdate', function(e){
            event.preventDefault();
            var id = $('#id').val();
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url:'{{ url("service-update") }}/' +id,
                data: formData,
                cache:false,
                contentType:false,
                processData:false,
                success:function(response){
                    const Msg = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    Msg.fire({
                        type: 'success',
                        title: 'Service Update Successfully',
                    })
                    console.log(response);
                    clearData();
                    GetSolution()
                },
                error:function(error){
                    $('#addBtn').show();
                    $('#updateBtn').hide();
                    $('#serviceForm').removeClass('serviceUpdate');
                    $('#serviceForm').addClass('productStor');
                    $('#previewImage').val('/noImage.png');
                    $('#nameError').text(error.responseJSON.errors.name);
                    $('#imageError').text(error.responseJSON.errors.image);
                }
            });
        })

        function deleteService(id) {
            event.preventDefault();

            $.ajax({
                type: 'DELETE',
                url: '{{ url("service-delete") }}/' + id,
                dataType: 'json',
                success: function(response) {
                    alert(response);
                    clearData();
                    GetSolution()
                }
            })

        }

    </script>


@endpush
