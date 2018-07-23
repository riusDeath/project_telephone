<?php $__env->startSection('content'); ?>
<div class="jumbotron">
	<div class="alert">
		<?php echo e(isset($thongbao)?$thongbao:''); ?>

	</div>
	<div class="container">
		<h3>id : <?php echo e($product->id); ?> </h3>
		<h3>Tên sản phẩm : <?php echo e($product->name); ?></h3>
		<p>Thông số kỹ thuật</p>
		<p>
			<form action="<?php echo e(route('xem-thong-so-ky-thuat',['id' => $product->id])); ?>" method="POST" role="form">
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
				<button type="submit" class="btn btn-primary">Thêm mới</button>
			</form>			
		</p>
		<p> 
		<span class="container"><table class="table table-hover">
			<thead>
				<tr>
					<th>id</th>
					<th>Tên thuộc tính</th>
					<th>Giá trị thuộc tính</th>
					<th>Kiểu thuộc tính</th>
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
								<a href="<?php echo e(route('xoa-thong-so-ky-thuat',[ 'product_id' => $product->id,'id' => $att->pivot->id, ])); ?>" onclick="confirm('Bạn muốn xóa thuộc tính <?php echo e($att->name); ?>?')" class="label label-danger"> Xóa thuộc tính</a>
							</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table></span>
		</p>
	</div>
</div>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>