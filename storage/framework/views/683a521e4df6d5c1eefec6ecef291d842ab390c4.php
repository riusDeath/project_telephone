<footer>
    <div class="footer-newsletter">
        <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-7">
            <form id="newsletter-validate-detail" method="post" action="#">
                <h3 class="hidden-sm"><?php echo e(__('home.sign_up_for_newsletter')); ?></h3>
                <div class="newsletter-inner">
                    <input class="newsletter-email" name='Email' placeholder='Enter Your Email'/>
                    <button class="button subscribe" type="submit" title="Subscribe"><?php echo e(__('home.sub')); ?></button>
                </div>
            </form>
            </div>
            <div class="social col-md-4 col-sm-5">
                <ul class="inline-mode">
                    <li class="social-network fb">
                        <a title="Connect us on Facebook" target="_blank" href="https://www.facebook.com/">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li class="social-network googleplus">
                        <a title="Connect us on Google+" target="_blank" href="https://plus.google.com/">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </li>
                    <li class="social-network tw">
                        <a title="Connect us on Twitter" target="_blank" href="https://twitter.com/">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li class="social-network linkedin">
                        <a title="Connect us on Linkedin" target="_blank" href="https://www.pinterest.com/">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </li>
                    <li class="social-network rss">
                        <a title="Connect us on Instagram" target="_blank" href="https://instagram.com/">
                            <i class="fa fa-rss"></i>
                        </a>
                    </li>
                    <li class="social-network instagram">
                        <a title="Connect us on Instagram" target="_blank" href="https://instagram.com/">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
        <div class="col-sm-6 col-md-4 col-xs-12 col-lg-3">
            <div class="footer-logo">
                <a href=""><img src="<?php echo e(asset('uploads/logo.png')); ?>" alt="fotter logo"></a> 
            </div>
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
            <h3 class="links-title">Danh mục<a class="expander visible-xs" href="">+</a></h3>
            <div class="tabBlock" id="TabBlock-1">
                <ul class="list-links list-unstyled">
                    <?php $__currentLoopData = $parent_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="<?php echo e(route('product_category',['category_id' => $parent->id])); ?>"><?php echo e($parent->name); ?></a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-xs-12 col-lg-3 collapsed-block">
            <div class="footer-links">
            <h3 class="links-title"><?php echo e(__('form.brand')); ?><a class="expander visible-xs" href="">+</a></h3>
            <div class="tabBlock" id="TabBlock-3">
                <ul class="list-links list-unstyled">
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li> 
                        <a href="<?php echo e(route('product_brand',['brand_id' => $brand->id])); ?>"><?php echo e($brand->name); ?></a> 
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        </div>
        <div class="col-sm-6 col-md-2 col-xs-12 col-lg-3 collapsed-block">
            <div class="footer-links">
            <h3 class="links-title">Dịch vụ<a class="expander visible-xs" href="">+</a></h3>
            <div class="tabBlock" id="TabBlock-4">
                <ul class="list-links list-unstyled">
                    <?php if(Auth::check()): ?>
                    <li> <a href="<?php echo e(route('viewOrder')); ?>">Giỏ hàng của bạn</a> </li>
                    <li> <a href="<?php echo e(route('viewOrders',['id' => $user_login->id])); ?>"><?php echo e(__('admin.order')); ?></a> </li>
                    <?php endif; ?>
                    <li> <a href="">Các tiện ích</a> </li>
                    <li> <a href="#"><?php echo e(__('admin.pay')); ?></a> </li>
                    <li> <a href="#"><?php echo e(__('admin.ship')); ?></a> </li>
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
                    <li><a href="#">
                        <img title="Visa" alt="Visa" src="<?php echo e(asset('uploads/visa.png')); ?>">
                    </a></li>
                    <li><a href="#">
                        <img title="Paypal" alt="Paypal" src="<?php echo e(asset('uploads/paypal.png')); ?>">
                    </a></li>
                    <li><a href="#">
                        <img title="Discover" alt="Discover" src="<?php echo e(asset('uploads/discover.png')); ?>">
                    </a></li>
                    <li><a href="#">
                        <img title="Master Card" alt="Master Card" src="<?php echo e(asset('uploads/master-card.png')); ?>">
                    </a></li>
                </ul>
            </div>
            </div>
        </div>
        </div>
    </div>
</footer>
<a href="#" class="totop"> </a> 