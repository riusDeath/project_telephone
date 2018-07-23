<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Danh mục</div>
    <div class="panel-body">
        <form action="" class="form-inline" role="form">
        
            <div class="form-group">
                <input class="form-control" name="search" placeholder="Tìm kiếm theo tên...">
            </div>
        
            
        
            <button type="submit" class="btn btn-primary">lọc</button>
            <a href="<?php echo e(route('them-danh-muc')); ?>" class="btn btn-success">Thêm mới</a>
        </form>

    </div>

    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
            
        </thead>
        <tbody>
        <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($cat->id); ?></td>
                <td><?php echo e($cat->name); ?></td>
                <td><?php echo e($cat->created_at); ?></td>
                <td>
                    <a href="<?php echo e(route('sua-danh-muc',['id' =>$cat->id])); ?>" class="label label-success">Sửa</a>
                    <a href="<?php echo e(route('xoa-danh-muc',['id' => $cat->id])); ?>" class="label label-danger" onclick="confirm('Bạn muốn xóa danh mục <?php echo e($cat->name); ?>?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

     <div class="panel-footer">
        <?php echo e($cats->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>