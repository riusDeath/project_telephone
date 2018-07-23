<?php $__env->startSection('content'); ?>
	<div class="jumbotron">
		<div class="container">
			<h3>Sửa thuộc tính </h3>
			<p><?php echo e(isset($thongbao)?$thongbao:''); ?></p>
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
						<label for="">Tên thuộc tính</label>
						<input type="text" class="form-control" id="" placeholder="Tên thuộc tính " name="name" value="<?php echo e($att->name); ?>">
					</div>		
					<div class="form-group">
						<label for="">Giá trị thuộc tính</label>
						<input type="text" class="form-control" id="" placeholder="Giá trị thuộc tính " name="value" value="<?php echo e($att->value); ?>">
					</div>		
					<div class="form-group">
						<label for="">Kiểu thuộc tính</label>
						<input type="text" class="form-control" id="" placeholder="Kiểu thuộc tính " name="types" value="<?php echo e($att->types); ?>">
					</div>		
															
					<button type="submit" class="btn btn-primary">Sửa</button>

				</form>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>