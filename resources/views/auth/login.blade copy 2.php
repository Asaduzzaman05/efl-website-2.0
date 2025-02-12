<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/fontawesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/login.css')}}">
    <style>
        body{
  height:100vh;
  background:#e9eef7;
  font-family:sans-serif;
}

.spContainer{
  margin-top: 7%;
  width:100%;
  max-width:380px

}
.card{
  border-radius:8px;
  transition:.25s;
}
.card:hover{
  transition:.25s;
}

.btn-primary{
  border-radius:4px;
  border:none;
  background-color:#ff425f;
  box-shadow:0px 0px 0px 0px rgba(34, 36, 38, 0.15) inset, 0px -0.4em 0px 0px rgba(34, 36, 38, 0.15) inset;
}
.btn-primary:hover,.btn-primary:focus,.btn-primary:active{
  background-color:#de2c48 !important;
  box-shadow:none;
}

.inpSp{
  background-color:#ebebeb;
  border:none;
  transition:.25s;
  padding-left:25px;
  font-weight:light !important;
  font-family: "Times New Roman", Times, serif;
  border-radius:4px
}
.inpSp:hover{
  transition:.25s;
  background-color:#dbdbdb;
}
.inpSp:focus{
  background-color:#ebebeb;
  box-shadow:0 8px 8px 0px #f1f1f1;
}
.regStr{
  transition:.25s;
  padding-bottom:4px;
  border-bottom:2px solid gray;
  color:#212519;
}
.regStr:hover{
  border-bottom:2px solid #ff425f;
  padding-bottom:8px;
  transition:.25s;
  text-decoration:none;
  color:#212519;
}

.btn-sm{
  font-weight:300;
}
.btn-sm:hover{
  font-weight:900;
}
    </style>
  </head>
  <body>
    <div class="container">
        <div class="row mt-5">
          <div class="spContainer mx-auto">
            <div class="card px-4 py-5 border-0 shadow">
              <div class="d-inline text-left mb-3">
                <h3 class="font-weight-bold">Login</h3>
                {{-- <p>Access the most popular project management app in indonesia !</p> --}}
              </div>
              <div class="d-inline text-center mb-0">
                <div class="form-group mx-auto">
                  <input class="form-control inpSp" type="text" placeholder="username">
                </div>
              </div>
              <div class="d-inline text-center mb-3">
                <div class="form-group mx-auto">
                  <input class="form-control inpSp" type="password" placeholder="Password">
                </div>
              </div>
              <div class="d-inline text-left mb-3">
                <div class="form-group mx-auto">
                  <button class="btn btn-primary">Login</button>
                  {{-- <a class="small text-black-50 pl-2 ml-2 border-left" href="">Forgot Password ?</a> --}}
                </div>
              </div>
              <div class="d-inline text-left mb-1">
                <div class="form-group mx-auto mb-0">
                  {{-- <label class="text-black-50 small">or login with</label> --}}
                </div>
              </div>
              <div class="d-inline text-left">

              </div>

            </div>
          </div>
        </div>
      </div>
     <script src="{{asset('admin/js/jquery-3.6.0.min.js')}}"></script>
     <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
     <script src="{{asset('admin/js/frontawesome.js')}}"></script>
  </body>
</html>
