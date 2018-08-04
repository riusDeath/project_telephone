<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading"><?php echo e(__('admin.update',['name' => trans('admin.Account')])); ?></div>
    <?php if(isset($mess)): ?>
        <h1><?php echo e($mess); ?></h1>
    <?php endif; ?>
    <?php if(count($errors) >0): ?>
    <div class="alert alert-danger">
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($err); ?> <br/>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
     <?php endif; ?>
    <!-- Table -->
    <div class="panel-body">
        <form action="" method="POST" role="form">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <input type="hidden" name="email_confrim" value="<?php echo e($admin->email); ?>">
            <div class="form-group">
                <label for=""><?php echo e(__('form.name')); ?></label>
                <input type="text" class="form-control" name="name" placeholder="<?php echo e(__('form.name')); ?>" value="<?php echo e($admin->name); ?>" >
            </div>
            <div class="form-group">
                <label for=""><?php echo e(__('form.adress')); ?></label>
                <input type="text" class="form-control" name="adress" placeholder="<?php echo e(__('form.adress')); ?>" value="<?php echo e($admin->adress); ?>" >
            </div>
            <div class="form-group">
                <label for=""><?php echo e(__('form.email')); ?></label>
                <input type="email" class="form-control" name="email" placeholder="<?php echo e(__('form.email')); ?>" value="<?php echo e($admin->email); ?>" >
            </div>    
            <div class="form-group">
                <label for=""><?php echo e(__('form.phone')); ?></label>
                <input type="number" class="form-control" name="phone" placeholder="<?php echo e(__('form.phone')); ?>" value="<?php echo e($admin->phone); ?>" >
            </div>        
            <div class="form-group">
                <label for="">
                <input type="checkbox" id="changePassword" name="changePassword">
                <?php echo e(__('form.password')); ?></label>
                <input type="password" class="form-control password" name="password" placeholder="<?php echo e(__('form.password')); ?>" value="" disabled="">
            </div>         
            <div class="form-group">
                <label for=""><?php echo e(__('form.password_confirm')); ?></label>
                <input type="password" class="form-control password" name="passwordAgain" placeholder="<?php echo e(__('form.password_confirm')); ?>" disabled>
            </div>                           
           <button type="submit" class="btn btn-primary"><?php echo e(__('form.update')); ?></button>
       </form>
    </div>
</div>


<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('public/js/admin.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>