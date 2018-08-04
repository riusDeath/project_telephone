<!DOCTYPE html >
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyStotre Admin</title>
    <link href="<?php echo e(asset('public/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/css/style.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('public/css/font-awesome.min.css')); ?>">
    <script type="text/javascript" src="<?php echo e(asset('public/ckeditor/ckeditor.js')); ?>"></script>
    <!-- <script type="text/javascript" src="<?php echo e(asset('public/ckfinder/ckfinder.js')); ?>"></script> -->
</head>

<body>
    <div id="wrapper">
    <?php echo $__env->make('admin.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="">
               
            </form>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('admin.home')); ?></a></span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" title="The order has not been delivered ">
                        <i class="glyphicon glyphicon-dashboard" ></i>
                        <span class="label label-warning"><?php echo e(count($orders_status)); ?></span>
                    </a>
                    <?php if(count($orders_status) !=0): ?>
                    <ul class="dropdown-menu dropdown-messages">
                        <?php $__currentLoopData = $orders_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                                <a href="">
                                <div>
                                    <i class="glyphicon glyphicon-headphones"></i><?php if($order_status->status == 1): ?>
                                    <label class="label-sm "><?php echo e(__('admin.Approved')); ?></label>
                                    <?php else: ?>
                                    <label class="label-sm "><?php echo e(__('admin.Unapproved')); ?></label>
                                    <?php endif; ?>
                                    <span class="pull-right text-muted small"><?php echo e(($order_status->created_at)); ?></span>
                                    <div>
                                    <a href="<?php echo e(route('detail',['id'=>$order_status->id])); ?>"><?php echo e(__('admin.order_detail')); ?></a>
                                    </div>
                                </div>
                                </a>
                        </li>
                        <li class="divider"></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <?php endif; ?>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" title="Order today">
                        <i class="glyphicon glyphicon-shopping-cart" ></i>  <span class="label label-primary"><?php echo e(count($orders_day)); ?></span>
                    </a>
                    <?php if(count($orders_day) !=0): ?>
                    <ul class="dropdown-menu dropdown-alerts">
                        <?php $__currentLoopData = $orders_day; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="">
                                <div>
                                    <i class="glyphicon glyphicon-headphones"></i>  
                                    Id Order  : <?php echo e($order_day->user_id); ?> :
                                    <span class="pull-right text-muted small"><?php echo e(($order_day->created_at)); ?></span>
                                    <div>
                                        <a href="<?php echo e(route('detail',['id'=>$order_day->id])); ?>"><?php echo e(__('admin.order_detail')); ?></a>
                                    </div>
                                </div>
                            </a>
                        </li>
                         <li class="divider"></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <?php endif; ?>
                </li>
                <li>
                    <a href="<?php echo e(route('logout-Admin')); ?>">
                        <i class="fa fa-sign-out" ></i><?php echo e(__('admin.logout')); ?>

                    </a>
                </li>
                <li>
                    <div class="dropdown profile-element"> 
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span>Admin</span>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="<?php echo e(route('account-admin')); ?>"><?php echo e(__('admin.Account')); ?></a></li>
                            <li><a href="">Contacts</a></li>
                            <li><a href="">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo e(route('logout-Admin')); ?>"><?php echo e(__('admin.logout')); ?></a></li>
                        </ul>
                        </a>                        
                     </div>                   
                </li>
            </ul>
        </nav>
        </div>
         
        <?php echo $__env->yieldContent('content'); ?>
        
        </div>
        </div>
        </div>
        </div>
        </div>      
    </div>

    <script src="<?php echo e(asset('public/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/plugins/metisMenu/jquery.metisMenu.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/plugins/slimscroll/jquery.slimscroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/plugins/flot/jquery.flot.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/plugins/flot/jquery.flot.tooltip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/plugins/flot/jquery.flot.spline.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/plugins/flot/jquery.flot.resize.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/plugins/flot/jquery.flot.pie.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/plugins/flot/jquery.flot.symbol.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/plugins/flot/curvedLines.js')); ?>"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?php echo e(asset('public/js/inspinia.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/plugins/pace/pace.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/plugins/sparkline/jquery.sparkline.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/plugins/chartJs/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/tinymce/tinymce.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/tinymce/config.js')); ?>"></script>

    <?php echo $__env->yieldContent('script'); ?>
    
</body>

</html>
