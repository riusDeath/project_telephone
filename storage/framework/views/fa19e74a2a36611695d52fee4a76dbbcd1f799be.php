<!-- Main Container -->
<?php $__env->startSection('link'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/css/my.css')); ?>">                                  
<?php $__env->stopSection(); ?>
<div class="main-container col2-left-layout">
    <div class="container">
        <div class="row">
        <div class="col-main col-sm-9 col-xs-12 col-sm-push-3">
            <div class="category-description std">
                <div class="slider-items-products">
                    <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col1 owl-carousel owl-theme"> 
                        <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item"> 
                            <a href=""><img alt="" src="<?php echo e(asset('uploads/'.$slide->link)); ?>"></a>
                            <div class="inner-info">
                                <div class="cat-img-title">
                                    <span>Our new range of</span>
                                    <h2 class="cat-heading"><strong>Smartphone</strong></h2>
                                    <p><?php echo e($slide->content); ?></p>
                                    <a class="info" href="<?php echo e(route('home')); ?>">Mua ngay</a> 
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                 </div>
            </div>     
            <div class="shop-inner">
                <div class="page-title">
                <?php if(isset($category)): ?>
                <h2>
                <?php echo e($category->name); ?>

                </h2>
                <?php endif; ?>
                </div>
                <div class="toolbar">
                    <div class="col-xs-12">
                    <h3><?php echo e(isset($mess)?$mess:''); ?></h3>           
                    </div>
                    <div class="sorter">
                        <div class="short-by">
                        <label>Sắp xếp theo giá: </label>
                        <select  class="mysortok" duong-dan="<?php echo e(url('/')); ?>/san-pham/sap-xep-san-pham/" width="auto">
                            <option selected="selected" value="" > Tiêu chí</option>
                            <option  value="ASC" >Thấp lên cao</option>
                            <option value="DESC" >Cao xuống thấp</option>
                        </select>
                        </div> 
                    </div>
                </div>
                <div id="product-grid">
                    <div class="product-grid-area">
                        <ul class="products-grid">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                            <div class="product-item">
                                <div class="item-inner">
                                    <div class="product-thumbnail">
                                        <div class="icon-sale-label sale-left">Sale</div>
                                        <div class="icon-new-label new-right">New</div>
                                        <div class="pr-img-area"> 
                                            <a title="Ipsums Dolors Untra" href="<?php echo e(route('home-chi-tiet-san-pham',['id' => $product->id])); ?>">
                                            <div> 
                                                <img class="first-img" src="<?php echo e(asset('uploads/'.$product->image)); ?>" alt=""> 
                                                <img class="hover-img" src="<?php echo e(asset('uploads/'.$product->image)); ?>" alt="">
                                            </div>
                                            </a>
                                            <?php if(Auth::check()): ?>
                                            <span>
                                                <a class="add-to-cart-mt"  href="<?php echo e(route('home-them-gio-hang',['id' => $product->id])); ?>" >
                                                <i class="fa fa-shopping-cart"> </i>Thêm vào giỏ hàng</a>
                                            </span>   
                                            <?php endif; ?>                                  
                                        </div>
                                    <div class="pr-info-area">
                                <div class="pr-button">
                                    <div class="mt-button add_to_wishlist"> <a href=""> <i class="fa fa-heart"></i> </a> </div>
                                    <div class="mt-button add_to_compare"> <a href=""> <i class="fa fa-signal"></i> </a> </div>
                                    <div class="mt-button quick-view"> <a href=""> <i class="fa fa-search"></i> </a> </div>
                                </div>
                                </div>
                                </div>
                                <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"> 
                                        <a title="Ipsums Dolors Untra" href=""><?php echo e($product->name); ?> </a> 
                                    </div>
                                    <div class="item-content">
                                        <div class="rating"> 
                                            <div class="rate-star">
                                                <div class="rated-star" style="width:<?php echo e(($product->rate_avg1()!=0)?($product->rate_avg1()/5*100):0); ?>%;">&nbsp;
                                                </div>
                                                <input  type="hidden" value=" <?php echo e($product->rate_avg1()); ?>/5 rate ">
                                            </div>
                                        </div>
                                        <div class="item-price">
                                            <div class="price-box">
                                                <?php if($product->price_sale != 0): ?>
                                                <p class="special-price"> 
                                                    <span class="price-label">Special Price</span> <span class="price"> <?php echo e(number_format($product->price_sale)); ?>  VNĐ</span> 
                                                </p>
                                                <p class="old-price"> 
                                                    <span class="price-label">Regular Price:</span> <span class="price"><?php echo e(number_format($product->price)); ?>  VNĐ </span> 
                                                </p>
                                                <?php else: ?>
                                                <p class="special-price"> 
                                                    <span class="price-label">Special Price</span> <span class="price"> <?php echo e(number_format($product->price)); ?>  VNĐ  </span> 
                                                </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </div>
                             </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                           
                        </ul>
                    </div>
                    <div class="pagination-area ">
                        <?php echo e($products->links()); ?>

                    </div>
                </div>
            </div>
        </div>
        <aside class="sidebar col-sm-3 col-xs-12 col-sm-pull-9">
            <div class="block category-sidebar">
            <div class="sidebar-title">
                <h3>Categories</h3>
            </div>
            <ul class="product-categories">
                <li class="cat-item current-cat cat-parent"><a href= "">Women</a>
                    <ul class="children">
                        <li class="cat-item cat-parent">
                            <a href=""><i class="fa fa-angle-right"></i>&nbsp; Accessories</a>
                        <ul class="children">
                            <li class="cat-item"><a href=""><i class="fa fa-angle-right"></i>&nbsp; Dresses</a></li>
                            <li class="cat-item cat-parent">
                                <a href=""><i class="fa fa-angle-right"></i>&nbsp; Handbags</a>
                                <ul style="display: none;" class="children">
                                    <li class="cat-item"><a href=""><i class="fa fa-angle-right"></i>&nbsp; Beaded Handbags</a></li>
                                    <li class="cat-item"><a href=""><i class="fa fa-angle-right"></i>&nbsp; Sling bag</a></li>
                              </ul>
                            </li>
                        </ul>
                        </li>
                        <li class="cat-item cat-parent"><a href=""><i class="fa fa-angle-right"></i>&nbsp; Handbags</a>
                            <ul class="children">
                                <li class="cat-item"><a href=""><i class="fa fa-angle-right"></i>&nbsp; backpack</a></li>
                                <li class="cat-item"><a href=""><i class="fa fa-angle-right"></i>&nbsp; Beaded Handbags</a></li>
                                <li class="cat-item"><a href=""><i class="fa fa-angle-right"></i>&nbsp; Fabric Handbags</a></li>
                                <li class="cat-item"><a href=""><i class="fa fa-angle-right"></i>&nbsp; Sling bag</a></li>
                            </ul>
                       </li>
                    <li class="cat-item"><a href=""><i class="fa fa-angle-right"></i>&nbsp; Jewellery</a> </li>
                    <li class="cat-item"><a href=""><i class="fa fa-angle-right"></i>&nbsp; Swimwear</a> </li>
                    </ul>
                </li>
                <li class="cat-item cat-parent"><a href="">Men</a>
                    <ul class="children">
                        <li class="cat-item cat-parent"><a href=""><i class="fa fa-angle-right"></i>&nbsp; Dresses</a>
                            <ul class="children">
                                <li class="cat-item"><a href=""><i class="fa fa-angle-right"></i>&nbsp; Casual</a></li>
                                <li class="cat-item"><a href=""><i class="fa fa-angle-right"></i>&nbsp; Designer</a></li>
                                <li class="cat-item"><a href=""><i class="fa fa-angle-right"></i>&nbsp; Evening</a></li>
                                <li class="cat-item"><a href=""><i class="fa fa-angle-right"></i>&nbsp; Hoodies</a></li>
                            </ul>
                        </li>
                        <li class="cat-item"><a href=""><i class="fa fa-angle-right"></i>&nbsp; Jackets</a> </li>
                        <li class="cat-item"><a href=""><i class="fa fa-angle-right"></i>&nbsp; Shoes</a> </li>
                    </ul>
                </li>
                <li class="cat-item"><a href="">Electronics</a></li>
                <li class="cat-item"><a href="">Furniture</a></li>
                <li class="cat-item"><a href="">KItchen</a></li>
            </ul>
            </div>
            <div class="block shop-by-side">
            <div class="sidebar-bar-title">
                <h3>Lựa chọn</h3>
            </div>
            <div class="block-content">
                <div class="layered-Category">
                <h2 class="saider-bar-title">Danh mục</h2>
                <div class="layered-content">
                    <ul class="check-box-list">
                        <?php $__currentLoopData = $parent_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(route('san-pham-danh-muc',['category_id' => $parent->id])); ?>">
                            <label for="jtv1"> <span class="button"></span> <?php echo e($parent->name); ?> </label>
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                </div>
                <div class="manufacturer-area">
                <h2 class="saider-bar-title">Thương hiệu</h2>
                <div class="saide-bar-menu">
                    <ul>
                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(route('san-pham-thuong-hieu',['brand_id' => $brand->id])); ?>">&nbsp; 
                                <i class="fa fa-angle-right"></i><?php echo e($brand->name); ?>

                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                </div>
            </div>
        </div>
        <!-- ======== -->
        <div class="block product-price-range ">
            <div class="sidebar-bar-title">
                <h3>Giá VNĐ</h3>
            </div>
            <div class="block-content">
                <div class="slider-range">
                <form action="<?php echo route('san-pham-theo-gia'); ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo csrf_token() ?>" name='_token'>
                <div class="c2cYd1" data-spm-anchor-id="a2o4n.searchlistcategory.filter.i0.605b47feN2XWiV">
                    <div class="cnHBqi">Giá từ</div>
                <div class="c2uiAC">
                    <div class="c1vuTH">
                    <input type="number" id="price_min" min="0" class="c30Om7" placeholder="Min" value="0" pattern="[0-9]*" name="value_min">
                    <div class="c1DHiF">đến : </div>
                    <input id="price_max" type="number" min="0" class="c30Om7" placeholder="Max" value="0" pattern="[0-9]*" name="value_max">
                    <button type="submit" class="ant-btn c3R9mX ant-btn-primary ant-btn-icon-only">
                        <img src="<?php echo e(asset('uploads/icon.png')); ?>" alt="" width="20px">
                    </button>
                    </div>
                </div>
                </div>
                </form>
                </div>
            </div>
        </div>
        <!-- =========== -->
        <div class="block product-price-range ">
            <div class="sidebar-bar-title">
                <h3>Độ yêu thích</h3>
            </div>
            <div class="block-content">
                <div class="slider-range">
                <form action="<?php echo e(route('san-pham-theo-rate')); ?>" method="get" role="form">
                <!-- <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">  -->
                <div class="form-group">
                    <div class="rating">
                    <i>
                      <input type="checkbox" name="rate[]" value="5">
                    </i>
                    <i>5 start </i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
                <div class="form-group">
                    <div class="rating">
                    <i><input type="checkbox" name="rate[]" value="4"></i>
                    <i>4 start </i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                </div>
                <div class="form-group">
                    <div class="rating">
                    <i><input type="checkbox" name="rate[]" value="3"></i>
                    <i>3 start </i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                </div>
                <div class="form-group">
                    <div class="rating">
                    <i><input type="checkbox" name="rate[]" value="2"></i>
                    <i>2 start </i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                </div>
                    <div class="form-group">
                    <div class="rating">
                    <i>
                        <input type="checkbox" name="rate[]" value="1">
                    </i>
                    <i>1 start </i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                  </div>
                </div>
            <button type="submit" class="ant-btn c3R9mX ant-btn-primary ant-btn-icon-only">
                <img src="<?php echo e(asset('uploads/icon.png')); ?>" alt="" width="20px">
            </button>   
            </form>
            </div>
            </div>
        </div>
        <!-- ========== -->
        <div class="mini-cart-list">
            <?php if(Cart::count() !=0): ?>
            <div class="block sidebar-cart">
            <div class="sidebar-bar-title">
                <h3>Giỏ hàng của tôi</h3>
            </div>
            <div class="block-content">
                <p class="amount">Số lượng <a href="shopping_cart.html"><?php echo e(Cart::count()); ?></a> sản phẩm.</p>
                <ul>
                    <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="item"> 
                        <a href="" title="Sample Product" class="product-image">
                            <div class="col-md-5">
                            <img src="<?php echo e(asset('uploads/'.$cart->options['image'])); ?>" alt="Sample Product " width="50px">
                            </div>
                        </a>
                        <div class="col-md-7">                
                        <p class="product-name"> 
                            <a href="shopping_cart.html"><?php echo e($cart->name); ?></a> 
                        </p>
                        <strong><?php echo e($cart->qty); ?></strong> x <span class="price"><?php echo e(number_format($cart->price)); ?></span> 
                        <div class="access"> 
                            <a href="<?php echo e(route('xoa-san-pham-gio-hang',['rowId' => $cart->rowId])); ?>" title="Xóa sản phẩm ra khỏi giỏ hàng" class="" onclick="confirm('Bạn muốn xóa sản phẩm <?php echo e($cart->name); ?> ra khỏi giỏ hàng?')">
                                <i class="fa fa-trash-o">Xóa</i>
                            </a>
                        </div>
                        </div> 
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <div class="summary">
                        <p class="subtotal"> 
                            <span class="label">Tổng:</span> <span class="price"><?php echo e(Cart::subtotal()); ?></span> 
                        </p>
                    </div>
                    <div class="cart-checkout">
                        <a class="view-cart" href="<?php echo e(route('xem-don-hang')); ?>">
                            <i class="fa fa-shopping-cart"></i> <span>Xem đơn hàng</span>
                        </a>
                        <a class="button button-checkout" title="Submit" href="<?php echo e(route('thanh-toan')); ?>">
                            <i class="fa fa-check"></i> <span>Thanh toán</span>
                        </a>
                    </div>
                </div>
                </div>
            <?php endif; ?>
            </div>           
            <div class="single-img-add sidebar-add-slider ">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>              
              <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                <div class="item active"> <img src="<?php echo e(asset('uploads/add-slide1.jpg')); ?>" alt="slide1">
                    <div class="carousel-caption">
                        <h3><a href="single_product.html" title=" Sample Product">Sale Up to 50% off</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <a href="#" class="info">shopping Now</a>
                    </div>
                </div>
                <div class="item"> 
                    <img src="<?php echo e(asset('uploads/add-slide2.jpg')); ?>" alt="slide2">
                    <div class="carousel-caption">
                    <h3><a href="" title=" Sample Product">Smartwatch Collection</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <a href="#" class="info">All Collection</a> </div>
                </div>
                <div class="item"> 
                    <img src="<?php echo e(asset('uploads/add-slide3.jpg')); ?>" alt="slide3">
                    <div class="carousel-caption">
                    <h3><a href="" title=" Sample Product">Summer Sale</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                </div>             
              <!-- Controls --> 
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> 
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 
                    <span class="sr-only">Previous</span> 
                </a> 
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> 
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> 
                    <span class="sr-only">Next</span> 
                </a> 
                </div>
            </div>
        </aside>
        </div>
    </div>
</div>

<?php $__env->startSection('script'); ?>
  
  <script type="text/javascript" >
     $(document).ready(function(){
        $(document).on('click', '.add-to-cart-mt', function(e){
            e.preventDefault();
            var add = confirm('Bạn muốn thêm sản phẩm vào giỏ hàng ');
            if (add) {
                var href = $(this).attr('href');
                $.ajax({
                    url: href,
                    type: 'GET',
                    dataType: 'json',
                    success:function(data){
                        $('.mini-cart-list').load(location.href + " .mini-cart-list>*");
                        $('#mini-cart-list1').load(location.href + " #mini-cart-list1>*");
                    }
                });
            }     
        });  
}) ;
    $(document).ready(function(){
    $('.mysortok').change(function(e){
        e.preventDefault();
        var sort = $(this).val();
        var href =  $(this).attr('duong-dan')+sort;
        console.log(sort);
        $.ajax({
            url: href,
            type : "GET",
            dataType:'json',
            success:function(data){
                console.log(data);
                var temp = "";
                $.each(data.products, function(index, value) {
                    // temp+= '<li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 ">'+value.description+'</li>'; 
                temp += '<li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 "><div class="product-item"><div class="item-inner"><div class="product-thumbnail"><div class="icon-sale-label sale-left">Sale</div><div class="icon-new-label new-right">New</div><div class="pr-img-area"><a title="Ipsums Dolors Untra" href="<?php echo e(url('/')); ?>/san-pham/chi-tiet-san-pham/'+value.id+'"><div> <img class="first-img" src="<?php echo e(url('/')); ?>/uploads/'+value.image+' "><img class="hover-img" src="<?php echo e(url('/')); ?>/uploads/'+value.image+' "></div> </a><span><a class="add-to-cart-mt " data-toggle="modal" href="#modal-id"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a></span> </a> </a><span><a class="add-to-cart-mt " data-toggle="modal" href="#modal-id"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a></span> </a></div><div class="pr-info-area"><div class="pr-button"><div class="mt-button add_to_wishlist"> <a href=""> <i class="fa fa-heart"></i> </a> </div><div class="mt-button add_to_compare"> <a href=""> <i class="fa fa-signal"></i> </a> </div><div class="mt-button quick-view"> <a href=""> <i class="fa fa-search"></i> </a> </div></div></div></div><div class="item-info"><div class="info-inner"><div class="item-title"> <a title="Ipsums Dolors Untra" href="">'+value.name+'</a> </div><div class="item-content"><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div><div class="item-price"><div class="price-box"><span class="regular-price"> <div class="item-price"><div class="price-box"> <span class="regular-price"> <span class="price">'+value.price+' VNĐ</span> </span> </div></div></div></div> </div></div></div></li>';                                      
                                });
                        $('.products-grid').html(temp);
                    },error:function(res){
                        alert("loi");
                }
        });
    });

    }); 
  </script>
<?php $__env->stopSection(); ?>
  