<!-- Main Sidebar Container -->
<div>
    <!-- Brand Logo -->
    @if(\Illuminate\Support\Facades\Auth::user()->rule == 'admin')
        <a href="{{route('profileIndex')}}" class="brand-link">
            @else
                <a href="{{route('newRequest')}}" class="brand-link">
                    @endif

                    <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                         style="opacity: .8">
                    <span class="brand-text font-weight-light">Profile</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            @if(\Illuminate\Support\Facades\Auth::user()->rule == 'admin')
                                <img src="/img/admin.jpg" class="img-circle elevation-2" alt="User Image">
                            @else()
                                <img src="/img/user.png" class="img-circle elevation-2" alt="User Image">
                            @endif
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->

                            @if(\Illuminate\Support\Facades\Auth::user()->rule == 'admin')
                                <li class="nav-item">
                                    <a href="{{route('profileIndex')}}" class="nav-link">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>
                                            Dashboard
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('requests')}}" class="nav-link">
                                        <i class="nav-icon far fa-circle text-danger"></i>
                                        <p class="text">Requests
                                            <span class="badge badge-info right">{{$this->requestsNumber}}</span>
                                        </p>
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a href="{{route('newRequest')}}" class="nav-link">
                                    <i class="nav-icon far fa-circle text-green"></i>
                                    <p class="text">New Request</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
</div>
