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
   <!-- <nav class="topnav navbar fixed-top"> -->
      <!-- 		<nav class="topnav"> -->

      <a class="navbar-brand" href="#">
<!--         <img src="http://www.pqegroup.com/wp-content/uploads/2018/07/PQE-Group_white_yellow-glyph-e1530697715100.png" alt="" class="brand-image image-circle elevation-3" style="opacity: .8; width: 110%;">  -->
             <img src="{{ url('/images/PQE-Group_white_yellow-glyph.png') }}" alt="" class="brand-image image-circle elevation-3" style="opacity: .8; width: 110%;"> 
      </a>

          <span class="navbar-text navbar-left d-flex d-inline-flex d-sm-inline-block" style="font-size: 18px; text-align: left; color: white;"> <img src="{{ url('/images/Logo HR quadrato.png') }}" border="0" style="width: 7%" /> PQE Admin
        </span>

        <span class="navbar-text navbar-left d-flex d-inline-flex d-sm-inline-block" style="font-size: 18px; color: white; color: #ffff; width:45%;">
        User: {{auth()->user()->username }} - {{auth()->user()->name }}
      </span>

        <a class="float-right navbar-text d-flex d-inline-flex" style="padding-top : auto; font-size:18px ;color: white; color: #ffff;" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
          <i class="fas fa-fw fa-sign-out-alt nav-icon d-inline-flex"> </i> {{
			trans('pqeAdmin::global.logout') }}
        </a>
    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
    </form>
    </nav>
  </div>

  <div class="form-group" style="padding-top : 110px">
    @if($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{$message}}</p>
    </div>
    @endif
    <div align="center" style="background-color: white" class="row">
      <div style="float: left; width: 20%" class="col">
        <a href="{{ url('/admin')}}" target="_blank">
          <img src="{{ url('/images/icona Admin.png') }}" border="0" style="width: 20%" />
        </a>
          <p style="font-size: 30px;">PQE Admin Home Page</p>
      </div>
    </div>

    <div class=".bckgrd">
      <img src="{{ url('/images/sfondo.jpg') }}" style="width: 100%; height: 50%" />
    </div>
  </div>
</body>