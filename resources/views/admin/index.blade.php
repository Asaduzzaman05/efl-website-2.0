@extends('layouts.admin')
@section('title', 'Home')
@section('admin-content')
<main class="">
    <div class="container-fluid">
        <div class="heading-title p-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Dashboard</span>
        </div>
        <div class="row mt-3">
            <div class="col-xl-3 col-md-3">
                <a href="{{ route('home') }}">
                    <div class="card mb-3 dashboard-card">
                        <div class="card-body mx-auto">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="fas fa-home fa-2x" style="color:orange"></i>
                            </div>
                            <p class="dashboard-card-text">Dashboard</p>
                        </div>
                    </div>
               </a>
            </div>
            <div class="col-xl-3 col-md-3">
                <a href="{{ route('user.index') }}">
                    <div class="card mb-3 dashboard-card">
                        <div class="card-body mx-auto">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="fa fa-cogs fa-2x" aria-hidden="true" style="color: blue"></i>
                            </div>
                            <p class="dashboard-card-text ">Setting</p>
                        </div>
                    </div>
               </a>
            </div>
            <div class="col-xl-3 col-md-3">
              <a href="{{ route('message.list') }}">
                <div class="card mb-3 dashboard-card">
                   <div class="card-body mx-auto">
                        <div class=" d-flex justify-content-center align-items-center">
                            <i class="fa fa-comment fa-2x" aria-hidden="true" style="color: green"></i>
                        </div>
                        <p class="dashboard-card-text">Message</p>
                    </div>
                </div>
             </a>
            </div>
            <div class="col-xl-3 col-md-3">
                <a href="{{ route('logout') }}">
                    <div class="card mb-3 dashboard-card">
                        <div class="card-body mx-auto">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="fa fa-sign-out-alt fa-2x" style="color: red"></i>
                            </div>
                            <p class="dashboard-card-text">Logout</p>
                        </div>
                    </div>
               </a>
            </div>
        </div>
    </div>
</main>
@endsection
