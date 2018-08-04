  <!-- Header -->
<header>
    <div class="header-container">
        <div class="header-top">
            <div class="container">
            <div class="row">
            <div class="col-lg-4 col-sm-4 hidden-xs"> 
              <!-- Default Welcome Message -->
                <div class="welcome-msg "><?php echo e(__('home.hello')); ?></div>
                <span class="phone hidden-sm">Phone: +123.456.789</span> </div>
            
            <!-- top links -->
                <div class="headerlinkmenu col-lg-8 col-md-7 col-sm-8 col-xs-12">
                <div class="links">
                <div class="myaccount">
                    <a title="My Account" href="#"><i class="fa fa-user"></i>
                    <span class="hidden-xs">
                    <?php if(Auth::check()): ?>
                        <a href="<?php echo e(route('viewOrders',['id' => $user_login->id])); ?>" title="Lịch sử mua hàng"><?php echo e($user_login->name); ?> <?php echo e(__('home.account')); ?></a>
                    <?php else: ?>
                        <?php echo e(__('home.account')); ?>

                    <?php endif; ?>
                    </span>
                    </a>
                </div>
                
                <div class="wishlist">
                    <a title="My Wishlist" href="">
                        <a href="<?php echo route('user.change-language', ['en']); ?>">English</a>
                        <a href="<?php echo route('user.change-language', ['vi']); ?>">Vietnam</a>
                    </a>
                </div>
                <div class="blog">
                    <a title="Blog" href="<?php echo e(route('register')); ?>">
                        <i class="fa fa-rss"></i><span class="hidden-xs"><?php echo e(__('home.register')); ?></span>
                    </a>
                </div>               
                <?php if(isset($user_login)): ?>
                <div class="login">
                    <a href="<?php echo e(route('logout_user')); ?>">
                        <i class="fa fa-unlock-alt"></i><span class="hidden-xs"><?php echo e(__('home.logout')); ?></span>
                    </a>
                </div>
                <?php else: ?>
                <div class="login">
                    <a href="<?php echo e(route('login')); ?>">
                        <i class="fa fa-unlock-alt"></i><span class="hidden-xs"><?php echo e(__('home.login')); ?></span>
                    </a>
                </div>
                <?php endif; ?>
                <div class="login">
                    <?php if(Auth::check()): ?>
                    <?php if( Auth::user()->grade == 'boss' || Auth::user()->grade == 'admin'): ?>
                    <a href="<?php echo e(route('login-Admin')); ?>">
                        <i class="fa fa-unlock-alt"></i><span class="hidden-xs"><?php echo e(__('home.admin')); ?></span>
                    </a>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
                </div>        
            </div>
            </div>
            </div>
        </div>
        <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-3 col-xs-12"> 
            <!-- Header Logo -->
            <div class="logo">
                <a title="e-commerce" href=""><img alt="e-commerce" src="<?php echo e(asset('uploads/logo.png')); ?>"></a> 
            </div>
            <!-- End Header Logo --> 
            </div>
            <div class="col-xs-9 col-sm-6 col-md-6"> 
            <!-- Search -->            
            <div class="top-search">
                <div id="search">
                    <form method="post" action="">
                    <div class="input-group">
                     <!--    <select class="cate-dropdown hidden-xs" name="category_id">
                            <option selected=""  value="0">Tất cả danh mục</option>
                            <?php $__currentLoopData = $parent_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="$parent->id"><?php echo e($parent->name); ?></option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($category->parent == $parent->id): ?>
                            <option value="<?php echo e($category->id); ?>">&nbsp;&nbsp;&nbsp;<?php echo e($category->name); ?></option>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select> -->
                        <input type="hidden" value="<?php echo csrf_token() ?>" name ="_token">
                        <input type="text" class="form-control" placeholder="<?php echo e(__('home.search')); ?>" name="search">
                        <button class="btn-search" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                    </form>
                </div>
            </div>           
            <!-- End Search --> 
            </div>
            <!-- top cart -->
            <div id="mini-cart-list1">           
            <div class="col-lg-3 col-xs-3 top-cart">
            <div class="top-cart-contain">
            <div class="mini-cart">
            <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"> 
                    <a href="<?php echo e(route('viewOrder')); ?>">
                    <div class="cart-icon"><i class="fa fa-shopping-cart"></i></div>
                    <div class="shoppingcart-inner hidden-xs"><span class="cart-title"><?php echo e(__('home.cart')); ?></span> 
                    <?php if(Cart::count() !=0): ?>
                    <span class="cart-total"><?php echo e(Cart::count()); ?> <?php echo e(__('home.product')); ?>: <?php echo e(Cart::total()); ?> VNĐ</span>
                    <?php endif; ?>
                    </div>
                    </a>
            </div>
                <?php if(Cart::count() !=0): ?>
                <div class="top-cart-content">
                <div class="block-subtitle hidden-xs"><?php echo e(__('home.product_in_cart')); ?></div>
                <ul id="cart-sidebar" class="mini-products-list">
                        <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="item odd"> 
                            <a href="<?php echo e(route('product_details',['id' => $cart->id])); ?>" title="<?php echo e($cart->name); ?>" class="product-image">
                                <img src="<?php echo e(asset('uploads/'.$cart->options['image'])); ?>" alt="Lorem ipsum dolor" width="65">
                            </a>
                            <div class="product-details"> 
                                <a href="<?php echo e(route('deleteCart',['rowId' => $cart->rowId])); ?>" title="<?php echo e(__('form.deleteCart')); ?>" class="" onclick="confirm('Bạn muốn xóa sản phẩm <?php echo e($cart->name); ?> ra khỏi giỏ hàng?')">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                                <p class="product-name"><a href="#"><?php echo e($cart->name); ?></a> </p>
                                <strong><?php echo e($cart->qty); ?></strong> x 
                                <span class="price"><?php echo e(number_format($cart->price)); ?></span> 
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <div class="top-subtotal"><?php echo e(__('form.subtotal')); ?>: <span class="price"><?php echo e(Cart::subtotal()); ?> VNĐ</span></div>
                <div class="actions">
                        <a class="btn-checkout" href="<?php echo e(route('checkout')); ?>">
                            <i class="fa fa-check"></i><span><?php echo e(__('home.checkout')); ?></span>
                        </a>
                        <a class="view-cart" href="<?php echo e(route('viewOrder')); ?>">
                            <i class="fa fa-shopping-cart"></i> <span><?php echo e(__('home.my_order')); ?></span>
                        </a>
                </div>
                </div>
                <?php endif; ?>
            </div>
            </div>
            </div>
            </div>         
            </div>
        </div>
        </div>
</header>