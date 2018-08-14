<!-- Latest compiled and minified CSS & JS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<div class="col-md-6">
	<h2><?php echo e(__('home.order_confirm')); ?></h2>
	<h3><?php echo e(__('admin.user')); ?>:  <?php echo e(Auth::user()->name); ?></h3>
</div>
<table class="table table-hover">
	<thead>
		<tr>
			<th><?php echo e(__('form.name')); ?></th>
			<th><?php echo e(__('form.price')); ?></th>
			<th><?php echo e(__('form.options')); ?></th>
			<th><?php echo e(__('form.total')); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td><?php echo e($cart->name); ?></td>
			<td><?php echo e(number_format($cart->price)); ?></td>
			<td><?php echo e(($cart->options['options'])); ?></td>
			<td><?php echo e($cart->qty); ?></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>
<div class="col-md-4">
	<h3 style="color:red"><?php echo e(__('form.gross_product')); ?>: <?php echo e($cart->qty); ?></h3>
	<p><?php echo e(__('form.subtotal')); ?>: <?php echo e(Cart::subtotal()); ?> VNĐ</p>
</div>
<table class="table table-striped table-hover">
	<tbody>
		<tr>
			<td><?php echo e(__('form.adress_customer')); ?></td>
			<td><?php echo e($order->adress); ?></td>
		</tr>
		<tr>
			<td><?php echo e(__('form.phone')); ?></td>
			<td><?php echo e($order->phone); ?></td>
		</tr>
		<tr>
			<td><?php echo e(__('admin.pay')); ?></td>
			<td><?php echo e($order->pay->name); ?></td>
		</tr>
		<tr>
			<td><?php echo e(__('admin.ship')); ?></td>
			<td><?php echo e($order->ship); ?></td>
		</tr>
	</tbody>
</table>


