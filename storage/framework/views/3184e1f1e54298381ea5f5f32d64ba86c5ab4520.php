<?php $__env->startSection('content'); ?>
	<div class="jumbotron">
		<div class="container">
			<h3><?php echo e(__('admin.update',['name' => trans('admin.Specification')])); ?></h3>
			<p><?php echo e(isset($mess)?$mess:''); ?></p>
	        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="alert alert-danger">
	            <?php echo e($err); ?> <br/>
	        </div>
	        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		    <div class="col-md-6">
				<p id="ship"></p>
				<form action="" method="POST" role="form">
					<input type="hidden" value="<?php echo csrf_token() ?>" name="_token">
					<div class="form-group">
						<label for=""><?php echo e(__('form.name')); ?></label>
						<input type="text" class="form-control" id="" placeholder="<?php echo e(__('form.name')); ?> " name="name" value="<?php echo e($att->name); ?>">
					</div>		
					<div class="form-group">
						<label for=""><?php echo e(__('form.value')); ?></label>
						<input type="text" class="form-control" id="" placeholder="<?php echo e(__('form.value')); ?> " name="value" value="<?php echo e($att->value); ?>">
					</div>		
					<div class="form-group">
						<label for=""><?php echo e(__('form.type')); ?></label>
						<input type="text" class="form-control" id="" placeholder="<?php echo e(__('form.type')); ?>" name="types" value="<?php echo e($att->types); ?>">
					</div>		
															
					<button type="submit" class="btn btn-primary"><?php echo e(__('admin.update',['name' => ''])); ?></button>

				</form>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>