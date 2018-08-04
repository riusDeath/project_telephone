<nav>
    <div class="container">
        <div class="row">
        <div class="col-md-3 col-sm-4">
            <div class="mm-toggle-wrap">
            <div class="mm-toggle"> <i class="fa fa-align-justify"></i> </div>
            <span class="mm-label"><?php echo e(__('admin.category')); ?></span> </div>
            <div class="mega-container visible-lg visible-md visible-sm">
            <div class="navleft-container">
                <div class="mega-menu-title">
                    <h3><?php echo e(__('admin.category')); ?></h3>
                </div>
                <div class="mega-menu-category">
                    <ul class="nav">
                    <?php $__currentLoopData = $parent_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li> 
                        <a href="#"><i class="icon fa fa-camera fa-fw"></i> <?php echo e($parent->name); ?></a>
                        <div class="wrap-popup">
                        <div class="popup">
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                            <ul class="nav">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($category->parent == $parent->id): ?>
                                <li><a href="<?php echo e(route('product_category',['category_id' => $category->id])); ?>"><span><?php echo e($category->name); ?></span></a></li>
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
                <div class="mt-root-item">
                    <a href="<?php echo e(route('home')); ?>">
                    <div class="title title_font"><span class="title-text"><?php echo e(__('home.home')); ?></span></div>
                    </a>
                </div>              
                </li>
                <li class="mt-root">
                <div class="mt-root-item">
                    <a href="#">
                        <div class="title title_font"><span class="title-text"><?php echo e(__('admin.brand')); ?></span></div>
                    </a>
                </div>
                <ul class="menu-items col-xs-4">
                    <li class="menu-item depth-1 menucol-1-3 ">
                    <ul class="submenu">
                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="menu-item">
                        <div class="title"> <a href="<?php echo e(route('product_brand',['brand_id' => $brand->id])); ?>"> <?php echo e($brand->name); ?></a></div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    </li>
                </ul>
                </li>
                <li class="mt-root">
                <div class="mt-root-item">
                    <a >
                        <div class="title title_font">
                            <span class="title-text"><?php echo e(__('home.contact')); ?></span> 
                        </div>
                    </a>
                </div>
                </li>
                <li class="mt-root">
                </li>
                <li class="mt-root demo_custom_link_cms">
                <div class="mt-root-item">
                    <a >
                        <div class="title title_font"><span class="title-text"><?php echo e(__('home.sale')); ?></span></div>
                    </a>
                </div>
          
                </li>
                <li class="mt-root">
                <div class="mt-root-item">
                    <div class="title title_font"><span class="title-text">Hots</span></div>
                </div>
                <ul class="menu-items col-xs-12">
                    <?php $__currentLoopData = $product_hot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro_hot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="menu-item depth-1 product menucol-1-3 withimage">
                    <div class="product-item">
                        <div class="item-inner">
                        <div class="product-thumbnail">
                            <?php if($pro_hot->price_sale !=0 ): ?>
                            <div class="icon-sale-label sale-left">Sale</div>
                            <?php endif; ?>
                            <div class="pr-img-area"> 
                                <a title="Ipsums Dolors Untra" href="<?php echo e(route('product_details',['id' => $pro_hot->id])); ?>">
                                <figure> 
                                    <img class="first-img" src="<?php echo e(asset('uploads/'.$pro_hot->image)); ?>" alt=""> 
                                </figure>
                                </a>
                                <a href="" class="add-to-cart-mt"> 
                                    <i class="fa fa-shopping-cart"></i><span> <?php echo e(__('home.add_to_cart')); ?></span> 
                                </a>
                            </div>
                            <div class="pr-info-area">
                            <div class="pr-button">
                                <div class="rating"> 
                                    <div class="rate-star">
                                        <div class="rated-star" style="width:<?php echo e(($pro_hot->rate_avg1()!=0)?($pro_hot->rate_avg1()/5*100):0); ?>%;">&nbsp;
                                    </div>
                                    <div class=""><?php echo e($pro_hot->rate_avg1()); ?>/5 rate</div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="item-info">
                            <div class="info-inner">
                            <div class="item-title"> <a title="Ipsums Dolors Untra" href="<?php echo e(route('product_details',['id' => $pro_hot->id])); ?>"><?php echo e($pro_hot->name); ?> </a> </div>
                            <div class="item-content">
                                <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                <div class="item-price">
                                    <div class="price-box">
                                    <?php if($pro_hot->price_sale != 0): ?>
                                    <p class="special-price"> 
                                        <span class="price-label"><?php echo e(__('form.price_sale')); ?>:</span> 
                                        <span class="price"> <?php echo e(number_format($pro_hot->price_sale)); ?>  VNĐ</span> 
                                    </p>
                                    <p class="old-price"> 
                                        <span class="price-label"><?php echo e(__('form.price')); ?>:</span> 
                                        <span class="price"><?php echo e(number_format($pro_hot->price)); ?>  VNĐ </span> 
                                    </p>
                                    <?php else: ?>
                                    <p class="special-price"> 
                                        <span class="price-label"><?php echo e(__('form.total')); ?>: </span> 
                                        <span class="price"> <?php echo e(number_format($pro_hot->price)); ?>  VNĐ  </span> 
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
                </li>
                </ul>
            </div>
        </div>
        </div>
    </div>
</nav>