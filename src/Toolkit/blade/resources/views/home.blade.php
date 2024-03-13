<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  <style>
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
    }

    .topnav {
      overflow: hidden;
      background-color: #4899c8;
    }

    .topnav a {
      overflow: hidden;
      float: left;
      text-align: center;
      padding: 14px 16px;
      font-size: 17px;
    }

    .topnav a:hover {
      overflow: hidden;
      background-color: #4899c8;
      color: #4899c8;
    }

    .topnav a.active {
      overflow: hidden;
      background-color: #4899c8;
      color: #4899c8;
    }

    .topnav-right {
      overflow: hidden;
      float: right;
      color: #4899c8;
      background-color: #4899c8;
    }

    .navbar-text {
      display: inline;
      padding-top: 0.5rem;
      padding-bottom: 0.5rem;
    }

    span.navbar-text.navbar-left.d-flex.d-inline-flex.link-dark {
      width: -webkit-fill-available;
    }

    /* div {
	background-color: #ffff;
} */
  </style>
</head>

<body class="sidebar-mini layout-fixed" style="height: auto;">
	<!--Navigation-->
	<nav class="main-header navbar navbar-expand bg-dark navbar-light border-bottom py-lg-0">
    	<div class="container">
    		<a class="navbar-brand" href="#">
	            <span class="navbar-text navbar-left d-flex d-inline-flex d-sm-inline-block" >
					<img src="{{ url('/layout/images/logo PQE 2024.png') }}" alt="" class="brand-image image-circle elevation-3" style="opacity: .8; width: 10%;"> 
        	    </span>
          	</a>
            <div align="center">
            	<span class="navbar-text navbar-left d-flex d-inline-flex d-sm-inline-block" style="font-size: 36px; align: left; font-style: oblique; background-color: lightyellow; color: black; width: 50%">
             {{ trans('panel.site_title') }}
            </span>
			</div>
            <div align="right">
            	<span class="navbar-text navbar-left d-flex d-inline-flex d-sm-inline-block" style="font-size: 18px; align: right; background-color: lightcyan; color: black;">
             User: {{auth()->user()->username }} - {{auth()->user()->name }}
    		</span>
            </div>
      	</div>
	</nav>

	<div class="form-group" style="padding-top : 110px">
    	@if($message = Session::get('success'))
    	<div class="alert alert-success">
      		<p>{{$message}}</p>
		</div>
    	@endif
        <div align="right">
                <a class="float-right navbar-text d-flex d-inline-flex" style="padding-right : auto; font-size:36px ;background-color: aliceblue; color: black;" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt nav-icon d-inline-flex"> </i> {{ trans('pqeAdmin::global.logout') }}
                </a>
                <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
        </div>
    	<div align="center" style="background-color: white" class="row">
      		<div style="float: left; width: 20%" class="col">
        		<a href="{{ url('/dashboard')}}" target="_blank">
          			<img src="{{ url('/layout/images/icona Resources.png') }}" border="0" style="width: 20%" />
        		</a>
          		<p style="font-size: 30px;">{{ trans('panel.home_title') }}</p>
      		</div>
      		<div style="float: left; width: 20%" class="col">
        		<a href="{{ url('/admin')}}" target="_blank">
          			<img src="{{ url('/layout/images/icona Admin.png') }}" border="0" style="width: 20%" />
        		</a>
          		<p style="font-size: 30px;">{{ trans('pqeAdmin::global.admin') }}</p>
      		</div>
            <div style="float: left; width: 20%" class="col"></div>
            <div style="float: left; width: 20%" class="col"></div>
            <div style="float: left; width: 20%" class="col"></div>
	    	<div class=".bckgrd">
      			<img src="{{ url('/layout/images/sfondo.jpg') }}" style="width: 100%; height: 50%" />
    		</div>
  		</div>
	</div>
</body>