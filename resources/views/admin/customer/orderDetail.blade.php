@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="jumbotron">
        <div class="container">
            <h3>Tên khách hàng: {{$us->name}}</h3>
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
                <td>{{$order->price}}</td>
                <td>{{$order->ship_id}}</td>
                <td>{{$order->pay_id}}</td>
                <td>
                     @if($order->status==1)
                     Đã Duyệt
                    @elseif($order->status == 0)
                       Chưa Duyệt
                     @else
                       Đã giao hàng
                     @endif 

                </td>
                <td>{{$order->created_at}}</td>
                <td>
                       <a href="{{route('chi-tiet-don-hang',['id' => $order->id])}}" class="label label-success">Chi tiết đơn hàng</a>

                       @if($order->status==1)
                       <a href="{{route('duyet-don-hang',['id' => $order->id ])}}" class="label label-primary">Đợi giao hàng</a>
                       @elseif($order->status == 0)
                       <a href="{{route('duyet-don-hang',['id' => $order->id ])}}" class="label label-danger">Chưa Duyệt</a>
                       @else
                       <label  class="label label-info" >Đã giao hàng</label>
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
@stop()