<!DOCTYPE html>

<html lang="<?php echo e(app()->getLocale()); ?>">

<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>MyStore</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/display/bootstrap.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/display/font-awesome.css')); ?>" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/display/simple-line-icons.css')); ?>" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/display/owl.carousel.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/display/owl.theme.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/display/animate.css')); ?>" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/display/flexslider.css')); ?>" >
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/display/jquery-ui.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/display/revolution-slider.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/display/style.css')); ?>" media="all">
<link rel="stylesheet" href="<?php echo e(asset('public/css/font-awesome.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/css/my.css')); ?>">  
<link rel="stylesheet" href="<?php echo e(asset('public/css/admin.css')); ?>">  


<?php echo $__env->yieldContent('link'); ?>

</head>

<body class="shop_grid_page">

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div id="page"> 

<?php echo $__env->make('layouts.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('main'); ?>
  

<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</div>


<script type="text/javascript" src="<?php echo e(asset('public/js/display/jquery.min.js')); ?>"></script> 

<script type="text/javascript" src="<?php echo e(asset('public/js/display/bootstrap.min.js')); ?>"></script> 

<script type="text/javascript" src="<?php echo e(asset('public/js/display/owl.carousel.min.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('public/js/display/jquery.bxslider.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('public/js/display/megamenu.js')); ?>"></script> 
<script type="text/javascript">
        /* <![CDATA[ */   
        var mega_menu = '0';
        
        /* ]]> */
        </script> 
<script type="text/javascript" src="<?php echo e(asset('public/js/display/mobile-menu.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('public/js/display/jquery-ui.js')); ?>"></script> 

<script type="text/javascript" src="<?php echo e(asset('public/js/display/main.js')); ?>"></script>
<?php echo $__env->yieldContent('script'); ?>
</body>

</html>
