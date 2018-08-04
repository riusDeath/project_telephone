<?php $__env->startSection('content'); ?>
 <section class="content-header">
 	<h3><?php echo e(__('admin.order_detail')); ?></h3>   
    </section>
 <div class="box-body">	 
 	<div class="jumbotron">
 		<div class="container">
			<div class="col-md-6">
				<p><?php echo e(__('form.create')); ?>: <?php echo e(date('d/m/Y',strtotime($order->created_at))); ?></p>
				 	<p>Id <?php echo e(__('admin.order')); ?>: <?php echo e($order->id); ?></p>
				 	<p><?php echo e(__('admin.user')); ?>: id <?php echo e($order->user_id); ?> | <?php echo e(__('form.name')); ?>: <?php echo e($order->user->name); ?></p>
				 	<p><?php echo e(__('form.total')); ?>: <?php echo e($order->total); ?></p>
				 	<p><?php echo e(__('form.subtotal')); ?>: <?php echo e($order->price); ?> VNĐ</p>
				 	<p> <?php echo e(__('form.status')); ?>   : 
		            <?php if($order->status==1): ?>
		            <a href="<?php echo e(route('approved',['id' => $order->id ])); ?>" class="label label-primary" onclick="return confirm('<?php echo e(__('admin.Delivered')); ?>')"><?php echo e(__('admin.Approved')); ?></a>
		            <?php elseif($order->status == 0): ?>
		            <a href="<?php echo e(route('approved',['id' => $order->id ])); ?>" class="label label-danger"  onclick="return confirm('<?php echo e(__('admin.Approved')); ?>')"><?php echo e(__('admin.Unapproved')); ?></a>
		            <?php else: ?>
		            <label  class="label label-info" ><?php echo e(__('admin.Delivered')); ?></label>
		            <?php endif; ?> 
				    </p>
			</div>
			<div class="col-md-6">
				<p>pay : </p>
				<p>- <?php echo e($order->pay->name); ?></p>
				<p>ship: </p>
				<p>- <?php echo e($order->ship->name); ?></p>
			</div>
 			<table class="table table-hover">
 				<thead>
 					<tr>
 						<th>Id <?php echo e(__('admin.product')); ?></th>
 						<th><?php echo e(__('form.name')); ?> <?php echo e(__('admin.product')); ?></th>
 						<th><?php echo e(__('form.color')); ?></th>
 						<th><?php echo e(__('form.total')); ?></th>
 						<th><?php echo e(__('form.price')); ?></th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php $__currentLoopData = $detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
 					<tr>
			            <td><?php echo e($dt->product_id); ?></td> 
						<td><?php echo e($dt->product->name); ?></td>
						<td><?php echo e(isset($dt->list_image->color)?$dt->list_image->color:''); ?></td>
			            <td><?php echo e($dt->total); ?></td>
 						<td><?php echo e(number_format($dt->price)); ?> VNĐ</td>
        			</tr>
 					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
 				</tbody>
 			</table>
 		</div>
 	</div>
 </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>