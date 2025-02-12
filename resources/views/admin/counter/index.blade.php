@extends('layouts.admin')
@section('title', 'Count Number')
@section('admin-content')
<main class="mb-5">
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Add Counter</span>
    </div>
       <div class="row">
           <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div class="table-head"><i class="fas fa-cogs me-1"></i>Counter Form</div>
                    </div>
                        <div class="card-body table-card-body p-3">
                        <form action="{{ Route('counter.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label for="name"> Title <span class="text-danger">*</span> </label>
                                    <input type="text" name="title" value=""  class="form-control form-control-sm shadow-none @error('title') is-invalid @enderror" placeholder="Enter Title">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="name">Counter Number <span class="text-danger">*</span> </label>
                                    <input type="text" name="count_number" value=""  class="form-control form-control-sm shadow-none @error('count_number') is-invalid @enderror" placeholder="Enter Counter Number">
                                        @error('count_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
             <div class="col-6">
               <div class="card">
                <div class="card-header">
                    <div class="table-head"><i class="fas fa-table me-1"></i>Count List</div>
                </div>
                <div class="card-body table-card-body p-3">
                    <table id="datatablesSimple">
                        <thead class="text-center bg-light">
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Count Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="counterBody">
                            @foreach ($counters as $key=> $item)
                            <tr>
                                <td class="text-center">{{ $key+1 }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->count_number }}</td>

                                <td class="text-center">
                                    <a href="{{ route('counter.edit', $item->id) }}" class="btn btn-edit"><i class="fas fa-pencil-alt"></i></a>
                                    <button type="submit" class="btn btn-delete" onclick="videoDelete({{ $item->id }})"><i class="far fa-trash-alt"></i></button>

                                      <form id="delete-form-{{ $item->id }}" action="{{ route('counter.destroy', $item->id) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                </td>
                            </tr>
                            @endforeach
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
//sweetaleart
    function videoDelete(id) {
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
