<?php $__env->startSection('content'); ?>
	
	<div class="container"> 
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			<legend>Sửa sản phẩm</legend>
		<?php if(isset($thongbao)): ?>
			<div class="alert alert-success"><?php echo e($thongbao); ?></div>
		<?php endif; ?>
		
	<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
		
			<div class="form-group">
				<label for="">Tên sản phẩm</label>
				<input type="text" name="name" class="form-control"  placeholder="Tên sản phẩm" required="required" value="<?php echo e($product->name); ?>">
				<?php if($errors->has('name')): ?>
				<div class="help-block">
                   <?php echo e($errors->first('name')); ?>

               </div>
               <?php endif; ?>
				
			</div>
			<div class="form-group">
				<label for="">Danh mục</label>
				<select name="category_id" id="input" class="form-control" required="required">
					<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option
						<?php if($product->category_id == $cat->id): ?>
							<?php echo e("selected"); ?>

						<?php endif; ?>
					 value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>	
			</div>
			<div class="form-group">
				<label for="">Ảnh đại diện</label>
				<input type="file" name="link" class="form-control"  placeholder="Ảnh đại diện">
				<img src="<?php echo e(asset('uploads/'.$product->image)); ?>" alt="" width="300px">
				<input type="text" name="imaget" value="<?php echo e($product->image); ?>">
			</div>
			<div class="form-group">
				<label for="">Sản phẩm hot: </label>
				<input type="radio" value="1" name="hot" <?php echo e($product->hot == 1 ? 'checked':''); ?>> Hot
				<input type="radio" value="0" name="hot" <?php echo e($product->hot == 0 ? 'checked':''); ?>> Bình thường
			</div>
			<div class="form-group">
				<label for="">Số lượng</label>
				<input type="number" name="total" class="form-control" required="required" min="0" value="<?php echo e($product->total); ?>">
			</div>
			  <div class="form-group">
          <label for="">Mô tả</label>
         <textarea name="description" id="description" rows="10" cols="80"> <?php echo e($product->description); ?> </textarea>
			<script>
				      CKEDITOR.replace( 'description' );
			</script>

        </div>
			<div class="form-group">
				<label for="">Giá</label>
				<input type="number" name="price" class="form-control" required="required" min="0" value="<?php echo e($product->price); ?>">
				<?php if($errors->has('price')): ?>
				<div class="help-block">
                   <?php echo e($errors->first('price')); ?>

               </div>
               <?php endif; ?>
			</div>
			<div class="form-group">
				<label for="">Giá sale</label>
				<input type="number" name="price_sale" class="form-control" required="required" min="0" value="<?php echo e($product->price_sale); ?>" >
				<?php if($errors->has('price_sale')): ?>
				<div class="help-block">
                   <?php echo e($errors->first('price_sale')); ?>

               </div>
               <?php endif; ?>
			</div>
						
			<div class="form-group">
				<label for="">Bảo hành</label>				
				<select name="warranty_period_id" id="input" class="form-control" required="required">
					<?php $__currentLoopData = $warranty_periods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option 
					<?php if($product->warranty_period_id == $warr->id): ?>
							<?php echo e("selected"); ?>

					<?php endif; ?>
					 value="<?php echo e($warr->id); ?>"><?php echo e($warr->time); ?> <?php echo e($warr->type); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>	
			</div>			
			<div class="form-group">
				<label for="">Thương hiệu</label>
				<select name="brand_id" id="input" class="form-control" required="required">
					<?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option 
					<?php if($product->brand_id == $brand->id): ?>
							<?php echo e("selected"); ?>

					<?php endif; ?>
					 value="<?php echo e($brand->id); ?>"><?php echo e($brand->name); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>				
			</div>				
			<div class="form-group">
				<label for="">Trạng thái</label>
				<input type="radio" value="1" name="status" <?php echo e($product->status==1?'checked':''); ?> > Hiển thị
				<input type="radio" value="0" name="status" <?php echo e($product->status==0?'checked':''); ?>> Ẩn
			</div>
			<button type="submit" class="btn btn-primary">sửa</button>
		</form>
	</div>

	    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>ID </th>
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

     <div class="panel-footer">
       
    </div>
	
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>