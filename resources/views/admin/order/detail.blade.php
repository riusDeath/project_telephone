 @extends('layouts.admin')

@section('content')
 <section class="content-header">
 			<h3>Chi tiết đơn hàng</h3>
     
    </section>
 <div class="box-body">
 	 
 	<div class="jumbotron">
 		<div class="container">
			<div class="col-md-6">
				<p>Ngày tạo: {{date('d/m/Y',strtotime($order->created_at))}}</p>
				 			<p>Id đơn hàng: {{$order->id}}</p>
				 			<p>Khách hàng: id {{$order->user_id}} | Tên: {{$order->user->name}}</p>
				 			<p>Tổng số sản phẩm: {{$order->total}}</p>
				 			<p>Tổng hóa đơn: {{$order->price}} VNĐ</p>
				 			<p> Trạng thái: 
		                       @if($order->status==1)
		                       <a href="{{route('duyet-don-hang',['id' => $order->id ])}}" class="label label-primary">Đợi giao hàng</a>
		                       @elseif($order->status == 0)
		                       <a href="{{route('duyet-don-hang',['id' => $order->id ])}}" class="label label-danger">Chưa Duyệt</a>
		                       @else
		                       <label  class="label label-info" >Đã giao hàng</label>
		                       @endif 
				       		</p>
			</div>
			<div class="col-md-6">
				<p>Phương thức thanh toán: </p>
				<p>- {{$order->pay->name}}</p>
				<p>Phương thức chuyển hàng: </p>
				<p>- {{$order->ship->name}}</p>
			</div>
 			<table class="table table-hover">
 				<thead>
 					<tr>
 						<th>Id sản phẩm</th>
 						<th>Tên sản phẩm</th>
 						<th>Số lượng sản phẩm</th>
 						<th>Giá</th>
 					</tr>
 				</thead>
 				<tbody>
 					@foreach($detail as $dt) 
 					<tr>
			            <td>{{$dt->product_id}}</td> 
						<td>{{$dt->product->name}}</td>
			            <td>{{$dt->total}}</td>
 						<td>{{ number_format($dt->price)}} VNĐ</td>
        			</tr>
 					@endforeach 
 				</tbody>
 			</table>
 		</div>
 	</div>
 </div>
</div>
@stop()