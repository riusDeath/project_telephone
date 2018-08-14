@extends('admin.layouts.admin')

@section('content')
 <section class="content-header">
 	<h3>{{__('admin.order_detail')}}</h3>   
</section>
 <div class="box-body">	 
 	<div class="jumbotron">
 		<div class="container">
			<div class="col-md-6">
				<p>{{__('form.create')}}: {{date('d/m/Y',strtotime($order->created_at))}}</p>
				 	<p>Id {{__('admin.order')}}: {{$order->id}}</p>
				 	<p>{{__('admin.user')}}: id {{$order->user_id}} | {{__('form.name')}}: {{$order->user->name}}</p>
				 	<p>{{__('form.total')}}: {{$order->total}}</p>
				 	<p>{{__('form.subtotal')}}: {{$order->price}} VNĐ</p>
				 	@if($order->code != null)
				 	<p>
				 		{{__('admin.code')}} : {{ $order->code->sale }} %
				 	</p>
				 	@endif
				 	@if(isset($sales))
				 	<p> 
				 		<label for="">{{__('home.sale')}}: </label>
				 		@foreach($sales as $sale)
				 			{{$sale->sale}}%  
				 		@endforeach
				 	</p>
				 	@endif
				 	<p> {{__('form.status')}}   : 
		            @if($order->status==1)
		            <a href="{{route('approved',['id' => $order->id ])}}" class="label label-primary" onclick="return confirm('{{__('admin.Delivered')}}')">{{__('admin.Approved')}}</a>
		            @elseif($order->status == 0)
		            <a href="{{route('approved',['id' => $order->id ])}}" class="label label-danger"  onclick="return confirm('{{__('admin.Approved')}}')">{{__('admin.Unapproved')}}</a>
		            @else
		            <label  class="label label-info" >{{__('admin.Delivered')}}</label>
		            @endif 
				    </p>
			</div>
			<div class="col-md-6">
				<p>pay : </p>
				<p>- {{$order->pay->name}}</p>
				<p>ship: </p>
				<p>- {{$order->ship->name}}</p>
			</div>
 			<table class="table table-hover">
 				<thead>
 					<tr>
 						<th>Id {{__('admin.product')}}</th>
 						<th>{{__('form.name')}} {{__('admin.product')}}</th>
 						<th>{{__('form.color')}}</th>
 						<th>{{__('form.total')}}</th>
 						<th>{{__('form.price')}}</th>
 					</tr>
 				</thead>
 				<tbody>
 					@foreach($detail as $dt) 
 					<tr>
			            <td>{{$dt->product_id}}</td> 
						<td>{{$dt->product->name}}</td>
						<td>{{isset($dt->list_image->color)?$dt->list_image->color:''}}</td>
			            <td>{{$dt->total}}</td>
 						<td>{{ number_format($dt->price)}} VNĐ</td>
        			</tr>
 					@endforeach 
 				</tbody>
 			</table>
 		</div>
 	</div>
 </div>
</div>
@stop()