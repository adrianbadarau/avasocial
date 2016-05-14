@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="profile-cover mb-20">
            <div class="profile-cover-img" style="background-image: url(https://placehold.it/1500x572)"></div>
            <div class="media">
                <div class="media-left">
                    <div class="profile-thumb">
                        <img src="https://placehold.it/550x550" class="img-circle" alt="">
                    </div>
                </div>

                <div class="media-body">
                    <h1>{{ $product->name }} <small class="display-block"><a class="text-white" href="#">Marketing</a></small></h1>
                </div>

                <div class="media-right media-middle">
                    <ul class="list-inline list-inline-condensed no-margin-bottom text-nowrap">
                        <li>

                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-white">
                    <div class="panel-body">
                        {{ $product->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection