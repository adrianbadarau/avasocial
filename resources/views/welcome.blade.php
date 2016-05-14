@extends('layouts.app')

@section('title')
    Welcome to Avasoci.al
@endsection

@section('header')
@endsection

@section('page-container-addon')
    page-container
@endsection

@section('content')

    <div class="content-wrapper">
        <div class="content">
            <div class="text-center content-group">
                <h1 class="error-title">AVASOCI.AL</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
                    <form action="#" class="main-search">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{ url('settings/account') }}" class="btn btn-primary btn-block content-group"><i class="icon-circle-right2 position-left"></i> Setup account</a>
                            </div>

                            <div class="col-sm-6">
                                <a href="{{ url('products') }}" class="btn btn-default btn-block content-group"><i class="icon-puzzle2 position-left"></i> Edit products</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
