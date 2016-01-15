@extends('admin')

@section('title') Message Homepage @endsection @section('heading') Message-id:{{$message->id}} @endsection

@section('breadcrumb')

    <li><a href="/home">Home</a></li>
    <li><a href="/messages">messages</a></li>
    <li><a href="/messages/{{$message->id}}">Show</a></li>


@endsection

@section('content')

    <h1>Message</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th><th>Email</th><th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $message->id }}</td> <td> {{ $message->name }} </td><td> {{ $message->email }} </td><td> {{ $message->phone }} </td>
                </tr>
            <tr >
              <td colspan="4"><strong>Body:</strong> {{ $message->body }}</td>
            </tr>
            </tbody>    
        </table>
    </div>

@endsection