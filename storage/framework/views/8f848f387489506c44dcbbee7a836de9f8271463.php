<?php $__env->startSection('content'); ?>
	<div class="wrapper wrapper-content animated fadeInRight ecommerce">
		<div class="">
		<div class="" style="padding:10px">
		<div class="row">
			<h3> <?php echo e($product->name); ?></h3>

			<div class="col-md-6">
				<img src="<?php echo e(url('/')); ?>/uploads/<?php echo $product['image']?>" alt="" class="reponsive" width="300px">
			</div>
			<p>ID: <?php echo e($product->id); ?>| <?php echo e(date('d/m/Y',strtotime($product->created_at))); ?>  </p>           
			<h3 for=""><?php echo e(number_format($product['price'])); ?>  VNĐ</h3>
			<div class="col-md-6"  style="padding:0px">	
            <p><?php echo e(__('admin.category')); ?>: <?php echo e($product->category->name); ?></p>
            <p><?php echo e(__('form.brand')); ?>: <?php echo e($product->brand->name); ?></p>
			<p><?php echo e(__('form.warranty_period')); ?>: <?php echo e($product->warranty_period->time); ?> <?php echo e($product->warranty_period->type); ?></p>
			<p><?php echo e(__('form.total')); ?> : <?php echo e($product->total); ?> cái</p>
			<p><?php echo e(__('form.price')); ?>: <?php echo e(number_format($product['price'])); ?> VNĐ</p>
			<p><?php echo e(__('form.price_sale')); ?>: <?php echo e(number_format($product['price_sale'])); ?> VNĐ</p>
			<p>Rate: <?php echo e($product->avg_rate); ?> /5 starts</p>	
			<a href="<?php echo e(route('update_product',['id' => $product->id])); ?>" class="btn btn-success"><?php echo e(__('form.update')); ?></a>									
			</div>
			

        <div class="clearfix">
            <p>
            <label for=""><?php echo e(__('form.description')); ?>:</label>
            <p>
                <?php echo $product->description; ?>        
            </p>
            </p>
            <?php if(count($product->list_images) !=0): ?>
            <h3>
                <a class="list_image"><?php echo e(__('form.list_image')); ?></a>
            </h3>
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
                    <?php $__currentLoopData = $product->list_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <img src="<?php echo e(url('/')); ?>/uploads/<?php echo e($image->image); ?>" alt="" class="reponsive" width="100px">
                        </td>
                        <td><?php echo e($image->color); ?></td>
                        <td><?php echo e($image->total); ?></td>
                        <td>
                            <a href="" class="label label-danger"><?php echo e(__('form.delete')); ?></a>
                        </td>                       
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <form action="<?php echo e(route('list-image', ['id' => $product->id])); ?>" method="POST" role="form" class="form-inline" enctype="multipart/form-data">
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
            </div>         
            
            <?php endif; ?>
        </div>
        <?php if(count($product->comments) !=0): ?> 
        <hr>       
        <h3><?php echo e(__('form.table_commet')); ?></h3>
        <table class="table">
        <thead>
            <tr>
                <th>id <?php echo e(__('admin.user')); ?></th>
                <th><?php echo e(__('admin.user')); ?></th>
                <th><?php echo e(__('form.description')); ?></th>
                <th><?php echo e(__('form.create')); ?></th>
                <th><?php echo e(__('form.Action')); ?></th>
            </tr>            
        </thead>
        <tbody>
        <?php $__currentLoopData = $product->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($cm->user->id); ?></td>
                <td><?php echo e($cm->user->name); ?></td>
                <td><?php echo e($cm->comment); ?></td>
                <td><?php echo e($cm->created_at); ?></td>
                <td>
                    <a href="<?php echo e(route('delete-comment',[
                        'id' => $cm->id,
                        'product_id' => $product->id
                    ])); ?>" class="label label-danger" onclick="confirm('Bạn muốn xóa comment <?php echo e($cm->id); ?>?')"><?php echo e(__('form.delete')); ?></a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        </table>
        <?php endif; ?>
        <?php if(count($product->rates) !=0): ?>  
        <hr>    
        <h3><?php echo e(__('form.rate')); ?></h3>
            <table class="table">
        <thead>
            <tr>
                <th>id <?php echo e(__('admin.user')); ?></th>
                <th><?php echo e(__('admin.user')); ?></th>
                <th>rate</th>
                <th><?php echo e(__('form.create')); ?></th>
            </tr>            
        </thead>
        <tbody>
        <?php $__currentLoopData = $product->rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($rate->user->id); ?></td>
                <td><?php echo e($rate->user->name); ?></td>
                <td><?php echo e($rate->rate); ?></td>
                <td><?php echo e($rate->created_at); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
         </table>
         <?php endif; ?>
		</div>		
	</div>
</div>
</div>
<input type="hidden" class="list_image" value="<?php echo e($product->list_images[0]); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript" src="<?php echo e(asset('public/js/views.product.js')); ?>"> 
</script>
<script type="text/javascript" src="<?php echo e(asset('public/js/list_image.js')); ?>">
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>