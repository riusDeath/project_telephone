@extends('layouts.admin')

@section('content')
	
	<div class="container"> 
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			<legend>Thêm mới sản phẩm</legend>
			<p>{{ isset($thongbao)?$thongbao:'' }}</p>
			@foreach($errors->all() as $err)
			<div class="alert alert-danger">

	            {{$err}} <br/>
	        </div>
	        @endforeach
	<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
		
			<div class="form-group">
				<label for="">Tên sản phẩm</label>
				<input type="text" name="name" class="form-control"  placeholder="Tên sản phẩm" required="required" value="{{old('name')}}">
				@if($errors->has('name'))
				<div class="help-block">
                   {{$errors->first('name')}}
               </div>
               @endif
				
			</div>
			<div class="form-group">
				<label for="">Danh mục</label>
				<select name="category_id" id="input" class="form-control" required="required">
					@foreach($categoris as $cat)
					<option value="{{$cat->id}}">{{$cat->name}}</option>
					@endforeach
				</select>	
			</div>
			<div class="form-group">
				<label for="">Ảnh đại diện</label>
				<input type="file" name="link" class="form-control"  placeholder="Ảnh đại diện" required="">
			</div>
			<div class="form-group">
				<label for="">Số lượng</label>
				<input type="number" name="total" class="form-control" required="required" min="0" value="{{old('total')}}">
			</div>
			<div class="form-group">
				<label for="">Sản phẩm hot: </label>
				<input type="radio" value="1" name="hot" > Hot
				<input type="radio" value="0" name="hot" checked=""> Bình thường
			</div>
			  <div class="form-group">
          <label for="">Mô tả</label>
         <textarea name="description" id="description" rows="10" cols="80">{{old('description')}} </textarea>
			<script>
				      CKEDITOR.replace( 'description' );
			</script>

        </div>
			<div class="form-group">
				<label for="">Giá</label>
				<input type="number" name="price" class="form-control" required="required" min="0" value="{{old('price')}}" required>
			</div>
			<div class="form-group">
				<label for="">Giá sale</label>
				<input type="number" name="price_sale" class="form-control"  min="0" value="{{old('price_sale')}}">
			</div>
						
			<div class="form-group">
				<label for="">Bảo hành</label>				
				<select name="warranty_period_id" id="input" class="form-control" required="required">
					@foreach($warranty_periods as $warr)
					<option value="{{$warr->id}}">{{$warr->time}} {{$warr->type}}</option>
					@endforeach
				</select>	
			</div>			
			<div class="form-group">
				<label for="">Thương hiệu</label>
				<select name="brand_id" id="input" class="form-control" required="required">
					@foreach($brands as $brand)
					<option value="{{$brand->id}}">{{$brand->name}}</option>
					@endforeach
				</select>				
			</div>				
			<div class="form-group">
				<label for="">Trạng thái</label>
				<input type="radio" value="1" name="status" checked=""> Hiển thị
				<input type="radio" value="0" name="status"> Ẩn
			</div>
			<button type="submit" class="btn btn-primary">Thêm mới</button>
		</form>
	</div>
	<hr>

@endsection


