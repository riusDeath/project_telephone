 

<?php $__env->startSection('content'); ?>
 <section class="content-header">
 			<h3>Chi tiết đơn hàng</h3>
     
    </section>
 <div class="box-body">
 	 
 	<div class="jumbotron">
 		<div class="container">
			<div class="col-md-6">
				<p>Ngày tạo: <?php echo e(date('d/m/Y',strtotime($order->created_at))); ?></p>
				 			<p>Id đơn hàng: <?php echo e($order->id); ?></p>
				 			<p>Khách hàng: id <?php echo e($order->user_id); ?> | Tên: <?php echo e($order->user->name); ?></p>
				 			<p>Tổng số sản phẩm: <?php echo e($order->total); ?></p>
				 			<p>Tổng hóa đơn: <?php echo e($order->price); ?> VNĐ</p>
				 			<p> Trạng thái: 
		                       <?php if($order->status==1): ?>
		                       <a href="<?php echo e(route('duyet-don-hang',['id' => $order->id ])); ?>" class="label label-primary">Đợi giao hàng</a>
		                       <?php elseif($order->status == 0): ?>
		                       <a href="<?php echo e(route('duyet-don-hang',['id' => $order->id ])); ?>" class="label label-danger">Chưa Duyệt</a>
		                       <?php else: ?>
		                       <label  class="label label-info" >Đã giao hàng</label>
		                       <?php endif; ?> 
				       		</p>
			</div>
			<div class="col-md-6">
				<p>Phương thức thanh toán: </p>
				<p>- <?php echo e($order->pay->name); ?></p>
				<p>Phương thức chuyển hàng: </p>
				<p>- <?php echo e($order->ship->name); ?></p>
			</div>
 			<table class="table table-hover">
 				<thead>
 					<tr>
 						<th>Id sản phẩm</th>
 						<th>Tên sản phẩm</th>
 						<th>Số lượng sản phẩm</th>
 						<th>Giá</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php $__currentLoopData = $detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
 					<tr>
			            <td><?php echo e($dt->product_id); ?></td> 
						<td><?php echo e($dt->product->name); ?></td>
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
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>