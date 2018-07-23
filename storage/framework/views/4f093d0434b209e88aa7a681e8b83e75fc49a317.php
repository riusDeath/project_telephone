<?php $__env->startSection('main'); ?>
<!-- Main Container -->
<section class="main-container col2-right-layout">
  	<div class="main container">
	<div class="row">
	  	<div class="col-main col-sm-9 col-xs-12">
 		<div class="page-content checkout-page">
 			<h3>Khách hàng:  <?php echo e(Auth::user()->name); ?></h3>
 			<h4>Đơn hàng</h4>
 			<div class="page-title">
 			<div class="col-md-8">
 				<?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 				<div class="col-md-3">
 					<a href="<?php echo e(route('home-chi-tiet-san-pham',['id' => $cart->id])); ?>"><img src="<?php echo e(asset('uploads/'.$cart->options['image'])); ?>" alt="Product" width="100px"></a>
 				</div>
 				<div class="col-md-9">
 				                <h4 class="product-name"><?php echo e($cart->name); ?></h4>
 					<span>Giá: <?php echo e(number_format($cart->price)); ?> VNĐ</span>
 					<div>Số lượng : <?php echo e(number_format($cart->qty)); ?> sản phẩm</div>
 				</div>
 				<div class="clearfix"></div>
 				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 			</div>
			</div>	
			<div class="col-md-4">
				<h3 style="color:red">Tổng sản phẩm: <?php echo e(Cart::count()); ?></h3>
				<p>Tổng hóa đơn: <?php echo e(Cart::subtotal()); ?> VNĐ</p>
				<a class="" href="<?php echo e(route('home')); ?>"><i class="fa fa-arrow-left"> </i>&nbsp; Mua tiếp</a>
			</div>	
		<div class="box-border">
		<hr>
		<div class="row">
			<div class="col-sm-9">
			<h4>Điền thông tin </h4>
			<hr>
			<form method="post" action="<?php echo e(route('thanh-toan-don-hang')); ?>">	
				<input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">								
				<div  id="home" >
					<div class="" >
						<h4 class="complete">Địa chỉ nhận hàng:</h4> 
						<input type="radio" name="adress_user" id="input"  value="<?php echo e(Auth::user()->adress); ?>" checked="" pattern="" title="">*  <?php echo e(Auth::user()->adress); ?> 
						<p>
							<a class="edit-adress-user" style="color:red; cursor: pointer;">Địa chỉ khác: </a>	
							<div class="adress-edit" style="display: none;" >
								Nhập lại địa chỉ của bạn: <input type="text" value="<?php echo e(Auth::user()->adress); ?>" style="width: 400px;  padding: 20px; line-height: 10px; border-radius: 5px" name="adress">
							</div>						
						</p>
					</div>
				</div>
				<hr>
				<div class="block-content " style="font-size: 16px">
				<h4 class="complete">Phương thức thanh toán </h4>
				<p class="complete">
					<div>
						<?php $__currentLoopData = $pays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="container">
							<div class="radio">
							<p>
								<input type="radio" name="pay" value="<?php echo e($pay->id); ?>" checked="checked"> <?php echo e($pay->name); ?>

								<p >
									<?php echo $pay->description; ?>
								</p>
							</p>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
						</p>
						<hr>
						<dt class="complete"> Phương thức giao hàng </dt>
						<p class="complete">
					<div>
						<?php $__currentLoopData = $ships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="container">
							<div class="radio">
							<p>
								<input type="radio" name="ship" value="<?php echo e($ship->id); ?>" checked="checked"> <?php echo e($ship->name); ?>

								<p>* <?php echo e($ship->description); ?></p>
								<p for="">* <?php echo e(number_format($ship->price)); ?> VNĐ</p>
							</p>
							</div>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
					</p>				 
			  	</div>
				<h4 class="complete">Số điện thoại người nhận</h4>
				<input type="number" class="form-control input" placeholder="Số điện thoại người nhận" value="<?php echo e(Auth::user()->phone); ?>" name="phone">    
				<button type="submit" style="margin: 20px 0; padding: 10px; background: #fed700; border-radius: 5px" onclick="alert('Quý khách đã đặt hàng thành công! Cảm ơn quý khách!')">
					&nbsp; <span>Mua hàng</span>
				</button>                				
				</div>
				
			</form>
		</div>
		</div>
	</div>
</div>
<aside class="right sidebar col-sm-3 col-xs-12">
	<div class="sidebar-checkout block">
		<div class="sidebar-bar-title">
			<h3>
				<a href="">Lịch sử mua hàng của bạn</a>				
			</h3>
			</div>
			<div class="block-content" style="font-size: 16px">
			<h3 class="complete">Bảo hành chính hãng</h3>
			<p class="complete">
				<adress>
					<?php $__currentLoopData = $wars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $war): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<p>
						<span class="glyphicon glyphicon-certificate"></span>  <?php echo e($war->time); ?> <?php echo e($war->type); ?>

					</p>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</adress>
					</p>
					<dt class="complete"> Phương thúc giao hàng </dt>
					<p class="complete">
				<adress>
					<?php $__currentLoopData = $ships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="radio">
					<label>
						<input type="radio" name="ship" value="<?php echo e($ship->id); ?>" checked="checked">
								<?php echo e($ship->name); ?>

					</label>
					<label for=""><?php echo e(number_format($ship->price)); ?> VNĐ</label>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</adress>
				</p>				 
		  </div>
		</div>
	</aside>
	</div>
  </div>
  </section>
  <!-- Main Container End -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
	<script type="text/javascript" src="<?php echo e(asset('public/js/checkout.js')); ?>">						
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>