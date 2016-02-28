@extends('layouts.home')

@section('title')
    {{$user->name}}'s Blog
@endsection
@section('content')

    <div class="col-md-6 col-lg-offset-1">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="text-center">{{$blog->title}}</h3>
            </div>
            <div class="panel-body">
                <h5 class="text-center text-muted"><i class="glyphicon glyphicon-time"></i>{{$blog->created_at}} </h5>

                {{$blog->content}}

            </div>
        </div>




    </div>
    <div class="col-md-3">

        <div class="panel panel-default">
            <div class="panel-body">


                <p class="well">
                   <a href="/blog/{{$user->id}}">  <img src="{{$user->avatar()}}"> </a>
                </p>
                <hr>
                <h4>{{$user->name}}'s Blog</h4>

                <p>Join date: {{$user->created_at}}</p>

            </div>
        </div>
    </div>


@endsection