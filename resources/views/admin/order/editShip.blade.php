@extends('layouts.admin')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h3>Phương thức giao hàng</h3>
			@if(isset($thongbao))
			<p>{{$thongbao}}</p>
			@endif
	
		    <div class="col-md-6">
				<p id="ship"></p>
				<form action="" method="POST" role="form">
					<input type="hidden" value="<?php echo csrf_token() ?>" name="_token">
					<div class="form-group">
						<label for="">Tên phương thức</label>
						<input type="text" class="form-control" id="" placeholder="Phương thức thanh toán" name="name" value="{{$ship->name}}">
					</div>	
					<div class="form-group">
						<label for="">Giá: </label>
						<input type="text" class="form-control" id="" placeholder="Giá" name="price" value="{{$ship->price}}">
					</div>	
					<div class="form-group">
						<label for="">Địa chỉ: </label>
						<input type="text" class="form-control" id="" placeholder="Giá" name="adress" value="{{$ship->adress}}">
					</div>		
					 <div class="form-group">
					 	<textarea name="description" id="description_ship" rows="10" cols="80"> {{$ship->description}} </textarea>
					 </div>
				<script>
				      CKEDITOR.replace( 'description_ship' );
				</script>										
					<button type="submit" class="btn btn-primary">Sửa</button>

				</form>
			</div>
		</div>
	</div>
@endsection

@section('script')

@endsection
