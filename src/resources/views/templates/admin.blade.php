<!DOCTYPE html>
<html>

<head>
    @include('pqeAdmin::partials.head')
    @yield('styles')
    <style>
    .navbar .nav-item .dropdown-menu{ display: none; }
	.navbar .nav-item:hover .nav-link{   }
	.navbar .nav-item:hover .dropdown-menu{ display: block; }
    </style>
</head>

<body class="sidebar-mini layout-fixed" style="height: auto;">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand bg-dark navbar-light border-bottom py-lg-0">
            <div class="container-fluid" style="margin-top: 12px">
	            @include('pqeAdmin::partials.menuLeft')
                @include('pqeAdmin::partials.menuAdmin')
                @include('pqeAdmin::partials.menuRight')
            </div>
        </nav>

        @include('pqeAdmin::partials.contentWrapper')
       
        @include('pqeAdmin::partials.footer')
        
    </div>
    @include('pqeAdmin::partials.scripts')

    @yield('scripts')
</body>

</html>

@include('pqeAdmin::partials.styles')
