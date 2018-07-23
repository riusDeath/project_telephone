<?php $__env->startSection('content'); ?>
	<div class="wrapper wrapper-content animated fadeInRight ecommerce">
		<div class="col-md-9">
		<div class="jumbotron" style="padding:10px">
		<div class="row">
			<h3> <?php echo e($product->name); ?></h3>

			<div class="col-md-6">
				<img src="../../uploads/<?php echo $product['image']?>" alt="" class="reponsive" width="300px">
			</div>
			<p>ID: <?php echo e($product->id); ?>| <?php echo e(date('d/m/Y',strtotime($product->created_at))); ?>  </p3>
			<h3 for=""><?php echo e(number_format($product['price'])); ?>  VNĐ</h3>
			<div class="col-md-6"  style="padding:0px">	
			<p>Thuộc danh mục: <?php echo e($product->category->name); ?></p>
			<p>Số lượng : <?php echo e($product->total); ?> cái</p>
			<p>Giá gốc: <?php echo e(number_format($product['price'])); ?> VNĐ</p>
			<p>Giá sale: <?php echo e(number_format($product['price_sale'])); ?> VNĐ</p>
			<p>Số sản phẩm đã bán: </p>	
			<a href="<?php echo e(route('sua-san-pham',['id' => $product->id])); ?>" class="btn btn-success">Sửa thông tin</a>										
			</div>
			

		</div>
		<p>
			<label for="">Mô tả về sản phẩm:</label>
			<p>
				<?php echo $product->description; ?>
		
			</p>
		</p>
	</div>
</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>