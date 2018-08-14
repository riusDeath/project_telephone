<?php $__env->startSection('content'); ?> 
    <div class="container"> 
        <form action="" method="POST" role="form" enctype="multipart/form-data">
            <legend><?php echo e(__('admin.add',['name' => trans('admin.product')])); ?></legend>
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
                <input type="text" name="name" class="form-control has-error"  placeholder="<?php echo e(__('form.name')); ?>" required="required" value="<?php echo e(old('name')); ?>">
                <?php if($errors->has('name')): ?>
                <div class="help-block">
                   <?php echo e($errors->first('name')); ?>

               </div>
               <?php endif; ?>               
            </div>
            <div class="form-group">
                <label for=""><?php echo e(__('admin.category')); ?>y</label>
                <select name="category_id" id="input" class="form-control has-error" required="required" >
                    <?php $__currentLoopData = $categoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>   
            </div>
            <div class="form-group">
                <label for=""><?php echo e(__('form.image')); ?></label>
                <input type="file" name="link" class="form-control"  placeholder="image" required="">
            </div>
            <div class="form-group">
                <label for=""><?php echo e(__('form.total')); ?></label>
                <input type="number" name="total" class="form-control" required="required" min="0" value="<?php echo e(old('total')); ?>">
            </div>
            <div class="form-group">
                <label for=""><?php echo e(__('admin.product')); ?> hot: </label>
                <input type="radio" value="1" name="hot" > Hot
                <input type="radio" value="0" name="hot" checked=""> <?php echo e(__('form.normal')); ?>

            </div>
            <div class="form-group">
            <label for=""><?php echo e(__('form.description')); ?></label> 
            <textarea class="ckeditor" name="editor1" cols="80" rows="10"><?php echo e(old('description')); ?></textarea>
            <script>
                CKEDITOR.replace( 'editor1', {
                        filebrowserBrowseUrl: 'http://localhost:8080/shop/shop1/public/ckfinder/ckfinder.html',
                        filebrowserUploadUrl: 'http://localhost:8080/shop/shop1/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
                } );
            </script>
            </div>
            <div class="form-group">
                <label for=""><?php echo e(__('form.price')); ?></label>
                <input type="number" name="price" class="form-control" required="required" min="0" value="<?php echo e(old('price')); ?>" required>
            </div>
            <div class="form-group">
                <label for=""><?php echo e(__('form.price_sale')); ?></label>
                <input type="number" name="price_sale" class="form-control"  min="0" value="<?php echo e(old('price_sale')); ?>">
            </div>
                        
            <div class="form-group">
                <label for=""><?php echo e(__('form.warranty_period')); ?></label>                
                <select name="warranty_period_id" id="input" class="form-control" required="required">
                    <?php $__currentLoopData = $warranty_periods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($warr->id); ?>"><?php echo e($warr->time); ?> <?php echo e($warr->type); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>   
            </div>          
            <div class="form-group">
                <label for=""><?php echo e(__('form.brand')); ?></label>
                <select name="brand_id" id="input" class="form-control" required="required">
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($brand->id); ?>"><?php echo e($brand->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>               
            </div>              
            <div class="form-group">
                <label for=""><?php echo e(__('form.status')); ?></label>
                <input type="radio" value="1" name="status" checked=""> <?php echo e(__('form.show')); ?>

                <input type="radio" value="0" name="status"> <?php echo e(__('form.hidden')); ?>

            </div>
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="form-inline">
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
            </div>
            <input type="checkbox" name="add_more" checked="">  
            <button type="submit" class="btn btn-primary"><?php echo e(__('admin.add',['name' => ''])); ?></button>
        </form>
    </div>
    <hr>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            var dem = 0;
            $(document).on('click', '.add_color', function(e){
                e.preventDefault();
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