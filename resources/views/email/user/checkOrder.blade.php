<!-- Latest compiled and minified CSS & JS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<div class="col-md-6">
	<h2>{{ __('home.order_confirm') }}</h2>
	<h3>{{ __('admin.user') }}:  {{ Auth::user()->name }}</h3>
</div>
<table class="table table-hover">
	<thead>
		<tr>
			<th>{{ __('form.name') }}</th>
			<th>{{ __('form.price') }}</th>
			<th>{{ __('form.options') }}</th>
			<th>{{ __('form.total') }}</th>
		</tr>
	</thead>
	<tbody>
		@foreach(Cart::content() as $cart)
		<tr>
			<td>{{ $cart->name }}</td>
			<td>{{ number_format($cart->price) }}</td>
			<td>{{ ($cart->options['options']) }}</td>
			<td>{{ $cart->qty }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="col-md-4">
	<h3 style="color:red">{{ __('form.gross_product') }}: {{ $cart->qty }}</h3>
	<p>{{ __('form.subtotal') }}: {{ Cart::subtotal() }} VNĐ</p>
</div>
<table class="table table-striped table-hover">
	<tbody>
		<tr>
			<td>{{ __('form.adress_customer') }}</td>
			<td>{{ $order->adress }}</td>
		</tr>
		<tr>
			<td>{{ __('form.phone') }}</td>
			<td>{{ $order->phone }}</td>
		</tr>
		<tr>
			<td>{{ __('admin.pay') }}</td>
			<td>{{ $order->pay->name }}</td>
		</tr>
		<tr>
			<td>{{ __('admin.ship') }}</td>
			<td>{{ $order->ship }}</td>
		</tr>
	</tbody>
</table>


