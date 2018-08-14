<?php $__env->startSection('content'); ?>

    <h3>
        <a class="list_image"><?php echo e(__('form.list_image')); ?></a>
    </h3>
    	<form action="<?php echo e(route('list-image', ['id' => $product->id])); ?>" method="POST" role="form" class="form-inline" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
		<input type="hidden" name="dem" value="0" class="dem">
		<input type="hidden" name="total_product" class="total_product" value="<?php echo e($product->total); ?>">
		<div class="my_form">
			<div class="form-group">
			<input type="text" class="form-control color0 " id="" placeholder="Color" name="color0" required="">
			</div>
			<div class="form-group">
				<input type="number" class="form-control total" id="" placeholder="total" name="total0" required="" min="1" value="0">
			</div>
			<div class="form-group">
				<input type="file" name="image0" class="form-control"  placeholder="image"  >
			</div>
			<a class="add_color form-group">
				<img src="<?php echo e(asset('uploads/search.png')); ?>" width="50px">
			</a>
		</div>	
		<div class="double_div"></div>
		<button type="submit" class="btn btn-primary"><?php echo e(__('admin.update', ['name' => ''])); ?></button>
	</form>
	<?php if(count($list_images) !=0): ?>
        <div class="table_list_image">
        <table class="table table-hover " >
            <thead>                 
                <tr>
                    <th><?php echo e(__('form.image')); ?></th>
                    <th><?php echo e(__('form.color')); ?></th>
                    <th><?php echo e(__('form.total')); ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $list_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                   	<img src="<?php echo e(url('/')); ?>/uploads/<?php echo e($image->image); ?>" alt="" class="reponsive" width="100px">
                </td>
                <td><?php echo e($image->color); ?></td>
                <td><?php echo e($image->total); ?></td>
                <td>
                <a href="<?php echo e(route('delete-list-image', ['id' => $image->id])); ?>" class="label label-danger"><?php echo e(__('form.delete')); ?></a>
                </td>                       
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
	<script type="text/javascript">
		$(document).ready(function(){
			var	dem = 0;
			$(document).on('click', '.add_color', function(e){
				e.preventDefault();
				var color = '.color'+dem;
				var total = '.total'+dem;
				var color = $(color).val();
				var total = $(total).val();
				var total_product = $('.total_product').val();

				if (color.length !=0 && total !=0 ) {
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