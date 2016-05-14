@extends('layouts.app')

@section('title')
    Register
@endsection

@section('header')
@endsection

@section('page-container-addon')
    login-container
@endsection

@section('content')
    <div class="content-wrapper">
        <form action="{{ url('/register') }}" method="post">
            {!! csrf_field() !!}

            <div class="panel panel-body login-form">
                <div class="text-center">
                    <div class="icon-object border-slate-300 text-slate-300">
                        <i class="icon-plus3"></i>
                    </div>
                    <h3 class="content-group">{{ Lang::get('auth.register_title') }}</h3>
                </div>

                @include('partials.errors')

                <div class="form-group has-feedback has-feedback-left">
                    <input type="text" name="firstname" class="form-control" value="{{ old('firstname') }}" placeholder="{{ Lang::get('auth.register_firstname') }}" autofocus="autofocus">
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <input type="text" name="lastname" class="form-control" value="{{ old('lastname') }}" placeholder="{{ Lang::get('auth.register_lastname') }}">
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="{{ Lang::get('auth.register_email') }}">
                    <div class="form-control-feedback">
                        <i class="icon-mention text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <input type="password" name="password" class="form-control" value="" placeholder="{{ Lang::get('auth.register_password') }}">
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">{{ Lang::get('auth.register_button') }} <i class="icon-circle-right2 position-right"></i></button>
                </div>

                <div class="text-center">
                    <a href="{{ url('/password/reset') }}">{{ Lang::get('auth.login_forgot_password') }}</a>
                </div>
            </div>

            <div class="text-center">
                {{ Lang::get('auth.register_have_account') }} <a href="{{ url('/login') }}">{{ Lang::get('auth.register_login_account') }}</a>
            </div>
        </form>
    </div>
@endsection
