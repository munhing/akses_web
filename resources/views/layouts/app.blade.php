<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{config('app.name')}}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/free.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
    @yield('links')
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
<header id="navbar" class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        AKSES.
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav navbar-nav ml-auto">

        <li class="nav-item">
            <a class="nav-link" data-toggle="tooltip" data-placement="bottom" data-original-title="Visitor Registration" style="margin-right: 10px" href="#" @click.prevent="visitorRegistrationModal">
                <i class="fa fa-users text-danger" style="font-size: 1.5rem"></i>
                <visitor-registration-modal ref="myVisitorRegistrationModal"></visitor-registration-modal>
            </a>
            
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" style="margin-right: 20px" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="true" aria-expanded="true">
                Welcome, {!! Auth::user()->name !!}
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                <a class="dropdown-item" href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i>Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>      
    </ul>
</header>

<div class="app-body">
    @include('layouts.sidebar')
    <main class="main" id="app">
        @yield('content')
    </main>
</div>
<footer class="app-footer">
    <div>
        <a href="http://www.llpm.com.my" target="_blank">Labuan Liberty Port Management Sdn. Bhd. </a>
        <span>&copy; 2019 All rights reserved.</span>
    </div>
    <div class="ml-auto">
        <span>Powered by</span>
        AKSES.
    </div>
</footer>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script src="{{ asset('vendor/@coreui/coreui-pro/dist/js/coreui.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</html>
