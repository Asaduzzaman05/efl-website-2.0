@extends('layouts.admin')
@section('title', 'Management Add')
@section('admin-content')
<main>
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{route('admin.index')}}">Home</a> >Management Add</span>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-user-plus"></i>
            Management form
        </div>
        <div class="card-body table-card-body p-3 mytable-body">
            <form  id="managementForm" class="managementStore" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="id">
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
                                 <input type="text" name="name" id="name" class="form-control my-form-control @error('name') is-invalid @enderror">
                                 @error('name')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                             </div>
                             <div class="col-md-4">
                                <label>Designation </label>
                            </div>
                            <div class="col-md-1 text-right">
                                 <span class="clone">:</span>
                             </div>
                             <div class="col-md-7">
                                <input type="text" name="designation" id="designation" class="form-control my-form-control  @error('designation') is-invalid @enderror" >
                                @error('designation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                             </div>
                         </div>
                     </div>
                     <div class="col-md-6">
                        <div class="row right-row">
                             <div class="col-md-3">
                                <label>Image :</label>
                            </div>
                             <div class="col-md-7">
                                <input type="file" class="form-control my-form-control  @error('image') is-invalid @enderror" id="image" name="image" id="image" onchange="readURL(this);">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                {{-- <span>NB: 240 X 240 px</span> --}}
                            </div>
                            <div class="col-md-2 ps-0">
                                <img class="form-controlo img-thumbnail w-100" src="#" id="previewImage" style="height:80px; background: #3f4a49;">
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" id="id">
                                <button type="submit" class="btn btn-primary btn-sm mt-2 float-right" id="addBtn" value="Submit">Submit</button>
                                <button type="submit" class="btn btn-primary btn-sm mt-2 float-right" id='updateBtn' value="Submit">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
   </div>
        <div class="row">
            <div class="col-12">
               <div class="card">
                <div class="card-header">
                    <div class="table-head"><i class="fas fa-table me-1"></i>Management List</div>
                </div>
                <div class="card-body table-card-body p-3">
                    <table id="datatablesSimple">
                        <thead class="text-center bg-light">
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="managementBody">

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
    $('#addBtn').show();
    $('#updateBtn').hide();
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    // management data get
  function GetManagement(){
    $.ajax({
        url: '{{ route("management.show") }}',
        type: 'GET',
        dataType: 'json',
        success: function (response){
         console.log(response.name);
         data = ''
         $.each(response, function(key, value){
            var key = key + 1
            data = data + '<tr>'
            data = data + '<td>'+key+'</td>'
            data = data + '<td>'+ value.name+'</td>'
            data = data + '<td>'+ value.designation+'</td>'
            data = data + '<td>'
            data = data + '<img class="w-50" src="'+ value.image +'">'
            data = data + '</td>'
            data = data + '<td class="text-center">'
            data = data + '<a href="" onclick="EditManagement('+value.id+')" class="btn btn-edit"><i class="fas fa-pencil-alt"></i></a>'
            data = data + '<a href="" onclick="DeleteManagement('+value.id+')" class="btn btn-delete"><i class="far fa-trash-alt"></i></a>'
            data = data + '</td>'
            data = data + '</tr>'
         })
         $('#managementBody').html(data);
        }
    })
  }
  GetManagement();
  //Management edit data
    function EditManagement(id){
        event.preventDefault();
        $.ajax({
            url:'{{ url("management-edit") }}/' + id,
            type:'GET',
            dataType:'json',
            success:function(response){
                $('#addBtn').hide();
                $('#updateBtn').show();
                $('#managementForm').removeClass('managementStore');
                $('#managementForm').addClass('managementUpdate');
                $('#id').val(response.id);
                $('#name').val(response.name);
                $('#designation').val(response.designation);
                $('#previewImage').attr('src',response.image);
            }
        });
    }

   // Clear Data

   // Management data store
   $(document).on('submit','.managementStore',function(e){
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        type:'POST',
        url:'{{ route("management.store") }}',
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(res){
            console.log(res);
            if(res){
                toastr.success('success.res');
               }else{
                toastr.error('res.error');
            }
            GetManagement();
            $(".managementStore")[0].reset();
        }
    });
 });

  // Update Data
   $(document).on('submit','.managementUpdate',function(e){
      event.preventDefault();
      var id = $('#id').val();
      var formData = new FormData(this);
      $.ajax({
        url:'{{ url("management-update") }}/' + id,
        type:'post',
        data:formData,
        dataType:'json',
        cache:false,
        contentType:false,
        processData:false,
        success:function(res){
            if(res){
                toastr.success('Successfully Data Update');
            }else{
                toastr.error('Somethig Is Wong');
            }

            console.log(res);
            GetManagement();
            $(".managementUpdate")[0].reset();
        },
        error:function(res){

        }

      });
   })

    // Data delete
    function DeleteManagement(id) {
        event.preventDefault();
        $.ajax({
            type: 'DELETE',
            url: '{{ url("management-delete") }}/' + id,
            dataType: 'json',
            success: function(response) {
                alert(response);
                GetManagement();
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
                    .width(100);

            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src="/noimage.png";
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
