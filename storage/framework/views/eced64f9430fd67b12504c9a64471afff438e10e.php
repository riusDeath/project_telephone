<?php $__env->startSection('content'); ?>	
	<div class="container"> 
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			<legend><?php echo e(__('admin.update',['name' => trans('admin.product')])); ?></legend>
		<?php if(isset($mess)): ?>
			<div class="alert alert-success"><?php echo e($mess); ?></div>
		<?php endif; ?>		
		<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">		
			<div class="form-group">
				<label for=""><?php echo e(__('form.name')); ?></label>
				<input type="text" name="name" class="form-control"  placeholder="<?php echo e(__('form.name')); ?>" required="required" value="<?php echo e($product->name); ?>">
				<?php if($errors->has('name')): ?>
				<div class="help-block">
                   <?php echo e($errors->first('name')); ?>

               </div>
               <?php endif; ?>				
			</div>
			<div class="form-inline" style="margin:20px 0">				
			<div class="form-group">
				<label for=""><?php echo e(__('form.warranty_period')); ?></label>				
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
				<label for=""><?php echo e(__('form.brand')); ?></label>
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
				<label for=""><?php echo e(__('admin.category')); ?></label>
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
		</div>			
			<div class="form-group">
				<label for=""><?php echo e(__('form.image')); ?></label>
				<input type="file" name="link" class="form-control"  placeholder="Ảnh đại diện">
				<img src="<?php echo e(asset('uploads/'.$product->image)); ?>" alt="" width="300px">
				<input type="text" name="imaget" value="<?php echo e($product->image); ?>">
			</div>
			
			<div class="form-group">
				<label for=""><?php echo e(__('form.total')); ?></label>
				<input type="number" name="total" class="form-control" required="required" min="0" value="<?php echo e($product->total); ?>">
			</div>
			<div class="form-group">
          	<label for=""><?php echo e(__('form.description')); ?></label>
         	<textarea name="description" id="editor1" rows="10" class="ckeditor" cols="80"> <?php echo e($product->description); ?> </textarea>
			<script>
                CKEDITOR.replace( 'editor1', {
                        filebrowserBrowseUrl: 'http://localhost:8080/shop/shop1/public/ckfinder/ckfinder.html',
                        filebrowserUploadUrl: 'http://localhost:8080/shop/shop1/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
                } );
            </script>
        	</div>
		<div class="form-inline">
			<div class="form-group">
				<label for=""><?php echo e(__('form.price')); ?></label>
				<input type="number" name="price" class="form-control" required="required" min="0" value="<?php echo e($product->price); ?>">
				<?php if($errors->has('price')): ?>
				<div class="help-block">
                   <?php echo e($errors->first('price')); ?>

               </div>
               <?php endif; ?>
			</div>
			<div class="form-group">
				<label for=""><?php echo e(__('form.price_sale')); ?></label>
				<input type="number" name="price_sale" class="form-control" required="required" min="0" value="<?php echo e($product->price_sale); ?>" >
				<?php if($errors->has('price_sale')): ?>
				<div class="help-block">
                   <?php echo e($errors->first('price_sale')); ?>

               </div>
               <?php endif; ?>
			</div>		
		</div>
			<div class="form-group">
				<label for="">Hot: </label>
				<input type="radio" value="1" name="hot" <?php echo e($product->hot == 1 ? 'checked':''); ?>> Hot
				<input type="radio" value="0" name="hot" <?php echo e($product->hot == 0 ? 'checked':''); ?>> <?php echo e(__('form.normal')); ?>

			</div>		
			<div class="form-group">
				<label for=""><?php echo e(__('form.status')); ?></label>
				<input type="radio" value="1" name="status" <?php echo e($product->status==1?'checked':''); ?> ><?php echo e(__('form.show')); ?>

				<input type="radio" value="0" name="status" <?php echo e($product->status==0?'checked':''); ?>> <?php echo e(__('form.hidden')); ?>

			</div>
			<button type="submit" class="btn btn-primary"><?php echo e(__('admin.update',['name' => trans('admin.product')])); ?></button>
		</form>
	</div>
	<?php if(count($product->comments) !=0): ?> 
    <hr>       
    <h3><?php echo e(__('form.table_commet')); ?></h3>
    <table class="table table_comment">
        <thead>
            <tr>
                <th>ID </th>
                <th><?php echo e(__('admin.user')); ?></th>
                <th><?php echo e(__('form.description')); ?></th>
                <th><?php echo e(__('form.create')); ?></th>
                <th><?php echo e(__('form.Action')); ?></th>
            </tr>
            
        </thead>
        <tbody>
        <?php $__currentLoopData = $product->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($cm->id); ?></td>
                <td><?php echo e($cm->user->name); ?></td>
                <td><?php echo e($cm->comment); ?></td>
                <td><?php echo e(date_format($cm->created_at, 'd/m/y')); ?></td>
                <td>
                    <a href="<?php echo e(route('delete-comment',[
						'id' => $cm->id,
						'product_id' => $product->id
                    ])); ?>" class="label label-danger delete_comment" ><?php echo e(__('form.delete')); ?></a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table><?php endif; ?>
    <div class="panel-footer">   
    </div>	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
	<script type="text/javascript" src="<?php echo e(asset('public/js/comment.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>