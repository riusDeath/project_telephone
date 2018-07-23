<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Thêm tài khoản</div>
      <?php if(isset($thongbao)): ?>
        <h3>Bạn đã thêm thành công</h3>
     <?php endif; ?>

        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="alert alert-danger">

             <?php echo e($err); ?> <br/>
       </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <!-- Table -->
    <!-- S4NvZQ5LKbVZwRJ5Xwf87e6mEbPYv45GAsvcD55D -->
    <div class="panel-body">
        <form action="" method="POST" role="form">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <div class="form-group">
              <label for="">Quyền truy cập</label>
              <select name="grade" id="inputGrade" class="form-control" required="required">
                <?php if(Auth::user()->grade == 'boss'): ?>
                <option value="admin">boss</option>
                <?php endif; ?>
                <option value="admin">admin</option>
                <option value="customer">customer</option>
              </select>
            </div>
           <div class="form-group">
               <label for="">Họ và tên</label>
               <input type="text" class="form-control" name="name" placeholder="Tên admin" value="<?php echo e(old('name')); ?>" >
           </div>
            <div class="form-group">
               <label for="">Địa chỉ</label>
               <input type="text" class="form-control" name="adress" placeholder="Địa chỉ" value="<?php echo e(old('adress')); ?>" >
           </div>
           <div class="form-group">
               <label for="">Số điện thoại</label>
               <input type="number" class="form-control" name="phone" placeholder="Số điện thoại" value="<?php echo e(old('phone')); ?>" >
           </div>
           <div class="form-group">
             <label for="">Email</label>
               <input type="email" class="form-control" name="email" placeholder="Địa chỉ" value="" >
           </div>                 
          <div class="form-group">
               <label for="">Nhập mật khẩu</label>
                <input type="password" class="form-control password"  placeholder="password" name="password" >
          </div>
                   

           
           <button type="submit" class="btn btn-primary">Thêm mới</button>
       </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>