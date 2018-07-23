@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Đơn hàng</div>
    <div class="panel-body">
        <form action="{{route('post-don-hang')}}" class="form-inline" role="form" method="post">
        <input type="hidden" value="{{csrf_token()}}" name="_token"> 
            <div class="form-group">
                <select name="search" id="">
                    <option value="3">Tất cả đơn hàng</option>
                    <option value="1">Đơn hàng đã duyệt</option>
                    <option value="0">Đơn hàng chưa duyệt</option>
                    <option value="2">Đơn hàng đã giao</option>
                </select>
            </div>
        
            
        
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
           
        </form>

    </div>

    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên khách hàng</th>
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
                <td>{{$order->name}}</td>
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

     <div class="panel-footer">
        {{$orders->links()}}
    </div>
</div>
@stop()