@extends('admin.layouts.admin')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<a href="{{route('add-slide')}}" class="btn btn-success">Thêm mơi</a>
			<h3>Slide </h3>
			@if(isset($mess))
			<p>{{$mess}}</p>
			@endif
			@if(count($errors) >0)
			<div class="alert alert-danger">
		    @foreach($errors->all() as $err)
		        {{$err}} <br/>
		    @endforeach
		  </div>
			@endif
			<div class="">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Id</th>
							<th>Location slide</th>
							<th>Content</th>
							<th>Image</th>
							<th></th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($slides as $slide)
						<tr>
							<td>{{$slide->id}}</td>
							<td>{{$slide->name}}</td>
							<td>{{$slide->content}}</td>
							<td>{{$slide->link}}</td>
							<td>
								<img src="{{asset('uploads/'.$slide->link)}}" alt="" width="300px">
							</td>
							<td>
								<a href="{{route('edit-slide',['id' => $slide->id])}}" class="label label-info">Update</a>
								<a href="{{route('delete-slide',['id' => $slide->id])}}" class="label label-danger" onclick="return confirm('You want to delete slide')">Delete</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				
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