@extends('layouts.admin')
@section('content')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Khách hàng</div>
    <div class="panel-body">
        <form action="" class="form-inline" role="form">
        
            <div class="form-group">
                <input class="form-control" name="search" placeholder="Tìm kiếm theo tên...">
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
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Quyền</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
            
        </thead>
        <tbody>
        @foreach($users as $cus)
            <tr>
                <td>{{$cus->id}}</td>
                <td>{{$cus->name}}</td>
                <td>{{$cus->adress}}</td>
                <td>{{$cus->email}}</td>
                <td>{{$cus->phone}}</td>
                <td>{{$cus->grade}}</td>
                <td>
                    @if($cus->status==1)
                    <label for="" class="label label-info">Có quyền</label>
                    @else
                    <label for="" class="label label-warning">Không có quyền</label>
                    @endif
                </td>
                <td>{{date_format($cus->created_at, "d/m/Y")}}</td>
                <td>
                    <a href="{{route('sua-ho-so',['id' => $cus->id])}}">Sửa hồ sơ</a>
                    <a href="{{route('lich-su-mua-hang',[ 'id'=> $cus->id ])}}" class="label label-info">Lịch sử mua hàng</a>
                    @if($cus->status==1)
                     <a href="{{route('xoa-khach-hang',['id' => $cus->id])}}" class="label label-danger" onclick="confirm('Bạn muốn xóa quyền truy cập khách hàng {{$cus->name}}?')">Xóa quyền truy cập</a>
                    @else
                     <a href="{{route('xoa-khach-hang',['id' => $cus->id])}}" class="label label-danger" onclick="confirm('Bạn muốn cấp quyền truy cập {{$cus->name}}?')">Cấp quyền truy cập</a>
                    @endif
                                      
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

     <div class="panel-footer">
       {{$users->links()}}
    </div>
</div>
@stop()