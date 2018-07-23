<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlmystore.justthemevalley.com/shop_grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 May 2018 18:39:19 GMT -->
<head>
<!-- Basic page needs -->
<meta charset="utf-8">
<!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <![endif]-->
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>MyStore</title>

<!-- Mobile specific metas  -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Favicon  -->
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700italic,700,400italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Arimo:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Dosis:400,300,200,500,600,700,800' rel='stylesheet' type='text/css'>

<!-- CSS Style -->

<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/display/bootstrap.min.css')); ?>">

<!-- font-awesome & simple line icons CSS -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/display/font-awesome.css')); ?>" media="all"> -->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/display/simple-line-icons.css')); ?>" media="all">

<!-- owl.carousel CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/display/owl.carousel.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/display/owl.theme.css')); ?>">

<!-- animate CSS  -->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/display/animate.css')); ?>" media="all">

<!-- flexslider CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/display/flexslider.css')); ?>" >

<!-- jquery-ui.min CSS  -->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/display/jquery-ui.css')); ?>">

<!-- Revolution Slider CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/display/revolution-slider.css')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/display/mycss.css')); ?>">

<!-- style CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/display/style.css')); ?>" media="all">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<?php echo $__env->yieldContent('link'); ?>

</head>

<body class="shop_grid_page">
<!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]--> 

<!-- mobile menu -->
<div id="mobile-menu">
  <ul>
    <li><a href="" class="home">Home</a>    
    </li>
    <li><a href="shop_grid.html">Thương hiệu</a>
      <ul>
        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
          <a href="#" class=""><?php echo e($brand->name); ?></a>
        </li> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
        </li>
      </ul>
    </li>
    <li><a href="contact_us.html">Liên hệ</a></li>
    <li><a href="about_us.html">About us</a></li>
    <li><a href="blog.html">Blog</a>
      <ul>
        <li><a href="blog_right_sidebar.html">Blog – Right sidebar </a></li>
        <li><a href="blog_left_sidebar.html">Blog – Left sidebar </a></li>
        <li><a href="blog_full_width.html">Blog_ - Full width</a></li>
        <li><a href="single_post.html">Single post </a></li>
      </ul>
    </li>
    <li><a href="shop_grid.html">Camera & Photo</a>
      <ul>
        <li><a href="#" class="">Accessories</a>
          <ul>
            <li><a href="shop_grid.html">Cocktail</a></li>
            <li><a href="shop_grid.html">Day</a></li>
            <li><a href="shop_grid.html">Evening</a></li>
            <li><a href="shop_grid.html">Sundresses</a></li>
          </ul>
        </li>
      </ul>
    </li>

  </ul>
