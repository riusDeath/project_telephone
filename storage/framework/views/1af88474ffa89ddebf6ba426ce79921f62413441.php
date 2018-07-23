<?php $__env->startSection('content'); ?>
	
	<div class="container"> 
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			<legend>Thêm mới sản phẩm</legend>
			<p><?php echo e($thongbao); ?></p>
	<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
		
			<div class="form-group">
				<label for="">Tên sản phẩm</label>
				<input type="text" name="name" class="form-control"  placeholder="Tên sản phẩm" required="required">
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
				<input type="file" name="image" class="form-control"  placeholder="Ảnh đại diện">
			</div>
			<div class="form-group">
				<label for="">Số lượng</label>
				<input type="number" name="total" class="form-control" required="required" min="0">
			</div>
			  <div class="form-group">
          <label for="">Mô tả</label>
         <textarea name="description" id="description" rows="10" cols="80"> </textarea>
			<script>
				      CKEDITOR.replace( 'description' );
			</script>

        </div>
			<div class="form-group">
				<label for="">Giá</label>
				<input type="number" name="price" class="form-control" required="required" min="0">
				<?php if($errors->has('price')): ?>
				<div class="help-block">
                   <?php echo e($errors->first('price')); ?>

               </div>
               <?php endif; ?>
			</div>
			<div class="form-group">
				<label for="">Giá sale</label>
				<input type="number" name="price_sale" class="form-control" required="required" min="0">
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
<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            // alert('OK');
        }); 
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>