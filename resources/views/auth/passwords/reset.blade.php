@extends('layouts.app')

@section('title')
    Reset password
@endsection

@section('header')
@endsection

@section('page-container-addon')
    login-container
@endsection

@section('content')
    <div class="content-wrapper">
        <form action="{{ url('/password/reset') }}" method="post">
            {!! csrf_field() !!}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="panel panel-body login-form">
                <div class="text-center">
                    <div class="icon-object border-slate-300 text-slate-300">
                        <i class="icon-spinner11"></i>
                    </div>
                    <h3 class="content-group">{{ Lang::get('auth.reset_title') }}</h3>
                </div>

                @include('partials.errors')

                @include('partials.status')

                <div class="form-group has-feedback has-feedback-left">
                    <input type="email" name="email" class="form-control" value="{{ $email or old('email') }}" placeholder="{{ Lang::get('auth.reset_email') }}">
                    <div class="form-control-feedback">
                        <i class="icon-mention text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <input type="password" name="password" class="form-control" value="" placeholder="{{ Lang::get('auth.reset_password') }}" autofocus="autofocus">
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <input type="password" name="password_confirmation" class="form-control" value="" placeholder="{{ Lang::get('auth.reset_password_confirmation') }}">
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">{{ Lang::get('auth.reset_password_button') }} <i class="icon-circle-right2 position-right"></i></button>
                </div>
            </div>

            <div class="text-center">
                {{ Lang::get('auth.register_have_account') }} <a href="{{ url('/login') }}">{{ Lang::get('auth.reset_login_account') }}</a>
            </div>
        </form>
    </div>
@endsection