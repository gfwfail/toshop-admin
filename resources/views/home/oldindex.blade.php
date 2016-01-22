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
       {!! Ad::show('banner_right') !!}
        <div class="text-muted small">
            Coupons & promo codes with Cash Back
        </div>

    </div>
</div>
{!! Ad::show('banner_bottom') !!}
<br>
<div class="row">
    <div id="storesCarousel" class="carousel slide">

        <!-- 轮播（Carousel）项目 -->
        <?php $slides= 0 ?>
        <div class="carousel-inner">


            @foreach ($stores as $storeSlide)
                <div class="item{{($slides==0)?' active':''}}">
                    <?php $slides++ ?>

                    <table class="table table-bordered table-responsive store-table visible-sm visible-md visible-lg">
                        <?php $i = 0;?>

                        @foreach ($storeSlide as $store )

                            {!! ($i%5==0)? '<tr><td>':'<td>'!!}

                            @if ($store)

                                <a class="carousel-link" href="{{$store['link']}}">
                                    <div class="carousel-img">
                                    @if ( file_exists(public_path('uploads/store/'.$store['id'].'.jpg')) )
                                        <img src="/uploads/store/{{$store['id']}}.jpg">
                                    @else
                                        <img src="http://placehold.it/100x80" >
                                    @endif
                                    </div>

                                       <div class="text-primary carousel-text"> {{ $store['name'] }}  </div>
                                        <div class="text-danger carousel-text">Up to {{$store['cashback']?:'$0'}} Cash Back </div>

                                </a>
                            @else

                            @endif
                            {!! ($i%5==4)? '</tr></td>':'</td>'!!}
                            <?php $i++;?>

                        @endforeach

                    </table>
                </div>

            @endforeach

        </div>
        <!-- 轮播（Carousel）导航 -->
        <a class="carousel-control left" href="#storesCarousel"
           data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#storesCarousel"
           data-slide="next">&rsaquo;</a>
    </div>


</div>
{!! Ad::show('store_list_bottom') !!}

<div class="row">
    <?php $cardN = 0; ?>
    @foreach($dealsCard as $card)
        <?php $cardN++;
            if ($cardN>=5) {
                break;
            }
            ?>
    <div class="col-md-2-4">
       <div class="deal-card">
           <div class="deal-card-logo visible-lg visible-md"
               @if ( file_exists(public_path('uploads/store/'.$card->store->id.'.jpg')) )
                  style="background-image: url('/uploads/store/{{$card->store->id}}.jpg')"
               @else

               @endif >
           </div>
           <div class="deal-card-head"
                style="background-image:url(<?php
               echo (file_exists(public_path('uploads/deal/'.$card->id.'.jpg'))? '/uploads/deal/'.$card->id.'.jpg':'http://placehold.it/150x200')
           ?>)">

           </div>

           <div class="deal-card-content">
            <div class="text-danger">{{$card->name}} </div>

               {!! $card->description !!}

               <small class="text-muted small"><i class="glyphicon glyphicon-time"></i> Expires {{$card->expired_at}}</small>
               @if($card->code)
               <p>
                   Code:<span class="text-success"> {{$card->code}} </span>
               </p>
                   <p>
                       <a href="{{$card->store->sidlink}}" class="btn btn-danger btn-sm">Shop Now</a>
                   </p>
               @endif
           </div>
       </div>
    </div>
        @endforeach

</div>

{!! Ad::show('card_list_bottom') !!}

<hr>

<div class="row">

    <div class="col-md-9">

        @foreach($dealsCard as $card)


        <div class="row good-list">
            <div class="col-md-3 col-xs-3">
                <p class="good-img">

                    @if ( file_exists(public_path('uploads/store/'.$card->store->id.'.jpg')) )
                        <img class="img-responsive" src="/uploads/store/{{$card->store->id}}.jpg">
                    @else

                    @endif

                </p>
            </div>
            <div class="col-md-6  col-xs-5">
                <h3>{{$card->name}}  </h3>

                <p>{!! $card->description !!} </p>

                <p><span class="text-warning">{{$card->store->cashback?$card->store->cashback.'|':''}} </span>

                    <span class="text-muted">Store:</span>
                    <span class="text-primary">{{$card->store->name}} </span>

                </p>
            </div>
            <div class="col-md-3 col-xs-4">
                <p class="good-action">

                @if($card->code)
                <div class="form-group">
                    <span>Coupon Code</span><input type="text" name="couponcode"
                                                   class="form-control input-sm couponcode" value="{{$card->code}} " readonly
                                                   style="background: #fff">

                </div>
                @endif

                <a target="_blank" href="{{$card->store->sidlink}}" class="btn btn-sm btn-success">Go shopping!</a>

                </p>
            </div>
        </div>

        @endforeach

    </div>


    <div class="col-md-3">

        <div class="panel panel-default">
            <div class="panel-heading"><span class="border-bot">Toshop Blog</span></div>
            <div class="panel-body">
                {!! Ad::show('blog') !!}
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