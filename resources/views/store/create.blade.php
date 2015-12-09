@extends('admin')

@section('title') Store Homepage @endsection @section('heading') Stories @endsection

@section('breadcrumb')

    <li><a href="/home">Home</a></li>
    <li><a href="/stories">Stories</a></li>
    <li><a href="/stories/create">Create</a></li>


@endsection

@section('content')
    <div class="row">

   <div class="col-lg-12">

       <div class="panel panel-default">
           <div class="panel-heading"> </div> <!-- /.panel-heading -->
           <div class="panel-body">
               {!! Form::open(['url' => 'stories','enctype'=>'multipart/form-data']) !!}
               <div class="form-group{{ $errors->first('title', ' has-error') }}">
                   <label>Name</label>
                   {!! Form::text('name',null,['placeholder'=>'Store Name','class'=>"form-control",'id'=>'name'] ) !!}
               </div>
               <div class="form-group">
                   <label>Description</label>
                   {!! Form::textarea('description',null,['placeholder'=>'Description','class'=>'form-control','id'=>'description','rows' =>3] ) !!}
               </div>

               <div class="form-group{{ $errors->first('slug', ' has-error') }}">
                   <label>Slug</label>
                   {!! Form::text('slug',null,['placeholder'=>'简称','class'=>"form-control",'id'=>'slug'] ) !!}

                   <p class="help-block">eg. women.</p>
               </div>

               <div class="form-group{{ $errors->first('photo', ' has-error') }}">
                   <label>Logo</label>
                   {!! Form::file('photo',null,['placeholder'=>'logo','class'=>"form-control",'id'=>'photo'] ) !!}

               </div>

               <button type="submit" class="btn btn-default">Save</button>

                {!! Form::close()!!}

   </div>

    </div>
    </div>
    </div>

@endsection
