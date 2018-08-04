<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Admin</div>
    <?php if(isset($mess)): ?>
        <div class="alert"><?php echo e($mess); ?></div>     
    <?php endif; ?>
    <div class="panel-body">
        <form action="" class="form-inline" role="form">
            <div class="form-group">
                <input class="form-control" name="search" placeholder="Search name ...">
            </div>                           
            <button type="submit" class="btn btn-primary"><?php echo e(__('form.search')); ?></button>          
        </form>
    </div>
    <!-- Table -->
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
        <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($admin->id); ?></td>
                <td><?php echo e($admin->name); ?></td>
                <td><?php echo e($admin->email); ?></td>
                <td><?php echo e($admin->phone); ?></td>
                <td><?php echo e($admin->grade); ?></td>
                <td>
                    <?php if($admin->status==1): ?>
                    <label for="" class="label label-info"><?php echo e(__('form.permission')); ?></label>
                    <?php else: ?>
                    <label for="" class="label label-warning"><?php echo e(__('form.not_have_access')); ?></label>
                    <?php endif; ?>
                </td>
                <td><?php echo e(date_format($admin->created_at,'d/m/y')); ?></td>
                <td>    
                    <a href="<?php echo e(route('update-admin',[ 'id'=> $admin->id ])); ?>" class="label label-info"><?php echo e(__('form.update')); ?></a>
                    <?php if(Auth::user()->grade == 'boss' && $admin->id != Auth::user()->id ): ?>
                    <?php if($admin->status==1  ): ?>
                    <a href="<?php echo e(route('delete-admin',['id' => $admin->id])); ?>" class="label label-danger" onclick="confirm('<?php echo e(__('form.remoce_access')); ?> admin <?php echo e($admin->name); ?>?')"><?php echo e(__('form.remoce_access')); ?></a>
                    <?php else: ?>
                    <a href="<?php echo e(route('delete-user',['id' => $admin->id])); ?>" class="label label-danger" onclick="confirm('<?php echo e(__('form.grand_access')); ?> <?php echo e($admin->name); ?>?')"><?php echo e(__('form.grand_access')); ?></a>
                    <?php endif; ?>                                    
                    <?php endif; ?>                                    
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>     
</div>
<?php $__env->stopSection(); ?>!
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>