<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/dashboard_4_1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Jun 2018 11:56:41 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin</title>

    <link href="<?php echo e(asset('public/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">

    <!-- Morris -->
    <link href="<?php echo e(asset('public/css/plugins/morris/morris-0.4.3.min.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('public/css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/css/style.css')); ?>" rel="stylesheet">
    <script type="text/javascript" src="<?php echo e(asset('public/ckeditor/ckeditor.js')); ?>"></script>


</head>


<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <!-- ================ho so -->
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <!-- <img alt="image" class="img-circle" src="img/profile_small.jpg" /> -->
                             </span>

                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">

                                <?php if(isset($user_login)): ?>
                                <?php echo e($user_login->name); ?>

                                <?php endif; ?>
                            </strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="<?php echo e(route('ho-so-admin')); ?>">Hồ Sơ</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo e(route('dang-xuat-Admin')); ?>">Đăng xuất</a></li>

                        </ul>
                    </div>

                </li>
                <!-- =============================== Quản Lý Sản phẩm-->
                    <a href="<?php echo e(route('admin')); ?>" class="list-group-item">Dashboard</a>    
                
                <li>
                    <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Quản Lý Sản phẩm</span><span class="label label-warning pull-right">16/24</span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo e(route('san-pham')); ?>">Danh sách sản phẩm</a></li>
                        <li><a href="<?php echo e(route('them-san-pham')); ?>">Thêm mới sản phẩm</a></li>
                        <li><a href="<?php echo e(route('danh-muc')); ?>">Danh sách danh mục</a></li>
                        <li><a href="">Thông số kỹ thuật</a></li>
                    </ul>
                </li>
                 <!-- <i class="fa fa-envelope"></i> -->
                <!-- ==============================Quản lý bán hàng -->
                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Quản lý bán hàng</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo e(route('khach-hang')); ?>">Quản lý khách hàng</a></li>
                        <li><a href="<?php echo e(route('danh-sach-slide')); ?>">Danh sách Slide</a></li>
                    </ul>
                </li>
                <!-- ===================================== Quản lý đơn hàng-->
                <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Quản lý đơn hàng</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo e(route('don-hang')); ?>">Danh sách đơn hàng</a></li>
                        <li><a href="<?php echo e(route('phuong-thuc-thanh-toan')); ?>">Phương thức thanh toán</a></li>
                        <li><a href="<?php echo e(route('phuong-thuc-giao-hang')); ?>">Phương thức giao hàng</a></li>
                    </ul>
                </li>
                <!-- ==================================== Quản lý banner-->
                <li>
                    <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Quản lý banner</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="search_results.html">Thêm banner</a></li>
                        <li><a href="lockscreen.html">Chọn banner</a></li>
                    </ul>
                </li>
                <!-- =====================Quản lý admin -->
                <li>
                    <a href="#"><i class="fa fa-globe"></i> <span class="nav-label">Quản lý admin</span><span class="label label-info pull-right"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo e(route('ho-so-admin')); ?>">Hồ sơ</a></li>
                        <li><a href="<?php echo e(route('danh-sach-admin')); ?>">Danh sách tài khoản</a></li>
                        <li><a href="<?php echo e(route('them-moi-admin')); ?>">Thêm mới tài khoản</a></li>
                    </ul>
                </li>
                
                <!-- ======================== Quản lý menu -->
                <li>
                    <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Quản lý menu </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="#">Third Level <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>

                            </ul>
                        </li>
                        <li><a href="#">Second Level Item</a></li>
                        <li>
                            <a href="#">Second Level Item</a></li>
                        <li>
                            <a href="#">Second Level Item</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>
    <!-- =================== top search -->

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="http://webapplayers.com/inspinia_admin-v2.7.1/search_results.html">
               
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message"><a href="<?php echo e(route('home')); ?>">Home</a></span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <!-- <img alt="image" class="img-circle" src="img/a7.jpg"> -->
                                </a>
                                <div>
                                    <small class="pull-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <!-- <img alt="image" class="img-circle" src="img/a4.jpg"> -->
                                </a>
                                <div>
                                    <small class="pull-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <!-- <img alt="image" class="img-circle" src="img/profile.jpg"> -->
                                </a>
                                <div>
                                    <small class="pull-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="grid_options.html">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="login.html">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
                <li>
                          <div class="dropdown profile-element"> 
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span>Admin</span>
                                    
                                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                        <li><a href="<?php echo e(route('ho-so-admin')); ?>">Hồ Sơ</a></li>
                                        <li><a href="contacts.html">Contacts</a></li>
                                        <li><a href="mailbox.html">Mailbox</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo e(route('dang-xuat-Admin')); ?>">Đăng xuất</a></li>
                                    </ul>
                             </div>

                        </i>
                    
                </li>
            </ul>

        </nav>
        </div>

    <!--     ====================== 
        body
        ++++++++++++++++++++ -->
         
            <?php echo $__env->yieldContent('content'); ?>
        
        </div>
        </div>

        </div>


        </div>




        </div>
      
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo e(asset('public/js/jquery-3.1.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/plugins/metisMenu/jquery.metisMenu.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/plugins/slimscroll/jquery.slimscroll.min.js')); ?>"></script>

    <!-- Flot -->
    <script src="<?php echo e(asset('public/js/plugins/flot/jquery.flot.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/plugins/flot/jquery.flot.tooltip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/plugins/flot/jquery.flot.spline.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/plugins/flot/jquery.flot.resize.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/plugins/flot/jquery.flot.pie.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/plugins/flot/jquery.flot.symbol.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/plugins/flot/curvedLines.js')); ?>"></script>

    <!-- Peity -->
   <!--  <script src="<?php echo e(asset('public/js/plugins/peity/jquery.peity.min.js')); ?>"></script> -->
  <!--   <script src="<?php echo e(asset('public/js/demo/peity-demo.js')); ?>"></script> -->

    <!-- Custom and plugin javascript -->
    <script src="<?php echo e(asset('public/js/inspinia.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/plugins/pace/pace.min.js')); ?>"></script>

    <!-- jQuery UI -->
<!--     <script src="<?php echo e(asset('public/js/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script> -->

    <!-- Jvectormap -->
    <script src="<?php echo e(asset('public/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>

    <!-- Sparkline -->
    <script src="<?php echo e(asset('public/js/plugins/sparkline/jquery.sparkline.min.js')); ?>"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php echo e(asset('public/js/demo/sparkline-demo.js')); ?>"></script>

    <!-- ChartJS-->
    <script src="<?php echo e(asset('public/js/plugins/chartJs/Chart.min.js')); ?>"></script>

    <?php echo $__env->yieldContent('script'); ?>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/dashboard_4_1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Jun 2018 11:56:42 GMT -->
</html>
