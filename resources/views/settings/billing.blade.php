@extends('layouts.app')

@section('title')
    Billing settings
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
                            <li>
                                <a href="{{ url('settings/account') }}"><span>Account</span></a>
                            </li>
                            <li>
                                <a href="{{ url('settings/emails') }}"><span>Emails</span></a>
                            </li>
                            <li class="active">
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
                        <h5 class="panel-title">Billing overview</h5>
                    </div>
                    <div class="panel-body">
                        @include('partials.errors')
                        @include('partials.status')
                        <form action="{{ url('settings/profile') }}" method="post" class="form-horizontal">
                            {!!  csrf_field() !!}
                        </form>
                    </div>
                </div>

                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h5 class="panel-title">Payment history</h5>
                    </div>
                    <div class="panel-body">
                        @include('partials.errors')
                        @include('partials.status')
                        <form action="{{ url('settings/profile') }}" method="post" class="form-horizontal">
                            {!!  csrf_field() !!}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection