@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>Service Management</h1>
@stop
@section('content')
 @include('flash::message')
 <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"></h3>
            <div class="box-tools pull-right">
               {{-- <a href="{{ route('admin.services.create') }}" class="btn btn-primary">Add New</a> --}}
            </div>
        </div><!--box-header with-border-->
        <div class="box-body">    
            <div class="row col-sm-6">                
              <div class="form-group">
                {{ Form::label('category','Category', ['class' => 'col-lg-2 control-label required']) }}
                <div class="col-lg-8">
                  {{ Form::select('category_id',[],null,['class' => 'form-control select2 category_select']) }}
                </div>
              </div>              
        </div>
        <div class="row col-sm-6">
            <div class="form-group">
                  {{ Form::label('Sub Category','Sub Category', ['class' => 'col-lg-2 control-label required']) }}
                  <div class="col-lg-8">
                    {{ Form::select('sub_category',[],null,['class' => 'form-control select2 sub_category_select']) }}
                  </div>
              </div>
        </div>
         <div class="row col-sm-6">
              <div class="form-group">
                {{ Form::label('Start_date','Start Date', ['class' => 'col-lg-2 control-label required']) }}
                <div class="col-lg-8">
                  {{ Form::text('Start_date',isset($service) ? date('d-m-Y',strtotime($service['start_date'])) : null,['class' => 'form-control datepicker']) }}
                </div>
              </div>
         </div>
          <div class="row col-sm-6">
              <div class="form-group">
                  {{ Form::label('Start_date','Start Date', ['class' => 'col-lg-2 control-label required']) }}
                  <div class="col-lg-8">
                    {{ Form::text('Start_date',isset($service) ? date('d-m-Y',strtotime($service['start_date'])) : null,['class' => 'form-control datepicker']) }}
                  </div>
            </div>
          </div>
             <div class="row">
              {{ Form::label('','', ['class' => 'col-lg-2 control-label required']) }}
                <center>
                   <div class="col-lg-8">
                      <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                   </div>
                </center>
             </div>
         
      </div>
</div>
 <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Service Management</h3>
            <div class="box-tools pull-right">
               <a href="{{ route('admin.services.create') }}" class="btn btn-primary">Add New</a>
            </div>
        </div><!--box-header with-border-->
        <div class="box-body">         
            <div class="table-responsive data-table-wrapper">
            	<table id="service-table" class="table table-condensed table-hover table-bordered">
            	 <thead>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Service Name</th>
                        <th>Description</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Created At</th>
                        <th>Action</th>
                  </thead>
                  <tbody>
                    @if (!empty($getData))
                        @foreach ($getData as $key => $services)
                          <tr>
                            <td>{{ $services['mainCategory'] }}</td>
                            <td>{{ $services['sub_category'] }}</td>
                            <td>{{ $services['service_name'] }}</td>
                            <td>{{ $services['description'] }}</td>
                            <td>{{ $services['start_date'] }}</td>
                            <td>{{ $services['end_date'] }}</td>
                            <td>{{ $services['created_at'] }}</td>
                            <td><a href="{{ route('admin.services.edit',$services['servies_id']) }}" class="btn btn-primary">Edit</a>
                              @php
                              $url = \URL::to('services.delete'.$services['servies_id'].'/destroy');
                              @endphp
                                <a href="{{ route('admin.services.delete',$services['servies_id']) }}" class="btn btn-danger">Delete
                             </td>
                          </tr>
                        @endforeach
                    @endif
                  </tbody>
              </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script type="text/javascript">
    jQuery(document).ready(function(){
      jQuery('.datepicker').datepicker({
       format: 'dd-mm-yyyy',
      });
      jQuery('.select2').select2();
    });
</script>
@endsection