@extends('admin')

@section('title') deals Homepage @endsection @section('heading') deals @endsection

@section('breadcrumb')

    <li><a href="/home">Home</a></li>
    <li><a href="deals">deals</a></li>
    <li><a href="deals/%{{$deal->id}}/edit">Edit</a></li>


@endsection

@section('content')

     <div class="row">

     <div class="col-lg-12">

         <div class="panel panel-default">
             <div class="panel-heading"> </div> <!-- /.panel-heading -->
             <div class="panel-body">

    {!! Form::model($deal, [
        'method' => 'PATCH',
        'url' => ['deals', $deal->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}
 </div>

    </div>
    </div>
    </div>

@endsection