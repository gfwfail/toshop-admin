@extends('layouts.home')

@section('title')
    Homepage
    @endsection


@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
   <?php
        echo $data;
        ?>
</div>
</div>

@endsection