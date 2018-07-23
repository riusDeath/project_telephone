@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Hoạt động của admin</div>
    <div class="panel-body">
        <form action="{{route('lich-su-hoat-dong')}}" class="form-inline" role="form" method ="post">
            <input type="hidden" value="{{csrf_token()}}" name="_token">
            @if(isset($thongbao))
                <script>
                    alert($thongbao);
                </script>
            @endif
            <div class="form-group">
                <input class="form-control" name="search" placeholder="TÌm kiếm id admin" title="Nhập id admin,  Tên đôi tượng được thao tác">
            </div>  
            <div class="form-group">
                <select name="object" id="input" class="form-control" required="required">
                <option value="0">Đối tượng</option>
                @foreach($objects as $object)
                    <option value="{{$object->object}}">{{$object->object}}</option>
                @endforeach
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
                <th>ID admin</th>
                <th> Admin</th>
                <th>Hoạt động</th>
                <th>Đối tượng</th>
                <th>Ngày tạo</th>
            </tr>
            
        </thead>
        <tbody>
        @foreach($logs as $log)
            <tr>
                <td>{{$log->id}}</td>
                <td>id: {{$log->user_id}}</td>
                <td> {{$log->user->name}}</td>
                <td>{{$log->action}}</td>
                <td>{{$log->object}}</td>
                <td>{{$log->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{$logs->links()}}
    </div>
     
</div>
@stop()