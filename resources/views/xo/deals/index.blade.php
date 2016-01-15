@extends('admin')

@section('title') deals Homepage @endsection @section('heading') deals @endsection

@section('breadcrumb')

    <li><a href="/home">Home</a></li>
    <li><a href="deals">deals</a></li>
    <li><a href="deals">Index</a></li>


@endsection

@section('content')

    <h1>Deals <a href="{{ url('deals/create') }}" class="btn btn-primary pull-right btn-sm">Add New Deal</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Name</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($deals as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('deals', $item->id) }}">{{ $item->name }}</a></td>
                    <td>
                        <a class="btn btn-primary btn-xs" href="{{ url('deals/' . $item->id . '/edit') }}">
                           Update
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['deals', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $deals->render() !!} </div>
    </div>

@endsection
