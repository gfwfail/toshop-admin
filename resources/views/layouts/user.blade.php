@extends('layouts.home')

@section('title')
    User Dashboard
@endsection

@section('content')
    @inject('account', 'App\Services\AccountService')


    <div class="col-md-3 panel-left">
        <div class="user-menu name">
            <span>@{{ greetingMsg }},</span>
            <h3>{{auth()->user()->name}}</h3>
            <p class="small text-muted">Member Since
                {{ date('F d, Y', strtotime(auth()->user()->created_at)) }}
            </p>

            <a href="/user/profile" class="text-success small"><i class="glyphicon glyphicon-edit"></i>Edit My Profile</a>
            <hr>
            <p class="well" style="position: relative">
                <?php
                echo int2currency($account->balance(Auth::user()->id));
                ?>
                <span style="font-size: 9px;position: absolute;right: 0;bottom: 0">Cash Back Balance</span>
            </p>
        </div>
        @include("home.user._menu")
        <div class="user-menu">{{Ad::show('user-panel')}}</div>
    </div>


    @yield('panelcontent')

@endsection