<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Admin</div>
    <?php if(isset($thongbao)): ?>
        <div class="alert"><?php echo e($thongbao); ?></div>     
    <?php endif; ?>
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
        <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($admin->id); ?></td>
                <td><?php echo e($admin->name); ?></td>
                <td><?php echo e($admin->adress); ?></td>
                <td><?php echo e($admin->email); ?></td>
                <td><?php echo e($admin->phone); ?></td>
                <td><?php echo e($admin->grade); ?></td>
                <td>
                    <?php if($admin->status==1): ?>
                    <label for="" class="label label-info">Có quyền</label>
                    <?php else: ?>
                    <label for="" class="label label-warning">Không có quyền</label>
                    <?php endif; ?>
                </td>
                <td><?php echo e($admin->created_at); ?></td>
                <td>    
                    <a href="<?php echo e(route('sua-thong-tin-admin',[ 'id'=> $admin->id ])); ?>" class="label label-info">Sửa</a>
                    <?php if(Auth::user()->grade == 'boss' && $admin->id != Auth::user()->id ): ?>
                    <?php if($admin->status==1  ): ?>
                     <a href="<?php echo e(route('xoa-quyen-admin',['id' => $admin->id])); ?>" class="label label-danger" onclick="confirm('Bạn muốn xóa quyền truy cập admin <?php echo e($admin->name); ?>?')">Xóa quyền truy cập</a>
                    <?php else: ?>
                     <a href="<?php echo e(route('xoa-khach-hang',['id' => $admin->id])); ?>" class="label label-danger" onclick="confirm('Bạn muốn cấp quyền truy cập <?php echo e($admin->name); ?>?')">Cấp quyền truy cập</a>
                    <?php endif; ?>                                    
                    <?php endif; ?>                                    
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>     
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>