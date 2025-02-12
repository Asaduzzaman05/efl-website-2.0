<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <meta name="author" content="Ariful islam tuhin" />
        <link rel="shortcut icon" href="{{ asset('public/website/assets/uploads/2024/03/full_logo.png') }}">
        <title> | @yield('title')</title>
        <link href="{{ asset('public/admin/css/select2.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('public/admin/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/admin/css/dataTabel.css') }}" rel="stylesheet" />
        <link href="{{ asset('public/admin/css/toastr.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('public/admin/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('public/admin/css/custom.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css">

        @stack('admin-css')
    </head>
    <body class="sb-nav-fixed"  onload="startTime()">

        {!! Toastr::message() !!}

        @include('partials.admin_navbar')

        <div id="layoutSidenav">

            @include('partials.admin_sidebar')

            <div id="layoutSidenav_content">
                 <div class="container mt-4">
                     @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    @if ($message = Session::get('warning'))
                    <div class="alert alert-warning alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    @if ($message = Session::get('info'))
                    <div class="alert alert-info alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message}}</strong>
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                       {{ $errors}}
                    </div>
                    @endif

                @yield('admin-content')

                @include('partials.admin_footer')
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script type="text/javascript" src="{{asset('public/website/assets/js/custom.js') }}"></script>
        <script src="{{ asset('public/admin/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('public/admin/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('public/admin/js/scripts.js') }}"></script>
        <script src="{{ asset('public/admin/js/simple-datatables@latest.js') }}"></script>
        <script src="{{ asset('public/admin/js/datatables-simple-demo.js') }}"></script>
        <script src="{{ asset('public/admin/js/select2.min.js') }}"></script>
        <script src="{{ asset('public/admin/js/all.min.js') }}"></script>
        <script src="{{ asset('public/admin/js/toastr.min.js') }}"></script>
        <script src="{{ asset('public/website/assets/js/select2.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

        <script>
            function startTime() {
              const today = new Date();
              const days = ["Saturday","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday"];
              const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
              let d = today.getDay();
              let date = today.getDay();
              let h = today.getHours();
              let m = today.getMinutes();
              let s = today.getSeconds();
              m = checkTime(m);
              s = checkTime(s);
              document.getElementById('txt').innerHTML =days[today.getDay()+1]+','+' '+today.getDate()+' '+months[today.getMonth()]+' '+today.getFullYear()+','+' '+h + ":" + m + ":" + s;
              setTimeout(startTime, 1000);
            }
            function checkTime(i) {
              if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
              return i;
            }
            </script>
        <script>
            $("document").ready(function(){
              setTimeout(function(){
              $("div.alert").fadeOut();
              }, 3000 ); // 5 secs

              $('.js-example-basic-multiple').select2();

          });
      </script>

      <script>
          window.addEventListener('DOMContentLoaded', event => {
          // Simple-DataTables
          // https://github.com/fiduswriter/Simple-DataTables/wiki

          const datatablesSimple = document.getElementById('first_table');
          if (datatablesSimple) {
              new simpleDatatables.DataTable(datatablesSimple);
          }
          const confirmTable = document.getElementById('confirm');
          if (confirmTable) {
              new simpleDatatables.DataTable(confirmTable);
          }
          });
      </script>
       <script>
        @if(Session::has('success'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('success') }}");
        @endif



        @if(Session::has('update'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('update') }}");
        @endif

        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('remove'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('remove') }}");
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
      @stack('admin-js')
    </body>
</html>
