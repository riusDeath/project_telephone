<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <div class="panel-heading"><?php echo e(__('admin.category')); ?></div>
    <div class="panel-body">
        <form action="" class="form-inline" role="form">        
            <div class="form-group">
                <input class="form-control" name="search" placeholder="Serch name category...">
            </div>        
            <button type="submit" class="btn btn-primary"><?php echo e(__('form.search')); ?></button>
            <a href="<?php echo e(route('add_category')); ?>" class="btn btn-success"><?php echo e(__('admin.add', ['name' => ''])); ?></a>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th><?php echo e(__('form.name')); ?></th>
                <th><?php echo e(__('form.create')); ?></th>
                <th><?php echo e(__('form.status')); ?></th>
                <th><?php echo e(__('form.Action')); ?></th>
            </tr>            
        </thead>
        <tbody>
        <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($cat->id); ?></td>
                <td><?php echo e($cat->name); ?></td>
                <td><?php echo e($cat->created_at); ?></td>
                <td>
                    <?php echo e($cat->status==1?trans('form.show'):trans('form.hidden')); ?>

                </td>
                <td>
                    <a href="<?php echo e(route('update_category',['id' =>$cat->id])); ?>" class="label label-success"><?php echo e(__('admin.update',  ['name' => trans('admin.category')])); ?></a>
                    <a href="<?php echo e(route('delete_category',['id' => $cat->id])); ?>" class="label label-danger" onclick=" return confirm('You want to chage status <?php echo e($cat->name); ?>?')"><?php echo e(__('form.change')); ?> <?php echo e(__('form.status')); ?></a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
     <div class="panel-footer">
        <?php echo e($cats->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>