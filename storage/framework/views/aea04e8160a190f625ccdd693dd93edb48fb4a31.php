 


<?php $__env->startSection('main'); ?>
   <!-- Main Container -->
<?php $__env->startSection('link'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/css/my.css')); ?>">                                  
<?php $__env->stopSection(); ?>
<?php if(count($errors) >0): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
    <script type="text/javascript">
        alert(<?php echo e($err); ?> );
    </script>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<div class="main-container col1-layout">
    <div class="container">
        <div class="row">
        <div class="col-main">
            <div class="product-view-area">
            <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
                <div class="icon-sale-label sale-left">Sale</div>
                <div class="large-image"> 
                    <a href="<?php echo e(asset('uploads/'.$product->image)); ?>" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> 
                        <img class="zoom-img" src="<?php echo e(asset('uploads/'.$product->image)); ?>" alt="products " width="500px"> 
                    </a> 
                </div>
                <div class="flexslider flexslider-thumb">
                <ul class="previews-list slides">
   <!--                   <li><a href="<?php echo e(asset('uploads/img01.jpg')); ?>" class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'img01.jpg' "><img src="<?php echo e(asset('uploads/img01.jpg')); ?>" alt = "Thumbnail 2"/></a></li>
               <li><a href="<?php echo e(asset('uploads/img07.jpg')); ?>" class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'img07.jpg' "><img src="<?php echo e(asset('uploads/img07.jpg')); ?>" alt = "Thumbnail 1"/></a></li>
                  <li><a href="<?php echo e(asset('uploads/img02.jpg')); ?>" class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'img02.jpg' "><img src="<?php echo e(asset('uploads/img02.jpg')); ?>" alt = "Thumbnail 1"/></a></li>
                  <li><a href="<?php echo e(asset('uploads/img03.jpg')); ?>" class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'img03.jpg' "><img src="<?php echo e(asset('uploads/img03.jpg')); ?>" alt = "Thumbnail 2"/></a></li>
                  <li><a href="<?php echo e(asset('uploads/img04.jpg')); ?>" class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'img04.jpg' "><img src="<?php echo e(asset('uploads/img04.jpg')); ?>" alt = "Thumbnail 2"/></a></li> -->
                </ul>
                </div>
              
              <!-- end: more-images --> 
              
            </div>
            <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">
         
                <div class="product-name">
                    <h1><?php echo e($product->name); ?></h1>
                </div>
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
                <h1></h1>
                <div class="ratings">
                    <div class="rating">                        
                        <div class="rate-star">
                            <div class="rated-star" style="width:<?php echo e(($product->rate_avg1()!=0)?($product->rate_avg1()/5*100):0); ?>%;">&nbsp;
                            </div>
                        </div>
                    </div>                  
                    <p class="availability in-stock pull-right">Tình trạng: 
                        <span><?php echo e(($product->total>=1)?'Còn '.$product->total.' sản phẩm':'Hết hàng'); ?></span>
                    </p>
                </div>
                <div class="short-description">
                    <h2>Thông tin sơ lược</h2>
                    <p>                   
                    <?php echo $product->description; ?> 
                    </p>
                    <h4>Thời gian bảo hành</h4>
                    <p><?php echo e($product->warranty_period->time); ?> <?php echo e($product->warranty_period->type); ?></p>
                    <h4>
                    Thông số kỹ thuật: 
                    </h4>                
                </div>
                    <form action="<?php echo e(route('them-gio-hang',['id' => $product->id])); ?>" method="post">
                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="product-color">
                    <div class="color-area">                    
                    <h2 class="saider-bar-title"><?php echo e($type->types); ?></h2>
                    <div class="color">
                        <ul>
                            <?php $__currentLoopData = $product->attribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $atribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($atribute->types == $type->types): ?>
                            <li>
                              <!-- <input type="radio" name="<?php echo e($type->types); ?>" value="<?php echo e($atribute->name); ?>">  -->
                              <?php echo e($atribute->name); ?>  <?php echo e($atribute->value); ?>

                            </li>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    </div>                
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="product-variation">                
                    <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">  
                    <?php if($product->total >0): ?>                
                    <div class="cart-plus-minus">
                        <label for="qty">Số lượng: </label>
                        <div class="numbers-row">
                        <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="dec qtybutton">
                            <i class="fa fa-minus">&nbsp;</i>
                        </div>
                        <input type="number" class="qty" title="Qty" min="1" value="1" maxlength="12" id="qty" name="total" max="<?php echo e($product->total); ?>">
                        <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="inc qtybutton"
                        ><i class="fa fa-plus">&nbsp;</i>
                        </div>
                        </div>
                    </div>
                    <button class="button pro-add-to-cart" title="Add to Cart" type="submit">
                        <span><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</span>
                    </button>
                    <?php endif; ?>
                    </form>
                </div>
                <div class="product-cart-option">
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i><span>Add to Wishlist</span></a></li>
                        <li><a href="#"><i class="fa fa-retweet"></i><span>Add to Compare</span></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i><span>Email to a Friend</span></a></li>
                    </ul>            
                </div>
            </div>
            </div>
        </div>
        <div class="product-overview-tab">
            <div class="container">
            <div class="row">
                <div class="col-xs-12"><div class="product-tab-inner"> 
                <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                    <li class="active"> 
                        <a href="#description" data-toggle="tab"> Mô tả sản phẩm </a>
                    </li>                
                    <li> <a href="#reviews" data-toggle="tab">Reviews</a> </li>
                    <li><a href="#product_tags" data-toggle="tab">Comment</a></li>
                </ul>
                <div id="productTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="description">
                    <div class="std">
                        <p><?php echo $product->description; ?></p>
                    </div>
                    </div>                 
                    <div id="reviews" class="tab-pane fade">
                <div class="col-sm-5 col-lg-5 col-md-5 rate_table">
                    <div class="reviews-content-left">
                    <?php if(Auth::check()): ?>
                    <h2> <?php echo e($rate_total); ?> đánh giá <?php echo e($product->name); ?></h2>
                    <?php else: ?> 
                    Bạn cần đăng nhập để tương tác nhiểu hơn!
                    <?php endif; ?>
                    <div class="review-ratting">
                    <div class="rating">
                        <h1 class="ajax_rate_avg"><?php echo e((float)$product->rate_avg1()); ?> <i class="fa fa-star"></i></h1> 
                    </div>
                    <p><a href="#">Tuyệt vời</a></p>
                    <table>
                        <tbody>
                        <tr>
                        <td>
                            <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i><?php echo e($rate_five); ?> đánh giá</i>
                            </div>
                        </td>
                        </tr>
                        <tr>
                        <td>
                            <div class="rating">
                            <i class="fa fa-star"></i> 
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> 
                            <i class="fa fa-star"></i> 
                            <i class="fa fa-star-o"></i> 
                            <i><?php echo e($rate_four); ?> đánh giá</i>
                            </div>
                        </td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                    <div class="review-ratting">
                    <p><a href="#">Tốt</a> </p>
                    <table>
                      <tbody>
                        <tr>
                        <td>
                            <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i><?php echo e($rate_three); ?> đánh giá</i>
                            </div>
                        </td>
                        </tr>
                        <tr>
                        <td>
                            <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i><?php echo e($rate_tow); ?> đánh giá</i>
                          </div>
                        </td>
                      </tr> 
                    </tbody></table>
                    </div>
                        <div class="review-ratting">
                    <p><a href="#">Bình thường</a></p>
                    <table>
                        <tbody>
                        <tr>
                        <td>
                            <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i><?php echo e($rate_one); ?> đánh giá</i>
                          </div>
                        </td>
                        </tr>
                        </tbody>
                    </table>
                    </div>                                      
                  </div>
                </div>
                <div class="col-sm-7 col-lg-7 col-md-7">
                    <div class="reviews-content-right">
                    <form method="post" action="" >
                        <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
                        <input type="hidden" value="<?php echo e($product->id); ?>" name="product_id">
                        <?php if(isset($user_login)): ?>
                            <input type="hidden" value="<?php echo e($user_login->id); ?>" name="user_id">
                        <?php endif; ?>
                        <h3>Hãy đánh gí sản phẩm:  </h3>
                        <h4>Bạn cảm thấy sản phẩm ở mức độ nào ?<em>*</em></h4>
                        <div class="table-responsive reviews-table">
                        <table>
                            <tbody>
                            <tr>
                                <th></th>
                                <th>1 star</th>
                                <th>2 stars</th>
                                <th>3 stars</th>
                                <th>4 stars</th>
                                <th>5 stars</th>
                            </tr>
                            <tr>
                                <td>Số stars</td>
                                <td><input type="radio" name="rate" value="1"></td>
                                <td><input type="radio" name="rate" value="2"></td>
                                <td><input type="radio" name="rate" value="3"></td>
                                <td><input type="radio" name="rate" value="4"></td>
                                <td><input type="radio" name="rate" value="5" ></td>
                            </tr>                        
                            </tbody>
                          </table>
                        </div>
                        <div class="buttons-set">
                            <?php if(Auth::check()): ?>
                            <button class="button  btn_rate" title="Submit Review" type="submit" href="<?php echo e(route('add-rate',['id' => $product->id ])); ?>">
                            <span><i class="fa fa-thumbs-up"></i> &nbsp;Đánh giá</span>                           
                            </button>
                            <?php else: ?> 
                            <a href="<?php echo e(route('dang-nhap')); ?>">
                                Bạn cần đăng nhập để tương tác nhiểu hơn!                               
                            </a>
                            <?php endif; ?>
                        </div>
                        </div>
                    </form> 
                    </div>
                </div>
                </div>              
                <div class="tab-pane fade" id="product_tags">
                <div class="box-collateral box-tags">
                    <div class="tags">
                    <form id="" action="<?php echo e(route('add-comment',['id' => $product->id])); ?>" method="post">
                        <div class="form-add-tags">
                            <div class="input-box">
                                <label for="productTagName"> </label>
                               
                                <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
                                <h4>Viết bình luận....</h4>
                                <?php if(isset($user_login)): ?>
                                <div class="form-group">
                                    <textarea placeholder="Đặt câu hỏi tại đây (tối thiểu 10 ký tự)" rows="5" maxlength="300" type="text" height="100%" data-id="<?php echo e($product->id); ?>" name="comment" style="border-radius: 20px" class="form-control"></textarea>
                                </div>
                                <input type="hidden" value="<?php echo e($product->id); ?>" name="product_id">
                                
                                <input type="hidden" value="<?php echo e($user_login->id); ?>" name="user_id">
                                <?php endif; ?>
                                <?php if(Auth::check()): ?>
                                <button type="submit" class="next-btn next-btn-primary next-btn-medium qna-ask-btn" class="btn_comment">Comment</button>
                                <?php else: ?>
                                <a href="<?php echo e(route('dang-nhap')); ?>">
                                Bạn cần đăng nhập để tương tác nhiểu hơn!                               
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div>
                            <span class="lazada lazada-noReview lazada-icon qna-empty-icon"></span>
                            <div class="qna-empty-text">Hãy đặt câu hỏi hoặc bình luận về sản phẩm.</div>
                            <div class="qna-ask-box-tips">
                            Câu hỏi của bạn không được chứa thông tin liên hệ như email, điện thoại hoặc liên kết web bên ngoài. 
                            </div>
                        </div>
                       
                    </form>
                     <div class="show-comment">
                        <h3>Bảng bình luận</h3>
                             <?php $__currentLoopData = $product->comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img src="https://www.gravatar.com/avatar/<?php echo e(md5($comment->user->email)); ?>?s=30" class="user-image" alt="User Image">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo e($comment->user->name); ?></h4>
                                    <p><?php echo e($comment->comment); ?></p>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        </div>
    </div>
    </div>
</div>

<!-- Main Container End -->
<!-- Related Product Slider -->
  
<div class="container">
<div class="row">
<div class="col-xs-12">
<div class="related-product-area">       
    <div class="page-header">
        <h2>Sản phẩm cùng loại <?php echo e($product->category->name); ?></h2>
        </div>
        <div class="related-products-pro">
                <div class="slider-items-products">
                    <div id="related-product-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4 fadeInUp">
                    <!-- ========= products========== -->
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="product-grid-area">
                    <ul class="products-grid">
                    <li class="item ">
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
                            <div class="modal fade" id="modal-id">
                            <div class="modal-dialog" >
                            <div class="modal-content">
                            <div class="modal-body">
                                <form action="<?php echo e(route('them-gio-hang',['id' => $product->id])); ?>" method="post" role="form">        
                                    <input type="hidden" value="<?php echo csrf_token() ?>" name="_token">                          
                                    <div class="col-md-6">
                                        <h3><?php echo e($product->name); ?></h3>
                                        <div class="col-md-6">
                                            <a href="<?php echo e(route('home-chi-tiet-san-pham',['id' => $product->id])); ?>">
                                                <img src="<?php echo e(asset('uploads/'.$product->image)); ?>" alt="" width="200px">
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="price-box">
                                            <?php if($product->price_sale != 0): ?>
                                            <p class="special-price"> 
                                                <span class="price-label">Giá sale:</span> 
                                                <span class="price"> <?php echo e(number_format($product->price_sale)); ?>  VNĐ</span> 
                                            </p>
                                            <p class="old-price"> 
                                                <span class="price-label">Giá gốc:</span> 
                                                <span class="price"><?php echo e(number_format($product->price)); ?>  VNĐ </span> 
                                            </p>
                                            <?php else: ?>
                                            <p class="special-price"> 
                                                <span class="price-label">Giá: </span> 
                                                <span class="price"> <?php echo e(number_format($product->price)); ?>  VNĐ  </span> 
                                            </p>
                                            <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3>Thêm vào giỏ hàng của bạn</h3>
                                        <p>Số lượng: 
                                        <input type="number" id="price_min" min="0" class="c30Om7" placeholder="Số lượng" value="1" pattern="[0-9]*" name="total" max="<?php echo e($product->total); ?>">
                                        </p>
                                    </div>
                                    <button type="submit" class="label label-danger">Mua ngay</button>
                                </form>
                            </div>
                            </div>
                            </div>
                            </div>
                            <span><a class="add-to-cart-mt " data-toggle="modal" href='#modal-id'>
                                <i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                            </span> 
                            </a>
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
                            <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html"><?php echo e($product->name); ?> </a> </div>
                            <div class="item-content">
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                                <div class="price-box"> 
                                    <span class="regular-price"> 
                                    <span class="price"><?php echo e($product->price_sale==0?number_format($product->price):number_format($product->price_sale)); ?> VND</span> 
                                    </span> 
                                </div>
                            </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </li>
                </ul>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                           

            <!-- <div class="pagination-area ">
              <?php echo e($products->links()); ?>

            </div> -->
            <!-- ====== -->
            </div>
            </div>
            </div>
            </div>        
            </div>
        </div>
    </div>
</div>
<!-- Related Product Slider End --> 
<!-- Upsell Product Slider -->
<section class="upsell-product-area">
<div class="container">
<div class="row">
<div class="col-xs-12">         
<div class="page-header">
    <h2>Sản phẩm cùng hãng <?php echo e($product->brand->name); ?></h2>
</div>
<div class="slider-items-products">
    <div id="upsell-product-slider" class="product-flexslider hidden-buttons">
        <div class="slider-items slider-width-col4">
        <?php $__currentLoopData = $product_brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="product-grid-area">
                <ul class="products-grid">
                <li class="item ">
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
                            <div class="modal fade" id="modal-id">
                            <div class="modal-dialog" >
                                <div class="modal-content">
                                <div class="modal-body">
                                <form action="<?php echo e(route('them-gio-hang',['id' => $product->id])); ?>" method="post" role="form">        
                                    <input type="hidden" value="<?php echo csrf_token() ?>" name="_token">                          
                                    <div class="col-md-6">
                                        <h3><?php echo e($product->name); ?></h3>
                                        <div class="col-md-6">
                                            <a href="<?php echo e(route('home-chi-tiet-san-pham',['id' => $product->id])); ?>">
                                                <img src="<?php echo e(asset('uploads/'.$product->image)); ?>" alt="" width="200px">
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="price-box">
                                                <?php if($product->price_sale != 0): ?>
                                                <p class="special-price"> 
                                                    <span class="price-label">Giá sale:</span> 
                                                    <span class="price"> <?php echo e(number_format($product->price_sale)); ?>  VNĐ</span> 
                                                </p>
                                                <p class="old-price"> 
                                                    <span class="price-label">Giá gốc:</span> 
                                                    <span class="price"><?php echo e(number_format($product->price)); ?>  VNĐ </span> 
                                                </p>
                                                <?php else: ?>
                                                <p class="special-price"> 
                                                    <span class="price-label">Giá: </span> 
                                                    <span class="price"> <?php echo e(number_format($product->price)); ?>  VNĐ  </span> 
                                                </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3>Thêm vào giỏ hàng của bạn</h3>
                                        <p>Số lượng: 
                                        <input type="number" id="price_min" min="0" class="c30Om7" placeholder="Số lượng" value="1" pattern="[0-9]*" name="total" max="<?php echo e($product->total); ?>">
                                        </p>
                                    </div>
                                    <button type="submit" class="label label-danger">Mua ngay</button>
                                </form>
                                </div>
                                </div>
                            </div>
                            </div>
                            <span>
                            <a class="add-to-cart-mt " data-toggle="modal" href='#modal-id'>
                                <i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                            </span> 
                        </a>
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
                            <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html"><?php echo e($product->name); ?> </a> </div>
                            <div class="item-content">
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                                <div class="price-box"> 
                                    <span class="regular-price"> 
                                        <span class="price"><?php echo e($product->price_sale==0?number_format($product->price):number_format($product->price_sale)); ?> VND</span> </span> 
                                    </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </li>
                </ul>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                           
            </div>
        </div>
        </div>        
        </div>
        </div>
    </div>
</section>
<!-- Upsell Product Slider End --> 

<?php $__env->stopSection(); ?>


<?php $__env->startSection("script"); ?>  
  <script type="text/javascript">
    $(document).ready(function(){
      $(document).on('click','.btn_rate',function(e){
        e.preventDefault();
        var href = $(this).attr('href');
        var rate = $("input[name*='rate']:checked").val();
        $.ajax({
          url: href,
          type:"GET",
          data:{"rate": rate },
          success:function(res){
            console.log(res);
            if (res) {
               $('.ajax_rate_avg').html(res);
               $('.rate_table').load(location.href +' .rate_table>*')
               $('.rate-star').load(location.href +' .rate-star>*')
               ;
            } else {
              alert('Bạn hãy đăng nhập để tương tác nhiều hơn với chúng tôi');
            }
        }
      });
    }) 
    }  );     
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>