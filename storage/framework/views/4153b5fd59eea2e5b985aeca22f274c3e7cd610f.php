<?php $__env->startSection('content'); ?>
	<div class="jumbotron">
		<div class="container">
			<h3>Phương thức thanh toán </h3>
			<p><?php echo e(isset($thongbao)?$thongbao:''); ?></p>
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
							<th>Id phương thức</th>
							<th>Tên phương thức</th>
							<th>Trạng thái</th>
							<th>Nội dung</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $pays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($pay->id); ?></td>
							<td><?php echo e($pay->name); ?></td>
							<td><?php echo e(($pay->status==1)?'Hiển thị':'Ẩn'); ?></td>
							<td><?php echo e($pay->description); ?></td>
							<td>
								<a href="<?php echo e(route('sua-phuong-thuc-thanh-toan',['id'=>$pay->id])); ?>" class="label label-success">Sửa</a>
								<a href="<?php echo e(route('xoa-phuong-thuc-thanh-toan',['id' => $pay->id])); ?>" class="label label-danger" onclick="confirm('Thay đổi trạng thái!')">Thay đổi trạng thái</a>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
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