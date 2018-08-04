<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading"><?php echo e(__('admin.order')); ?></div>
    <div class="panel-body">
        <form action="<?php echo e(route('post-order')); ?>" class="form-inline" role="form" method="post">
        <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token"> 
            <div class="form-group">
                <select name="search" id="">
                    <option value="3"><?php echo e(__('admin.order')); ?></option>
                    <option value="1"><?php echo e(__('admin.Approved')); ?></option>
                    <option value="0"><?php echo e(__('admin.Unapproved')); ?></option>
                    <option value="2"><?php echo e(__('admin.Delivered')); ?></option>
                </select>
            </div>          
        
            <button type="submit" class="btn btn-primary"><?php echo e(__('form.search')); ?></button>          
        </form>
    </div>
    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th><?php echo e(__('form.name')); ?> <?php echo e(__('admin.user')); ?></th>
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
                <td><?php echo e($order->user->name); ?></td>
                <td><?php echo e($order->adress); ?></td>
                <td><?php echo e($order->phone); ?></td>
                <td><?php echo e($order->total); ?></td>
                <td><?php echo e($order->price); ?></td>
                <td><?php echo e($order->ship->name); ?></td>
                <td><?php echo e($order->pay->name); ?></td>
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

     <div class="panel-footer">
        <?php echo e($orders->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>