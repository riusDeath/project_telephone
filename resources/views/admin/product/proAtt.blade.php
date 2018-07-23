@extends('layouts.admin')

@section('content')
<div class="jumbotron">
	<div class="alert">
		{{ isset($thongbao)?$thongbao:'' }}
	</div>
	<div class="container">
		<h3>id : {{$product->id}} </h3>
		<h3>Tên sản phẩm : {{$product->name}}</h3>
		<p>Thông số kỹ thuật</p>
		<p>
			<form action="{{route('xem-thong-so-ky-thuat',['id' => $product->id])}}" method="POST" role="form">
				<input type="hidden" value="<?php echo csrf_token() ?>" name="_token">
				@foreach($types as $type)
				<div class="col-md-2">
					<div class="dropdown">
					  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{$type->types}}
					  <span class="caret"></span></button>
					  <ul class="dropdown-menu">
					  	@foreach($attributes as $att)
					  		@if($att->types == $type->types)
					    	<li>							
					    	<input type="checkbox" name="attribute_id[]" value="{{$att->id}}">{{$att->name}}  {{isset($att->value)?':'.$att->value:''}} 						
					   		</li>
					    	@endif
					    @endforeach
					  </ul>
					</div>
				</div>
				@endforeach										
				<button type="submit" class="btn btn-primary">Thêm mới</button>
			</form>			
		</p>
		<p> 
		<span class="container"><table class="table table-hover">
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
					@foreach($product->attribute as $att)
						<tr>
							<td>{{$att->id}}</td>
							<td>{{$att->name}}</td>
							<td>{{isset($att->value)?$att->value:''}}</td>
							<td>{{$att->types}}</td>
							<td>
								<a href="{{route('xoa-thong-so-ky-thuat',[ 'product_id' => $product->id,'id' => $att->pivot->id, ])}}" onclick="confirm('Bạn muốn xóa thuộc tính {{$att->name}}?')" class="label label-danger"> Xóa thuộc tính</a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table></span>
		</p>
	</div>
</div>
	
@endsection