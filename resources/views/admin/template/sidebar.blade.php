<div id="wrapper">
    <!-- Sidebar -->
    <ul style="background-color: #EB5757 !important" class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar" >
        <a class="sidebar-brand d-flex align-items-center justify-content-center" style="background-color: #D9D9D9;"
            href="/home">
            <div class="sidebar-brand-text mx-2 "><img width="150" src="{{ URL::asset('foto/logo.png') }}" alt=""
                    srcset=""></div>
        </a>
        <div >
            <li class="nav-item p-2" style="font-size: 15px">
                <center><b>
                        {{-- <p style="color: white !important" style="font-size: 12px">{{ auth()->user()->role }}</p> --}}
                    </b></center>
            </li>
            <hr >
            <li  class="nav-item {{ request()->is('home') ? 'active' : '' }}">
                <a style="color: white" class="nav-link {{ request()->is('home') ? 'text-primary' : '' }}" href="/home">
                    <i style="color: white" class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            {{-- @if (auth()->user()->role === 'super-admin')
    
            @endif --}}
            <hr style="background-color: red !important">
    
            @if (auth()->user()->role == 4 ||
            auth()->user()->role == 3 ||
            auth()->user()->role == 2 ||
            auth()->user()->role == 5)
                <li class="nav-item {{ request()->is('user') ? 'active' : '' }}">
                    <a  style="color: white" class="nav-link {{ request()->is('user') ? 'text-primary' : '' }}" href="/user">
                        <i style="color: white" class="fas fa-users"></i>
                        <span>Supervisorplus</span></a>
                </li>
                <hr >
            @endif
            @if (auth()->user()->role == 4 ||
                    auth()->user()->role == 3 ||
                    auth()->user()->role == 2 ||
                    auth()->user()->role == 5)
                <li class="nav-item {{ request()->is('agent') ? 'active' : '' }}">
                    <a style="color: white" class="nav-link {{ request()->is('role') ? 'text-primary' : '' }}" href="/role">
                        <i style="color: white" class="fas fa-users"></i>
                        <span>User Role</span></a>
                </li>
                <hr >
            @endif
    
            @if (auth()->user()->role == 1 ||
                     auth()->user()->role == 4 ||
                    auth()->user()->role == 3 ||
                    auth()->user()->role == 2 ||
                    auth()->user()->role == 5)
                <li class="nav-item {{ request()->is('ticket') ? 'active' : '' }}">
                    <a style="color: white" class="nav-link {{ request()->is('ticket') ? 'text-primary' : '' }}" href="/ticket">
                        <i style="color: white" class="fas fa-sitemap"></i>
                        <span>Summary Tiket</span></a>
                </li>
                <hr >
            @endif
        </div>


        {{-- menu report --}}
        {{-- <li class="nav-item {{ request()->is('report') ? 'active' : '' }}">
            <a class="nav-link {{ request()->is('report') ? 'text-primary' : '' }}" href="/report">
                <i class="fas fa-file-word"></i>
                <span>Report</span></a>
        </li> --}}

        <hr style="background-color: red !important" >


        <div style="color: white !important" class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- TopBar -->
            <nav style="background-color: #D9D9D9;"
                class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">

                    {{-- {{ auth()->user()->avatar ? auth()->user()->avatar : 'https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png' }} --}}
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="img-profile rounded-circle"
                                src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png"
                                style="max-width: 60px">
                            <span class="ml-2 d-none d-lg-inline text-white small text-dark">{{ auth()->user()->nama_depan }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <div class="dropdown-divider"></div>
                            
                                <a class="dropdown-item" href="{{ route('detailProfilUser', auth()->user()->id) }}"><i
                                        class="fas fa-user-circle mr-2 text-gray-400"></i>Profile</a>
                           

                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="dropdown-item" type="submit">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </button>
                            </form>

                        </div>
                    </li>
                </ul>
            </nav>
            <!-- Topbar -->
