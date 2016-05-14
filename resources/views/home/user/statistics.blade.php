@extends('layouts.user')

@section('foot')
    <script src="{{asset('js/Chart.min.js')}}"></script>

    <script>
        var data = [
                <?php

                $color = ['#fff','#16a085','#c0392b','#8e44ad','#2c3e50'];
                $highlight = ['#fff','#1abc9c','#e74c3c','#9b59b6','#34495e']

                ?>

                @foreach($stat as $s)
                {
                value: <?php echo $s->count ?>,
                color: '<?php echo $color[$s->distance] ?>',
                highlight: '<?php echo $highlight[$s->distance] ?>',
                label: "Level <?php echo $s->distance?> referrals"
            },
            @endforeach
    ];

        var lineData = {
            labels: <?php echo json_encode(array_keys($directReferrals)) ?>,
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data:  <?php echo json_encode(array_values($directReferrals))?>
                }]
        };


        var options = {
            maintainAspectRatio: false,
            responsive: false,


        };


        var ctx = document.getElementById("polarChart").getContext("2d");
        var ctx2 = document.getElementById("lineChart").getContext("2d");

        var polarChart = new Chart(ctx).Doughnut(data, options);
        var lineChart = new Chart(ctx2).Line(lineData, options);


    </script>

@endsection
@section('panelcontent')

    <div class="col-md-9 user-panel">
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
        <hr>
        <div class="row">
        <h3>Direct referrals registered this week</h3>

            <div class="col-md-4">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Count</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($directReferrals as $d=>$c)
                            <tr>

                                <td><?php echo $d?></td>
                                <td><?php echo $c?> </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-8">
                <canvas id="lineChart" width="400" height="400"></canvas>            </div>


        </div>

    </div>



@endsection