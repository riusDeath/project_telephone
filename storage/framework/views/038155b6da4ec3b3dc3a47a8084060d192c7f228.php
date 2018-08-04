<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content animated fadeInRight ecommerce">
    <div class="ibox-content m-b-sm border-bottom">
    <div class="row">
        <form action="" method="get" class="form-inline" role="form">
            <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
            <div class="form-group">
                <input type="text" class="form-control" name="search" placeholder="Search name or id">
            </div>
            <div class="form-group">
                <select name="sort"  class="form-control">
                    <option value="0" selected><?php echo e(__('admin.all_product')); ?></option>
                    <option value="1" ><?php echo e(__('admin.item_is_empty')); ?></option>
                    <option value="2"><?php echo e(__('admin.sort_rate')); ?></option>
                </select>
            </div>                                         
            <button type="submit"  class="btn btn-primary"><?php echo e(__('form.search')); ?></button>
            <a href="<?php echo e(route('add_product')); ?>"><?php echo e(__('admin.add', ['name' => ''])); ?></a>
        </form>
    </div>
    <div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                <thead>
                    <tr>                                 
                        <th data-toggle="true">ID</th>
                        <th data-toggle="true"><?php echo e(__('form.name')); ?></th>
                        <th data-hide="phone"><?php echo e(__('form.image')); ?></th>
                        <th data-hide="phone"><?php echo e(__('admin.Specification')); ?></th>
                        <th data-hide="phone"><?php echo e(__('form.price')); ?></th>
                        <th data-hide="phone"><?php echo e(__('form.price_sale')); ?></th>
                        <th data-hide="phone,tablet" ><?php echo e(__('form.total')); ?></th>
                        <th data-hide="phone,tablet" >rate</th>
                        <th data-hide="phone"><?php echo e(__('form.status')); ?></th>
                        <th data-hide="phone">Hot</th>
                        <th class="text-right" data-sort-ignore="true"><?php echo e(__('form.Action')); ?></th>
                </thead>
                <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> <?php echo e($pro->id); ?> </td>
                        <td> <?php echo e($pro->name); ?> </td>
                        <td>
                            <img src="../uploads/<?php echo $pro->image ?>" alt="" width="50px"> 
                        </td>
                        <td>
                            <a href="<?php echo e(route('attributes',['id' => $pro->id])); ?>" class="label label-info">view</a>
                        </td>
                        <td>
                            <?php echo e(number_format($pro->price)); ?> VND
                        </td>
                        <td>
                            <?php echo e(number_format($pro->price_sale)); ?> VND
                        </td>
                        <td> <?php echo e($pro->total); ?> </td>
                        <td> <?php echo e($pro->avg_rate); ?> </td>
                        <td>
                            <span class="label label-primary">
                                <?php echo e($pro->status==1?"Show":"Hidden"); ?>

                            </span>
                        </td>
                        <td>
                            <?php if($pro->hot == 1): ?>
                                <a href="<?php echo e(route('product_hot',['id' => $pro->id , 'hot'=> 0 ] )); ?>" class="label label-danger">Hot</a>
                            <?php else: ?>
                                <a href="<?php echo e(route('product_hot',['id' => $pro->id ,'hot'=> 1])); ?>" class="label label-success"><?php echo e(__('form.normal')); ?></a>
                            <?php endif; ?>
                            </td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a href="<?php echo e(route('view_product',['id' => $pro->id ])); ?>" class="btn-white btn btn-xs btn-info">view</a>
                                        <a href="<?php echo e(route('update_product',['id' => $pro->id])); ?>" class="btn-white btn btn-xs btn-danger"><?php echo e(__('admin.update',['name' => ''])); ?></a>
                                        <a href="<?php echo e(route('view-list-image',['id' => $pro->id])); ?>" ><?php echo e(__('form.list_image')); ?></a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo $products->links(); ?>                       
        </div>
        </div>
    </div>
    </div>
</div>
    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>