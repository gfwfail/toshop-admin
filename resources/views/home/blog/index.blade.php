@extends('layouts.home')

@section('title')
    {$user->name}}'s Blog
@endsection
@section('content')

    <div class="col-md-6 col-lg-offset-1">

        <table class="table table-striped">
            <thead>
            <tr>
                <th>title</th>
                <th width="30%">Time</th>
            </tr>
            </thead>
            <tbody>

            @foreach($blogs as $blog)
                <tr>
                    <td><a href="/blog/{{$user->id}}/{{$blog->id}}">
                        {{$blog->title}}  </a>
                    </td>
                    <td>{{$blog->created_at}}</td>


                </tr>

            @endforeach
            @if(!$blogs)
                <tr>
                    <td colspan="2">No blog.</td>
                </tr>
            @endif
            </tbody>
        </table>


    </div>
    <div class="col-md-3">

        <div class="panel panel-default">
            <div class="panel-body">


                <p class="well">
                    <img src="{{$user->avatar()}}">
                </p>
                <hr>
                <h4>{{$user->name}}'s Blog</h4>
                <p>Join date: {{$user->created_at}}</p>

            </div>
        </div>
    </div>


@endsection