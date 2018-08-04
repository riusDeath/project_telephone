<?php $__env->startSection('main'); ?>
	<div class="panel panel-default">
    <div class="jumbotron">
        <div class="container">
            <h3>Tên khách hàng: <?php echo e(Auth::user()->name); ?></h3>
            <p>Đơn hàng</p>
            <p>
                <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Địa chỉ giao hàng</th>
                <th>Số điện thoại</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Phương thức ship</th>
                <th>Phương thức trả hàng</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
            
        </thead>
        <tbody>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($order->id); ?></td>
                <td><?php echo e($order->adress); ?></td>
                <td><?php echo e($order->phone); ?></td>
                <td><?php echo e($order->total); ?></td>
                <td><?php echo e($order->price); ?> VNĐ</td>
                <td><?php echo e($order->ship->name); ?></td>
                <td><?php echo e($order->pay->name); ?></td>
                <td>
                     <?php if($order->status==2): ?>
                       Đã giao hàng
                     <?php else: ?>
                     	Đang đợi giao hàng
                     <?php endif; ?> 

                </td>
                <td><?php echo e($order->created_at); ?></td>
                <td>

                       <?php if($order->status==2): ?>
                       <label  class="label label-info" >Đã giao hàng</label>
                       <?php else: ?>
                       <label  class="label label-primary">Đợi giao hàng</label>
                       <?php endif; ?> 
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    	</table>
        </p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>