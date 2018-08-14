<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content animated fadeInRight ecommerce">
    <div class="ibox-content m-b-sm border-bottom">
        <div class="container"> 
        
    </div>
    <div class="row">
        <form action="" method="post" class="form-inline" role="form">
            <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
            <div class="form-group">
                <input type="text" class="form-control" name="search" placeholder="Search email or id">
            </div>                                       
            <button type="submit"  class="btn btn-primary"><?php echo e(__('form.search')); ?></button>
            <a href="<?php echo e(route('add-code')); ?>"><?php echo e(__('admin.add', ['name' => ''])); ?></a>
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
                        <th data-hide="phone"><?php echo e(__('admin.code')); ?></th>
                        <th data-hide="phone"><?php echo e(__('home.sale')); ?></th>
                        <th data-hide="phone"><?php echo e(__('form.mail')); ?></th>
                        <th data-hide="phone"><?php echo e(__('form.status')); ?></th>
                        <th data-hide="phone"><?php echo e(__('form.date_create')); ?></th>
                        <th data-hide="phone"><?php echo e(__('form.date_end')); ?></th>
                        <th class="text-right" data-sort-ignore="true"><?php echo e(__('form.Action')); ?></th>
                </thead>
                <tbody>
                <?php $__currentLoopData = $code_discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code_discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> <?php echo e($code_discount->id); ?> </td>
                        <td> <?php echo e($code_discount->code); ?> </td>         
                        <td>
                            <?php echo e($code_discount->sale); ?> %
                        </td>
                        <td> <?php echo e($code_discount->mail); ?> </td> 
                        <td>
                            <span class="label label-primary">
                                <?php echo e($code_discount->status==1?__('form.show'):__('form.hidden')); ?>

                            </span>
                        </td>
                        <td>
                            <?php echo e($code_discount->date_create); ?>

                        </td>
                        <td>
                            <?php echo e($code_discount->date_end); ?>

                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <a href="<?php echo e(route('change-code', ['id' => $code_discount->id])); ?>"><?php echo e(__('form.change')); ?> <?php echo e(__('form.status')); ?></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <?php echo e($code_discounts->links()); ?>

            </table>
        </div>
        </div>
    </div>
    </div>
</div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>