</div>
<!-- end mobile menu -->
<div id="page"> 
  <!-- Header -->
  <header>
    <div class="header-container">
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-sm-4 hidden-xs"> 
              <!-- Default Welcome Message -->
              <div class="welcome-msg ">Xin chào khách hàng</div>
              <span class="phone hidden-sm">Phone: +123.456.789</span> </div>
            
            <!-- top links -->
            <div class="headerlinkmenu col-lg-8 col-md-7 col-sm-8 col-xs-12">
              <div class="links">
                <div class="myaccount"><a title="My Account" href="account_page.html"><i class="fa fa-user"></i><span class="hidden-xs">Tên tài khoản</span></a></div>
                <div class="wishlist"><a title="My Wishlist" href="wishlist.html"><i class="fa fa-heart"></i><span class="hidden-xs">Thích trang</span></a></div>
                <div class="blog"><a title="Blog" href="blog.html"><i class="fa fa-rss"></i><span class="hidden-xs">Blog</span></a></div>
                <div class="login"><a href="account_page.html"><i class="fa fa-unlock-alt"></i><span class="hidden-xs">Đăng nhập</span></a></div>
                <div class="login"><a href="<?php echo e(route('dang-nhap-Admin')); ?>"><i class="fa fa-unlock-alt"></i><span class="hidden-xs">Admin</span></a></div>
              </div>
         
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-3 col-md-3 col-xs-12"> 
            <!-- Header Logo -->
          <div class="logo"><a title="e-commerce" href="index-2.html"><img alt="e-commerce" src="<?php echo e(asset('uploads/logo.png')); ?>"></a> </div>
            <!-- End Header Logo --> 
          </div>
          <div class="col-xs-9 col-sm-6 col-md-6"> 
            <!-- Search -->
            
            <div class="top-search">
              <div id="search">
                <form method="post" action="">
                  <div class="input-group">
                      <select class="cate-dropdown hidden-xs" name="category_id">
                        <option>Tất cả danh mục</option>
                        <?php $__currentLoopData = $parent_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="$parent->id"><?php echo e($parent->name); ?></option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($category->parent == $parent->id): ?>
                        <option value="<?php echo e($category->id); ?>">&nbsp;&nbsp;&nbsp;<?php echo e($category->name); ?></option>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                      <input type="hidden" value="<?php echo csrf_token() ?>" name ="_token">
                      <input type="text" class="form-control" placeholder="Search" name="search">
                      <button class="btn-search" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
              </div>
            </div>
            
            <!-- End Search --> 
          </div>
          <!-- top cart -->
          
          <div class="col-lg-3 col-xs-3 top-cart">
            <div class="top-cart-contain">
              <div class="mini-cart">
                <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"> <a href="#">
                  <div class="cart-icon"><i class="fa fa-shopping-cart"></i></div>
                  <div class="shoppingcart-inner hidden-xs"><span class="cart-title">Giỏ hàng</span> <span class="cart-total">4 Item(s): $520.00</span></div>
                  </a></div>
                <div>
                  <div class="top-cart-content">
                    <div class="block-subtitle hidden-xs">Recently added item(s)</div>
                    <ul id="cart-sidebar" class="mini-products-list">
                      <li class="item odd"> <a href="shopping_cart.html" title="Ipsums Dolors Untra" class="product-image"><img src="products/img07.jpg" alt="Lorem ipsum dolor" width="65"></a>
                        <div class="product-details"> <a href="#" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a>
                          <p class="product-name"><a href="shopping_cart.html">Lorem ipsum dolor sit amet Consectetur</a> </p>
                          <strong>1</strong> x <span class="price">$20.00</span> </div>
                      </li>
                      <li class="item even"> <a href="shopping_cart.html" title="Ipsums Dolors Untra" class="product-image"><img src="products/img11.jpg" alt="Lorem ipsum dolor" width="65"></a>
                        <div class="product-details"> <a href="#" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a>
                          <p class="product-name"><a href="shopping_cart.html">Consectetur utes anet adipisicing elit</a> </p>
                          <strong>1</strong> x <span class="price">$230.00</span> </div>
                      </li>
                      <li class="item last odd"> <a href="shopping_cart.html" title="Ipsums Dolors Untra" class="product-image"><img src="products/img10.jpg" alt="Lorem ipsum dolor" width="65"></a>
                        <div class="product-details"> <a href="#" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a>
                          <p class="product-name"><a href="shopping_cart.html">Sed do eiusmod tempor incidist</a> </p>
                          <strong>2</strong> x <span class="price">$420.00</span> </div>
                      </li>
                    </ul>
                    <div class="top-subtotal">Subtotal: <span class="price">$520.00</span></div>
                    <div class="actions">
                      <button class="btn-checkout" type="button"><i class="fa fa-check"></i><span>Checkout</span></button>
                      <button class="view-cart" type="button"><i class="fa fa-shopping-cart"></i> <span>View Cart</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- end header --><!-- Navbar -->
  <nav>
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-4">
          <div class="mm-toggle-wrap">
            <div class="mm-toggle"> <i class="fa fa-align-justify"></i> </div>
            <span class="mm-label">Danh mục</span> </div>
          <div class="mega-container visible-lg visible-md visible-sm">
            <div class="navleft-container">
              <div class="mega-menu-title">
                <h3>Danh mục</h3>
              </div>
              <div class="mega-menu-category">
                <ul class="nav">
                  <?php $__currentLoopData = $parent_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li> <a href="#"><i class="icon fa fa-camera fa-fw"></i> <?php echo e($parent->name); ?></a>
                   
                        <div class="wrap-popup">
                      <div class="popup">
                        <div class="row">
                          <div class="col-md-3 col-sm-6">
                            <ul class="nav">
                               <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($category->parent == $parent->id): ?>
                              <li><a href="<?php echo e(route('san-pham-danh-muc',['category_id' => $category->id])); ?>"><span><?php echo e($category->name); ?></span></a></li>
                              <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                      
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-sm-8">
          <div class="mtmegamenu">
            <ul>
              <li class="mt-root demo_custom_link_cms">
                <div class="mt-root-item"><a href="<?php echo e(route('home')); ?>">
                  <div class="title title_font"><span class="title-text">Trang chủ</span></div>
                  </a></div>
              
              </li>
              <li class="mt-root">
                <div class="mt-root-item"><a href="#">
                  <div class="title title_font"><span class="title-text">Thương hiệu</span></div>
                  </a></div>
                <ul class="menu-items col-xs-4">
                  <li class="menu-item depth-1 menucol-1-3 ">
                    <ul class="submenu">
                      <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li class="menu-item">
                        <div class="title"> <a href="<?php echo e(route('san-pham-thuong-hieu',['brand_id' => $brand->id])); ?>"> <?php echo e($brand->name); ?></a></div>
                      </li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="mt-root">
                <div class="mt-root-item"><a href="shop_grid.html">
                  <div class="title title_font"><span class="title-text">Liên hệ</span> </div>
                  </a></div>
              </li>
              <li class="mt-root">
                <div class="mt-root-item"><a href="about_us.html">
                  <div class="title title_font"><span class="title-text">Các chức năng</span></div>
                  </a></div>
              </li>
              <li class="mt-root demo_custom_link_cms">
                <div class="mt-root-item"><a href="blog.html">
                  <div class="title title_font"><span class="title-text">Blog</span></div>
                  </a></div>
          
              </li>
              <li class="mt-root">
                <div class="mt-root-item">
                  <div class="title title_font"><span class="title-text">Hots</span></div>
                </div>
                <ul class="menu-items col-xs-12">
                  <li class="menu-item depth-1 product menucol-1-3 withimage">
                    <div class="product-item">
                      <div class="item-inner">
                        <div class="product-thumbnail">
                          <div class="icon-sale-label sale-left">Sale</div>
                          <div class="pr-img-area"> <a title="Ipsums Dolors Untra" href="single_product.html">
                            <figure> <img class="first-img" src="products/img06.jpg" alt=""> <img class="hover-img" src="products/img06.jpg" alt=""></figure>
                            </a>
                            <button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span> Thêm vào giỏ hàng</span> </button>
                          </div>
                          <div class="pr-info-area">
                            <div class="pr-button">
                              <div class="mt-button add_to_wishlist"> <a href="wishlist.html"> <i class="fa fa-heart"></i> </a> </div>
                              <div class="mt-button add_to_compare"> <a href="compare.html"> <i class="fa fa-signal"></i> </a> </div>
                              <div class="mt-button quick-view"> <a href="quick_view.html"> <i class="fa fa-search"></i> </a> </div>
                            </div>
                          </div>
                        </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a> </div>
                            <div class="item-content">
                              <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                              <div class="item-price">
                                <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span> </span> </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="menu-item depth-1 product menucol-1-3 withimage">
                    <div class="product-item">
                      <div class="item-inner">
                        <div class="product-thumbnail">
                          <div class="icon-sale-label sale-left">Sale</div>
                          <div class="pr-img-area"> <a title="Ipsums Dolors Untra" href="single_product.html">
                            <figure> <img class="first-img" src="products/img02.jpg" alt=""> <img class="hover-img" src="products/img02.jpg" alt=""></figure>
                            </a>
                            <button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span> Thêm vào giỏ hàng</span> </button>
                          </div>
                          <div class="pr-info-area">
                            <div class="pr-button">
                              <div class="mt-button add_to_wishlist"> <a href="wishlist.html"> <i class="fa fa-heart"></i> </a> </div>
                              <div class="mt-button add_to_compare"> <a href="compare.html"> <i class="fa fa-signal"></i> </a> </div>
                              <div class="mt-button quick-view"> <a href="quick_view.html"> <i class="fa fa-search"></i> </a> </div>
                            </div>
                          </div>
                        </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a> </div>
                            <div class="item-content">
                              <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                              <div class="item-price">
                                <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span> </span> </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="menu-item depth-1 product menucol-1-3 withimage">
                    <div class="product-item">
                      <div class="item-inner">
                        <div class="icon-sale-label sale-left">Sale</div>
                        <div class="icon-new-label new-right">New</div>
                        <div class="product-thumbnail">
                          <div class="icon-sale-label sale-left">Sale</div>
                          <div class="pr-img-area"> <a title="Ipsums Dolors Untra" href="single_product.html">
                            <figure> <img class="first-img" src="products/img03.jpg" alt=""> <img class="hover-img" src="products/img03.jpg" alt=""></figure>
                            </a>
                            <button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span> Thêm vào giỏ hàng</span> </button>
                          </div>
                          <div class="pr-info-area">
                            <div class="pr-button">
                              <div class="mt-button add_to_wishlist"> <a href="wishlist.html"> <i class="fa fa-heart"></i> </a> </div>
                              <div class="mt-button add_to_compare"> <a href="compare.html"> <i class="fa fa-signal"></i> </a> </div>
                              <div class="mt-button quick-view"> <a href="quick_view.html"> <i class="fa fa-search"></i> </a> </div>
                            </div>
                          </div>
                        </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a> </div>
                            <div class="item-content">
                              <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                              <div class="item-price">
                                <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span> </span> </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <!-- end nav --> 
  <!-- Breadcrumbs --> 
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="index-2.html">Home</a><span>&raquo;</span></li>
            <li class=""> <a title="Go to Home Page" href="shop_grid.html">Computers</a><span>&raquo;</span></li>
            <li><strong>Apple</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
 
  <!-- Main Container -->
  <?php echo $__env->yieldContent('main'); ?>
  <!-- Main Container End --> 
  <!-- Footer -->
  
  <footer>
    <div class="footer-newsletter">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-7">
            <form id="newsletter-validate-detail" method="post" action="#">
              <h3 class="hidden-sm">Sign up for newsletter</h3>
              <div class="newsletter-inner">
                <input class="newsletter-email" name='Email' placeholder='Enter Your Email'/>
                <button class="button subscribe" type="submit" title="Subscribe">Subscribe</button>
              </div>
            </form>
          </div>
          <div class="social col-md-4 col-sm-5">
            <ul class="inline-mode">
              <li class="social-network fb"><a title="Connect us on Facebook" target="_blank" href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
              <li class="social-network googleplus"><a title="Connect us on Google+" target="_blank" href="https://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
              <li class="social-network tw"><a title="Connect us on Twitter" target="_blank" href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
              <li class="social-network linkedin"><a title="Connect us on Linkedin" target="_blank" href="https://www.pinterest.com/"><i class="fa fa-linkedin"></i></a></li>
              <li class="social-network rss"><a title="Connect us on Instagram" target="_blank" href="https://instagram.com/"><i class="fa fa-rss"></i></a></li>
              <li class="social-network instagram"><a title="Connect us on Instagram" target="_blank" href="https://instagram.com/"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-4 col-xs-12 col-lg-3">
          <div class="footer-logo"><a href="index-2.html"><img src="<?php echo e(asset('uploads/footer-logo.png')); ?>" alt="fotter logo"></a> </div>
          <p>Lorem Ipsum is simply dummy text of the print and typesetting industry.</p>
          <div class="footer-content">
            <div class="email"> <i class="fa fa-envelope"></i>
              <p>Support@themes.com</p>
            </div>
            <div class="phone"> <i class="fa fa-phone"></i>
              <p>(800) 0123 456 789</p>
            </div>
            <div class="address"> <i class="fa fa-map-marker"></i>
              <p> My Company, 12/34 - West 21st Street, New York, USA</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-xs-12 col-lg-3 collapsed-block">
          <div class="footer-links">
            <h3 class="links-title">Danh mục<a class="expander visible-xs" href="#TabBlock-1">+</a></h3>
            <div class="tabBlock" id="TabBlock-1">
              <ul class="list-links list-unstyled">
                <?php $__currentLoopData = $parent_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(route('san-pham-danh-muc',['category_id' => $parent->id])); ?>"><?php echo e($parent->name); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-xs-12 col-lg-3 collapsed-block">
          <div class="footer-links">
            <h3 class="links-title">Thương hiệu<a class="expander visible-xs" href="#TabBlock-3">+</a></h3>
            <div class="tabBlock" id="TabBlock-3">
              <ul class="list-links list-unstyled">
                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li> <a href="<?php echo e(route('san-pham-thuong-hieu',['brand_id' => $brand->id])); ?>"><?php echo e($brand->name); ?></a> </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-2 col-xs-12 col-lg-3 collapsed-block">
          <div class="footer-links">
            <h3 class="links-title">Dịch vụ<a class="expander visible-xs" href="#TabBlock-4">+</a></h3>
            <div class="tabBlock" id="TabBlock-4">
              <ul class="list-links list-unstyled">
                <li> <a href="account_page.html">Giỏi hàng của bạn</a> </li>
                <li> <a href="wishlist.html">Lịch sử mua hàng</a> </li>
                <li> <a href="shopping_cart.html">Các tiện ích</a> </li>
                <li> <a href="#">Phương thức thanh toán</a> </li>
                <li> <a href="#">Phương thức giao hàng</a> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-coppyright">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-xs-12 coppyright"> </div>
          <div class="col-sm-6 col-xs-12">
            <div class="payment">
              <ul>
                <li><a href="#"><img title="Visa" alt="Visa" src="<?php echo e(asset('visa.png')); ?>"></a></li>
                <li><a href="#"><img title="Paypal" alt="Paypal" src="<?php echo e(asset('uploads/paypal.png')); ?>"></a></li>
                <li><a href="#"><img title="Discover" alt="Discover" src="<?php echo e(asset('uploads/discover.png')); ?>"></a></li>
                <li><a href="#"><img title="Master Card" alt="Master Card" src="<?php echo e(asset('uploads/master-card.png')); ?>"></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <a href="#" class="totop"> </a> </div>
 


