@extends('layouts.app')

@section('title')
    Profile settings
@endsection

@section('sidebar-left')
    <div class="sidebar sidebar-main sidebar-default">
        <div class="sidebar-fixed">
            <div class="sidebar-content">
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-content no-padding">
                        <ul class="navigation navigation-main navigation-accordion">
                            <li class="active">
                                <a href="{{ url('settings/profile') }}"><span>Profile</span></a>
                            </li>
                            <li>
                                <a href="{{ url('settings/account') }}"><span>Account</span></a>
                            </li>
                            <li>
                                <a href="{{ url('settings/emails') }}"><span>Emails</span></a>
                            </li>
                            <li>
                                <a href="{{ url('settings/billing') }}"><span>Billing</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h5 class="panel-title">Profile settings</h5>
                    </div>
                    <div class="panel-body">
                        @include('partials.errors')
                        @include('partials.status')
                        <form action="{{ url('settings/profile') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {!!  csrf_field() !!}

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Your avatar:</label>
                                <div class="col-lg-9">
                                    <div class="media no-margin-top">
                                        @if (File::exists(public_path('avatar') .'/'. $user->id .'.png'))
                                            <div class="media-left">
                                                <a href="#"><img src="{{ url('avatar/'. $user->id .'.png') }}" style="width: 58px; height: 58px;" class="img-rounded" alt=""></a>
                                            </div>
                                        @endif

                                        <div class="media-body">
                                            <div class="uploader">
                                                <input type="file" name="avatar" class="file-styled">
                                                <span class="filename" style="-webkit-user-select: none;">No file selected</span>
                                                <span class="action" style="-webkit-user-select: none;"><i class="icon-googleplus5"></i></span>
                                            </div>
                                            <span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 control-label" for="firstname">First name:</label>
                                <div class="col-md-6">
                                    <input type="text" name="firstname" id="firstname" class="form-control" value="{{ $user->firstname or old('firstname') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="lastname">Last name:</label>
                                <div class="col-md-6">
                                    <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $user->lastname or old('lastname') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="email">Email address:</label>
                                <div class="col-md-6">
                                    <input type="text" name="email" id="email" class="form-control" value="{{ $user->email or old('email') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="password_old">Old password:</label>
                                <div class="col-md-6">
                                    <input type="password" name="password_old" id="password_old" class="form-control" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="password">New password:</label>
                                <div class="col-md-6">
                                    <input type="password" name="password" id="password" class="form-control" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="password_confirmation">Confirm password:</label>
                                <div class="col-md-6">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">Save changes <i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection