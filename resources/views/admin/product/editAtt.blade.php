@extends('layouts.admin')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h3>Sửa thuộc tính </h3>
			<p>{{ isset($thongbao)?$thongbao:'' }}</p>
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
						<label for="">Tên thuộc tính</label>
						<input type="text" class="form-control" id="" placeholder="Tên thuộc tính " name="name" value="{{$att->name}}">
					</div>		
					<div class="form-group">
						<label for="">Giá trị thuộc tính</label>
						<input type="text" class="form-control" id="" placeholder="Giá trị thuộc tính " name="value" value="{{$att->value}}">
					</div>		
					<div class="form-group">
						<label for="">Kiểu thuộc tính</label>
						<input type="text" class="form-control" id="" placeholder="Kiểu thuộc tính " name="types" value="{{$att->types}}">
					</div>		
															
					<button type="submit" class="btn btn-primary">Sửa</button>

				</form>
			</div>
		</div>
	</div>
@endsection

@section('script')

@endsection
