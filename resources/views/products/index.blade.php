@extends('layouts.app')

@section('page-header')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-puzzle2 position-left"></i> <span class="text-semibold">Products</span></h4>
            </div>

            <div class="heading-elements show">
                <a href="{{ url('products/seed') }}" class="btn bg-green btn-labeled heading-btn"><b><i class="icon-pencil7"></i></b> Retrieve products</a>
            </div>
        </div>
    </div>
@endsection

@section('sidebar-left')
    <div class="sidebar sidebar-main sidebar-default">
        <div class="sidebar-fixed">
            <div class="sidebar-content">
                <div class="sidebar-category">
                    <div class="category-title">
                        <span>Search products</span>
                    </div>
                    <div class="category-content">
                        <form action="{{ url('products') }}" method="get">
                            <div class="has-feedback has-feedback-left">
                                <input type="search" name="s" class="form-control" placeholder="Type and hit Enter">
                                <div class="form-control-feedback">
                                    <i class="icon-search4 text-size-base text-muted"></i>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="sidebar-category">
                    <div class="category-title">
                        <span>Filter products</span>
                    </div>
                    <div class="category-content no-padding">
                        <ul class="navigation navigation-alt navigation-accordion">
                            <li><a href="{{ url('products') }}">All products</a></li>
                            <li><a href="#">Customer service</a></li>
                            <li><a href="#">Management</a></li>
                            <li><a href="#">Marketing</a></li>
                            <li><a href="#">Reporting</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content-wrapper">
        @foreach ($products->chunk(3) as $chunk)
            <div class="row">
                @foreach ($chunk as $product)
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <div class="thumb">
                                <img src="https://placehold.it/600x450" alt="">
                            </div>

                            <div class="caption pr-5 pl-5">
                                <h3 class="no-margin-top text-semibold"><a href="{{ url('products/'. $product->id) }}" class="text-default">{{ $product->name }}</a> <a href="{{ url('products/'. $product->id) }}" class="btn btn-success btn-xs pull-right"><i class="icon-download position-left"></i> View</a></h3>
                                {{ str_limit($product->name, 100) }}
                            </div>

                            <div class="panel-footer">
                                <ul>
                                    <li><a href="#"><i class="icon-files-empty mr-5"></i>Graphs</a></li>
                                </ul>

                                <ul class="pull-right">
                                    <li><a href="#">More &raquo;</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection