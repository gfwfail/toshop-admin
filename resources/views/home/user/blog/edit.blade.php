@extends('layouts.user')

@section('panelcontent')

    <div class="col-md-8 user-panel">
        {{ Form::open([ 'method' => 'PUT'] )}}
            <div class="form-group">
                <label for="title" class="col-lg-2 control-label">Title</label>

                <div class="col-lg-10">
                    <input type="text" name="title" id="title" class="form-control" value="{{$blog->title}}">
                </div>
            </div><br>
            <hr>
            <div class="form-group">
                <label for="content" class="col-lg-2 control-label">Content</label>

                <div class="col-lg-10">
                    <textarea class="form-control" rows="15" name="content" id="content" autocomplete="off">{{$blog->content}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <br><hr>
                {!! csrf_field() !!}
                <button type="submit" class="pull-left btn btn-success btn-sm">Save</button>
                {{ Form::close() }}

                {{ Form::open(array('route' => array('home.user.blog.delete', $blog->id), 'method' => 'delete')) }}
                <button type="submit" class="btn btn-danger pull-right btn-sm">Delete</button>
                {{ Form::close() }}
            </div>



    </div>
    <div class="col-md-1">


    </div>


@endsection