<!-- Latest compiled and minified CSS & JS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<h2>{{__('home.order_confirm')}}</h2>
<h3>{{__('admin.user')}}:  {{Auth::user()->name}}</h3>
<h4>{{__('admin.order')}}</h4>
<div class="page-title">
	@foreach($cart as $cart)
	<div class="col-md-3">
		<img src="{{url('uploads/'.$cart->options['image'])}}" alt="Product" width="100px">
	</div>
	<div class="col-md-9">
		<h4 class="product-name">{{$cart->name}}</h4>
		<span>{{__('form.price')}}: {{number_format($cart->price)}} VNĐ</span>
		<div>{{__('form.total')}}: {{number_format($cart->qty)}} sản phẩm</div>
	</div>
	<div class="clearfix"></div>
	@endforeach
</div>	
<div class="col-md-4">
	<h3 style="color:red">{{__('form.gross_product')}}: {{$cart->qty}}</h3>
	<p>{{__('form.subtotal')}}: {{Cart::subtotal()}} VNĐ</p>
</div>
<form action="" method="POST" role="form">
	<div class="form-group">
		<label for="">{{__('form.created_at')}} {{$order->created_at}}</label>
	</div>
	<div class="form-group">
		<label for="">{{__('form.adress_customer')}} {{$order->adress}}</label>
	</div>
	<div class="form-group">
		<label>{{__('form.phone')}} {{$order->phone}}</label>		
	</div>
	<div class="form-group">
		<label>{{__('admin.pay')}} {{$order->pay->name}}</label>
	</div>
	<div class="form-group">
		<label>{{__('admin.ship')}} {{$order->pay->ship}}</label>
	</div>
	<a class="btn btn-success" href="{{route('login-Admin')}}">{{__('admin.Approved')}} {{__('admin.order')}}</a>
</form>

