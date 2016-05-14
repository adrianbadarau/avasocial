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
        <form action="{{ url('/password/email') }}" method="post">
            {!! csrf_field() !!}

            <div class="panel panel-body login-form">
                <div class="text-center">
                    <div class="icon-object border-slate-300 text-slate-300">
                        <i class="icon-spinner11"></i>
                    </div>
                    <h3 class="content-group">{{ Lang::get('auth.reset_title') }} <small class="display-block">{{ Lang::get('auth.reset_subtitle') }}</small></h3>
                </div>

                @include('partials.errors')

                @include('partials.status')

                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="{{ Lang::get('auth.reset_email') }}" autofocus="autofocus">
                    <div class="form-control-feedback">
                        <i class="icon-mention text-muted"></i>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">{{ Lang::get('auth.reset_button') }} <i class="icon-circle-right2 position-right"></i></button>
                </div>
            </div>

            <div class="text-center">
                {{ Lang::get('auth.register_have_account') }} <a href="{{ url('/login') }}">{{ Lang::get('auth.reset_login_account') }}</a>
            </div>
        </form>
    </div>
@endsection






@section('content')
    <div class="container page-reset">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">{{ Lang::get('auth.reset_title') }}</h2>



                        <form role="form" action="{{ url('/password/email') }}" method="POST" class="form-reset form floating-label">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}" tabindex="1">
                                <label for="email">{{ Lang::get('auth.reset_email') }}</label>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" tabindex="2">{{ Lang::get('auth.reset_button') }}</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="text-center">
                    {{ Lang::get('auth.register_have_account') }} <a href="{{ url('/login') }}" tabindex="3"><strong>{{ Lang::get('auth.reset_login_account') }}</strong></a>
                </div>
            </div>
        </div>
    </div>
@endsection
