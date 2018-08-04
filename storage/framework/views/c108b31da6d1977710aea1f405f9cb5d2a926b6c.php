<!-- Latest compiled and minified CSS & JS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<h2><?php echo e(__('home.order_confirm')); ?></h2>
<h3><?php echo e(__('admin.user')); ?>:  <?php echo e(Auth::user()->name); ?></h3>
<h4><?php echo e(__('admin.order')); ?></h4>
<div class="page-title">
	<?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="col-md-3">
		<img src="<?php echo e(url('uploads/'.$cart->options['image'])); ?>" alt="Product" width="100px">
	</div>
	<div class="col-md-9">
		<h4 class="product-name"><?php echo e($cart->name); ?></h4>
		<span><?php echo e(__('form.price')); ?>: <?php echo e(number_format($cart->price)); ?> VNĐ</span>
		<div><?php echo e(__('form.total')); ?>: <?php echo e(number_format($cart->qty)); ?> sản phẩm</div>
	</div>
	<div class="clearfix"></div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>	
<div class="col-md-4">
	<h3 style="color:red"><?php echo e(__('form.gross_product')); ?>: <?php echo e($cart->qty); ?></h3>
	<p><?php echo e(__('form.subtotal')); ?>: <?php echo e(Cart::subtotal()); ?> VNĐ</p>
</div>
<form action="" method="POST" role="form">
	<div class="form-group">
		<label for=""><?php echo e(__('form.adress_customer')); ?> <?php echo e($order->adress); ?></label>
	</div>
	<div class="form-group">
		<label><?php echo e(__('admin.phone')); ?> <?php echo e($order->phone); ?></label>		
	</div>
	<div class="form-group">
		<label><?php echo e(__('admin.pay')); ?> <?php echo e($order->pay->name); ?></label>
	</div>
	<div class="form-group">
		<label><?php echo e(__('admin.ship')); ?> <?php echo e($order->pay->ship); ?></label>
	</div>

</form>

