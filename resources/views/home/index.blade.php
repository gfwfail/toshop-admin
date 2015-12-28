@extends('layouts.home')

@section('title')
    Homepage
    @endsection


@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="panel panel-default top-panel">

            <div class="panel-body">
                <h3>All Stores</h3>

                <p>Shop today and earn Cash Back at over 1,800 stores online. Find everything you need from
                    men's, children's and women’s clothing, accessories and shoes to home décor, electronics,
                    toys and more. Shop the best sales and deals from your favorite online stores - plus save
                    with thousands of coupons and promo codes. Check back daily for new sales and hot deals to
                    help you save with Cash Back at Toshop!
                </p>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-md-9 ">
        <div class="panel panel-default top-panel">

            <div class="panel-body">


                <p class="letter-nav"><a href="#A">A</a> <a href="#B">B</a> <a href="#C">C</a> <a href="#D">D</a> <a
                            href="#E">E</a> <a href="#F">F</a> <a href="#G">G</a> <a href="#H">H</a> <a href="#I">I</a>
                    <a href="#J">J</a> <a href="#K">K</a> <a href="#L">L</a> <a href="#M">M</a> <a href="#N">N</a> <a
                            href="#O">O</a> <a href="#P">P</a> <a href="#Q">Q</a> <a href="#R">R</a> <a href="#S">S</a>
                    <a href="#T">T</a> <a href="#U">U</a> <a href="#V">V</a> <a href="#W">W</a> <a href="#X">X</a> <a
                            href="#Y">Y</a> <a href="#Z">Z</a> <a href="#num">0-9</a>
                </p>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="30%">Store</th>
                        <th width="40%">Cash Back</th>
                        <th width="30%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $c = [];
                    ?>
                    @foreach($stores as $store)
                        <tr>
                            <td>
                                <?php
                                $f = substr(strtoupper($store->name), 0, 1);

                                if (is_numeric($f)) $f = 'num';

                                if (!isset($c[$f])) $c[$f] = 0;
                                $c[$f]++;
                                ?>

                                <h4 class="text-danger"><a target="_blank"
                                                           {!!  ($c[$f]==1)?'id="'.$f.'" name="'.$f.'"':'' !!} href="{{$store->sidlink}}"
                                                           class="text-primary">
                                        {{$store->name}}</a></h4>
                            </td>
                            <td><h4 class="text-danger pull-left"> {{$store->cashback}} </h4></td>
                            <td><a target="_blank" href="{{$store->sidlink}}" class="btn btn-sm btn-primary">Shop
                                    now</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>
    <div class="col-md-3 "> Sales</div>

</div>
@endsection