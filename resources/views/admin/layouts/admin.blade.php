<!DOCTYPE html >
<html lang="{{ app()->getLocale()  }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyStotre Admin</title>
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/css/font-awesome.min.css') }}">
    <script type="text/javascript" src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>
    <!-- <script type="text/javascript" src="{{ asset('public/ckfinder/ckfinder.js') }}"></script> -->
</head>

<body>
    <div id="wrapper">
    @include('admin.layouts.header')
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
                    <span class="m-r-sm text-muted welcome-message"><a href="{{ route('home') }}">{{ __('admin.home') }}</a></span>
                </li>
                <li class="dropdown" >
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" title="The order has not been delivered ">
                        <i class="glyphicon glyphicon-dashboard" ></i>
                        <span class="label label-warning">{{ count($orders_status) }}</span>
                    </a>
                    @if(count($orders_status) !=0)
                    <ul class="dropdown-menu dropdown-messages scroll" >
                        @foreach($orders_status as $order_status)
                        <li>
                                <a href="">
                                <div>
                                    <i class="glyphicon glyphicon-headphones"></i>@if($order_status->status == 1)
                                    <label class="label-sm ">{{ __('admin.Approved') }}</label>
                                    @else
                                    <label class="label-sm ">{{ __('admin.Unapproved') }}</label>
                                    @endif
                                    <span class="pull-right text-muted small">{{ ($order_status->created_at) }}</span>
                                    <div>
                                    <a href="{{ route('detail',['id'=>$order_status->id]) }}">{{ __('admin.order_detail') }}</a>
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
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" title="Order today">
                        <i class="glyphicon glyphicon-shopping-cart" ></i>  <span class="label label-primary">{{ count($orders_day) }}</span>
                    </a>
                    @if(count($orders_day) !=0)
                    <ul class="dropdown-menu dropdown-alerts scroll">
                        @foreach($orders_day as $order_day)
                        <li>
                            <a href="">
                                <div>
                                    <i class="glyphicon glyphicon-headphones"></i>  
                                    Id Order  : {{ $order_day->user_id }} :
                                    <span class="pull-right text-muted small">{{ ($order_day->created_at) }}</span>
                                    <div>
                                        <a href="{{ route('detail',['id'=>$order_day->id]) }}">{{ __('admin.order_detail') }}</a>
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
                    <a href="{{ route('logout-Admin') }}">
                        <i class="fa fa-sign-out" ></i>{{ __('admin.logout') }}
                    </a>
                </li>
                <li>
                    <div class="dropdown profile-element"> 
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span>Admin</span>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="{{ route('account-admin') }}">{{ __('admin.Account') }}</a></li>
                            <li><a href="">Contacts</a></li>
                            <li><a href="">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('logout-Admin') }}">{{ __('admin.logout') }}</a></li>
                        </ul>
                        </a>                        
                     </div>                   
                </li>
            </ul>
        </nav>
        </div>
         
        @yield('content')
        
        </div>
        </div>
        </div>
        </div>
        </div>      
    </div>

    <script src="{{ asset('public/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('public/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('public/js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('public/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('public/js/plugins/flot/jquery.flot.spline.js') }}"></script>
    <script src="{{ asset('public/js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('public/js/plugins/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('public/js/plugins/flot/jquery.flot.symbol.js') }}"></script>
    <script src="{{ asset('public/js/plugins/flot/curvedLines.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ asset('public/js/inspinia.js') }}"></script>
    <script src="{{ asset('public/js/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('public/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('public/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('public/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('public/js/plugins/chartJs/Chart.min.js') }}"></script>
    <script src="{{ asset('public/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('public/tinymce/config.js') }}"></script>
    @yield('script')
    
</body>

</html>
