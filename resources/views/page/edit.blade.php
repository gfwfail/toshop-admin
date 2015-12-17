@extends('admin')

@section('title') Page Homepages @endsection @section('heading') Pages @endsection

@section('breadcrumb')

    <li><a href="/home">Home</a></li>
    <li><a href="/pages">Pages</a></li>
    <li><a href="/pages/create">Create</a></li>


@endsection

@section('content')
    <div class="row">

        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading"> </div> <!-- /.panel-heading -->
                <div class="panel-body">
                    {!! Form::model($page, array('route' => array('pages.update', $page->id), 'method' => 'PUT')) !!}

                    <div class="form-group">
                        <label>HTML</label>
                        {!! Form::textarea('content',null,['placeholder'=>'HTML code here','class'=>'form-control','id'=>'content','rows' =>20] ) !!}
                    </div>

                    <div class="form-group{{ $errors->first('slug', ' has-error') }}">
                        <label>Slug</label>
                        {!! Form::text('slug',null,['placeholder'=>'简称','class'=>"form-control",'id'=>'slug'] ) !!}

                        <p class="help-block"> eg.page1.</p>
                    </div>

                    <button type="submit" class="btn btn-default">Save</button>

                    {!! Form::close()!!}

                </div>

            </div>
        </div>
    </div>

@endsection

