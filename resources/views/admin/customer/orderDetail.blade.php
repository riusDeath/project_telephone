@extends('admin.layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="jumbotron">
        <div class="container">
            <h3>{{__('form.name')}} {{__('admin.user')}}: {{$us->name}}</h3>
            <p>{{__('admin.order')}}</p>
            <p>
                <table class="table">
        <thead>
            <tr>
                <th>ID</th>
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
                <td>{{$order->adress}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->total}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->ship_id}}</td>
                <td>{{$order->pay_id}}</td>
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
                       <a href="{{route('duyet-don-hang',['id' => $order->id ])}}" class="label label-primary" onclick="return confirm('{{__('admin.Approved')}}')">{{__('admin.Approved')}}</a>
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
            </p>
        </div>
    </div>  
</div>
@stop()