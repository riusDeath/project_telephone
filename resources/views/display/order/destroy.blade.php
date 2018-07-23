@extends('layouts.index')

@section('main')
	<div class="panel panel-default">
    <div class="jumbotron">
        <div class="container">
            <h3>Tên khách hàng: {{Auth::user()->name}}</h3>
            <p>Đơn hàng</p>
            <p>
                <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Địa chỉ giao hàng</th>
                <th>Số điện thoại</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Phương thức ship</th>
                <th>Phương thức trả hàng</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
            
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->adress}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->total}}</td>
                <td>{{$order->price}} VNĐ</td>
                <td>{{$order->ship->name}}</td>
                <td>{{$order->pay->name}}</td>
                <td>
                     @if($order->status==2)
                       Đã giao hàng
                     @else
                     	Đang đợi giao hàng
                     @endif 

                </td>
                <td>{{$order->created_at}}</td>
                <td>

                       @if($order->status==2)
                       <label  class="label label-info" >Đã giao hàng</label>
                       @else
                       <label  class="label label-primary">Đợi giao hàng</label>
                       @endif 
                </td>
            </tr>
        @endforeach
        </tbody>
    	</table>
        </p>
        </div>
    </div>
</div>
@endsection