@extends('layouts.home')

@section('title')
    User Dashboard
@endsection

@section('content')


    <div class="col-md-3">
        @include("home.user._menu")
    </div>


    @yield('panelcontent')

@endsection