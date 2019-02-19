@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <h1>Dashboard</h1>
@stop

@section('content')

     <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Dashboard</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
        </div>
        </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop