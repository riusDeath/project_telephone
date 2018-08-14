<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <div class="jumbotron">
        <div class="container">
            <h3><?php echo e(__('form.name')); ?> <?php echo e(__('admin.user')); ?>: <?php echo e($us->name); ?></h3>
            <p><?php echo e(__('admin.order')); ?></p>
            <p>
                <table class="table">
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
                    <?php if($order->status==1): ?>
                    <?php echo e(__('admin.Approved')); ?>

                    <?php elseif($order->status == 0): ?>
                    <?php echo e(__('admin.Unapproved')); ?>

                    <?php else: ?>
                    <?php echo e(__('admin.Delivered')); ?>

                    <?php endif; ?> 

                </td>
                <td><?php echo e(date_format($order->created_at, 'd/m/y')); ?></td>
                <td>
                       <a href="<?php echo e(route('detail',['id' => $order->id])); ?>" class="label label-success"><?php echo e(__('admin.order_detail')); ?></a>

                       <?php if($order->status==1): ?>
                       <a href="<?php echo e(route('approved',['id' => $order->id ])); ?>" class="label label-primary" onclick="return confirm('<?php echo e(__('admin.Approved')); ?>')"><?php echo e(__('admin.Approved')); ?></a>
                       <?php elseif($order->status == 0): ?>
                       <a href="<?php echo e(route('approved',['id' => $order->id ])); ?>" class="label label-danger"  onclick="return confirm('<?php echo e(__('admin.Unapproved')); ?>')"><?php echo e(__('admin.Unapproved')); ?></a>
                       <?php else: ?>
                       <label  class="label label-info" ><?php echo e(__('admin.Delivered')); ?></label>
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
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>