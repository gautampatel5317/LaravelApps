<div class="box-body">
<div class="form-group">
		{{ Form::label('category','Category', ['class' => 'col-lg-2 control-label required']) }}
		<div class="col-lg-8">
			{{ Form::select('category_id',$category,null,['class' => 'form-control select2 category_select']) }}
		</div>
</div>
<div class="form-group">
		{{ Form::label('Sub Category','Sub Category', ['class' => 'col-lg-2 control-label required']) }}
		<div class="col-lg-8">
			{{ Form::select('sub_category',isset($subCategory) ? $subCategory : [],isset($service) ? $service['sub_category'] : null,['class' => 'form-control select2 sub_category_select']) }}
		</div>
</div>
	<div class="form-group">
		{{ Form::label('Service Name','Service Name', ['class' => 'col-lg-2 control-label required']) }}
		<div class="col-lg-8">
			{{ Form::text('service_name',null,['class' => 'form-control']) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('Description','Description', ['class' => 'col-lg-2 control-label required']) }}
		<div class="col-lg-8">
			{{ Form::textarea('description',null,['class' => 'form-control']) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('Start_date','Start Date', ['class' => 'col-lg-2 control-label required']) }}
		<div class="col-lg-8">
			{{ Form::text('Start_date',isset($service) ? date('d-m-Y',strtotime($service['start_date'])) : null,['class' => 'form-control datepicker']) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('end_date','End Date', ['class' => 'col-lg-2 control-label required']) }}
		<div class="col-lg-8">
			{{ Form::text('end_date',isset($service) ? date('d-m-Y',strtotime($service['end_date'])) : null,['class' => 'form-control datepicker']) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('status','Status', ['class' => 'col-lg-2 control-label required']) }}
		<div class="col-lg-8">
			<label class="container">
  				<input type="checkbox" value="1" name="status" @isset($service) @if($service['status'] == 1) checked="checked" @endif @endisset>
  				<span class="checkmark"></span>
			</label>
		</div>
	</div>
</div>
@section('css')
@endsection
@section('js')
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.select2').select2();
		jQuery('.datepicker').datepicker({
			 format: 'dd-mm-yyyy',
		});
		jQuery('.category_select').on('change',function() {
			var catId = jQuery(this).val();
			var _token = $("input[name='_token']").val();
			jQuery.ajax({
				url : "{{ route('admin.services.subcategory') }}",
				type : 'POST',
				data : {'catId': catId,'_token' : _token},
				success : function (response) {
					$(".sub_category_select").empty();
					for (var i=0; i< response.length; i++) {
						$(".sub_category_select").append(`<option value='${response[i]['id']}'>${response[i]['name']}</option>`);
					}
				}
			});
		});
	});
</script>
@endsection