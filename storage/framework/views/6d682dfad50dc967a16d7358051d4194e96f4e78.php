<?php $__env->startSection('content'); ?>
<div class="jumbotron">
	<div class="alert">
		<?php echo e(isset($mess)?$mess:''); ?>

	</div>
	<div class="container">
		<h3>id : <?php echo e($product->id); ?> </h3>
		<h3>Name : <?php echo e($product->name); ?></h3>
		<p>Specifications</p>
		<p>
			<form action="<?php echo e(route('proAtt',['id' => $product->id])); ?>" method="POST" role="form">
				<input type="hidden" value="<?php echo csrf_token() ?>" name="_token">
				<?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-md-2">
					<div class="dropdown">
					  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo e($type->types); ?>

					  <span class="caret"></span></button>
					  <ul class="dropdown-menu">
					  	<?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $att): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  		<?php if($att->types == $type->types): ?>
					    	<li>							
					    	<input type="checkbox" name="attribute_id[]" value="<?php echo e($att->id); ?>"><?php echo e($att->name); ?>  <?php echo e(isset($att->value)?':'.$att->value:''); ?> 						
					   		</li>
					    	<?php endif; ?>
					    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					  </ul>
					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>										
				<button type="submit" class="btn btn-primary"><?php echo e(__('admin.add',['name' => ''])); ?></button>
			</form>			
		</p>
		<p> 
		<span class="container"><table class="table table-hover">
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
					<?php $__currentLoopData = $product->attribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $att): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($att->id); ?></td>
							<td><?php echo e($att->name); ?></td>
							<td><?php echo e(isset($att->value)?$att->value:''); ?></td>
							<td><?php echo e($att->types); ?></td>
							<td>
								<a href="<?php echo e(route('deleteAtt',[ 'product_id' => $product->id,'id' => $att->pivot->id, ])); ?>" onclick=" return confirm('You want to delete <?php echo e($att->name); ?>?')" class="label label-danger"> <?php echo e(__('form.delete')); ?></a>
							</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table></span>
		</p>
	</div>
</div>	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>