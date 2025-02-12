<style>
    /* .dropdown-submenu {
        position: relative;

    }

    .dropdown-submenu .dropdown-menu {
        top: 0;
        left: 60%;
        z-index: 1;
        margin-top: -1px;
        display: none !important;
        background-color: rgb(248, 242, 242);
    }

    .dropdown-submenu:hover .dropdown-menu {
        display: block !important;

    } */
    </style>
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
                @php
                    $prefix = Request::route()->getPrefix();
                    $route = Route::current()->getName();
                @endphp
            <div class="nav">
                <a class="nav-link  {{($route == 'admin.index')?'active':''}}" href="{{ route('admin.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" style="color: green"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="{{ route('module.service') }}"  >
                    <div class="sb-nav-link-icon"><i class="fas fa-sliders-h" style="color: rgb(187, 216, 60)"></i></div>
                   Collection
                </a>
                <a class="nav-link" href="{{ route('visit.counter') }}"  >
                    <div class="sb-nav-link-icon"><i class="fas fa-sliders-h" style="color: rgb(89, 60, 216)"></i></div>
                   Visitor
                </a>
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa fa-chevron-right" aria-hidden="true" style="color: orange"></i></div>
                    Utilites
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{($route == 'slider.create')?'active':''}}" href="{{ route('slider.create') }}"><i class="fas fa-angle-right"></i>&nbsp;Slider</a>
                        {{-- <a class="nav-link {{($route == 'client.index')?'active':''}}" href="{{ route('client.index') }}"><i class="fas fa-angle-right"></i>&nbsp;Client</a> --}}
                        {{-- <a class="nav-link {{($route == 'counter.index')?'active':''}}" href="{{ route('counter.index') }}"><i class="fas fa-angle-right"></i>&nbsp;Counter</a> --}}
                        {{-- <a class="nav-link {{($route == 'management.index')?'active':''}}" href="{{ route('management.index') }}"><i class="fas fa-angle-right"></i>&nbsp;Management</a> --}}
                        {{-- <a class="nav-link {{($route == 'service.index')?'active':''}}" href="{{ route('service.index') }}"><i class="fas fa-angle-right"></i>&nbsp;Products</a> --}}

                        {{-- <a class="nav-link {{($route == 'choose.index')?'':''}}" href="{{ route('choose.index') }}"><i class="fas fa-angle-right"></i>&nbsp;Why Choose</a> --}}
                        <a class="nav-link {{($route == 'blog.index')?'':''}}" href="{{ route('blog.index') }}"><i class="fas fa-angle-right"></i>&nbsp;Blogs</a>
                        <a class="nav-link {{($route == 'message.list')?'':''}}" href="{{ route('message.list') }}"><i class="fas fa-angle-right"></i>&nbsp;Message</a>
                    </nav>
                </div>

                {{-- <div class="collapse" id="collapseLayouts7" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{($route == '')?'active':''}}" href="{{ url('service-create/ais/ais') }}"><i class="fas fa-angle-right"></i>&nbsp;AIS</a>
                        <a class="nav-link {{($route == 'company.profile')?'active':''}}" href="{{  url('service-create/ais/company')}}"><i class="fas fa-angle-right"></i>&nbsp;Company</a>
                        <a class="nav-link {{($route == 'user.index')?'':''}}" href="{{ url('service-create/ais/transaction') }}"><i class="fas fa-angle-right"></i>&nbsp;Transaction</a>
                        <a class="nav-link {{($route == 'company.changepassword')?'':''}}" href="{{ url('service-create/ais/invoice') }}"><i class="fas fa-angle-right"></i>&nbsp;Invoice</a>
                        <a class="nav-link {{($route == 'company.changepassword')?'':''}}" href="{{ url('service-create/ais/courier') }}"><i class="fas fa-angle-right"></i>&nbsp;Courier</a>
                        <a class="nav-link {{($route == 'company.changepassword')?'':''}}" href="{{ url('service-create/ais/challan') }}"><i class="fas fa-angle-right"></i>&nbsp;Challan</a>
                        <a class="nav-link {{($route == 'company.changepassword')?'':''}}" href="{{  url('service-create/ais/inventory')}}"><i class="fas fa-angle-right"></i>&nbsp;Inventory</a>
                        <a class="nav-link {{($route == 'company.changepassword')?'':''}}" href="{{ url('service-create/ais/conveyance') }}"><i class="fas fa-angle-right"></i>&nbsp;Conveyance</a>
                    </nav>
                </div> --}}


                {{-- <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts8" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-sliders-h" style="color: rgb(92, 176, 224)"></i></div>
                    HCM Service
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts8" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{($route == 'company.profile')?'active':''}}" href="{{ url('service-create/hcm/hcm') }}"><i class="fas fa-angle-right"></i>&nbsp;HCM</a>
                        <a class="nav-link {{($route == 'company.profile')?'active':''}}" href="{{  url('service-create/hcm/Employee')}}"><i class="fas fa-angle-right"></i>&nbsp;Employee</a>
                        <a class="nav-link {{($route == 'user.index')?'':''}}" href="{{ url('service-create/hcm/Salary & Wages') }}"><i class="fas fa-angle-right"></i>&nbsp;Salary & Wage</a>
                        <a class="nav-link {{($route == 'company.changepassword')?'':''}}" href="{{ url('service-create/hcm/Task Manager') }}"><i class="fas fa-angle-right"></i>&nbsp;Task Manager</a>
                        <a class="nav-link {{($route == 'company.changepassword')?'':''}}" href="{{ url('service-create/hcm/Attendance') }}"><i class="fas fa-angle-right"></i>&nbsp;Attendance</a>
                        <a class="nav-link {{($route == 'company.changepassword')?'':''}}" href="{{ url('service-create/hcm/Deduction') }}"><i class="fas fa-angle-right"></i>&nbsp;Deduction</a>
                        <a class="nav-link {{($route == 'company.changepassword')?'':''}}" href="{{  url('service-create/hcm/Recruitment')}}"><i class="fas fa-angle-right"></i>&nbsp;Recruitment</a>
                        <a class="nav-link {{($route == 'company.changepassword')?'':''}}" href="{{ url('service-create/hcm/Aptitude') }}"><i class="fas fa-angle-right"></i>&nbsp;Aptitude</a>
                    </nav>
                </div> --}}

                {{-- <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts9" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-sliders-h" style="color: rgb(228, 143, 128)"></i></div>
                    PLM Service
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts9" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{($route == 'company.profile')?'active':''}}" href="{{ url('service-create/plm/PLM') }}"><i class="fas fa-angle-right"></i>&nbsp;PLM</a>
                        <a class="nav-link {{($route == 'company.profile')?'active':''}}" href="{{  url('service-create/plm/Style')}}"><i class="fas fa-angle-right"></i>&nbsp;Style</a>
                        <a class="nav-link {{($route == 'user.index')?'':''}}" href="{{ url('service-create/plm/Budget') }}"><i class="fas fa-angle-right"></i>&nbsp;Budget</a>
                        <a class="nav-link {{($route == 'company.changepassword')?'':''}}" href="{{ url('service-create/plm/T&A') }}"><i class="fas fa-angle-right"></i>&nbsp;T&A</a>
                        <a class="nav-link {{($route == 'company.changepassword')?'':''}}" href="{{ url('service-create/plm/Production') }}"><i class="fas fa-angle-right"></i>&nbsp;Production</a>
                        <a class="nav-link {{($route == 'company.changepassword')?'':''}}" href="{{ url('service-create/plm/IE') }}"><i class="fas fa-angle-right"></i>&nbsp;IE</a>
                        <a class="nav-link {{($route == 'company.changepassword')?'':''}}" href="{{  url('service-create/plm/Log')}}"><i class="fas fa-angle-right"></i>&nbsp;Log</a>
                        <a class="nav-link {{($route == 'company.changepassword')?'':''}}" href="{{ url('service-create/plm/Design') }}"><i class="fas fa-angle-right"></i>&nbsp;Design</a>
                    </nav>
                </div>
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts10" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-sliders-h" style="color: rgb(132, 132, 243)"></i></div>
                    SCM Service
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts10" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{($route == 'company.profile')?'active':''}}" href="{{ url('service-create/scm/SCM') }}"><i class="fas fa-angle-right"></i>&nbsp;SCM</a>
                        <a class="nav-link {{($route == 'company.profile')?'active':''}}" href="{{  url('service-create/scm/Commercial')}}"><i class="fas fa-angle-right"></i>&nbsp;Commercial</a>
                        <a class="nav-link {{($route == 'user.index')?'':''}}" href="{{ url('service-create/scm/Shipping Docs') }}"><i class="fas fa-angle-right"></i>&nbsp;Shipping Docs</a>

                    </nav>
                </div> --}}


                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts11" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-sliders-h" style="color: blue"></i></div>
                    Administator
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts11" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{($route == 'company.profile')?'active':''}}" href="{{ route('company.profile') }}"><i class="fas fa-angle-right"></i>&nbsp;Company Profile</a>
                        <a class="nav-link {{($route == 'user.index')?'':''}}" href="{{ route('user.index') }}"><i class="fas fa-angle-right"></i>&nbsp;Add User</a>
                        <a class="nav-link {{($route == 'company.changepassword')?'':''}}" href="{{ route('user.changepassword') }}"><i class="fas fa-angle-right"></i>&nbsp;Setting</a>
                    </nav>
                </div>
                <a class="nav-link" href="{{route('logout')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt" style="color: red"></i></div>
                    Log Out
                </a>
            </div>
        </div>
    </nav>
</div>
