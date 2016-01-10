@extends('layouts.home')
@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div id="myCarousel" class="carousel slide">

                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="item active">
                        <img src="/uploads/slide/1.jpg" alt="First slide">
                    </div>
                    <div class="item">
                        <img src="/uploads/slide/2.jpg" alt="Second slide">
                    </div>

                </div>

                <a class="carousel-control left" href="#myCarousel"
                   data-slide="prev">&lsaquo;</a>
                <a class="carousel-control right" href="#myCarousel"
                   data-slide="next">&rsaquo;</a>
            </div>
        </div>
        <div class="row" style="background:#f8f8f8;">
            <div class="col-md-4">
                <span class="carousel-ad-text">10000+ Registered User</span>
            </div>
            <div class="col-md-4">
                1000+ Stores
            </div>
            <div class="col-md-4">
                Earn up to 30% cash back
            </div>

        </div>

    </div>
    <div class="col-md-3">
        <div class="well bs-component">

            <fieldset>
                <legend>Sign in</legend>
                <div class="form-group">

                    <input type="text" class="form-control" id="inputEmail" placeholder="Email">

                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success pull-left" id="submit" value="Login">Login</button>
                    &nbsp;
                    <button type="button" class="btn btn-default" id="submit" value="Login">Forgot</button>
                </div>

            </fieldset>

        </div>

    </div>
</div>
<div class="row">
    <div id="storesCarousel" class="carousel slide">

        <!-- 轮播（Carousel）项目 -->
        <div class="carousel-inner">
            @for ($slides = 0; $slides < ceil($stores->count()/5); $slides++)
                <div class="item{{($slides==0)?' active':''}}">

                    <table class="table table-hover  table-bordered store-table ">
                        <?php $i = 0;?>

                        @foreach ($storeSlide as $store )
                            {!! ($i%5==0)? '<tr><td>':'<td>'!!}

                            @if ($store)
                                <a class="carousel-link" href="{{$store->link}}">
                                    @if ( file_exists(public_path('uploads/store/'.$store->id.'.jpg')) )
                                        <img width=100 height=80 src="/uploads/store/{{$store->id}}.jpg">
                                    @else
                                        <img src="http://placehold.it/100x80" width="100" height="80">
                                    @endif
                                    <p>
                                        {{ $store->name }}
                                        <br>
                                        <div class="text-warning">Up to {{$store->cashback}} Cash Back </div>
                                    </p>
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
    <div class="col-md-12">
        <blockquote>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
        </blockquote>
    </div>
</div>


<div class="row">
    <div class="col-md-9">
        <div class="row good-list">
            <div class="col-md-3">
                <p class="good-img">
                    <img src="http://placehold.it/100x80">
                </p>
            </div>
            <div class="col-md-6">
                <h3>Macbook </h3>

                <p>xsxa</p>

                <p><span class="text-warning">6%</span>
                    |
                    <span class="text-muted">Store:</span>
                    <span class="text-primary">Apple</span>

                </p>
            </div>
            <div class="col-md-3">
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