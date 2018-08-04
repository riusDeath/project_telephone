<?php $__env->startSection('content'); ?>
	<div class="jumbotron">
		<div class="container">
			<h3><?php echo e(__('admin.pay')); ?></h3>
			<p><?php echo e(isset($mess)?$mess:''); ?></p>
			<?php if(count($errors) >0): ?>
			<div class="alert alert-danger">
		    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		        <?php echo e($err); ?> <br/>
		    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  	</div>
			<?php endif; ?>
			<div class="col-md-12">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Id </th>
							<th><?php echo e(__('form.name')); ?></th>
							<th><?php echo e(__('form.status')); ?></th>
							<th><?php echo e(__('form.description')); ?></th>
							<th><?php echo e(__('form.Action')); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $pays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($pay->id); ?></td>
							<td><?php echo e($pay->name); ?></td>
							<td><?php echo e(($pay->status==1)?'Show':'Hidden'); ?></td>
							<td><?php echo e($pay->description); ?></td>
							<td>
								<a href="<?php echo e(route('editPay',['id'=>$pay->id])); ?>" class="label label-success"><?php echo e(__('admin.update',['name' => ''])); ?></a>
								<a href="<?php echo e(route('deletePay',['id' => $pay->id])); ?>" class="label label-danger" onclick=" return confirm( trans('admin.change',['name' => trans('form.status')]) )"><?php echo e(__('admin.change',['name' => trans('form.status')])); ?></a>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
				<form action="" method="POST" role="form">
					<input type="hidden" value="<?php echo csrf_token() ?>" name="_token">
					<div class="form-group">
						<label for=""><?php echo e(__('form.name')); ?></label>
						<input type="text" id="pay" class="form-control"  placeholder="<?php echo e(__('form.name')); ?>" name="name">
					</div>	
					 <div class="form-group">
					 	<textarea name="description" id="description" rows="10" cols="80">  </textarea>
					 </div>
				<script>
				      CKEDITOR.replace( 'description' );
				</script>										
					<button type="submit" class="btn btn-primary"><?php echo e(__('admin.add',['name' => ''])); ?></button>
					
				</form>
				
			</div>
			
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
	<script type="text/javascript">
		function ajaxChange()
		{
			var id = $('#selectPays').val();
			$.ajax({
				url: 'admin/selectPays/'+id,
				type: 'get',
				success : function($data){
					$('#pay').html(data) ;
				}
			});
		}
		$(function(){
			$.(window).on('load',ajaxChange);
			$('#selectPays').change(ajaxChange);
		});
		
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>