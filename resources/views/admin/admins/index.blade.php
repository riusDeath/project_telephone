@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Admin</div>
    @if(isset($thongbao))
        <div class="alert">{{$thongbao}}</div>     
    @endif
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
        @foreach($admins as $admin)
            <tr>
                <td>{{$admin->id}}</td>
                <td>{{$admin->name}}</td>
                <td>{{$admin->adress}}</td>
                <td>{{$admin->email}}</td>
                <td>{{$admin->phone}}</td>
                <td>{{$admin->grade}}</td>
                <td>
                    @if($admin->status==1)
                    <label for="" class="label label-info">Có quyền</label>
                    @else
                    <label for="" class="label label-warning">Không có quyền</label>
                    @endif
                </td>
                <td>{{$admin->created_at}}</td>
                <td>    
                    <a href="{{route('sua-thong-tin-admin',[ 'id'=> $admin->id ])}}" class="label label-info">Sửa</a>
                    @if($admin->status==1)
                     <a href="{{route('xoa-quyen-admin',['id' => $admin->id])}}" class="label label-danger" onclick="confirm('Bạn muốn xóa quyền truy cập admin {{$admin->name}}?')">Xóa quyền truy cập</a>
                    @else
                     <a href="{{route('xoa-khach-hang',['id' => $admin->id])}}" class="label label-danger" onclick="confirm('Bạn muốn cấp quyền truy cập {{$admin->name}}?')">Cấp quyền truy cập</a>
                    @endif                                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>     
</div>
@stop()