<!-- End Footer --> 
<!-- JS --> 

<!-- jquery js --> 
<script type="text/javascript" src="<?php echo e(asset('public/js/display/jquery.min.js')); ?>"></script> 

<!-- bootstrap js --> 
<script type="text/javascript" src="<?php echo e(asset('public/js/display/bootstrap.min.js')); ?>"></script> 

<!-- owl.carousel.min js --> 
<script type="text/javascript" src="<?php echo e(asset('public/js/display/owl.carousel.min.js')); ?>"></script> 

<!-- bxslider js --> 
<script type="text/javascript" src="<?php echo e(asset('public/js/display/jquery.bxslider.js')); ?>"></script> 


<!-- megamenu js --> 
<script type="text/javascript" src="<?php echo e(asset('public/js/display/megamenu.js')); ?>"></script> 
<script type="text/javascript">
        /* <![CDATA[ */   
        var mega_menu = '0';
        
        /* ]]> */
        </script> 

<!-- jquery.mobile-menu js --> 
<script type="text/javascript" src="<?php echo e(asset('public/js/display/mobile-menu.js')); ?>"></script> 


<!--jquery-ui.min js --> 
<script type="text/javascript" src="<?php echo e(asset('public/js/display/jquery-ui.js')); ?>"></script> 

<!-- main js --> 
<script type="text/javascript" src="<?php echo e(asset('public/js/display/main.js')); ?>"></script>
</body>

<!-- Mirrored from htmlmystore.justthemevalley.com/shop_grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 May 2018 18:39:45 GMT -->
</html>
