<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <meta name="description" content="Toshop.net ">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<div class="top-wrap">
    <div class="container">
        About us
    </div>
</div>

<nav class="navbar navbar-default navbar-fixed">

    <div class="container">
        <div class="navbar-header">
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
                <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
                <li><a href="/deals">Deals</a></li>
                <li><a href="/stores">Stores</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(! auth()->user())
                <li><a href="/login">Sign In</a></li>
                <li><a href="/login">Register</a></li>
                @else
                    <li>   <a href="/dashboard">Hello, {{auth()->user()->name}} </a></li>
                    <li> <a href="/logout">Log out</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>


<div class="container">
    <div class="row">
        <div class="col-md-3">
            <img src="{{asset("assets/img/logo.png")}}">
        </div>
        <div class="col-md-9">
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" name="keyword" id="top-search" class="form-control" placeholder="Search for stores">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>
        </div>
    </div>
</div>


<div class="container">

    <ul class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Page</li>
    </ul>
@yield('content')



    <hr>
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p> &copy;2015-2016 Toshop.net | Terms of Service | Privacy Policy
                </p>


            </div>
        </div>

    </footer>

    <script src="{{elixir('assets/js/app.js')}}" type="text/javascript"></script>


</body>
</html>