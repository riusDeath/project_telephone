@extends('admin.layouts.admin')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h3>{{__('admin.pay')}}</h3>
			<p>{{ isset($mess)?$mess:'' }}</p>
			@if(count($errors) >0)
			<div class="alert alert-danger">
		    @foreach($errors->all() as $err)
		        {{$err}} <br/>
		    @endforeach
		  	</div>
			@endif
			<div class="col-md-12">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Id </th>
							<th>{{__('form.name')}}</th>
							<th>{{__('form.status')}}</th>
							<th>{{__('form.description')}}</th>
							<th>{{__('form.Action')}}</th>
						</tr>
					</thead>
					<tbody>
						@foreach($pays as $pay)
						<tr>
							<td>{{$pay->id}}</td>
							<td>{{$pay->name}}</td>
							<td>{{($pay->status==1)?'Show':'Hidden'}}</td>
							<td>{{$pay->description}}</td>
							<td>
								<a href="{{route('editPay',['id'=>$pay->id])}}" class="label label-success">{{__('admin.update',['name' => ''])}}</a>
								<a href="{{route('deletePay',['id' => $pay->id])}}" class="label label-danger" onclick=" return confirm( trans('admin.change',['name' => trans('form.status')]) )">{{__('admin.change',['name' => trans('form.status')])}}</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<form action="" method="POST" role="form">
					<input type="hidden" value="<?php echo csrf_token() ?>" name="_token">
					<div class="form-group">
						<label for="">{{__('form.name')}}</label>
						<input type="text" id="pay" class="form-control"  placeholder="{{__('form.name')}}" name="name">
					</div>	
					 <div class="form-group">
					 	<textarea name="description" id="description" rows="10" cols="80">  </textarea>
					 </div>
				<script>
				      CKEDITOR.replace( 'description' );
				</script>										
					<button type="submit" class="btn btn-primary">{{__('admin.add',['name' => ''])}}</button>
					
				</form>
				
			</div>
			
		</div>
	</div>
@endsection

@section('script')
	<script type="text/javascript">
		function ajaxChange()
		{
			var id = $('#selectPays').val();
			$.ajax({
				url: 'admin/selectPays/'+id,
				type: 'get',
				success : function($data){
					$('#pay').html(data) ;
				}
			});
		}
		$(function(){
			$.(window).on('load',ajaxChange);
			$('#selectPays').change(ajaxChange);
		});
		
	</script>
@endsection