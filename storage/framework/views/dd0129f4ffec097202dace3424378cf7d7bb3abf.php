<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Sửa danh mục</div>
    <?php if(isset($thongbao)): ?>
        <h1><?php echo e($thongbao); ?></h1>
    <?php endif; ?>
    <!-- Table -->
    <!-- S4NvZQ5LKbVZwRJ5Xwf87e6mEbPYv45GAsvcD55D -->
    <div class="panel-body">
        <form action="" method="POST" role="form">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <input type="hidden" name="status" value="1">
           <div class="form-group">
               <label for="">Tên danh mục</label>
               <input type="text" class="form-control" name="name" placeholder="Tên danh mục" value="<?php echo e($cat->name); ?>">
               <?php if($errors->has('name')): ?>
               <div class="help-block">
                   <?php echo e($errors->first('name')); ?>

               </div>
               <?php endif; ?>
           </div>
            <div class="form-group">
               <label for="">Đường dẫn tĩnh</label>
               <input type="text" class="form-control" name="slug" placeholder="Đường dẫn tĩnh" value="<?php echo e($cat->slug); ?>">
               <?php if($errors->has('slug')): ?>
               <div class="help-block">
                   <?php echo e($errors->first('slug')); ?>

               </div>
               <?php endif; ?>
           </div>
           <div class="form-group">
             <label for="">Danh mục cha</label>
             <select name="parent" id="">
              </option>
               <option 
                  <?php if($cat->parent == 0): ?>
                   <?php echo e("selected"); ?>

                  <?php endif; ?>
               value="0">Là danh mục cha</option>
               <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option 
                  <?php if($cat->parent == $catt->id): ?>
                  <?php echo e("selected"); ?>

                  <?php endif; ?>
                value="<?php echo e($catt->id); ?>"><?php echo e($catt->name); ?></option>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </select>
           </div>

           
           <button type="submit" class="btn btn-primary">Sửa</button>
       </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>