<?php $__env->startSection('content'); ?>
	<form action="<?php echo e(route('list-image', ['id' => $product_id])); ?>" method="POST" role="form" class="form-inline" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
		<input type="hidden" name="dem" value="0" class="dem">
		<legend><?php echo e(__('form.list_image')); ?></legend>
		<div class="my_form">
			<div class="form-group">
			<input type="text" class="form-control color0 " id="" placeholder="Color" name="color0" required="">
			</div>
			<div class="form-group">
				<input type="number" class="form-control total" id="" placeholder="total" name="total0" required="" min="1" value="0">
			</div>
			<div class="form-group">
				<input type="file" name="image0" class="form-control"  placeholder="image" required="" >
			</div>
			<a class="add_color form-group">
				<img src="<?php echo e(asset('uploads/search.png')); ?>" width="50px">
			</a>
		</div>	
		<div class="double_div"></div>
		<button type="submit" class="btn btn-primary"><?php echo e(__('admin.add', ['name' => ''])); ?></button>
	</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
	<script type="text/javascript">
		$(document).ready(function(){
			var	dem = 0;
			$(document).on('click', '.add_color', function(e){
				e.preventDefault();
				alert(dem);
				var color = '.color'+dem;
				var total = '.total'+dem;
				var color = $(color).val();
				var total = $(total).val();
				if (color.length !=0 && total !=0) {
					dem ++;
					$('.double_div').append('<div class="my_form"><div class="form-group"><input type="text" class="form-control color'+dem+' color" id="" placeholder="Color" name="color'+dem+'"></div><div class="form-group"><input type="number" min="1" class="form-control total'+dem+'" id="" placeholder="total" name="total'+dem+'"></div><div class="form-group"><input type="file" class="form-control " id="" placeholder="image" name="image'+dem+'"></div><a class="add_color form-group"><img src="<?php echo e(url('/')); ?>/uploads/search.png" width="50px"></a></div>');
					$('.dem').val(dem);
				} else {
				 	alert('not ok');
				}			
			});
			$(document).on('keyup', '.color', function(e){
        		e.preventDefault();
        		for (var i = dem - 1; i >= 0; i--) {
        			var c = '.color'+i;
        			if ($(this).val() == $(c).val()) {
        				$(this).val('');
        				break;
        			}	
        		}
			});
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>