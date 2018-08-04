<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
<div class="panel-heading">Add new  Slide</div>
    <div>    
    <?php if(isset($mess)): ?>
    <?php echo e(mess); ?>

    <?php endif; ?>
    </div>
    <div class="panel-body">
        <form action="" method="POST" role="form">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <div class="form-group">
            <label for="">location slide</label>
            <select name="name" id="" required>
                <option value="home">Home</option>
                <option value="product">Product</option>
            </select>
            </div>
            <div class="form-group">
               <label for="">Content</label>
               <textarea name="content" id="inputContent" class="form-control" rows="3" required="required"></textarea>
            </div>
            <div class="form-group">
               <label for="">Image</label>
               <input type="file" class="form-control" name="link" required>
            </div>           
            <button type="submit" class="btn btn-primary">Add New</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>