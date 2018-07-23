<?php $__env->startSection('content'); ?>
		  <div class="wrapper wrapper-content animated fadeInRight ecommerce">


            <div class="ibox-content m-b-sm border-bottom">
                <div class="row">
                    <form action="" method="" class="form-inline" role="form">
                    
                        <div class="form-group">
                            <label class="sr-only" for="">Tên sản phẩm hoặc id sản phẩm</label>
                            <input type="text" class="form-control" name="search" placeholder="Tìm kiếm theo tên hoặc id">
                        </div>
                        <div class="form-group">
                            <select name="sort"  class="form-control">
                                <option value="0" selected>Tiêu chí</option>
                                <option value="1" >Sản phẩm trong tuần</option>
                                <option value="2" >Sản phẩm hết hàng</option>
                                <option value="3">Giá sắp xếp thấp lên cao</option>
                            </select>
                        </div>                      
                    
                        <a href="<?php echo e(route('san-pham')); ?>"  class="btn btn-primary">Tìm kiếm</a>
                    </form>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">

                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                <thead>
                                <tr>
                                    <th data-hide="phone">Id </th>
                                    <th data-toggle="true">Tên sản phẩm</th>
                                    <th data-hide="phone">Ảnh đại diện</th>
                                    <th data-hide="phone">Miêu tả</th>
                                    <th data-hide="phone">Giá</th>
                                    <th data-hide="phone">Giá sale</th>
                                    <th data-hide="phone,tablet" >Số lượng</th>
                                    <th data-hide="phone">Trạng thái</th>
                                    <th class="text-right" data-sort-ignore="true">Thao tác</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                       <?php echo e($pro->id); ?>

                                    </td>
                                    <td>
                                       <?php echo e($pro->name); ?>

                                    </td>
                                    <td>

                                        <img src="../uploads/<?php echo $pro->image ?>" alt="" width="50px"> 
                                    </td>
                                    <td>
                                        
                                        <?php echo $pro->description ; ?>
                                       
                                    <td>
                                        <?php echo e(number_format($pro->price)); ?> VND
                                    </td>
                                    <td>
                                        <?php echo e(number_format($pro->price_sale)); ?> VND
                                    </td>
                                    <td>
                                         <?php echo e($pro->total); ?>

                                    </td>
                                    <td>
                                        <span class="label label-primary">
                                         <?php echo e($pro->status==1?"Hiển thị":"Ẩn"); ?>


                                        </span>
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <a href="<?php echo e(route('xem-san-pham',['id' => $pro->id ])); ?>" class="btn-white btn btn-xs btn-info">Xem</a>
                                            <a href="<?php echo e(route('sua-san-pham',['id' => $pro->id])); ?>" class="btn-white btn btn-xs btn-danger">Sửa</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php echo $products->links(); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>