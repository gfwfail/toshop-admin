@extends('admin')

@section('title') Category Homepage @endsection

@section('heading') Stores @endsection

@section('breadcrumb')

    <li><a href="/home">Home</a></li>
    <li><a href="/stores">Stories</a></li>


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
                           <th width="10%">Name</th>
                           <th width="20%">Logo</th>
                           <th width="10%">Slug</th>
                           <th width="10%">CashBack</th>

                           <th width="20%">Description</th>
                           <th width="25%">Action</th>

                       </tr>
                       </thead>

                       <tbody>
                       @foreach ($stories as $store)

                           <tr>
                               <td>{{$store->id}}</td>
                               <td>{{$store->name}}</td>
                               <td>{!!
                               file_exists(public_path('uploads/store/'.$store->id.'.jpg'))?
                               '<img width=100 height=80 src="uploads/store/'.$store->id.'.jpg" >'
                               :''
                                !!}</td>
                               <td>{{$store->slug}}</td>
                               <th width="20%">{{$store->cashback}}</th>

                               <td>{{$store->description}}  </td>


                               <td>
                                   {!! Form::open(array('url' => 'stories/' . $store->id, 'class' => 'pull-right')) !!}
                                   {!!  Form::hidden('_method', 'DELETE') !!}
                                   {!! Form::submit('删除', array('class' => 'btn btn-danger')) !!}
                                   {!! Form::close() !!}


                                   <a class="btn btn-small btn-info"
                                      href="{!! URL::to('stories/' . $store->id . '/edit') !!}">编辑</a>

                               </td>


                           </tr>
                       @endforeach



                       </tbody>
                   </table>
               </div> <!-- /.table-responsive --> </div> <!-- /.panel-body --> </div>
   </div>

    </div>

@endsection
