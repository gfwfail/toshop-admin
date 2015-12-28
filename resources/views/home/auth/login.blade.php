@extends('layouts.home')
@section('title')
    Log in |
@endsection
@section('content')
    <div class="row">

        @if($errors->has())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissable col-md-6 col-md-offset-3">
                    {{ $error }}</div>
            @endforeach
        @endif

        <div class="col-md-5 col-md-offset-1">
            <div style="width: 100%; height: 40px; border-bottom: 4px solid #333333; text-align: center">
      <span style="font-size: 40px; background-color: #FFF; padding: 0 10px;">
        Register
      </span>
            </div>
            <hr>
            <form role="form" method="POST" action="/register">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label>E-mail</label>
                    <input class="form-control" placeholder="E-mail" name="email" value="">
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" placeholder="Name" name="name" value="">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" placeholder="Password" type="password" name="password">
                </div>
                <div class="form-group">
                    <label>Confirmation</label>
                    <input class="form-control" placeholder="Retype password" type="password" name="password_confirmation">
                </div>

                <button type="submit" class="btn btn-info">Submit</button>
                <button type="reset" class="btn btn-default">Cancel</button>
            </form>

        </div>

        <div class="col-md-4 col-md-offset-1">
            <h4>Already a member?</h4>
            <hr>


            <form role="form" action="login" method="post">
                {!! csrf_field() !!}
                <fieldset>
                    <div class="form-group-sm">
                        <input class="form-control" placeholder="E-mail" name="email" type="email"
                               value="{{old('email')}}" autofocus>
                    </div>
                    <br>
                    <div class="form-group-sm">
                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                    </div>


                    <br>
                    <button type="submit" class="btn btn-sm btn-success">Login</button>

                    <button type="reset" class="btn btn-sm btn-default">Cancel</button>


                </fieldset>
            </form>
        </div>


    </div>
@endsection
