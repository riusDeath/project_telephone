@extends('layouts.admin')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h3>Phương thức giao hàng</h3>
			@if(isset($thongbao))
			<p>{{$thongbao}}</p>
			@endif
	        @foreach($errors->all() as $err)
			<div class="alert alert-danger">

	            {{$err}} <br/>
	        </div>
	        @endforeach
		    <div class="col-md-6">
				<p id="ship"></p>
				<form action="" method="POST" role="form">
					<input type="hidden" value="<?php echo csrf_token() ?>" name="_token">
					<div class="form-group">
						<label for="">Tên phương thức</label>
						<input type="text" class="form-control" id="" placeholder="Phương thức thanh toán" name="name" value="{{$pay->name}}">
					</div>		
					 <div class="form-group">
					 	<textarea name="description" id="description_ship" rows="10" cols="80"> {{$pay->description}} </textarea>
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
