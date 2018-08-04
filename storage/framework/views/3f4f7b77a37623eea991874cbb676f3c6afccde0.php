<?php $__env->startSection('content'); ?>
	<div class="jumbotron">
		<div class="container">
			<h3><?php echo e(__('admin.update',['name' => trans('admin.ship')])); ?></h3>
			<?php if(isset($mess)): ?>
			<p><?php echo e($mess); ?></p>
			<?php endif; ?>
	
		    <div class="col-md-6">
				<p id="ship"></p>
				<form action="" method="POST" role="form">
					<input type="hidden" value="<?php echo csrf_token() ?>" name="_token">
					<div class="form-group">
						<label for=""><?php echo e(__('form.name')); ?></label>
						<input type="text" class="form-control" id="" placeholder="name ship" name="name" value="<?php echo e($ship->name); ?>">
					</div>	
					<div class="form-group">
						<label for=""><?php echo e(__('form.price')); ?>: </label>
						<input type="text" class="form-control" id="" placeholder="<?php echo e(__('form.price')); ?>" name="price" value="<?php echo e($ship->price); ?>">
					</div>	
					<div class="form-group">
						<label for=""><?php echo e(__('form.adress')); ?>: </label>
						<input type="text" class="form-control" id="" placeholder="<?php echo e(__('form.adress')); ?>" name="adress" value="<?php echo e($ship->adress); ?>">
					</div>		
					 <div class="form-group">
					 	<textarea name="description" id="description_ship" rows="10" cols="80"> <?php echo e($ship->description); ?> </textarea>
					 </div>
				<script>
				      CKEDITOR.replace( 'description_ship' );
				</script>										
					<button type="submit" class="btn btn-primary"><?php echo e(__('admin.update',['name' => ''])); ?></button>

				</form>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>