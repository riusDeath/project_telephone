<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading"><?php echo e(__('admin.Active')); ?></div>
    <div class="panel-body">
        <form action="<?php echo e(route('logs')); ?>" class="form-inline" role="form" method ="post">
            <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
            <?php if(isset($mess)): ?>
                <div class="alert"><?php echo e($mess); ?></div>
            <?php endif; ?>
           <!--  <div class="form-group">
                <input class="form-control" name="search" placeholder="search id admin" title="id of name admin">
            </div>  -->
            <div class="form-group">
                <select name="targetable_type" id="input" class="form-control" required="required">
                    <option value="all"><?php echo e(__('admin.all')); ?></option>
                    <option value="product"><?php echo e(__('admin.product')); ?></option>
                    <option value="category"><?php echo e(__('admin.category')); ?></option>
                    <option value="user"><?php echo e(__('admin.user')); ?></option>
                    <option value="code_discount"><?php echo e(__('admin.code')); ?></option>
                    <option value="sale"><?php echo e(__('admin.sale')); ?></option>
                    <option value="slider"><?php echo e(__('admin.slider')); ?></option>
                </select>
                <label for=""> <?php echo e(__('admin.targetable_type')); ?> </label>
            </div>
            <div class="form-group form-inline">               
                 <input type="date" name="created_at" id="input" class="form-control date_create" value=""  title="">
                 <label for=""> <?php echo e(__('form.create')); ?> </label>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo e(__('form.search')); ?></button>        
        </form>
    </div>
    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>Admin</th>
                <th><?php echo e(__('form.name')); ?></th>
                <th><?php echo e(__('admin.action')); ?></th>
                <th><?php echo e(__('admin.targetable_id')); ?></th>
                <th><?php echo e(__('admin.targetable_type')); ?></th>
                <th><?php echo e(__('form.create')); ?></th>
            </tr>            
        </thead>
        <tbody>
        <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>id: <?php echo e($log->user_id); ?></td>
                <td> <?php echo e($log->user->name); ?></td>
                <td><?php echo e($log->action); ?></td>
                <td><?php echo e($log->targetable_id); ?></td>
                <td><?php echo e($log->targetable_type); ?></td>
                <td><?php echo e($log->created_at); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div>
        <?php echo e($logs->links()); ?>

    </div>     
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>