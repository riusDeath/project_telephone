<?php $__env->startSection('content'); ?>
	<div class="jumbotron">
		<div class="container">
			<p>
			<?php if(isset($mess)): ?>
			<p><?php echo e($mess); ?></p>
			<?php endif; ?>
			<?php if(count($errors) >0): ?>
			<div class="alert alert-danger">
		    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		        <?php echo e($err); ?> <br/>
		    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  </div>
			<?php endif; ?>
			<div class="contanier">
				<form action="" method="POST" role="form" class="form-inline">
				<input type="hidden" value="<?php echo csrf_token() ?>" name="_token">
					<div class="form-group">
						<input type="text" name="name" class="form-control" id="" placeholder="<?php echo e(__('form.name')); ?>">
					</div>
					<div class="form-group">
						<input type="text" name="value" class="form-control" id="" placeholder="<?php echo e(__('form.value')); ?>">
					</div>
					<div class="form-group">
							<input type="text" name="types" class="form-control" id="" placeholder="<?php echo e(__('form.type')); ?>">
					</div>							
					<button type="submit" class="btn btn-primary"><?php echo e(__('admin.add',['name' => ''])); ?></button>
				</form>
			</div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>id</th>
						<th><?php echo e(__('form.name')); ?></th>
						<th><?php echo e(__('form.value')); ?></th>
						<th><?php echo e(__('form.type')); ?></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $att): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($att->id); ?></td>
						<td><?php echo e($att->name); ?></td>
						<td><?php echo e($att->value); ?></td>
						<td><?php echo e($att->types); ?></td>
						<td>
						<a href="<?php echo e(route('editAtt',['id'=>$att->id])); ?>" class="label label-info"><?php echo e(__('admin.update',['name' => ''])); ?></a>		
						<a href="<?php echo e(route('exitAtt',['id'=>$att->id])); ?>" class="label label-danger" onclick=" return confirm('You want to change status')"><?php echo e(__('admin.update',['name' => ''])); ?></a>
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
			<?php echo e($attributes->links()); ?>

			</p>
		</div>
	</div>
		
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>