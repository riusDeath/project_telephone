<?php $__env->startSection('content'); ?>
	<div class="wrapper wrapper-content animated fadeInRight ecommerce">
		<div class="">
		<div class="jumbotron" style="padding:10px">
			<?php if(isset($thongbao)): ?>
				<div class="alert alert-success"><?php echo e($thongbao); ?></div>
			<?php endif; ?>
			<?php if(count($errors) >0): ?>
				<?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php echo e($err); ?> <br>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
		<div class="row">
			<div class="col-md-5">
				<h3> <?php echo e($user_login->name); ?></h3>
				<p>ID: <?php echo e($user_login->id); ?>| <?php echo e(date('d/m/Y',strtotime($user_login->created_at))); ?>  </p>
				<div class="col-md-6"  style="padding:0px">	
				<p>Email: <?php echo e($user_login->email); ?></p>
				<p>Địa chỉ: <?php echo e($user_login->adress); ?></p>
				<p>Số điện thoại: <?php echo e($user_login->phone); ?></p>
				<p>Quyền truy cập: <?php echo e($user_login->grade); ?></p>	
				</div>
			</div>
			<!-- <div class="panel-body"> -->
	      <div class="col-md-7">
	      	  <form action="<?php echo e(route('sua-ho-so-admin',['id' => $user_login->id])); ?>" method="POST" role="form">
	      	    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
	      	    
	      	   <div class="form-group">
	      	       <label for="">Họ và tên</label>
	      	       <input type="text" class="form-control" name="name" placeholder="Tên admin" value="<?php echo e($user_login->name); ?>" >
	      	   </div>
	      	    <div class="form-group">
	      	       <label for="">Địa chỉ</label>
	      	       <input type="text" class="form-control" name="adress" placeholder="Địa chỉ" value="<?php echo e($user_login->adress); ?>" >
	      	
	      	   </div>
	      	   <div class="form-group">
	      	   	<input type="checkbox" id="chagneEmail">
	      	     <label for="">Email</label>
	      	       <input type="email" class="form-control email" name="email" placeholder="Email" value="<?php echo e($user_login->email); ?>" readonly>
	      	   </div> 
	      	   <div class="form-group">
	      	     <label for="">Số điện thoại</label>
	      	       <input type="number" class="form-control" name="email" placeholder="Email" value="<?php echo e($user_login->phone); ?>" >
	      	   </div>        
	      	    <div class="form-group">
	      	     <label for="">
	      	    <input type="checkbox" id="changePassword" name="changePassword">
	      	     Đổi mật khẩu</label>
	      	       <input type="password" class="form-control password" name="password" placeholder="password" value="" disabled="">
	      	
	      	   </div>
	      	 
	      	  <div class="form-group">
	      	       <label for="">Nhập lại mật khẩu</label>
	      	        <input type="password" class="form-control password passwordAgain" name="passwordAgain" placeholder="password" disabled>
	      	  </div>  	
	      	   
	      	   <button type="submit" class="btn btn-primary">Sửa thông tin</button>
	      	</form>
	     	 </div>
   			 <!-- </div>									 -->
			</div>
			

		</div>
	</div>
</div>
	</div>
<?php $__env->stopSection(); ?>
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
            $('#chagneEmail').change(function(){
            	if($(this).is(":checked")){
            		$('.email').removeAttr('readonly');
            		$('.passwordAgain').removeAttr('disabled');

            	}else{
            		$('.email').attr('readonly','');
            		$('.passwordAgain').attr('disabled','');

            	}
            });
         });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>