<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Sửa thông tin</div>
    <?php if(isset($thongbao)): ?>
        <h1>Bạn đã sửa thành công</h1>
    <?php endif; ?>
  <?php if(count($errors) >0): ?>
  <div class="alert alert-danger">
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($err); ?> <br/>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <?php endif; ?>
    <!-- Table -->
    <!-- S4NvZQ5LKbVZwRJ5Xwf87e6mEbPYv45GAsvcD55D -->
    <div class="panel-body">
        <form action="" method="POST" role="form">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            
           <div class="form-group">
               <label for="">Họ và tên</label>
               <input type="text" class="form-control" name="name" placeholder="Tên admin" value="<?php echo e($admin->name); ?>" >
           </div>
            <div class="form-group">
               <label for="">Địa chỉ</label>
               <input type="text" class="form-control" name="adress" placeholder="Địa chỉ" value="<?php echo e($admin->adress); ?>" >

           </div>
           <div class="form-group">
             <label for="">Email</label>
               <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo e($admin->email); ?>" >
           </div>    
            <div class="form-group">
             <label for="">Số điện thoại</label>
               <input type="number" class="form-control" name="phone" placeholder="phone" value="<?php echo e($admin->phone); ?>" >
           </div>        
            <div class="form-group">
             <label for="">
            <input type="checkbox" id="changePassword" name="changePassword">
             Đổi mật khẩu</label>
               <input type="password" class="form-control password" name="password" placeholder="password" value="" disabled="">

           </div>
         
          <div class="form-group">
               <label for="">Nhập lại mật khẩu</label>
                <input type="password" class="form-control password" name="passwordAgain" placeholder="password" disabled>
          </div>
                   

           
           <button type="submit" class="btn btn-primary">Sửa</button>
       </form>
    </div>
</div>


<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
         $(document).ready(function(){
            $('#changePassword').change(function(){
                if($(this).is(":checked")){
                  $(".password").removeAttr('disabled');
                }else{
                  $(".password").attr('disabled','');
                }
            });
         });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>