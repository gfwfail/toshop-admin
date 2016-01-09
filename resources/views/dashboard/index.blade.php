@extends('admin')

@section('title') Admin Homepage @endsection

@section('heading') Dashboard
<small> Hi, {{Auth::user()->name}}  </small> @endsection

@section('breadcrumb')

    <li><a href="/home">Home</a></li>


@endsection

@section('footer')
    <script src="{{asset('js/Chart.min.js')}}"></script>
    <script>
        var data = [
                <?php
                 $color = [];
                 $highlight=[];
                 ?>
                 @foreach($stat as $s)

                 <?php
                 $random_color = random_color();

                 array_push($color,$random_color[0]);
                 array_push($highlight,$random_color[1]);

                 ?>
                 @endforeach




                @foreach($stat as $s)
                {
                value: <?php echo $s->count ?>,
                color: '<?php echo $color[$s->distance] ?>',
                highlight: '<?php echo $highlight[$s->distance] ?>',
                label: "Level <?php echo $s->distance?> referrals"
            },
            @endforeach
    ];
        var options = {
            maintainAspectRatio: false,
            responsive: false,


        };


        var ctx = document.getElementById("polarChart").getContext("2d");

        var polarChart = new Chart(ctx).Doughnut(data, options);


    </script>
@endsection


@section('content')
    <h3>All Level referrals count</h3>
    <div class="row">
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Referral Level</th>
                        <th>Count</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($stat as $s)
                        <tr>

                            <td><span class="label" style="background-color: <?php echo $color[$s->distance] ?>"><?php echo $s->distance?></span> </td>
                            <td><?php echo $s->count?> </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <canvas id="polarChart" width="200" height="200"></canvas>
        </div>
    </div>

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

