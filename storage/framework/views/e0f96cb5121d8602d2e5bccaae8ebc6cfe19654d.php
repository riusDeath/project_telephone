<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <div class="panel-heading"><?php echo e(__('admin.add',['name' => trans('admin.Account')])); ?></div>
        <?php if(isset($mess)): ?>
            <h3><?php echo e($mess); ?></h3>
        <?php endif; ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="alert alert-danger">
             <?php echo e($err); ?> <br/>
       </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="panel-body">
        <form action="" method="POST" role="form">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <div class="form-group">
                <label for=""><?php echo e(__('admin.grade')); ?>: </label>
                    <?php if(Auth::user()->grade == 'boss'): ?>
                    <input type="radio" name="grade" value="boss"> boss
                    <input type="radio" name="grade" value="admin"> admin
                    <?php endif; ?>
                    <input type="radio" name="grade" value="customer"> customer 
              </select>
            </div>
            <div class="form-group">
                <label for=""><?php echo e(__('form.name')); ?></label>
                <input type="text" class="form-control" name="name" placeholder="<?php echo e(__('form.name')); ?>" value="<?php echo e(old('name')); ?>" >
            </div>
            <div class="form-group">
                <label for=""><?php echo e(__('form.adress')); ?></label>
                <input type="text" class="form-control" name="adress" placeholder="<?php echo e(__('form.adress')); ?>" value="<?php echo e(old('adress')); ?>" >
            </div>
            <div class="form-group">
                <label for=""><?php echo e(__('form.phone')); ?></label>
                <input type="number" class="form-control" name="phone" placeholder="<?php echo e(__('form.phone')); ?>" value="<?php echo e(old('phone')); ?>" >
           </div>
           <div class="form-group">
                <label for=""><?php echo e(__('form.email')); ?></label>
                <input type="email" class="form-control" name="email" placeholder="<?php echo e(__('form.email')); ?> adress" value="" >
           </div>                 
            <div class="form-group">
                <label for=""><?php echo e(__('form.password')); ?></label>
                <input type="password" class="form-control password"  placeholder="<?php echo e(__('form.password')); ?>" name="password" >
            </div>           
            <button type="submit" class="btn btn-primary"><?php echo e(__('form.add')); ?></button>
       </form>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>