<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <div class="panel-heading"><?php echo e(__('admin.add', ['name' => trans('admin.category')])); ?></div>
    <div class="panel-body">
        <form action="" method="POST" role="form">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <input type="hidden" name="status" value="1">
           <div class="form-group">
               <label for=""><?php echo e(__('form.name')); ?></label>
               <input type="text" class="form-control" name="name" placeholder="<?php echo e(__('form.name')); ?> " id="name">
               <?php if($errors->has('name')): ?>
               <div class="help-block">
                   <?php echo e($errors->first('name')); ?>

               </div>
               <?php endif; ?>
           </div>
            <div class="form-group">
               <label for=""><?php echo e(__('form.slug')); ?></label>
               <input type="text" class="form-control" name="slug" placeholder="<?php echo e(__('form.slug')); ?>" id="slug">
               <?php if($errors->has('slug')): ?>
               <div class="help-block">
                   <?php echo e($errors->first('slug')); ?>

               </div>
               <?php endif; ?>
           </div>
           <div class="form-group">
             <label for=""><?php echo e(__('form.category_parent')); ?></label>
             <select name="parent" id="">
               <option value="0"><?php echo e(__('form.category_parent')); ?></option>
               <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </select>
           </div>           
           <button type="submit" class="btn btn-primary"><?php echo e(__('admin.add', ['name' => ''])); ?></button>
       </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>