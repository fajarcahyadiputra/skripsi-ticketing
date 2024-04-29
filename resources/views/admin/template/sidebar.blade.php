<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" style="background-color: red;"
            href="/home">
            <div class="sidebar-brand-text mx-2 "><img width="150" src="{{ URL::asset('foto/logo.png') }}" alt=""
                    srcset=""></div>
        </a>
        <li class="nav-item p-2" style="font-size: 15px">
            <center><b>
                    <p style="font-size: 12px">{{ auth()->user()->role }}</p>
                </b></center>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
            <a class="nav-link {{ request()->is('home') ? 'text-primary' : '' }}" href="/home">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        {{-- @if (auth()->user()->role === 'super-admin')

        @endif --}}
        <hr class="sidebar-divider">

        @if (auth()->user()->role == 'manajer' ||
                auth()->user()->role == 'tim_analis' ||
                auth()->user()->role == 'officier' ||
                auth()->user()->role == 'supervisor')
            <li class="nav-item {{ request()->is('user') ? 'active' : '' }}">
                <a class="nav-link {{ request()->is('user') ? 'text-primary' : '' }}" href="/user">
                    <i class="fas fa-users"></i>
                    <span>Data Pengguna</span></a>
            </li>
            <hr class="sidebar-divider">
        @endif
        @if (auth()->user()->role == 'manajer' ||
                auth()->user()->role == 'tim_analis' ||
                auth()->user()->role == 'officier' ||
                auth()->user()->role == 'supervisor')
            <li class="nav-item {{ request()->is('obat') ? 'active' : '' }}">
                <a class="nav-link {{ request()->is('obat') ? 'text-primary' : '' }}" href="/agent">
                    <i class="fas fa-users"></i>
                    <span>Agent</span></a>
            </li>
            <hr class="sidebar-divider">
        @endif

        @if (auth()->user()->role == 'agent' ||
                auth()->user()->role == 'manajer' ||
                auth()->user()->role == 'tim_analis' ||
                auth()->user()->role == 'officier' ||
                auth()->user()->role == 'supervisor')
            <li class="nav-item {{ request()->is('satuan') ? 'active' : '' }}">
                <a class="nav-link {{ request()->is('satuan') ? 'text-primary' : '' }}" href="/ticket">
                    <i class="fas fa-sitemap"></i>
                    <span>Ticket</span></a>
            </li>
            <hr class="sidebar-divider">
        @endif


        {{-- menu report --}}
        {{-- <li class="nav-item {{ request()->is('report') ? 'active' : '' }}">
            <a class="nav-link {{ request()->is('report') ? 'text-primary' : '' }}" href="/report">
                <i class="fas fa-file-word"></i>
                <span>Report</span></a>
        </li> --}}

        <hr class="sidebar-divider">


        <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- TopBar -->
            <nav style="background-color: red;"
                class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">


                    <div class="topbar-divider d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="img-profile rounded-circle"
                                src="{{ auth()->user()->avatar ? auth()->user()->avatar : 'https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png' }}"
                                style="max-width: 60px">
                            <span class="ml-2 d-none d-lg-inline text-white small">{{ auth()->user()->nama }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <div class="dropdown-divider"></div>
                            @if (auth()->user()->role == 'agent')
                                <a class="dropdown-item" href="{{ route('detailProfil', auth()->user()->id) }}"><i
                                        class="fas fa-user-circle mr-2 text-gray-400"></i>Profile</a>
                            @endif
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
