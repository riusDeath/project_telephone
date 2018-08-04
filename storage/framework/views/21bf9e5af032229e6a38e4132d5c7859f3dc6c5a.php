<?php $__env->startSection('main'); ?>

<div class="container" style="margin: 50px">
	<div class="dang_nhap">
		<form  method="POST" role="form">
			<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
			<legend><?php echo e(__('form.register')); ?></legend>
			<div class="col-md-6">		
				<div class="form-group">
					<label for=""><?php echo e(__('form.email')); ?>*</label>
					<input type="email" class="form-control" id="" placeholder="<?php echo e(__('form.email')); ?>" name="email" required>
				</div>				
				<a href="<?php echo e(route('xac-nhan-mat-khau')); ?>"  name="btn" class="btn btn-info  reset" >	<?php echo e(__('passwords.reset_password')); ?> </a>
				<label for="" class="sign_up_text"><?php echo e(__('passwords.have_account')); ?> 
					<a href="<?php echo e(route('dang-nhap')); ?>" class=""><?php echo e(__('passwords.login')); ?></a> <?php echo e(__('passwords.here')); ?>

				</label>
			</div>
		</form>
	</div>
</div>
<div class="modal fade model-mess" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h1 class="modal-title"></h1>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript" src="<?php echo e(asset('public/js/resetPassword.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>