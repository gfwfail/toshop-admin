@extends('layouts.user')

@section('panelcontent')
    <form action="/user/profile" method="post">

    <div class="col-md-9 user-panel ">
        <header>My Profile</header>


            <div>


                <span class="col-md-2">Email:</span>

                <div class="col-md-10"> {{$user->email}}
                </div>

            </div>

            <div class="form-group">


                <label class="col-md-2 control-label">Name:</label>

                <div class="col-md-10"><input type="text" name="name" id="name" class="form-control"
                                              value="{{$user->name}}" title="" required="required">
                </div>

            </div>
            <div class="form-group">


                <label class="col-md-2 control-label">Password:</label>

                <div class="col-md-10"><input type="password" name="password" id="password" class="form-control"
                                              value="" title="" required="required">
                </div>

            </div>

            <div class="form-group">


                <label class="col-md-2 control-label">Password confirmation:</label>

                <div class="col-md-10"><input type="password" name="password_confirmation" id="password_confirmation"
                                              class="form-control"
                                              value="" title="" required="required">
                </div>

            </div>



            <div>
            <button type="submit" class="btn btn-default">Update</button>
                {!! csrf_field() !!}

            </div>
    </div>

    </form>

@endsection