@extends('layouts.admin')
@section('title', 'Partner Update')
@section('admin-content')
<main>
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{route('admin.index')}}">Home</a> >Password Update</span>
    </div>
    <div class="card mb-3">
        
        <div class="card-body table-card-body p-3 mytable-body">
                <div class="row ">
                    <div class="col-md-6 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <div class=""><i class="fas fa-image me-1"></i>Password Update</div>
                            </div>
                            <div class="card-body table-card-body">
                            <form action="{{ route('user.passwordUpdate') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <label><strong>Old Password:</strong></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="password" name="old_password" value="" placeholder="old Password" class="form-control my-form-control @error('password') is-invalid @enderror">
                                          @error('old_password')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span> 
                                        @enderror 
                                    </div>
                                </div>
                              
                                <div class="row">
                                    <div class="col-md-3">
                                        <label><strong>New Password:</strong></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="password" name="password" value="" placeholder="New Password" class="form-control my-form-control @error('password') is-invalid @enderror">
                                          @error('partner_title')
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