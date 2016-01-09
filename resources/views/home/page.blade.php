@extends('layouts.home')

@section('title')
    Homepage
    @endsection


@section('content')
<div class="row">
   <?php
        echo $data;
        ?>
</div>


@endsection