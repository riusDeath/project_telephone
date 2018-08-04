@extends('admin.layouts.admin')

@section('content')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">{{__('admin.Active')}}</div>
    <div class="panel-body">
        <form action="{{route('logs')}}" class="form-inline" role="form" method ="post">
            <input type="hidden" value="{{csrf_token()}}" name="_token">
            @if(isset($mess))
                <script>
                    alert($mess);
                </script>
            @endif
            <div class="form-group">
                <input class="form-control" name="search" placeholder="search name admin" title="id ỏ name admin">
            </div>  
            <div class="form-group">
                <select name="object" id="input" class="form-control" required="required">
                <option value="0">Object</option>
                @foreach($objects as $object)
                    <option value="{{$object->object}}">{{$object->object}}</option>
                @endforeach
                </select>
            </div>                                    
            <button type="submit" class="btn btn-primary">Search</button>        
        </form>
    </div>
    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>ID admin</th>
                <th>Admin</th>
                <th>Action</th>
                <th>Object</th>
                <th>Create</th>
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