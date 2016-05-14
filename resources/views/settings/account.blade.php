@extends('layouts.app')

@section('title')
    Account settings
@endsection

@section('sidebar-left')
    <div class="sidebar sidebar-main sidebar-default">
        <div class="sidebar-fixed">
            <div class="sidebar-content">
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-content no-padding">
                        <ul class="navigation navigation-main navigation-accordion">
                            <li>
                                <a href="{{ url('settings/profile') }}"><span>Profile</span></a>
                            </li>
                            <li class="active">
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
                        <h5 class="panel-title">Avangate Account</h5>
                    </div>
                    <div class="panel-body">
                        @include('partials.errors')
                        @include('partials.status')
                        <form action="{{ url('settings/account') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {!!  csrf_field() !!}

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="code">Merchant code:</label>
                                <div class="col-md-6">
                                    <input type="text" name="code" id="coe" class="form-control" value="{{ $user->code or old('code') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="key">Secret key:</label>
                                <div class="col-md-6">
                                    <input type="text" name="key" id="key" class="form-control" value="{{ $user->key or old('key') }}">
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