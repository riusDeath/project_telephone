<?php $__env->startSection('main'); ?>
  <!-- Main Container -->
<div class="myOrderDetail">
<?php if(Cart::count() !=0): ?>
    <section class="main-container col1-layout ">
        <div class="main container">
            <div class="col-main">
            <div class="cart">
              
            <div class="page-content page-order"><div class="page-title">
                <h2>Chi tiết giỏ hàng</h2>
            </div>            
            <div class="order-detail-content">
            <div class="table-responsive">
                <table class="table table-bordered cart_summary">
                    <thead>
                        <tr>
                            <th class="cart_product">Sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th class="action ">
                                <a href="<?php echo e(route('xoa-gio-hang')); ?>" class="delete-all"><i class="fa fa-trash-o"> Xóa hết</i></a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="cart_product">
                            <a href="<?php echo e(route('home-chi-tiet-san-pham',['id' => $cart->id])); ?>"><img src="<?php echo e(asset('uploads/'.$cart->options['image'])); ?>" alt="Product"></a>
                            </td>
                            <td class="cart_description">
                            <p class="product-name"><?php echo e($cart->name); ?></p>
                            </td> 
                             <td class="price">
                            <span><?php echo e(number_format($cart->price)); ?> VNĐ</span>
                            </td>
                            <td class="qty"><input class="form-control input-sm input-total" type="number" value="<?php echo e(number_format($cart->qty)); ?>" duong-dan="<?php echo e(route('sua-qty-cart',['rowId' => $cart->rowId ])); ?>"> </td>
                            <td class="price"><span><?php echo e($cart->qty*$cart->price); ?></span></td>
                            <td class="action"><a href="<?php echo e(route('xoa-san-pham-gio-hang',['rowId' => $cart->rowId])); ?>"><i class="fa fa-trash-o"> Xóa</i></a></td>
                        </tr>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" rowspan="2"></td>
                            <td colspan="3">Tổng sản phẩm</td>
                            <td colspan="2"><?php echo e(Cart::count()); ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Hóa đơn</strong></td>
                            <td colspan="2"><strong><?php echo e(Cart::subtotal()); ?> </strong></td>
                        </tr>
                    </tfoot>
                </table>
                </div>
                <div class="cart_navigation"> <a class="" href="<?php echo e(route('home')); ?>"><i class="fa fa-arrow-left"> </i>&nbsp; Mua tiếp</a> <a class="checkout-btn" href="<?php echo e(route('thanh-toan')); ?>"><i class="fa fa-check"></i> Thanh toán</a> </div>
                </div>
            </div>
            </div>
            </div>
            </div>
    </section>
    <?php else: ?>
    <section class="main-container col1-layout">
            <div class="main container">
            <div class="col-main">
            <div class="cart">
                <a href="<?php echo e(route('home')); ?>">
                    <div style="border:1px solid ; width: 200px  ; height: 100px; margin: 20px auto"  class="text-center" >Mua sắm sản phẩm</div>
                </a>
            </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('public/js/order.js')); ?>"></script> 
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>