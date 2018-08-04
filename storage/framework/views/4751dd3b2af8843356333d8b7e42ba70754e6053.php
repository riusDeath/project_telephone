<?php $__env->startSection('content'); ?>
<div class="panel panel-default">

    <!-- Default panel contents -->
    <div class="panel-heading">sửa Slide</div>
  <div>
    
    <?php if(isset($thongbao)): ?>
    <?php echo e(thongbao); ?>

    <?php endif; ?>
  </div>
    <!-- Table -->
    <!-- S4NvZQ5LKbVZwRJ5Xwf87e6mEbPYv45GAsvcD55D -->
    <div class="panel-body">
        <form action="" method="POST" role="form">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <div class="form-group">
             <label for="">Vị trí slide</label>
             <select name="name" id="" required>
               <option value="home">Thuộc trang chủ</option>
               <option value="product">Thuộc trang Sản phẩm</option>
             </select>
           </div>
           <div class="form-group">
               <label for="">Nội dung slide</label>
               <textarea name="content" id="inputContent" class="form-control" rows="3" required="required"><?php echo e($slide->content); ?></textarea>
           </div>
            <div class="form-group">
               <label for="">Ảnh</label>
               <input type="file" class="form-control" name="link" required>
               <img src="<?php echo e(asset('public/slider/'.$slide->link)); ?>" alt="">
           </div>           
           <button type="submit" class="btn btn-primary">Sửa</button>
       </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>