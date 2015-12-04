@extends('admin')

@section('title') Category Homepage @endsection

@section('heading') Goods @endsection

@section('breadcrumb')

    <li><a href="/home">Home</a></li>
    <li><a href="/stores">Goods</a></li>


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
                           <th width="10%">Store</th>

                           <th width="30%">Action</th>

                       </tr>
                       </thead>

                       <tbody>
                       @foreach ($goods as $store)

                           <tr>
                               <td>{{$store->id}}</td>
                               <td>{{$store->name}}</td>
                               <td>{{$store->description}}  </td>

                               <td>{{ implode(',',$store->categories->lists('name')->toArray()) }}  </td>
                               <td>{{$store->store->name}}  </td>

                               <td>
                                   {!! Form::open(array('url' => 'goods/' . $store->id, 'class' => 'pull-right')) !!}
                                   {!!  Form::hidden('_method', 'DELETE') !!}
                                   {!! Form::submit('删除', array('class' => 'btn btn-danger')) !!}
                                   {!! Form::close() !!}


                                   <a class="btn btn-small btn-info"
                                      href="{!! URL::to('goods/' . $store->id . '/edit') !!}">编辑</a>

                               </td>


                           </tr>
                       @endforeach



                       </tbody>
                   </table>
               </div> <!-- /.table-responsive --> </div> <!-- /.panel-body --> </div>
   </div>

    </div>

@endsection
