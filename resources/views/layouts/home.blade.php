<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="Toshop.net ">

    @yield("head")
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>


<nav class="navbar navbar-default navbar-fixed-top" id="navbar">

    <div class="container">
        <div class="navbar-header">
            <a class="pull-left" href="/"><img class="img-responsive" src="{{asset("assets/img/logo.png")}}"></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/stores">All Stores <span class="sr-only">(current)</span></a></li>
                <li><a href="/coupons">Coupons</a></li>
                <li><a href="/pages/helps.html">Helps</a></li>
                <li><a href="/pages/contact.html">Contact Us</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                  <a href="#" id="searchicon" class="glyphicon glyphicon-search"> </a>
                </li>
                @if(! auth()->user())
                    <li><a @click="  (showModal = true )&& (signin($event))" href="/login">Sign In</a></li>
                    <li><a href="/login">Register</a></li>
                @else
                    <li><a href="/user/dashboard">Hello, {{auth()->user()->name}} </a></li>
                    <li><a href="/logout">Log out</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>


<div class="container-fluid searchbar navbar-fixed-top">
    <div class="row">
        <form role="search" method="get" action="/">
        <div class="col-md-12">
            <div class="col-md-3">

            </div>
           <div class="col-md-6">

                   <div class="input-group">
                       <input type="text" name="keyword" class="form-control typeahead"
                              placeholder="Search for stores">
                    <span class="input-group-btn">
                    <button type="submit" class="btn btn-success"><span
                                class="glyphicon glyphicon-search" aria-hidden="true"></span> Search
                    </button>
                    </span>
                   </div>

           </div>
        </div>
        </form>
    </div>
</div>


<div class="container body-wrap">


    @yield('content')


    <hr>
    <footer>
        <div class="row">
            <div class="col-lg-12">
                {{AD::show('foot')}}
                <p style="color:#666"><i class="fa fa-copyright"></i> 2015-2016 Toshop.net |
                    <a href="/pages/terms.html">Terms of Service</a> |
                    <a href="/pages/privacy.html">Privacy Policy</a> |
                    <a href="/pages/aboutus.html">About us</a>

                </p>


            </div>
        </div>

    </footer>

    <script type="x/template" id="modal-template">
        <div class="modal-mask" v-show="show" transition="modal">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <h3>Sign in</h3>
                    <hr>
                    <form role="form" action="login" method="post" data-toggle="validator">
                        {!! csrf_field() !!}
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email"
                                       value="{{old('email')}}" autofocus required>

                                <div class="help-block with-errors"></div>

                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password"
                                       value="" required>
                            </div>
                            <div class="help-block with-errors"></div>
                            <hr>

                            <button type="submit" class="btn btn-info">Login</button>

                            <button type="reset" @click="show = false" class="btn btn-default">Cancel</button>


                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </script>


    <modal :show.sync="showModal">

    </modal>

    <script src="{{elixir('assets/js/app.js')}}" type="text/javascript"></script>
    <script>




    </script>
@yield('foot')
</body>
</html>