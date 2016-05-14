@extends('layouts.app')

@section('title')
    Login
@endsection

@section('header')
@endsection

@section('page-container-addon')
    login-container
@endsection

@section('content')

    <div class="content-wrapper">
        <form action="{{ url('/login') }}" method="post">
            {!! csrf_field() !!}

            <div class="panel panel-body login-form">
                <div class="text-center">
                    <div class="icon-object border-slate-300 text-slate-300">
                        <i class="icon-reading"></i>
                    </div>
                    <h3 class="content-group">{{ Lang::get('auth.login_title') }} <small class="display-block">{{ Lang::get('auth.login_subtitle') }}</small></h3>
                </div>

                @include('partials.errors')

                <div class="form-group has-feedback has-feedback-left">
                    <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="{{ Lang::get('auth.login_email') }}" autofocus="autofocus">
                    <div class="form-control-feedback">
                        <i class="icon-mention text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <input type="password" name="password" class="form-control" placeholder="{{ Lang::get('auth.login_password') }}">
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">{{ Lang::get('auth.login_button') }} <i class="icon-circle-right2 position-right"></i></button>
                </div>

                <div class="text-center">
                    <a href="{{ url('/password/reset') }}">{{ Lang::get('auth.login_forgot_password') }}</a>
                </div>
            </div>

            <div class="text-center">
                {{ Lang::get('auth.login_no_account') }} <a href="{{ url('/register') }}">{{ Lang::get('auth.login_register_account') }}</a>
            </div>
        </form>
    </div>
@endsection
