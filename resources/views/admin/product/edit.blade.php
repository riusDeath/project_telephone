@extends('layouts.admin')

@section('content')
	
	<div class="container"> 
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			<legend>Sửa sản phẩm</legend>
		@if(isset($thongbao))
			<div class="alert alert-success">{{$thongbao}}</div>
		@endif
		
	<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
		
			<div class="form-group">
				<label for="">Tên sản phẩm</label>
				<input type="text" name="name" class="form-control"  placeholder="Tên sản phẩm" required="required" value="{{$product->name}}">
				@if($errors->has('name'))
				<div class="help-block">
                   {{$errors->first('name')}}
               </div>
               @endif
				
			</div>
			<div class="form-group">
				<label for="">Danh mục</label>
				<select name="category_id" id="input" class="form-control" required="required">
					@foreach($categories as $cat)
					<option
						@if($product->category_id == $cat->id)
							{{"selected"}}
						@endif
					 value="{{$cat->id}}">{{$cat->name}}</option>
					@endforeach
				</select>	
			</div>
			<div class="form-group">
				<label for="">Ảnh đại diện</label>
				<input type="file" name="link" class="form-control"  placeholder="Ảnh đại diện">
				<img src="{{asset('uploads/'.$product->image)}}" alt="" width="300px">
				<input type="text" name="imaget" value="{{$product->image}}">
			</div>
			<div class="form-group">
				<label for="">Sản phẩm hot: </label>
				<input type="radio" value="1" name="hot" {{$product->hot == 1 ? 'checked':''}}> Hot
				<input type="radio" value="0" name="hot" {{$product->hot == 0 ? 'checked':''}}> Bình thường
			</div>
			<div class="form-group">
				<label for="">Số lượng</label>
				<input type="number" name="total" class="form-control" required="required" min="0" value="{{$product->total}}">
			</div>
			  <div class="form-group">
          <label for="">Mô tả</label>
         <textarea name="description" id="description" rows="10" cols="80"> {{$product->description}} </textarea>
			<script>
				      CKEDITOR.replace( 'description' );
			</script>

        </div>
			<div class="form-group">
				<label for="">Giá</label>
				<input type="number" name="price" class="form-control" required="required" min="0" value="{{$product->price}}">
				@if($errors->has('price'))
				<div class="help-block">
                   {{$errors->first('price')}}
               </div>
               @endif
			</div>
			<div class="form-group">
				<label for="">Giá sale</label>
				<input type="number" name="price_sale" class="form-control" required="required" min="0" value="{{$product->price_sale}}" >
				@if($errors->has('price_sale'))
				<div class="help-block">
                   {{$errors->first('price_sale')}}
               </div>
               @endif
			</div>
						
			<div class="form-group">
				<label for="">Bảo hành</label>				
				<select name="warranty_period_id" id="input" class="form-control" required="required">
					@foreach($warranty_periods as $warr)
					<option 
					@if($product->warranty_period_id == $warr->id)
							{{"selected"}}
					@endif
					 value="{{$warr->id}}">{{$warr->time}} {{$warr->type}}</option>
					@endforeach
				</select>	
			</div>			
			<div class="form-group">
				<label for="">Thương hiệu</label>
				<select name="brand_id" id="input" class="form-control" required="required">
					@foreach($brands as $brand)
					<option 
					@if($product->brand_id == $brand->id)
							{{"selected"}}
					@endif
					 value="{{$brand->id}}">{{$brand->name}}</option>
					@endforeach
				</select>				
			</div>				
			<div class="form-group">
				<label for="">Trạng thái</label>
				<input type="radio" value="1" name="status" {{$product->status==1?'checked':''}} > Hiển thị
				<input type="radio" value="0" name="status" {{$product->status==0?'checked':''}}> Ẩn
			</div>
			<button type="submit" class="btn btn-primary">sửa</button>
		</form>
	</div>

	    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>ID </th>
                <th>Người dùng</th>
                <th>Nội dung đăng</th>
                <th>Ngày đăng</th>
                <th>Thao tác</th>
            </tr>
            
        </thead>
        <tbody>
        @foreach($product->comment as $cm)
            <tr>
                <td>{{$cm->id}}</td>
                <td>{{$cm->user->name}}</td>
                <td>{{$cm->comment}}</td>
                <td>{{$cm->created_at}}</td>
                <td>
                    <a href="{{route('xoa-comment',[
						'id' => $cm->id,
						'product_id' => $product->id
                    ])}}" class="label label-danger" onclick="confirm('Bạn muốn xóa comment {{$cm->id}}?')">Xóa</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

     <div class="panel-footer">
       
    </div>
	
@endsection



