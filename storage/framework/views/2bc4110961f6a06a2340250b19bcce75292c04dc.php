<?php $__env->startSection('content'); ?> 
    <div class="container"> 
        <form action="" method="POST" role="form" enctype="multipart/form-data">
            <legend><?php echo e(__('admin.update',['name' => trans('admin.sale')])); ?></legend>
            <p><?php echo e(isset($mess)?$mess:''); ?></p>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-danger">
            <?php echo e($err); ?> 
            <br/>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">      
            <div class="form-group">
                <label for=""><?php echo e(__('form.name')); ?></label>
                <input type="text" name="name" class="form-control has-error"  placeholder="<?php echo e(__('form.name')); ?>" required="required" value="<?php echo e($sale->name); ?>">
                <?php if($errors->has('name')): ?>
                <div class="help-block">
                   <?php echo e($errors->first('name')); ?>

               </div>
               <?php endif; ?>               
            </div>
            <div class="form-inline">
                <div class="form-group">
                    <label for=""><?php echo e(__('form.image')); ?></label>
                    <input type="file" name="image" class="form-control image"  placeholder="image" >
                    <input type="hidden" value="<?php echo e($sale->image); ?>" name="link">
                </div>
                <div class="form-group">
                    <label for=""><?php echo e(__('home.sale')); ?></label>
                    <input type="number" name="sale" class="form-control" required="required" min="0" value="<?php echo e($sale->sale); ?>"> %
                </div>
                <div class="form-group">
                    <label for=""><?php echo e(__('form.total')); ?></label>
                    <input type="number" name="total" class="form-control" required="required" min="1" value="<?php echo e($sale->total); ?>"> %
                </div>
            </div>           
            <span class="form-inline"><img src="<?php echo e(url('/uploads')); ?>/<?php echo e($sale->image); ?>" alt="" width="300px"></span>
            <div class="form-group">
            <label for=""><?php echo e(__('form.description')); ?></label>
            <textarea name="description" id="description" rows="10" cols="80" required="" ><?php echo e($sale->description); ?></textarea>
            <script>
                CKEDITOR.replace( 'description',
                {
                    filebrowserBrowseUrl: 'http://localhost:8080/shop/shop1/public/ckfinder/ckfinder.html',
                    filebrowserUploadUrl: 'http://localhost:8080/shop/shop1/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
                });

            </script>
            </div>
            <div class="form-inline">                
                <?php echo e(__('form.date_create')); ?><input type="date" name="date_create" id="input" class="form-control date_create" value="<?php echo e($sale->date_create); ?>" required="required" title="">
                <?php echo e(__('form.date_end')); ?><input type="date" name="date_end" id="input" class="form-control date_end" value="<?php echo e($sale->date_end); ?>" required="required" title="">
            </div>
            <div class="form-group">
                <label for=""><?php echo e(__('form.status')); ?></label>
                <input type="radio" value="1" name="status" <?php echo e($sale->status==1?'checked':''); ?> ><?php echo e(__('form.show')); ?>

                <input type="radio" value="0" name="status" <?php echo e($sale->status==0?'checked':''); ?>> <?php echo e(__('form.hidden')); ?>

            </div>
            <input type="checkbox" name="add_more" checked="">  
            <button type="submit" class="btn btn-primary"><?php echo e(__('form.update',['name' => ''])); ?></button>
        </form>
    </div>
    <hr>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript" src="<?php echo e(url('/')); ?>/public/js/sale.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>