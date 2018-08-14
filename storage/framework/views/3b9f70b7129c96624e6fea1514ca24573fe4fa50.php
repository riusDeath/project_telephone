<?php $__env->startSection('main'); ?>

<?php $__env->startSection('link'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/css/my.css')); ?>">                                  
<?php $__env->stopSection(); ?>
<div class="container">
	<?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="thumbnail">
		<img data-src="#" alt="">
		<div class="caption">
			<h1><?php echo e($sale->name); ?></h1>
			<p>
				<img src="<?php echo e(asset('uploads/'.$sale->image)); ?>" alt="">
			</p>
			<h3>
				<th data-hide="phone"><?php echo e(__('form.date_create')); ?>: <?php echo e($sale->date_create); ?></th>
                - <th data-hide="phone"><?php echo e(__('form.date_end')); ?> <?php echo e($sale->date_end); ?></th>
                <div>
					Chỉ còn: <?php echo e($sale->total); ?> suất
                </div>
			</h3>
			<div>
				<?php echo $sale->description; ?>

			</div>
		</div>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>