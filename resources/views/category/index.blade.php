@extends('admin')

@section('title') Category Homepage @endsection

@section('heading') Categories @endsection

@section('breadcrumb')

    <li><a href="/home">Home</a></li>
    <li><a href="/categories">Categories</a></li>


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
                           <th width="10%">Slug</th>
                           <th width="30%">Description</th>
                           <th width="10%">Order</th>
                           <th width="20%">Action</th>

                       </tr>
                       </thead>

                       <tbody>
                       @foreach ($categories as $category)

                           <tr>
                               <td>{{$category->id}}</td>
                               <td>{{$category->name}}</td>
                               <td>{{$category->slug}}</td>
                               <td>{{$category->description}}  </td>
                               <td>{{$category->order}}  </td>


                               <td>
                                   {!! Form::open(array('url' => 'categories/' . $category->id, 'class' => 'pull-right')) !!}
                                   {!!  Form::hidden('_method', 'DELETE') !!}
                                   {!! Form::submit('删除', array('class' => 'btn btn-danger')) !!}
                                   {!! Form::close() !!}


                                   <a class="btn btn-small btn-info"
                                      href="{!! URL::to('categories/' . $category->id . '/edit') !!}">编辑</a>

                               </td>


                           </tr>
                       @endforeach



                       </tbody>
                   </table>
               </div> <!-- /.table-responsive --> </div> <!-- /.panel-body --> </div>
   </div>

    </div>

@endsection
