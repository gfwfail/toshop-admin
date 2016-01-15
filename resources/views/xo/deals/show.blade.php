@extends('admin')

@section('title') %%crudName%% Homepage @endsection @section('heading') %%crudName%% @endsection

@section('breadcrumb')

    <li><a href="/home">Home</a></li>
    <li><a href="%%routeGroup%%%%crudName%%">%%crudName%%</a></li>
    <li><a href="%%routeGroup%%%%crudName%%/%{{$deal->id}}">Show</a></li>


@endsection

@section('content')

    <h1>Deal</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $deal->id }}</td> <td> {{ $deal->name }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection