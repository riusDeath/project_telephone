<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <div class="panel-heading"><?php echo e(__('admin.user')); ?></div>
    <div class="panel-body">
        <form action="" class="form-inline" role="form">        
            <div class="form-group">
                <input class="form-control" name="search" placeholder="Search name or id...">
            </div>       
            <button type="submit" class="btn btn-primary"><?php echo e(__('form.search')); ?></button>           
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th><?php echo e(__('form.name')); ?></th>
                <th><?php echo e(__('form.email')); ?></th>
                <th><?php echo e(__('form.phone')); ?></th>
                <th><?php echo e(__('admin.grade')); ?></th>
                <th><?php echo e(__('form.status')); ?></th>
                <th><?php echo e(__('form.create')); ?></th>
                <th><?php echo e(__('form.Action')); ?></th>
            </tr>          
        </thead>
        <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($cus->id); ?></td>
                <td><?php echo e($cus->name); ?></td>
                <td><?php echo e($cus->email); ?></td>
                <td><?php echo e($cus->phone); ?></td>
                <td><?php echo e($cus->grade); ?></td>
                <td>
                    <?php if($cus->status==1): ?>
                    <label for="" class="label label-info"><?php echo e(__('form.permission')); ?></label>
                    <?php else: ?>
                    <label for="" class="label label-warning"><?php echo e(__('form.not_have_access')); ?></label>
                    <?php endif; ?>
                </td>
                <td><?php echo e(date_format($cus->created_at, "d/m/Y")); ?></td>
                <td>
                    <a href="<?php echo e(route('edit_account',['id' => $cus->id])); ?>"><?php echo e(__('admin.Account')); ?></a>
                    <a href="<?php echo e(route('destroy',[ 'id'=> $cus->id ])); ?>" class="label label-info"><?php echo e(__('admin.order')); ?></a>
                    <?php if($cus->grade == 'customer' || Auth::user()->grade == 'boss'): ?>
                    <?php if($cus->status==1): ?>
                     <a href="<?php echo e(route('delete-user',['id' => $cus->id])); ?>" class="label label-danger" onclick=" return confirm('<?php echo e(__('form.remoce_access')); ?> <?php echo e($cus->name); ?>?')"><?php echo e(__('form.remoce_access')); ?></a>
                    <?php else: ?>
                     <a href="<?php echo e(route('delete-user',['id' => $cus->id])); ?>" class="label label-danger" onclick=" return confirm('<?php echo e(__('form.grand_access')); ?> <?php echo e($cus->name); ?>?')"><?php echo e(__('form.grand_access')); ?></a>
                    <?php endif; ?>
                    <?php endif; ?>
                                      
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
     <div class="panel-footer">
       <?php echo e($users->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>