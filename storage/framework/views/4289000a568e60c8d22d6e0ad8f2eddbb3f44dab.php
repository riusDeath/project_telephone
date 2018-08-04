<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Khách hàng</div>
    <div class="panel-body">
        <form action="" class="form-inline" role="form">
        
            <div class="form-group">
                <input class="form-control" name="search" placeholder="Tìm kiếm theo tên...">
            </div>
        
            
        
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
           
        </form>

    </div>

    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Quyền</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
            
        </thead>
        <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($cus->id); ?></td>
                <td><?php echo e($cus->name); ?></td>
                <td><?php echo e($cus->adress); ?></td>
                <td><?php echo e($cus->email); ?></td>
                <td><?php echo e($cus->phone); ?></td>
                <td><?php echo e($cus->grade); ?></td>
                <td>
                    <?php if($cus->status==1): ?>
                    <label for="" class="label label-info">Có quyền</label>
                    <?php else: ?>
                    <label for="" class="label label-warning">Không có quyền</label>
                    <?php endif; ?>
                </td>
                <td><?php echo e(date_format($cus->created_at, "d/m/Y")); ?></td>
                <td>
                    <a href="<?php echo e(route('sua-ho-so',['id' => $cus->id])); ?>">Sửa hồ sơ</a>
                    <a href="<?php echo e(route('lich-su-mua-hang',[ 'id'=> $cus->id ])); ?>" class="label label-info">Lịch sử mua hàng</a>
                    <?php if($cus->grade == 'customer' || Auth::user()->grade == 'boss'): ?>
                    <?php if($cus->status==1): ?>
                     <a href="<?php echo e(route('xoa-khach-hang',['id' => $cus->id])); ?>" class="label label-danger" onclick="confirm('Bạn muốn xóa quyền truy cập khách hàng <?php echo e($cus->name); ?>?')">Xóa quyền truy cập</a>
                    <?php else: ?>
                     <a href="<?php echo e(route('xoa-khach-hang',['id' => $cus->id])); ?>" class="label label-danger" onclick="confirm('Bạn muốn cấp quyền truy cập <?php echo e($cus->name); ?>?')">Cấp quyền truy cập</a>
                    <?php endif; ?>
                    <?php endif; ?>
                                      
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

     <div class="panel-footer">
       <?php echo e($users->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>