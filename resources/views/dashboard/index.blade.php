@extends('admin')

@section('title') Admin Homepage @endsection

@section('heading') Dashboard <small> Hi, {{Auth::user()->name}}  </small> @endsection

@section('breadcrumb')

        <li><a href="/home">Home</a></li>


@endsection

@section('content')
    <div class="row">


    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-bag fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$goodsCount}}</div>
                        <div>Goods!</div>
                    </div>
                </div>
            </div>
            <a href="/goods">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    </div>

    @endsection
