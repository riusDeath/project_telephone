@extends('layouts.admin')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<p>
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
			<div class="contanier">
				<form action="" method="POST" role="form" class="form-inline">
				<input type="hidden" value="<?php echo csrf_token() ?>" name="_token">
					<div class="form-group">
						<input type="text" name="name" class="form-control" id="" placeholder="Tên thuộc tính">
					</div>
					<div class="form-group">
						<input type="text" name="value" class="form-control" id="" placeholder="Giá trị thuộc tính">
					</div>
					<div class="form-group">
							<input type="text" name="types" class="form-control" id="" placeholder="Kiểu thuộc tính">
					</div>							
					<button type="submit" class="btn btn-primary">Thêm mới</button>
				</form>
			</div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>id</th>
						<th>Tên thuộc tính</th>
						<th>Giá trị thuộc tính</th>
						<th>Kiểu thuộc tính</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($attributes as $att)
					<tr>
						<td>{{$att->id}}</td>
						<td>{{$att->name}}</td>
						<td>{{$att->value}}</td>
						<td>{{$att->types}}</td>
						<td>
							<a href="{{route('sua-thuoc-tinh',['id'=>$att->id])}}" class="label label-info">Sửa</a>							
							<a href="{{route('xoa-thuoc-tinh',['id'=>$att->id])}}" class="label label-danger" onclick="confirm('Bạn muốn xóa thuộc tính {{$att->name}} {{$att->value}} {{$att->types}}')">Xóa</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{$attributes->links()}}
			</p>
		</div>
	</div>
		
@endsection