<?php $__env->startSection('content'); ?>
	<div class="jumbotron">
		<div class="container">
			<a href="<?php echo e(route('add-slide')); ?>" class="btn btn-success">Thêm mơi</a>
			<h3>Slide </h3>
			<?php if(isset($mess)): ?>
			<p><?php echo e($mess); ?></p>
			<?php endif; ?>
			<?php if(count($errors) >0): ?>
			<div class="alert alert-danger">
		    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		        <?php echo e($err); ?> <br/>
		    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  </div>
			<?php endif; ?>
			<div class="">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Id</th>
							<th>Location slide</th>
							<th>Content</th>
							<th>Image</th>
							<th></th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($slide->id); ?></td>
							<td><?php echo e($slide->name); ?></td>
							<td><?php echo e($slide->content); ?></td>
							<td><?php echo e($slide->link); ?></td>
							<td>
								<img src="<?php echo e(asset('uploads/'.$slide->link)); ?>" alt="" width="300px">
							</td>
							<td>
								<a href="<?php echo e(route('edit-slide',['id' => $slide->id])); ?>" class="label label-info">Update</a>
								<a href="<?php echo e(route('delete-slide',['id' => $slide->id])); ?>" class="label label-danger" onclick="return confirm('You want to delete slide')">Delete</a>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
				
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