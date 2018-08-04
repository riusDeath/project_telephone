<?php $__env->startSection('content'); ?>
	 <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-2">
                <div class="ibox float-e-margins">
                    <a href="<?php echo e(route('product')); ?>">
                        <div class="ibox-title">
                            <span class="label label-success pull-right"></span>
                            <h5><?php echo e(__('admin.product')); ?></h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins"><?php echo e($total_product); ?></h1>
                            <small><?php echo e(__('admin.number_product')); ?></small>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="ibox float-e-margins">
                    <a href="<?php echo e(route('order')); ?>">
                        <div class="ibox-title">
                            <span class="label label-info pull-right">Annual</span>
                            <h5><?php echo e(__('admin.order')); ?></h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins"><?php echo e($total_orders); ?></h1>
                            <small><?php echo e(__('admin.order_number')); ?></small>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right"></span>
                        <h5><?php echo e(__('admin.user')); ?></h5>
                    </div>
                    <div class="ibox-content">
                        <a href="<?php echo e(route('user')); ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <h1 class="no-margins"><?php echo e(count($users)); ?></h1>
                                    <div class="font-bold text-navy"><?php echo e(__('admin.user')); ?><i class="fa fa-level-up"></i> </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>