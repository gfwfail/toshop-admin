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
            <form role="form" method="POST" action="/register" data-toggle="validator" >
                {!! csrf_field() !!}
                <div class="form-group">
                    <label>E-mail</label>
                    <input class="form-control" placeholder="E-mail" name="email" value="" type="email" required>
                    <div class="help-block with-errors"></div>

                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" placeholder="Name" name="name" value="" required>
                    <div class="help-block with-errors"></div>

                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control"  id="regPassword" placeholder="Password" type="password" data-minlength="6"  name="password" required>
                    <div class="help-block with-errors"></div>

                </div>
                <div class="form-group">
                    <label>Confirmation</label>
                    <input class="form-control" data-match="#regPassword"  placeholder="Retype password" data-minlength="6"  type="password" name="password_confirmation" required>
                    <div class="help-block with-errors"></div>

                </div>

                <button type="submit" class="btn btn-info">Submit</button>
                <button type="reset" class="btn btn-default">Cancel</button>
            </form>

        </div>

        <div class="col-md-4 col-md-offset-1">
            <h4>Already a member?</h4>
            <hr>


            <form role="form" action="login" method="post" data-toggle="validator">
                {!! csrf_field() !!}
                <fieldset>
                    <div class="form-group-sm">
                        <input class="form-control" placeholder="E-mail" name="email" type="email"
                               value="{{old('email')}}" autofocus required>
                        <div class="help-block with-errors"></div>

                    </div>
                    <br>
                    <div class="form-group-sm">
                        <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                    </div>
                    <div class="help-block with-errors"></div>


                    <br>
                    <button type="submit" class="btn btn-sm btn-success">Login</button>

                    <button type="reset" class="btn btn-sm btn-default">Cancel</button>


                </fieldset>
            </form>
        </div>


    </div>
@endsection
