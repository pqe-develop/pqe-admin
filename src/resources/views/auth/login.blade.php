@extends('pqeAdmin::auth.app')
@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('home') }}">
		   <img src="{{ url('/layout/images/Logo_PQE_rettangolare.png') }}" border="0" width="300" height="150" alt="{{ trans('panel.site_title') }}"/> 
        </a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">
                {{ trans('panel.welcome') }}
            </p>

            @if(session()->has('message'))
                <p class="alert alert-info">
                    {{ session()->get('message') }}
                </p>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="form-group">
                    <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" required autocomplete="username" autofocus placeholder="{{ trans('pqeAdmin::global.login_email') }}" name="username" value="{{ old('username', null) }}">

                    @if($errors->has('username'))
                        <div class="invalid-feedback">
                            {{ $errors->first('username') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ trans('pqeAdmin::global.login_password') }}">

                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>


                <div class="row">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        {{ trans('pqeAdmin::global.login') }}
                    </button>
                </div>
            </form>


           
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection
