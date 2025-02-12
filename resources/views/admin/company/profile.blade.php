@extends('layouts.admin')
@section('title', 'Company Profile Edit')
@section('admin-content')
<main>
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{route('admin.index')}}">Home</a> >Company Profile Edit</span>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-user-plus"></i>
            Company Profile
        </div>
        <div class="card-body table-card-body p-3 mytable-body">
            <form action="{{ route('company.profile.update',$company->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                     <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3">
                                    <strong><label>Name</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="company_name" value="{{$company->company_name}}" class="form-control my-form-control @error('company_name') is-invalid @enderror">
                                     @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                               </div>
                             </div>

                             <div class="row">
                                <div class="col-md-3">
                                    <strong><label>Email</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-9">
                                    <input type="email" name="email" value="{{$company->email}}" class="form-control @error('email') is-invalid @enderror my-form-control" >
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                             </div>
                             <div class="row">
                                <div class="col-md-3">
                                    <strong><label>Phone 1</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="phone_1" value="{{$company->phone_1}}" class="form-control @error('phone_1') is-invalid @enderror my-form-control" >
                                @error('phone_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                                </div>
                             </div>

                             <div class="row">
                                <div class="col-md-3">
                                    <strong><label>Phone 2</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="phone_2" value="{{$company->phone_2}}" class="form-control my-form-control" >

                                </div>
                             </div>
                             <div class="row">
                                <div class="col-md-3">
                                    <strong><label>Tel</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="tel" value="{{$company->tel}}" class="form-control my-form-control" >

                                </div>
                             </div>
                             {{-- <div class="row">
                                <div class="col-md-3">
                                    <strong><label>Slogan</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="slogan" value="{{$company->slogan}}" class="form-control my-form-control" >

                                </div>
                             </div> --}}
                             <div class="row">
                                <div class="col-md-3">
                                    <strong><label>Open Time</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="open_time" value="{{$company->open_time}}" class="form-control my-form-control" >

                                </div>
                             </div>
                             <div class="row">
                                <div class="col-md-3">
                                    <strong><label>Close Time</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="close_time" value="{{$company->close_time}}" class="form-control my-form-control" >

                                </div>
                             </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <strong><label>Address</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-9">
                                    <textarea rows="2" id="address"  class="form-control @error('address') is-invalid @enderror " name="address" > {!! $company->address !!}
                                    </textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="col-md-3">
                                    <strong><label>Contact Us</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-9">
                                    <textarea rows="2" id="contact_us"  class="form-control @error('contact_us') is-invalid @enderror " name="contact_us" > {!! $company->contact_us !!}
                                    </textarea>
                                    @error('contact_us')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> --}}


                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <strong><label>Logo</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-7">
                                    <input type="file" class="form-control my-form-control @error('logo') is-invalid @enderror " id="image" name="logo" onchange="readURL(this);">
                                    @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                    <span>N.B: 100 X 80 px</span>
                                </div>
                                <div class="col-md-2 ps-0">
                                   <img class="form-controlo img-thumbnail w-100" src="#" id="previewImage" style="height:80px; background: #3f4a49;">
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-3">
                                    <strong><label>Request Quote</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-9">
                                    <textarea rows="2" id="request_description"  class="form-control @error('request_description') is-invalid @enderror " name="request_description" > {!! $company->request_description !!}
                                    </textarea>
                                    @error('request_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <strong><label>Quote Image</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-7">
                                    <input type="file" class="form-control my-form-control @error('request_image') is-invalid @enderror " id="request_image" name="request_image" onchange="quoteURLImg(this);">
                                    @error('request_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                    <span>N.B: 100 X 80 px</span>
                                </div>
                                <div class="col-md-2 ps-0">
                                   <img class="form-controlo img-thumbnail w-100" src="#" id="previewQuoteImage" style="height:80px; background: #3f4a49;">
                                </div>
                            </div>
                     </div>
                     <div class="col-md-6">
                           <div class="row">
                                <div class="col-md-4">
                                    <strong><label>Facebook Link</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{$company->facebook}}" name="facebook" class="form-control my-form-control" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <strong><label>Youtube Link</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-8">
                                    <input type="link" value="{{$company->youtube}}" name="youtube" class="form-control my-form-control" >
                                    @if($errors->has('address'))
                                        <span class="text-danger">{{$errors->first('address')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <strong><label>Linkedin Link</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-8">
                                    <input type="link" value="{{$company->linkedin}}"  name="linkedin" class="form-control my-form-control" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <strong><label>Instagram Link</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-8">
                                    <input type="link" value="{{$company->instagram}}" name="instagram" class="form-control my-form-control" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <strong><label>Twitter Link</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-8">
                                    <input type="link" value="{{$company->twitter}}" name="twitter" class="form-control my-form-control" >
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-4">
                                    <strong><label>Whatsapp</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-8">
                                    <input type="link" value="{{$company->whatsapp}}" name="whatsapp" class="form-control my-form-control" >
                                </div>
                            </div> --}}
                            {{-- <div class="row">
                                <div class="col-md-4">
                                    <strong><label>website</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-8">
                                    <input type="link" value="{{$company->website}}" name="website" class="form-control my-form-control" >
                                </div>
                            </div> --}}
                            {{-- <div class="row">
                                <div class="col-md-4">
                                    <strong><label>Google Map</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-8">
                                    <input type="link" value="{{$company->map}}" name="map" class="form-control my-form-control" >
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-4">
                                    <strong><label>About Description</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="about_description" id="editor" cols="30" rows="10" >
                                      {{$company->about_description}}
                                    </textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <strong><label>About Us</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-6">
                                    <input type="file" class="form-control my-form-control @error('about_image') is-invalid @enderror " id="about_image" name="about_image" onchange="aboutURL(this);">
                                    @error('about_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                    <span>N.B: 100 X 100 px</span>
                                </div>
                                <div class="col-md-2 ps-0">
                                   <img class="form-controlo img-thumbnail w-100" src="#" id="previewImageabout" style="height:80px; background: #3f4a49;">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <strong><label>Why Choose</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-6">
                                    <input type="file" class="form-control my-form-control @error('why_image') is-invalid @enderror " id="why_image" name="why_image" onchange="whyURL(this);">
                                    @error('why_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                    <span>N.B: 100 X 100 px</span>
                                </div>
                                <div class="col-md-2 ps-0">
                                   <img class="form-controlo img-thumbnail w-100" src="#" id="previewImageWhy" style="height:80px; background: #3f4a49;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-sm mt-2 float-right">Update</button>
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
        });
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#contact_us' ) )
        .catch( error => {
            console.error( error );
        });
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#achievement' ) )
        .catch( error => {
            console.error( error );
        });

        ClassicEditor
        .create( document.querySelector( '#request_description' ) )
        .catch( error => {
            console.error( error );
        });
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
    document.getElementById("previewImage").src="{{asset($company->logo)}}";

</script>
<script>
  function aboutURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload=function(e) {
                $('#previewImageabout')
                    .attr('src', e.target.result)
                    .width(100);

            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImageabout").src="{{asset($company->about_image)}}";
   // Quote iamge
    function quoteURLImg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload=function(e) {
                $('#previewQuoteImage')
                    .attr('src', e.target.result)
                    .width(100);

            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewQuoteImage").src="{{asset($company->request_image)}}";

</script>
<script>
    function whyURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload=function(e) {
                  $('#previewImageWhy')
                      .attr('src', e.target.result)
                      .width(100);

              };
              reader.readAsDataURL(input.files[0]);
          }
      }
      document.getElementById("previewImageWhy").src="{{asset($company->why_image)}}";

  </script>

@endpush
