@extends('layouts.user')

@section('panelcontent')

    <div class="col-md-8">
        <form action="/user/blog/new" method="post">
            <div class="form-group">
                <label for="title" class="col-lg-2 control-label">Title</label>

                <div class="col-lg-10">
                    <input type="text" name="title" id="title" class="form-control">
                </div>
            </div><br>
            <hr>
            <div class="form-group">
                <label for="content" class="col-lg-2 control-label">Content</label>

                <div class="col-lg-10">
                    <textarea class="form-control" rows="15" name="content" id="content" autocomplete="off"></textarea>
                </div>
            </div>

            <div class="form-group">
                {!! csrf_field() !!}
                <button type="submit" class="btn btn-success">Save</button>
            </div>

        </form>

    </div>
    <div class="col-md-1">


    </div>


@endsection