<?php $__env->startSection('content'); ?>
	<div class="jumbotron">
		<div class="container">
			<h3>Phương thức thanh toán </h3>
			<?php if(isset($thongbao)): ?>
			<p><?php echo e($thongbao); ?></p>
			<?php endif; ?>
			<?php if(count($errors) >0): ?>
			<div class="alert alert-danger">
		    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		        <?php echo e($err); ?> <br/>
		    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  </div>
			<?php endif; ?>
			<div class="col-md-6">
				<select name="pays" id="selectPays" class="form-control pay" >
					<?php $__currentLoopData = $pays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($pay->id); ?>"><?php echo e($pay->name); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
				<form action="" method="POST" role="form">
					<input type="hidden" value="<?php echo csrf_token() ?>" name="_token">
					<div class="form-group">
						<label for="">Tên phương thức</label>
						<input type="text" id="pay" class="form-control"  placeholder="Phương thức thanh toán" name="name">
					</div>	
					 <div class="form-group">
					 	<textarea name="description" id="description" rows="10" cols="80">  </textarea>
					 </div>
				<script>
				      CKEDITOR.replace( 'description' );
				</script>										
					<button type="submit" class="btn btn-primary">Thêm mới</button>
					<a href="" class="btn btn-success" > Sửa</a>
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
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>