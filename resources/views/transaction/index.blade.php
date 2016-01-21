@extends('admin')

@section('title') Category Homepage @endsection

@section('heading') Transactions @endsection

@section('breadcrumb')

    <li><a href="/home">Home</a></li>
    <li><a href="/transactions">Transactions</a></li>


@endsection

@section('content')
    <div class="row">

   <div class="col-lg-12">

       <div class="panel panel-default">
           <div class="panel-heading"> </div> <!-- /.panel-heading -->
           <div class="panel-body">
               <div class="table-responsive">
                   <table class="table table-hover table-striped">
                       <thead>
                       <tr>
                           <th width="5%">#</th>
                           <th width="10%">User</th>
                           <th width="15%">Source</th>
                           <th width="12%">Credit</th>
                           <th width="12%">Debit</th>
                           <th>Description</th>
                           <th width="20%">Updated</th>

                       </tr>
                       </thead>

                       <tbody>
                       @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{$transaction->id}}</td>
                            <td>{{$transaction->user->name}}</td>
                            <td>{{$transaction->source?$transaction->source->name:''}}</td>
                            <td>{{int2currency($transaction->credit)}}</td>
                            <td>{{int2currency($transaction->debit)}}</td>
                            <td>{{$transaction->description}}</td>
                            <td>{{$transaction->updated_at}}</td>
                        </tr>

                       @endforeach



                       </tbody>
                   </table>
               </div> <!-- /.table-responsive --> </div> <!-- /.panel-body --> </div>
   </div>

    </div>

@endsection
