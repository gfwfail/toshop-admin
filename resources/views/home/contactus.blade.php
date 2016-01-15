@extends('layouts.home')

@section('title')
    Contact us
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            @if(Session::get('ok'))
                <div class="alert alert-info">
                    Thank you very much for your enquiry. Our customer relations manager will get in touch with you
                    shortly
                </div>
            @endif
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach

        </div>
    </div>
    <div class="row contactus">
        <div class="white-wrap  col-md-10 col-md-offset-1">
 <br>
        <?php
            $user = auth()->user();
            ?>
            {!! Form::open(['url' => '/home/contactus', 'class' => 'form-horizontal']) !!}
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                    {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('name', $user?$user->name:null, ['class' => 'form-control']) !!}
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                    {!! Form::label('email', 'Email: ', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::email('email', $user?$user->email:null, ['class' => 'form-control', 'required' => 'required']) !!}
                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                    {!! Form::label('phone', 'Phone: ', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">

                <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
                    {!! Form::label('body', 'Body: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div>


                </div>
            </div>
            <div class="col-md-6 col-md-offset-8">

                <div class="form-group">

                    {!! Form::submit('Create', ['class' => 'btn btn-danger']) !!}
                    <button type="reset" class="btn btn-link">Reset</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection