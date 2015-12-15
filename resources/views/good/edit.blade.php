@extends('admin')

@section('title') Good Homepage @endsection
@section('heading') Goods @endsection

@section('breadcrumb')

    <li><a href="/home">Home</a></li>
    <li><a href="/Stories">Stories</a></li>
    <li><a href="/Stories/create">Create</a></li>


@endsection

@section('header')
    <link id="bsdp-css" href="/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    {!! UEditor::css() !!}
    {!! UEditor::js() !!}

@endsection

@section('footer')
    <script src="/dist/js/bootstrap-datepicker.js"></script>
    <script>
        $( document ).ready(function() {
            $('#expired_at').datepicker(
                    {
                        format: "yyyy-mm-dd",
                        autoclose: true,
                        zIndexOffset:999999

                    }
            );
            var ue = UE.getEditor('description'); //用辅助方法生成的话默认id是ueditor

            /* 自定义路由 */
            /*
             var serverUrl=UE.getOrigin()+'/ueditor/test'; //你的自定义上传路由
             var ue = UE.getEditor('ueditor',{'serverUrl':serverUrl}); //如果不使用默认路由，就需要在初始化就设定这个值
             */

            ue.ready(function() {
                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
            });
        });
    </script>
@endsection
@section('content')
    <div class="row">

   <div class="col-lg-12">

       <div class="panel panel-default">
           <div class="panel-heading"> </div> <!-- /.panel-heading -->
           <div class="panel-body">
               {!! Form::model($good, array('route' => array('goods.update', $good->id), 'method' => 'PUT')) !!}
               <div class="form-group{{ $errors->first('name', ' has-error') }}">
                   <label>Name</label>
                   {!! Form::text('name',null,['placeholder'=>'Good Name','class'=>"form-control",'id'=>'name'] ) !!}
               </div>
               <div class="form-group">
                   <label>Description</label>
                   {!! Form::textarea('description',null,['placeholder'=>'Description','id'=>'description','rows' =>3] ) !!}
               </div>
               <div class="form-group">
                   <label>Restrict</label>
                   {!! Form::textarea('restrict',null,['placeholder'=>'Restrict','class'=>'form-control','id'=>'restrict','rows' =>3] ) !!}
               </div>

               <div class="form-group{{ $errors->first('expired_at', ' has-error') }}">
                   <label>Expired Date</label>
                   {!! Form::text('expired_at',null,['placeholder'=>'Expire date','class'=>"form-control",'id'=>'expired_at'] ) !!}
               </div>



               <div class="form-group{{ $errors->first('store_id', ' has-error') }}">
                   <label> Store </label>
                   {!! Form::select('store_id',$stories->lists('name','id'),null,['placeholder'=>'Select a store','class'=>"form-control",'id'=>'store_id'] ) !!}
               </div>


               <div class="form-group{{ $errors->first('categories_id', ' has-error') }}">
                   <label> Category </label>
                   {!! Form::select('categories_id[]',$categories->lists('name','id'),$good->categories->lists('id')->toArray(),['class'=>"form-control",'multiple'=>'multiple','id'=>'categories_id'] ) !!}
               </div>

               <button type="submit" class="btn btn-default">Save</button>

                {!! Form::close()!!}

   </div>

    </div>
    </div>
    </div>

@endsection

