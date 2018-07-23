@extends('layouts.admin')
@section('content')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Danh mục</div>
    <div class="panel-body">
        <form action="" class="form-inline" role="form">
        
            <div class="form-group">
                <input class="form-control" name="search" placeholder="Tìm kiếm theo tên...">
            </div>
        
            
        
            <button type="submit" class="btn btn-primary">lọc</button>
            <a href="{{route('them-danh-muc')}}" class="btn btn-success">Thêm mới</a>
        </form>

    </div>

    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
            
        </thead>
        <tbody>
        @foreach($cats as $cat)
            <tr>
                <td>{{$cat->id}}</td>
                <td>{{$cat->name}}</td>
                <td>{{$cat->created_at}}</td>
                <td>
                    <a href="{{route('sua-danh-muc',['id' =>$cat->id])}}" class="label label-success">Sửa</a>
                    <a href="{{route('xoa-danh-muc',['id' => $cat->id])}}" class="label label-danger" onclick="confirm('Bạn muốn xóa danh mục {{$cat->name}}?')">Xóa</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

     <div class="panel-footer">
        {{$cats->links()}}
    </div>
</div>
@stop()