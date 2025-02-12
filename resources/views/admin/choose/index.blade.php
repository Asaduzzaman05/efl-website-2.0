@extends('layouts.admin')
@section('title', 'Why Choose Us')
@section('admin-content')
<main class="mb-5">
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span id="addTitle" class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Add Why Choose Us</span>
        <span id="updateTitle" class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Update Why Choose Us</span>
    </div>
       <div class="row">
           <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div class="table-head"><i class="fas fa-cogs me-1"></i>Why Choose Us Form</div>
                    </div>
                        <div class="card-body table-card-body p-3">
                        <form id="chooseUsStore" class="chooseUsForm" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label for="name">Title <span class="text-danger">*</span> </label>
                                    <input type="text" name="title" id="title" value="{{ old('title') }}"  class="form-control form-control-sm shadow-none @error('title') is-invalid @enderror" placeholder="Enter Title">
                                    <span id="titleError" class="text-danger"> </span>
                                      @error('titleError')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="description" id="description" cols="20"></textarea>
                                    <span id="descriptionError" class="text-danger"> </span>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <input type="hidden" id="id">
                            <button type="submit" id="addBtn" class="btn btn-primary">Submit</button>
                            <button type="submit" id="updateBtn" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
             <div class="col-6">
               <div class="card">
                <div class="card-header">
                    <div class="table-head"><i class="fas fa-table me-1"></i>Why Choose Us List</div>
                </div>
                <div class="card-body table-card-body p-3">
                    <table id="datatablesSimple">
                        <thead class="text-center bg-light">
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="chooseUsBody">

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
<script>
    $('#addBtn').show();
    $('#updateBtn').hide();
    $('#addTitle').show();
    $('#updateTitle').hide();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //GetChoose
    function GetChooseUs(){
        $.ajax({
            url:'{{ route("choose.show") }}',
            type:'GET',
            dataType:'json',
            success:function(response){
                console.log(response.title);
                data = ''
               $.each(response, function(key, value){
                 var key = key + 1
                 data = data + '<tr>'
                 data = data + '<td>'+key+'</td>'
                 data = data + '<td>'+value.title+'</td>'
                 data = data + '<td>'+value.description+'</td>'
                 data = data + '<td class="text-center">'
                 data = data + '<a href="" onclick="EditChoose('+value.id+')" class="btn btn-edit"><i class="fas fa-pencil-alt"></i></a>'
                 data = data + '<a href="" onclick="DeleteChoose('+value.id+')" class="btn btn-delete"><i class="far fa-trash-alt"></i></a>'
                 data = data + '</td>'
                 data = data + '</tr>'
               })
               $('#chooseUsBody').html(data);
            }
        })
    }
    GetChooseUs();


  //  Why choose data store
  $(document).on('submit', '.chooseUsForm', function(e){
     e.preventDefault();
     let formData = new FormData(this);
     $.ajax({
        type:'POST',
        url:'{{ route('choose.store') }}',
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(res){
            console.log(res);
            if(res){
              toastr.success('Data Save Successfully');
            }else{
                toastr.error('Somethig Is Worng');
            }
            GetChooseUs();
            $('.chooseUsForm')[0].reset();
        },
        error:function(error){
            $('#titleError').text(error.responseJSON.errors.title);
            $('#descriptionError').text(error.responseJSON.errors.description);
        }

     });
  });

  // Choose edit data
  function EditChoose(id){
    event.preventDefault();
    $.ajax({
        type:'GET',
        url:'{{ url("choose-us-edit") }}/' + id,
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
         url:'{{ url("choose-us-update") }}/' + id,
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
           GetChooseUs();
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
        url:'{{ url("choose-us-delete") }}/' + id,
        dataType:'json',
        success:function(data){
            if(data){
                toastr.success('Data Delete Successfully');
            }else{
                toastr.error('Something is Worng');
            }
            GetChooseUs();

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
