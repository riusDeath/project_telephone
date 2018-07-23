@extends('layouts.admin')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h3>Phương thức thanh toán </h3>
			<p>{{ isset($thongbao)?$thongbao:'' }}</p>
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
							<th>Id phương thức</th>
							<th>Tên phương thức</th>
							<th>Trạng thái</th>
							<th>Nội dung</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					<tbody>
						@foreach($pays as $pay)
						<tr>
							<td>{{$pay->id}}</td>
							<td>{{$pay->name}}</td>
							<td>{{($pay->status==1)?'Hiển thị':'Ẩn'}}</td>
							<td>{{$pay->description}}</td>
							<td>
								<a href="{{route('sua-phuong-thuc-thanh-toan',['id'=>$pay->id])}}" class="label label-success">Sửa</a>
								<a href="{{route('xoa-phuong-thuc-thanh-toan',['id' => $pay->id])}}" class="label label-danger" onclick="confirm('Thay đổi trạng thái!')">Thay đổi trạng thái</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<form action="" method="POST" role="form">
					<input type="hidden" value="<?php echo csrf_token() ?>" name="_token">
					<div class="form-group">
						<label for="">Tên phương thức</label>
						<input type="text" id="pay" class="form-control"  placeholder="Phương thức thanh toán" name="name">
					</div>	
					 <div class="form-group">
					 	<textarea name="description" id="description" rows="10" cols="80">  </textarea>
					 </div>
				<script>
				      CKEDITOR.replace( 'description' );
				</script>										
					<button type="submit" class="btn btn-primary">Thêm mới</button>
					
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