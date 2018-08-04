@extends('admin.layouts.admin')

@section('content')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">{{__('admin.order')}}</div>
    <div class="panel-body">
        <form action="{{route('post-order')}}" class="form-inline" role="form" method="post">
        <input type="hidden" value="{{csrf_token()}}" name="_token"> 
            <div class="form-group">
                <select name="search" id="">
                    <option value="3">{{__('admin.order')}}</option>
                    <option value="1">{{__('admin.Approved')}}</option>
                    <option value="0">{{__('admin.Unapproved')}}</option>
                    <option value="2">{{__('admin.Delivered')}}</option>
                </select>
            </div>          
        
            <button type="submit" class="btn btn-primary">{{__('form.search')}}</button>          
        </form>
    </div>
    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>{{__('form.name')}} {{__('admin.user')}}</th>
                <th>{{__('form.adress')}}</th>
                <th>{{__('form.phone')}}</th>
                <th>{{__('form.total')}}</th>
                <th>{{__('form.price')}}</th>
                <th>{{__('admin.ship')}}</th>
                <th>{{__('admin.pay')}}</th>
                <th>{{__('form.status')}}</th>
                <th>{{__('form.create')}}</th>
                <th>{{__('form.Action')}}</th>
            </tr>
            
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->user->name}}</td>
                <td>{{$order->adress}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->total}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->ship->name}}</td>
                <td>{{$order->pay->name}}</td>
                <td>
                    @if($order->status==1)
                    {{__('admin.Approved')}}
                    @elseif($order->status == 0)
                    {{__('admin.Unapproved')}}
                    @else
                    {{__('admin.Delivered')}}
                    @endif 
                </td>
                <td>{{date_format($order->created_at, 'd/m/y')}}</td>
                <td>
                    <a href="{{route('detail',['id' => $order->id])}}" class="label label-success">{{__('admin.order_detail')}}</a>
                       @if($order->status==1)
                       <a href="{{route('approved',['id' => $order->id ])}}" class="label label-primary" onclick="return confirm('{{__('admin.Approved')}}')">{{__('admin.Approved')}}</a>
                       @elseif($order->status == 0)
                       <a href="{{route('approved',['id' => $order->id ])}}" class="label label-danger"  onclick="return confirm('{{__('admin.Unapproved')}}')">{{__('admin.Unapproved')}}</a>
                       @else
                       <label  class="label label-info" >{{__('admin.Delivered')}}</label>
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