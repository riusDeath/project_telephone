<?php $__env->startSection('content'); ?>
	
	<div class="container"> 
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			<legend>Thêm mới sản phẩm</legend>
			<p><?php echo e(isset($thongbao)?$thongbao:''); ?></p>
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="alert alert-danger">

	            <?php echo e($err); ?> <br/>
	        </div>
	        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
		
			<div class="form-group">
				<label for="">Tên sản phẩm</label>
				<input type="text" name="name" class="form-control"  placeholder="Tên sản phẩm" required="required" value="<?php echo e(old('name')); ?>">
				<?php if($errors->has('name')): ?>
				<div class="help-block">
                   <?php echo e($errors->first('name')); ?>

               </div>
               <?php endif; ?>
				
			</div>
			<div class="form-group">
				<label for="">Danh mục</label>
				<select name="category_id" id="input" class="form-control" required="required">
					<?php $__currentLoopData = $categoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>	
			</div>
			<div class="form-group">
				<label for="">Ảnh đại diện</label>
				<input type="file" name="link" class="form-control"  placeholder="Ảnh đại diện" required="">
			</div>
			<div class="form-group">
				<label for="">Số lượng</label>
				<input type="number" name="total" class="form-control" required="required" min="0" value="<?php echo e(old('total')); ?>">
			</div>
			<div class="form-group">
				<label for="">Sản phẩm hot: </label>
				<input type="radio" value="1" name="hot" > Hot
				<input type="radio" value="0" name="hot" checked=""> Bình thường
			</div>
			  <div class="form-group">
          <label for="">Mô tả</label>
         <textarea name="description" id="description" rows="10" cols="80"><?php echo e(old('description')); ?> </textarea>
			<script>
				      CKEDITOR.replace( 'description' );
			</script>

        </div>
			<div class="form-group">
				<label for="">Giá</label>
				<input type="number" name="price" class="form-control" required="required" min="0" value="<?php echo e(old('price')); ?>" required>
			</div>
			<div class="form-group">
				<label for="">Giá sale</label>
				<input type="number" name="price_sale" class="form-control"  min="0" value="<?php echo e(old('price_sale')); ?>">
			</div>
						
			<div class="form-group">
				<label for="">Bảo hành</label>				
				<select name="warranty_period_id" id="input" class="form-control" required="required">
					<?php $__currentLoopData = $warranty_periods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($warr->id); ?>"><?php echo e($warr->time); ?> <?php echo e($warr->type); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>	
			</div>			
			<div class="form-group">
				<label for="">Thương hiệu</label>
				<select name="brand_id" id="input" class="form-control" required="required">
					<?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($brand->id); ?>"><?php echo e($brand->name); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>				
			</div>				
			<div class="form-group">
				<label for="">Trạng thái</label>
				<input type="radio" value="1" name="status" checked=""> Hiển thị
				<input type="radio" value="0" name="status"> Ẩn
			</div>
			<button type="submit" class="btn btn-primary">Thêm mới</button>
		</form>
	</div>
	<hr>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>