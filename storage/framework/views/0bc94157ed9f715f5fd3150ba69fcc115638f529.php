<?php $__env->startSection('main'); ?>
<div class="container">
    <h3><?php echo e(__('form.name')); ?> <?php echo e(__('admin.user')); ?>: <?php echo e(Auth::user()->name); ?></h3>
    <p><?php echo e(__('admin.order')); ?></p>
    <table class="table scroll">
        <thead>
            <tr>
                <th>ID</th>
                <th><?php echo e(__('form.adress')); ?></th>
                <th><?php echo e(__('form.phone')); ?></th>
                <th><?php echo e(__('form.total')); ?></th>
                <th><?php echo e(__('form.price')); ?></th>
                <th><?php echo e(__('admin.ship')); ?></th>
                <th><?php echo e(__('admin.pay')); ?></th>
                <th><?php echo e(__('form.status')); ?></th>
                <th><?php echo e(__('form.create')); ?></th>
                <th><?php echo e(__('form.Action')); ?></th>
            </tr>
            
        </thead>
        <tbody>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($order->id); ?></td>
                <td><?php echo e($order->adress); ?></td>
                <td><?php echo e($order->phone); ?></td>
                <td><?php echo e($order->total); ?></td>
                <td><?php echo e($order->price); ?></td>
                <td><?php echo e($order->ship_id); ?></td>
                <td><?php echo e($order->pay_id); ?></td>
                <td>
                    <?php if($order->status==2): ?>
                    <?php echo e(__('admin.Delivered')); ?>

                    <?php elseif($order->status == 0): ?>
                    <?php echo e(__('form.wait')); ?>

                    <?php else: ?>
                    <?php endif; ?> 

                </td>
                <td><?php echo e(date_format($order->created_at, 'd/m/y')); ?></td>
                <td>
                    <a href="<?php echo e(route('orderDetailHome',['id' => $order->id])); ?>" class="label label-success"><?php echo e(__('admin.order_detail')); ?></a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>