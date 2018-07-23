@extends('layouts.admin')

@section('content')
	<div class="wrapper wrapper-content animated fadeInRight ecommerce">
		<div class="col-md-9">
		<div class="" style="padding:10px">
		<div class="row">
			<h3> {{$product->name}}</h3>

			<div class="col-md-6">
				<img src="../../uploads/<?php echo $product['image']?>" alt="" class="reponsive" width="300px">
			</div>
			<p>ID: {{$product->id}}| {{date('d/m/Y',strtotime($product->created_at))}}  </p>           
			<h3 for="">{{number_format($product['price'])}}  VNĐ</h3>
			<div class="col-md-6"  style="padding:0px">	
            <p>Thuộc danh mục: {{$product->category->name}}</p>
            <p>Thuộc thương hiệu: {{$product->brand->name}}</p>
			<p>Thời gian bảo hành: {{$product->warranty_period->time}} {{$product->warranty_period->type}}</p>
			<p>Số lượng : {{$product->total}} cái</p>
			<p>Giá gốc: {{number_format($product['price'])}} VNĐ</p>
			<p>Giá sale: {{number_format($product['price_sale'])}} VNĐ</p>
			<p>Số sản phẩm đã bán: </p>	
			<a href="{{route('sua-san-pham',['id' => $product->id])}}" class="btn btn-success">Sửa thông tin</a>									
			</div>
			<p>
            <label for="">Mô tả về sản phẩm:</label>
            <p>
                <?php echo $product->description; ?>        
            </p>
        </p>
        <div class="clearfix"></div>
        @if(count($product->comment) !=0)        
        <h3>Bảng Comment</h3>
        <table class="table">
        <thead>
            <tr>
                <th>ID comment</th>
                <th>id người dùng</th>
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
                <td>{{$cm->user->id}}</td>
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
        @endif
        @if(count($product->rate) !=0)      
        <h3> Bảng Rate</h3>
            <table class="table">
        <thead>
            <tr>
                <th>ID </th>
                <th>ID người dùng</th>
                <th>Người dùng</th>
                <th>Số sao</th>
                <th>Ngày đăng</th>
            </tr>            
        </thead>
        <tbody>
        @foreach($product->rate as $rate)
            <tr>
                <td>{{$rate->id}}</td>
                <td>{{$rate->user->id}}</td>
                <td>{{$rate->user->name}}</td>
                <td>{{$rate->rate}}</td>
                <td>{{$rate->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
         </table>
         @endif
		</div>		
	</div>
</div>
</div>

@endsection