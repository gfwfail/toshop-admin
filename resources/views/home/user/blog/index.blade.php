@extends('layouts.user')

@section('panelcontent')

    <div class="col-md-6 user-panel">
        <a href="/user/blog/new" class="btn btn-success btn-sm">New Blog</a>
        <br> <br>
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
                    <td><a href="/user/blog/edit/{{$blog->id}}">
                        {{$blog->title}}  </a>    <a target="_blank" href="/blog/{{auth::user()->id}}/{{$blog->id}}" class="pull-right btn btn-info btn-xs">View</a>
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
                   <img src="{{auth::user()->avatar()}}">
                </p>
                <hr>
                <h4>{{auth::user()->name}} / ID:{{auth::user()->id}}</h4>
                <p>Join date: {{auth::user()->created_at}}</p>

            </div>
        </div>
    </div>


@endsection