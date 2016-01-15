@extends('admin')

@section('title') messages Homepage @endsection @section('heading') messages @endsection

@section('breadcrumb')

    <li><a href="/home">Home</a></li>
    <li><a href="messages">messages</a></li>
    <li><a href="messages">Index</a></li>


@endsection

@section('content')

    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Name</th><th>Email</th><th>Phone</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($messages as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('messages', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->email }}</td><td>{{ $item->phone }}</td>
                    <td>
                        <a class="btn btn-primary btn-xs" href="{{ url('messages/' . $item->id) }}">
                           Show
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['messages', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $messages->render() !!} </div>
    </div>

@endsection
