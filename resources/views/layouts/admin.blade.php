<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Morris -->
    <link href="{{asset('public/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/style.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>
</head>

<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">               
                <li class="nav-header">
                    <div class="dropdown profile-element"> 
                        <span>
                            <!-- <img alt="image" class="img-circle" src="img/profile_small.jpg" /> -->
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> 
                                <span class="block m-t-xs"> 
                                <strong class="font-bold">
                                @if(isset($user_login))
                                {{$user_login->name}}
                                @endif
                                </strong>
                                </span> 
                                 <span class="text-muted text-xs block">Art Director 
                                <b class="caret"></b>
                                </span> 
                            </span> 
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="{{route('ho-so-admin')}}">Hồ Sơ</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('dang-xuat-Admin')}}">Đăng xuất</a></li>
                        </ul>
                    </div>
                </li>                
                    <a href="{{route('admin')}}" class="list-group-item">Dashboard</a>                    
                <li>
                    <a href="#">    
                        <i class="fa fa-table"></i> <span class="nav-label">Quản Lý Sản phẩm</span>
                        <span class="label label-warning pull-right"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{route('san-pham')}}">Danh sách sản phẩm</a></li>
                        <li><a href="{{route('them-san-pham')}}">Thêm mới sản phẩm</a></li>
                        <li><a href="{{route('danh-muc')}}">Danh sách danh mục</a></li>
                        <li><a href="{{route('thong-so-ky-thuat')}}">Thông số kỹ thuật</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-edit"></i> 
                        <span class="nav-label">Quản lý khách hàng</span><span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{route('khach-hang')}}">Danh sách khách hàng</a></li>
                        <li><a href="{{route('them-moi-admin')}}">Thêm mới tài khoản</a></li>
                    </ul>
                </li> 
                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Quản lý Slider</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{route('danh-sach-slide')}}">Danh sách Slider</a></li>
                        <li><a href="{{route('them-moi-slide')}}">Thêm mới Slider</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Quản lý đơn hàng</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{route('don-hang')}}">Danh sách đơn hàng</a></li>
                        <li><a href="{{route('phuong-thuc-thanh-toan')}}">Phương thức thanh toán</a></li>
                        <li><a href="{{route('phuong-thuc-giao-hang')}}">Phương thức giao hàng</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-globe"></i> 
                        <span class="nav-label">Quản lý admin</span><span class="label label-info pull-right"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{route('ho-so-admin')}}">Hồ sơ</a></li>
                        <li><a href="{{route('danh-sach-admin')}}">Danh sách tài khoản</a></li>
                        <li><a href="{{route('them-moi-admin')}}">Thêm mới tài khoản</a></li>
                    </ul>
                </li> 
                <li>
                    <a href="#">
                        <i class="fa fa-globe"></i> 
                        <span class="nav-label">Lịch sử hoạt động</span><span class="label label-info pull-right"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{route('lich-su-hoat-dong')}}">Lịch sử hoạt động</a></li>
                    </ul>
                </li>                
            </ul>
        </div>
    </nav>
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
                    <span class="m-r-sm text-muted welcome-message"><a href="{{route('home')}}">Home</a></span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" title=" Đơn hàng chưa được giao hàng">
                        <i class="glyphicon glyphicon-dashboard" ></i>
                        <span class="label label-warning">{{count($orders_status)}}</span>
                    </a>
                    @if(count($orders_status) !=0)
                    <ul class="dropdown-menu dropdown-messages">
                        @foreach($orders_status as $order_status)
                        <li>
                                <a href="">
                                <div>
                                    <i class="glyphicon glyphicon-headphones"></i>  
                                    Id Giỏ hàng : {{$order_status->id}} 
                                     @if($order_status->status == 1)
                                    <label class="label-sm ">Đợi giao hàng</label>
                                    @else
                                    <label class="label-sm ">Đợi duyệt</label>
                                    @endif
                                    <span class="pull-right text-muted small">{{($order_status->created_at)}}</span>
                                    <div>
                                    <a href="{{route('chi-tiet-don-hang',['id'=>$order_status->id])}}">Xem chi tiết đơn hàng</a>
                                    </div>
                                </div>
                                </a>
                        </li>
                        <li class="divider"></li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" title="Đơn hàng trong ngày">
                        <i class="glyphicon glyphicon-shopping-cart" ></i>  <span class="label label-primary">{{count($orders_day)}}</span>
                    </a>
                    @if(count($orders_day) !=0)
                    <ul class="dropdown-menu dropdown-alerts">
                        @foreach($orders_day as $order_day)
                        <li>
                            <a href="">
                                <div>
                                    <i class="glyphicon glyphicon-headphones"></i>  
                                    Id Giỏ hàng : {{$order_day->user_id}} :
                                    <span class="pull-right text-muted small">{{($order_day->created_at)}}</span>
                                    <div>
                                        <a href="{{route('chi-tiet-don-hang',['id'=>$order_day->id])}}">Xem chi tiết đơn hàng</a>
                                    </div>
                                </div>
                            </a>
                        </li>
                         <li class="divider"></li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                <li>
                    <a href="{{route('dang-xuat-Admin')}}">
                        <i class="fa fa-sign-out" ></i> Log out
                    </a>
                </li>
                <li>
                    <div class="dropdown profile-element"> 
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span>Admin</span>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="{{route('ho-so-admin')}}">Hồ Sơ</a></li>
                            <li><a href="">Contacts</a></li>
                            <li><a href="">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('dang-xuat-Admin')}}">Đăng xuất</a></li>
                        </ul>
                        </a>                        
                     </div>                   
                </li>
            </ul>
        </nav>
        </div>
    <!--     ====================== 
        body
        ++++++++++++++++++++ -->
         
            @yield('content')
        
        </div>
        </div>
        </div>
        </div>
        </div>      
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('public/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('public/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <!-- Flot -->
    <script src="{{asset('public/js/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('public/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('public/js/plugins/flot/jquery.flot.spline.js')}}"></script>
    <script src="{{asset('public/js/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('public/js/plugins/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('public/js/plugins/flot/jquery.flot.symbol.js')}}"></script>
    <script src="{{asset('public/js/plugins/flot/curvedLines.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Peity -->
   <!--  <script src="{{asset('public/js/plugins/peity/jquery.peity.min.js')}}"></script> -->
  <!--   <script src="{{asset('public/js/demo/peity-demo.js')}}"></script> -->

    <!-- Custom and plugin javascript -->
    <script src="{{asset('public/js/inspinia.js')}}"></script>
    <script src="{{asset('public/js/plugins/pace/pace.min.js')}}"></script>

    <!-- jQuery UI -->
<!--     <script src="{{asset('public/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script> -->

    <!-- Jvectormap -->
    <script src="{{asset('public/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('public/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

    <!-- Sparkline -->
    <script src="{{asset('public/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Sparkline demo data  -->

    <!-- ChartJS-->
    <script src="{{asset('public/js/plugins/chartJs/Chart.min.js')}}"></script>
    <script src="{{asset('public/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('public/tinymce/config.js')}}"></script>
    @yield('script')
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/dashboard_4_1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Jun 2018 11:56:42 GMT -->
</html>
