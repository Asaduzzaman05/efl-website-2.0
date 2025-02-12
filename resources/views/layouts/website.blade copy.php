<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Haque Enterprise</title>
    <link rel="stylesheet" href="{{ asset('website/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/toastr.min.css') }}">
</head>
<body>
  @include('partials.website_header')

  @yield('website-content')

  @include('partials.website_footer')
  <script src="{{ asset('website/js/all.min.js') }}"></script>
  <script src="{{ asset('admin/js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('website/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{asset('website/js/bootstrap3-typeahead.min.js')}}" ></script>
  <script src="{{ asset('js/share.js') }}"></script>
  <script src="{{asset('website/js/toastr.min.js')}}" ></script>
  <script type="text/javascript">
    var baseUri = "{{ url('/') }}";
    $('.keyword').typeahead({
        minLength: 1,
        source: function (keyword, process) {
            return $.get(`${baseUri}/get_suggestions/${keyword}`, function (data) {
                return process(data);
            });
        },
        updater:function (item) {
            $(location).attr('href', '/search?q='+item);
            return item;
        }
    });
  </script>
    <script>
    
        @if(Session::has('update'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('update') }}");
        @endif
        @if(Session::has('login'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('login') }}");
                $('.login-form').show();
        @endif
  
        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('message') }}");
        @endif
        @if(Session::has('success'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('success') }}");
        @endif
      
        
        
        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif
        
  </script>
</body>
</html>