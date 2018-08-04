@extends('admin.layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{__('admin.user')}}</div>
    <div class="panel-body">
        <form action="" class="form-inline" role="form">        
            <div class="form-group">
                <input class="form-control" name="search" placeholder="Search name or id...">
            </div>       
            <button type="submit" class="btn btn-primary">{{__('form.search')}}</button>           
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>{{__('form.name')}}</th>
                <th>{{__('form.email')}}</th>
                <th>{{__('form.phone')}}</th>
                <th>{{__('admin.grade')}}</th>
                <th>{{__('form.status')}}</th>
                <th>{{__('form.create')}}</th>
                <th>{{__('form.Action')}}</th>
            </tr>          
        </thead>
        <tbody>
        @foreach($users as $cus)
            <tr>
                <td>{{$cus->id}}</td>
                <td>{{$cus->name}}</td>
                <td>{{$cus->email}}</td>
                <td>{{$cus->phone}}</td>
                <td>{{$cus->grade}}</td>
                <td>
                    @if($cus->status==1)
                    <label for="" class="label label-info">{{__('form.permission')}}</label>
                    @else
                    <label for="" class="label label-warning">{{__('form.not_have_access')}}</label>
                    @endif
                </td>
                <td>{{date_format($cus->created_at, "d/m/Y")}}</td>
                <td>
                    <a href="{{route('edit_account',['id' => $cus->id])}}">{{__('admin.Account')}}</a>
                    <a href="{{route('destroy',[ 'id'=> $cus->id ])}}" class="label label-info">{{__('admin.order')}}</a>
                    @if($cus->grade == 'customer' || Auth::user()->grade == 'boss')
                    @if($cus->status==1)
                     <a href="{{route('delete-user',['id' => $cus->id])}}" class="label label-danger" onclick=" return confirm('{{__('form.remoce_access')}} {{$cus->name}}?')">{{__('form.remoce_access')}}</a>
                    @else
                     <a href="{{route('delete-user',['id' => $cus->id])}}" class="label label-danger" onclick=" return confirm('{{__('form.grand_access')}} {{$cus->name}}?')">{{__('form.grand_access')}}</a>
                    @endif
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