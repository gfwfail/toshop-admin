@extends('admin')

@section('title') Page Homepage @endsection

@section('heading') Pages @endsection

@section('breadcrumb')

    <li><a href="/home">Home</a></li>
    <li><a href="/pages">Pages</a></li>


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
                           <th width="30%">Link</th>
                           <th width="40%">Content</th>
                           <th width="20%">Action</th>

                       </tr>
                       </thead>

                       <tbody>
                       @foreach ($pages as $page)

                           <tr>
                               <td>{{$page->id}}</td>
                               <td>
                                   <input type="text" class="form-control" value="http://www.toshop.net/pages/{{$page->slug}}" readonly style="width: 100%;">
                                           </td>
                               <td>  {{ str_limit($page->content) }} <span class="label bg-warning"> {{strlen($page->content).' Bytes'}} </span> </td>

                               <td>
                                   {!! Form::open(array('url' => 'pages/' . $page->id, 'class' => 'pull-right')) !!}
                                   {!!  Form::hidden('_method', 'DELETE') !!}
                                   {!! Form::submit('Delete', array('class' => 'btn btn-sm btn-danger')) !!}
                                   {!! Form::close() !!}


                                   <a class="btn btn-sm btn-info"
                                      href="{!! URL::to('pages/' . $page->id . '/edit') !!}">Edit</a>


                                   <a class="btn btn-sm btn-success" target="_blank"
                                      href="http://www.toshop.net/pages/{{  $page->slug  }}">View</a>

                               </td>


                           </tr>
                       @endforeach



                       </tbody>
                   </table>
               </div> <!-- /.table-responsive --> </div> <!-- /.panel-body --> </div>
   </div>

    </div>

@endsection
