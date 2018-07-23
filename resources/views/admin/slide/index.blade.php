@extends('layouts.admin')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<a href="{{route('them-moi-slide')}}" class="btn btn-success">Thêm mơi</a>
			<h3>Slide </h3>
			@if(isset($thongbao))
			<p>{{$thongbao}}</p>
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
							<th>Vị Trí slide</th>
							<th>Miêu tả</th>
							<th>link ảnh</th>
							<th></th>
							<th>Thao tác</th>
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
								<a href="{{route('sua-slide',['id' => $slide->id])}}" class="label label-info">Sửa</a>
								<a href="{{route('xoa-slide',['id' => $slide->id])}}" class="label label-danger" onclick="confirm('Bạn muốn xóa slide')">Xóa</a>
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