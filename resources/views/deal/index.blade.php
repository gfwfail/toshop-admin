@extends('admin')

@section('title') Category Homepage @endsection

@section('heading') Deals @endsection

@section('breadcrumb')

    <li><a href="/home">Home</a></li>
    <li><a href="/deals">Deals</a></li>


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
                           <th width="10%">#</th>
                           <th width="20%">Name</th>
                           <th width="20%">Description</th>
                           <th width="10%">Category</th>
                           <th width="10%">Code</th>

                           <th width="30%">Action</th>

                       </tr>
                       </thead>

                       <tbody>
                       @foreach ($deals as $deal)

                           <tr>
                               <td>{{$deal->id}}</td>
                               <td>{{$deal->name}} <span class="label bg-danger">{{$deal->store->name}}</span></td>
                               <td>{{$deal->description}}  </td>

                               <td>{{ implode(',',$deal->categories->lists('name')->toArray()) }}  </td>
                               <td>{{$deal->code}}  </td>

                               <td>
                                   {!! Form::open(array('url' => 'deals/' . $deal->id, 'class' => 'pull-right')) !!}
                                   {!!  Form::hidden('_method', 'DELETE') !!}
                                   {!! Form::submit('删除', array('class' => 'btn btn-danger')) !!}
                                   {!! Form::close() !!}


                                   <a class="btn btn-small btn-info"
                                      href="{!! URL::to('deals/' . $deal->id . '/edit') !!}">编辑</a>

                               </td>


                           </tr>
                       @endforeach



                       </tbody>
                   </table>
               </div> <!-- /.table-responsive --> </div> <!-- /.panel-body --> </div>
   </div>

    </div>

@endsection
