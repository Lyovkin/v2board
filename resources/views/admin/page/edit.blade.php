@extends('admin.adminLayout')

@section('title')
    Редактировать страницу
@stop

@section('js')
    <script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#description').autogrow();

            CKEDITOR.replace( 'editor', {
                filebrowserUploadUrl: '/image/upload'
            });
        });
    </script>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Редактировать страницу</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Статическая страница
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @include('partials.errors.basic')

                            {!! Form::model($page, ['route'=>['admin.page.update', $page->id],
                                'method' => 'PATCH',
                                'class'=>'form-horizontal', 'role'=>'form', 'id'=>'form-edit', 'data-id' => $page->id]) !!}
                                @include('admin.page._form')
                            {!! Form::close() !!}
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
@stop
