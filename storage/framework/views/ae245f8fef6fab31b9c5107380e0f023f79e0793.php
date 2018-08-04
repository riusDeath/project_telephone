<?php $__env->startSection('content'); ?>
	<div class="wrapper wrapper-content animated fadeInRight ecommerce">
		<div class="">
		<div class="" style="padding:10px">
		<div class="row">
			<h3> <?php echo e($product->name); ?></h3>

			<div class="col-md-6">
				<img src="../../uploads/<?php echo $product['image']?>" alt="" class="reponsive" width="300px">
			</div>
			<p>ID: <?php echo e($product->id); ?>| <?php echo e(date('d/m/Y',strtotime($product->created_at))); ?>  </p>           
			<h3 for=""><?php echo e(number_format($product['price'])); ?>  VNĐ</h3>
			<div class="col-md-6"  style="padding:0px">	
            <p>Thuộc danh mục: <?php echo e($product->category->name); ?></p>
            <p>Thuộc thương hiệu: <?php echo e($product->brand->name); ?></p>
			<p>Thời gian bảo hành: <?php echo e($product->warranty_period->time); ?> <?php echo e($product->warranty_period->type); ?></p>
			<p>Số lượng : <?php echo e($product->total); ?> cái</p>
			<p>Giá gốc: <?php echo e(number_format($product['price'])); ?> VNĐ</p>
			<p>Giá sale: <?php echo e(number_format($product['price_sale'])); ?> VNĐ</p>
			<p>Độ yêu thích trung bình: <?php echo e($product->avg_rate); ?> /5 starts</p>	
			<a href="<?php echo e(route('sua-san-pham',['id' => $product->id])); ?>" class="btn btn-success">Sửa thông tin</a>									
			</div>
			<p>
            <label for="">Mô tả về sản phẩm:</label>
            <p>
                <?php echo $product->description; ?>        
            </p>
        </p>
        <div class="clearfix"></div>
        <?php if(count($product->comment) !=0): ?> 
        <hr>       
        <h3>Bảng Comment</h3>
        <table class="table">
        <thead>
            <tr>
                <th>ID comment</th>
                <th>id người dùng</th>
                <th>Người dùng</th>
                <th>Nội dung đăng</th>
                <th>Ngày đăng</th>
                <th>Thao tác</th>
            </tr>            
        </thead>
        <tbody>
        <?php $__currentLoopData = $product->comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($cm->id); ?></td>
                <td><?php echo e($cm->user->id); ?></td>
                <td><?php echo e($cm->user->name); ?></td>
                <td><?php echo e($cm->comment); ?></td>
                <td><?php echo e($cm->created_at); ?></td>
                <td>
                    <a href="<?php echo e(route('xoa-comment',[
                        'id' => $cm->id,
                        'product_id' => $product->id
                    ])); ?>" class="label label-danger" onclick="confirm('Bạn muốn xóa comment <?php echo e($cm->id); ?>?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        </table>
        <?php endif; ?>
        <?php if(count($product->rate) !=0): ?>  
        <hr>    
        <h3> Bảng Rate</h3>
            <table class="table">
        <thead>
            <tr>
                <th>ID </th>
                <th>ID người dùng</th>
                <th>Người dùng</th>
                <th>Số sao</th>
                <th>Ngày đăng</th>
            </tr>            
        </thead>
        <tbody>
        <?php $__currentLoopData = $product->rate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($rate->id); ?></td>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>