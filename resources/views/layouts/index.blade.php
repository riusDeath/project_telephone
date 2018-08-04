<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>MyStore</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" href="{{asset('public/css/display/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/css/display/font-awesome.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{asset('public/css/display/simple-line-icons.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{asset('public/css/display/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/css/display/owl.theme.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/css/display/animate.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{asset('public/css/display/flexslider.css')}}" >
<link rel="stylesheet" type="text/css" href="{{asset('public/css/display/jquery-ui.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/css/display/revolution-slider.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/css/display/style.css')}}" media="all">
<link rel="stylesheet" href="{{asset('public/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('public/css/my.css')}}">  
<link rel="stylesheet" href="{{asset('public/css/my.css')}}">  


@yield('link')

</head>

<body class="shop_grid_page">

@include('layouts.header')

<div id="page"> 

@include('layouts.menu')

@yield('main')
  

@include('layouts.footer')

</div>


<script type="text/javascript" src="{{asset('public/js/display/jquery.min.js')}}"></script> 

<script type="text/javascript" src="{{asset('public/js/display/bootstrap.min.js')}}"></script> 

<script type="text/javascript" src="{{asset('public/js/display/owl.carousel.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('public/js/display/jquery.bxslider.js')}}"></script> 
<script type="text/javascript" src="{{asset('public/js/display/megamenu.js')}}"></script> 
<script type="text/javascript">
        /* <![CDATA[ */   
        var mega_menu = '0';
        
        /* ]]> */
        </script> 
<script type="text/javascript" src="{{asset('public/js/display/mobile-menu.js')}}"></script> 
<script type="text/javascript" src="{{asset('public/js/display/jquery-ui.js')}}"></script> 

<script type="text/javascript" src="{{asset('public/js/display/main.js')}}"></script>
@yield('script')
</body>

</html>
