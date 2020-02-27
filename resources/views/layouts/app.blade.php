<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    @include('layouts.partials.header')

</head>

<body class="theme-blue">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Yükleniyor...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">ZoneZero</a>
        </div>

    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <i class="material-icons" style="color: white;">person</i>
            </div>
            <div class="info-container">

                <div class="email">{{ \Illuminate\Support\Facades\Auth::user()->email }}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <form id="logoutForm" action="{{ route('admin.logout') }}" method="post" style="display: none">
                            {{ csrf_field() }}
                        </form>
                        <li><a href="{{ route('admin.edit',\Illuminate\Support\Facades\Auth::user()->id) }}"><i class="material-icons">person</i>Profil</a></li>
                        <li><a href="#" onclick="event.preventDefault();document.getElementById('logoutForm').submit();"><i class="material-icons">input</i>Çıkış yap</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">----------------------------</li>
                <li>
                    <a href="{{ route('admin.users') }}">
                        <i class="material-icons">assignment_ind</i>
                        <span>Kullanıcılar</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2020 <a href="javascript:void(0);">ZoneZero</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.4
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>

<section class="content">

    @yield('content')

</section>

    @include('layouts.partials.jsFile')
</body>

</html>