<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Đơn hàng</div>
    <div class="panel-body">
        <form action="" class="form-inline" role="form">
        
            <div class="form-group">
                <select name="search" id="">
                    <option value="2">Tất cả đơn hàng</option>
                    <option value="1">Đơn hàng đã duyệt</option>
                    <option value="0">Đơn hàng chưa duyệt</option>
                </select>
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
                <th>Địa chỉ giao hàng</th>
                <th>Số điện thoại</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Phương thức ship</th>
                <th>Phương thức trả hàng</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
            
        </thead>
        <tbody>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($order->id); ?></td>
                <td><?php echo e($order->name); ?></td>
                <td><?php echo e($order->adress); ?></td>
                <td><?php echo e($order->phone); ?></td>
                <td><?php echo e($order->total); ?></td>
                <td><?php echo e($order->price); ?></td>
                <td><?php echo e($order->ship_id); ?></td>
                <td><?php echo e($order->pay_id); ?></td>
                <td>
                     <?php if($order->status==1): ?>
                     Đã Duyệt
                    <?php elseif($order->status == 0): ?>
                       Chưa Duyệt
                     <?php else: ?>
                       Đã giao hàng
                     <?php endif; ?> 

                </td>
                <td><?php echo e($order->created_at); ?></td>
                <td>
                       <a href="<?php echo e(route('chi-tiet-don-hang',['id' => $order->id])); ?>" class="label label-success">Chi tiết đơn hàng</a>

                       <?php if($order->status==1): ?>
                       <a href="<?php echo e(route('duyet-don-hang',['id' => $order->id ])); ?>" class="label label-primary">Đợi giao hàng</a>
                       <?php elseif($order->status == 0): ?>
                       <a href="<?php echo e(route('duyet-don-hang',['id' => $order->id ])); ?>" class="label label-danger">Chưa Duyệt</a>
                       <?php else: ?>
                       <label  class="label label-info" >Đã giao hàng</label>
                       <?php endif; ?> 
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

     <div class="panel-footer">
        <?php echo e($orders->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>