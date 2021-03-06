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
                    <h1>{{ $product->name }}
                        <small class="display-block"><a class="text-white" href="#">Marketing</a></small>
                    </h1>
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
            <div class="col-xs-8">
                <div class="panel panel-white">
                    <div class="panel-body">
                        <h2>{{ $product->name }} | Total Clicks :{{$sharesTotal}}</h2>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>User Email</th>
                                        <th>Clicks Generated</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($userShares as $sharer => $shares)
                                        <tr>
                                            <td>{{$sharer}}</td>
                                            <td>{{$shares}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2">THERE ARE NOT SHARES</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="panel panel-white">
                    <div class="panel-body">
                        <form action="{{route('products.update',$product->id)}}" method="post" role="form">
                            <legend>Set Product Options</legend>
                            {!! csrf_field() !!}
                            <input name="_method" type="hidden" value="PUT">
                            <div class="form-group">
                                <label for="coupon">Add Coupon</label>
                                <input type="text" class="form-control" name="coupon" id="coupon" placeholder="Coupon..." value="{!! isset($product->coupon) ? $product->coupon : '' !!}">
                            </div>
                            <div class="form-group">
                                <label for="limit">Add limit</label>
                                <input type="text" class="form-control" name="limit" id="limit" placeholder="Limit..." value="{!! isset($product->limit) ? $product->limit : '' !!}">
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection