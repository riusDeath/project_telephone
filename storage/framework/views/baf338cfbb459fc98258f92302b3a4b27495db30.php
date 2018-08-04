<?php $__env->startSection('content'); ?>
	<div class="jumbotron">
		<div class="container">
			<h3><?php echo e(__('admin.ship')); ?></h3>
			<?php if(isset($mess)): ?>
			<p><?php echo e($mess); ?></p>
			<?php endif; ?>
	<table class="table table-hover">
					<thead>
						<tr>
							<th>Id</th>
							<th><?php echo e(__('form.name')); ?></th>
							<th><?php echo e(__('form.adress')); ?></th>
							<th><?php echo e(__('form.price')); ?></th>
							<th><?php echo e(__('form.status')); ?></th>
							<th><?php echo e(__('form.description')); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $ships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($ship->id); ?></td>
							<td><?php echo e($ship->name); ?></td>
							<td><?php echo e($ship->price); ?></td>
							<td><?php echo e(($ship->status==1)?trans('form.show'):trans('form.hidden')); ?></td>
							<td><?php echo $ship->description; ?></td>
							<td>
								<a href="<?php echo e(route('editShip',['id'=>$ship->id])); ?>" class="label label-success"><?php echo e(__('admin.update',['name' => ''])); ?></a>
								<a href="<?php echo e(route('deleteShip',['id' => $ship->id])); ?>" class="label label-danger" onclick=" return confirm( trans('admin.change',['name' => trans('form.status')]) )"><?php echo e(__('admin.change',['name' => trans('form.status')])); ?></a>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
		    <div class="col-md-12">
				
				<p id="ship"></p>
				<form action="" method="POST" role="form">
					<input type="hidden" value="<?php echo csrf_token() ?>" name="_token">
					<div class="form-group">
						<label for="">Name</label>
						<input type="text" class="form-control" id="" placeholder="Name" name="name">
					</div>	
					<div class="form-group">
						<label for="">price: </label>
						<input type="text" class="form-control" id="" placeholder="price" name="price">
					</div>	
					<div class="form-group">
						<label for="">Adress: </label>
						<input type="text" class="form-control" id="" placeholder="Adress" name="adress">
					</div>		
					 <div class="form-group">
					 	<textarea name="description" id="description_ship" rows="10" cols="80">  </textarea>
					 </div>
				<script>
				      CKEDITOR.replace( 'description_ship' );
				</script>										
					<button type="submit" class="btn btn-primary"><?php echo e(__('admin.add',['name' => ''])); ?></button>
				</form>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>