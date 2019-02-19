@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <h1>Create Service</h1>
@stop
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


  {{ Form::open(['route' => 'admin.services.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-permission', 'files' => true]) }}
    @include('flash::message')
  	 <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Create Service</h3>
                <div class="box-tools pull-right">
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    @include("backend.services.form")
                    <center><div class="edit-form-btn">
                    {{ link_to_route('admin.services.index','Cancel', [], ['class' => 'btn btn-danger btn-md']) }}
                    {{ Form::submit('Create', ['class' => 'btn btn-primary btn-md']) }}
                    <div class="clearfix"></div>
                </div></center>
            </div>
        </div><!--box-->
    	</div>
  {{ Form::close() }}
@endsection