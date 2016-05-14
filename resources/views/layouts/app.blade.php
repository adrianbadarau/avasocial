<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900&subset=latin-ext" rel="stylesheet" type="text/css">
    <link href="/css/app.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="/js/app.js"></script>

    <!--[if lt IE9]>
    <script type="text/javascript" src="/js/html5shiv.min.js"></script>
    <script type="text/javascript" src="/js/respond.min.js"></script>
    <![endif]-->
    @yield('head')
</head>
<body class="layout-boxed navbar-top">
@section('header')
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-boxed">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/') }}">AVASOCI.AL</a>

                <ul class="nav navbar-nav pull-right visible-xs-block">
                    <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                </ul>
            </div>

            <div class="navbar-collapse collapse" id="navbar-mobile">
                <ul class="nav navbar-nav">
                    <li><a href="#">Text link</a></li>

                    <li>
                        <a href="#">
                            <i class="icon-calendar3"></i>
                            <span class="visible-xs-inline-block position-right">Icon link</span>
                        </a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Text link</a></li>

                    <li>
                        <a href="#">
                            <i class="icon-cog3"></i>
                            <span class="visible-xs-inline-block position-right">Icon link</span>
                        </a>
                    </li>

                    <li class="dropdown dropdown-user">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <img src="http://placehold.it/550x550" alt="">
                            <span> @if (!Auth::guest()) {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} @endif</span>
                            <i class="caret"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="{{ url('settings/billing') }}"><i class="icon-coins"></i> My balance</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('settings/profile') }}"><i class="icon-cog5"></i> My settings</a></li>
                            <li><a href="{{ url('logout') }}"><i class="icon-switch2"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@show

@yield('page-header')

@section('page')
<div class="page-container @yield('page-container-addon')">
    <div class="page-content">
        @yield('sidebar-left')

        @yield('content')

        @yield('sidebar-right')

        @yield('footer')
    </div>
    @include('partials.footer')
</div>
@show

</body>
</html>
