@extends('layouts.index')

@section('main')
<div class="container">
    <h3>{{ __('form.name') }} {{ __('admin.user') }}: {{ Auth::user()->name }}</h3>
    <p>{{ __('admin.order') }}</p>
    <table class="table scroll">
        <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('form.adress') }}</th>
                <th>{{ __('form.phone') }}</th>
                <th>{{ __('form.total') }}</th>
                <th>{{ __('form.price') }}</th>
                <th>{{ __('admin.ship') }}</th>
                <th>{{ __('admin.pay') }}</th>
                <th>{{ __('form.status') }}</th>
                <th>{{ __('form.create') }}</th>
                <th>{{ __('form.Action') }}</th>
            </tr>
            
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->adress }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->total }}</td>
                <td>{{ $order->price }}</td>
                <td>{{ $order->ship_id }}</td>
                <td>{{ $order->pay_id }}</td>
                <td>
                    @if($order->status==2)
                    {{ __('admin.Delivered') }}
                    @elseif($order->status == 0)
                    {{ __('form.wait') }}
                    @else
                    @endif 

                </td>
                <td>{{ date_format($order->created_at, 'd/m/y') }}</td>
                <td>
                    <a href="{{ route('orderDetailHome',['id' => $order->id]) }}" class="label label-success">{{ __('admin.order_detail') }}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@stop()