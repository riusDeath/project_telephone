@extends('layouts.admin')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h3>Phương thức giao hàng</h3>
			@if(isset($thongbao))
			<p>{{$thongbao}}</p>
			@endif
	<table class="table table-hover">
					<thead>
						<tr>
							<th>Id phương thức</th>
							<th>Tên phương thức</th>
							<th>Khu vực giao hàng</th>
							<th>Giá</th>
							<th>Trạng thái</th>
							<th>Nội dung</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					<tbody>
						@foreach($ships as $ship)
						<tr>
							<td>{{$ship->id}}</td>
							<td>{{$ship->name}}</td>
							<td>{{$ship->adress}}</td>
							<td>{{$ship->price}}</td>
							<td>{{($ship->status==1)?'Hiển thị':'Ẩn'}}</td>
							<td><?php echo $ship->description; ?></td>
							<td>
								<a href="{{route('sua-phuong-thuc-giao-hang',['id'=>$ship->id])}}" class="label label-success">Sửa</a>
								<a href="{{route('xoa-phuong-thuc-giao-hang',['id' => $ship->id])}}" class="label label-danger" onclick="confirm('Thay đổi trạng thái')">Thay đổi trạng thái</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
		    <div class="col-md-12">
				
				<p id="ship"></p>
				<form action="" method="POST" role="form">
					<input type="hidden" value="<?php echo csrf_token() ?>" name="_token">
					<div class="form-group">
						<label for="">Tên phương thức</label>
						<input type="text" class="form-control" id="" placeholder="Phương thức thanh toán" name="name">
					</div>	
					<div class="form-group">
						<label for="">Giá: </label>
						<input type="text" class="form-control" id="" placeholder="Giá" name="price">
					</div>	
					<div class="form-group">
						<label for="">Địa chỉ: </label>
						<input type="text" class="form-control" id="" placeholder="Giá" name="adress">
					</div>		
					 <div class="form-group">
					 	<textarea name="description" id="description_ship" rows="10" cols="80">  </textarea>
					 </div>
				<script>
				      CKEDITOR.replace( 'description_ship' );
				</script>										
					<button type="submit" class="btn btn-primary">Thêm mới</button>

				</form>
			</div>
		</div>
	</div>
@endsection

@section('script')

@endsection
