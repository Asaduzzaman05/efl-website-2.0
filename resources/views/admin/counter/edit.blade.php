@extends('layouts.admin')
@section('title', 'Counter Updated')
@section('admin-content')
<main>
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{route('admin.index')}}">Home</a> >Counter Number</span>
    </div>
    <div class="card mb-3">
        <div class="card-body table-card-body p-3 mytable-body">
                <div class="row ">
                    <div class="col-md-6 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <div class=""><i class="fas fa-image me-1"></i>Update Counter</div>
                            </div>
                            <div class="card-body table-card-body">
                            <form action="{{ route('counter.update', $counter->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-3">
                                        <label><strong>Title:</strong></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="title" value="{{ $counter->title }}" placeholder="Title" class="form-control my-form-control @error('title') is-invalid @enderror">
                                          @error('title')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                        @enderror
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-3">
                                        <label><strong>Count Number:</strong></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="count_number" value="{{ $counter->count_number }}" placeholder="Count Number" class="form-control my-form-control @error('count_number') is-invalid @enderror">
                                          @error('count_number')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                        @enderror
                                    </div>

                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-primary float-right mt-2" value="Submit">Update</button>
                                    </div>
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
@endpush
