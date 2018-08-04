<?php $__env->startSection('content'); ?>
	<div class="wrapper wrapper-content animated fadeInRight ecommerce">
		<div class="">
		<div class="jumbotron" style="padding:10px">
			<?php if(isset($mess)): ?>
				<div class="alert alert-success"><?php echo e($mess); ?></div>
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
				<p><?php echo e(__('form.adress')); ?>: <?php echo e($user_login->adress); ?></p>
				<p><?php echo e(__('form.phone')); ?>: <?php echo e($user_login->phone); ?></p>
				<p><?php echo e(__('admin.grade')); ?>: <?php echo e($user_login->grade); ?></p>	
				</div>
			</div>
	      	<div class="col-md-7">
	      	  	<form action="<?php echo e(route('update-admin',['id' => $user_login->id])); ?>" method="POST" role="form">
	      	    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">	      	    
	      	   	<div class="form-group">
	      	       <label for=""><?php echo e(__('form.name')); ?></label>
	      	       <input type="text" class="form-control" name="name" placeholder="<?php echo e(__('form.name')); ?>" value="<?php echo e($user_login->name); ?>" >
	      	   	</div>
	      	    <div class="form-group">
	      	       <label for=""><?php echo e(__('form.adress')); ?></label>
	      	       <input type="text" class="form-control" name="adress" placeholder="<?php echo e(__('form.adress')); ?>" value="<?php echo e($user_login->adress); ?>" >   
	      	   	</div>
	      	   	<div class="form-group">
	      	   	<input type="checkbox" id="chagneEmail">
	      	     	<label for=""><?php echo e(__('form.email')); ?></label>
	      	       <input type="email" class="form-control email" name="email" placeholder="<?php echo e(__('form.email')); ?>" value="<?php echo e($user_login->email); ?>" readonly>
	      	   	</div> 
	      	   	<div class="form-group">
	      	     	<label for=""><?php echo e(__('form.phone')); ?></label>
	      	      	<input type="number" class="form-control" name="email" placeholder="<?php echo e(__('form.phone')); ?>" value="<?php echo e($user_login->phone); ?>" >
	      	   	</div>        
	      	    <div class="form-group">
	      	     	<label for="">
	      	    <input type="checkbox" id="changePassword" name="changePassword">
	      	     <?php echo e(__('form.password')); ?></label>
	      	       <input type="password" class="form-control password" name="password" placeholder="password" value="" disabled="">
	      	
	      	   	</div>
            <input type="hidden" name="email_confrim" value="<?php echo e($user_login->email); ?>">	      	 
	      	  	<div class="form-group">
	      	       	<label for=""><?php echo e(__('form.password_confirm')); ?></label>
	      	        <input type="password" class="form-control password passwordAgain" name="passwordAgain" placeholder="password" disabled>
	      	  	</div>  		      	   
	      	   	<button type="submit" class="btn btn-primary"><?php echo e(__('form.update')); ?></button>
	      	</form>
	     	</div>							
			</div>			
		</div>
	</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(url('/')); ?>/public/js/admin_views.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>