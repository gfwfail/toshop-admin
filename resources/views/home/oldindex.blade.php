@extends('layouts.home')
@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="row">
            <div id="myCarousel" class="carousel slide">

                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="item active">
                        <img  class="carousel-ad" src="/assets/img/c1.jpg" alt="First slide">
                    </div>
                    <div class="item">
                        <img  class="carousel-ad" src="/assets/img/c1.jpg" alt="First slide">
                    </div>

                </div>

                <a class="carousel-control left" href="#myCarousel"
                   data-slide="prev">&lsaquo;</a>
                <a class="carousel-control right" href="#myCarousel"
                   data-slide="next">&rsaquo;</a>
            </div>
        </div>

    </div>
    <div class="col-md-2">
        <table class="table table-bordered ">
            <tr>
                <td> a</td>
            </tr>
            <tr>
                <td> a</td>
            </tr>
            <tr>
                <td> a</td>
            </tr>
            <tr>
                <td> a</td>
            </tr>
            </table>
        <div class="text-muted small">
            Coupons & promo codes with Cash Back
        </div>

    </div>
</div>
<br>
<div class="row">
    <div id="storesCarousel" class="carousel slide">

        <!-- 轮播（Carousel）项目 -->
        <div class="carousel-inner">
            @for ($slides = 0; $slides < ceil($stores->count()/5); $slides++)
                <div class="item{{($slides==0)?' active':''}}">

                    <table class="table table-bordered table-responsive store-table visible-sm visible-md visible-lg">
                        <?php $i = 0;?>

                        @foreach ($storeSlide as $store )
                            {!! ($i%5==0)? '<tr><td>':'<td>'!!}

                            @if ($store)
                                <a class="carousel-link" href="{{$store->link}}">
                                    <div class="carousel-img">
                                    @if ( file_exists(public_path('uploads/store/'.$store->id.'.jpg')) )
                                        <img src="/uploads/store/{{$store->id}}.jpg">
                                    @else
                                        <img src="http://placehold.it/100x80" >
                                    @endif
                                    </div>

                                       <div class="text-primary carousel-text"> {{ $store->name }}  </div>
                                        <div class="text-danger carousel-text">Up to {{$store->cashback?:'$0'}} Cash Back </div>

                                </a>
                            @else

                            @endif
                            {!! ($i%5==4)? '</tr></td>':'</td>'!!}
                            <?php $i++;?>

                        @endforeach

                    </table>
                </div>

            @endfor

        </div>
        <!-- 轮播（Carousel）导航 -->
        <a class="carousel-control left" href="#storesCarousel"
           data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#storesCarousel"
           data-slide="next">&rsaquo;</a>
    </div>


</div>

<div class="row">
    <div class="col-md-2-4">
        ss
    </div>
    <div class="col-md-2-4">
        ss
    </div>
    <div class="col-md-2-4">
        ss
    </div>
    <div class="col-md-2-4">
        ss
    </div>
    <div class="col-md-2-4">
        ss
    </div>

</div>



<div class="row">
    <div class="col-md-9">
        <div class="row good-list">
            <div class="col-md-3 col-xs-3">
                <p class="good-img">
                    <img class="img-responsive" src="http://placehold.it/100x80">
                </p>
            </div>
            <div class="col-md-6  col-xs-5">
                <h3>Macbook </h3>

                <p>xsxa</p>

                <p><span class="text-warning">6%</span>
                    |
                    <span class="text-muted">Store:</span>
                    <span class="text-primary">Apple</span>

                </p>
            </div>
            <div class="col-md-3 col-xs-4">
                <p class="good-action">

                <div class="form-group">
                    <span>Coupon Code</span><input type="text" name="couponcode"
                                                   class="form-control input-sm couponcode" value="teysuao" readonly
                                                   style="background: #fff">

                </div>

                <button class="btn btn-sm btn-success">Go shopping!</button>

                </p>
            </div>
        </div>
    </div>


    <div class="col-md-3">

        <div class="panel panel-default">
            <div class="panel-heading"><span class="border-bot">Toshop Blog</span></div>
            <div class="panel-body">
                <ul class="list-unstyled">
                    <li><a href="#"> link1 </a></li>
                    <li><a href="#"> link1 </a></li>

                    <li><a href="#"> link1 </a></li>

                </ul>
            </div>
        </div>

    </div>
</div>

@endsection