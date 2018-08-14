<?php $__env->startSection('content'); ?> 
    <div class="container"> 
        <form action="" method="POST" role="form" enctype="multipart/form-data">
            <legend><?php echo e(__('admin.add',['name' => trans('admin.code')])); ?></legend>           
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-danger">
            <?php echo e($err); ?> 
            <br/>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="form-group">
                    <label for=""><?php echo e(__('home.sale')); ?>:(%) </label>
                    <input type="number" name="sale" class="form-control" required="required" min="0" value="<?php echo e(old('total')); ?>" min="0" max="100"> 
                </div>
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">  
            <div class="form-group form-inline">               
                <?php echo e(__('form.date_create')); ?>: <input type="date" name="date_create" id="input" class="form-control date_create" value="" required="required" title="">
                <?php echo e(__('form.date_end')); ?>: <input type="date" name="date_end" id="input" class="form-control date_end" value="" required="required" title="">
            </div>
            <div class="form-group form-inline">
                <input type="radio" value="1" name="select_user" checked="" class="select_user" ><?php echo e(__('form.random')); ?> <span class="qty">1</span> <?php echo e(__('admin.user')); ?>   
                <input type="radio" value="2" name="select_user" class="select_user" > <?php echo e(__('form.choose_email')); ?>   
            </div>
            <div class="random">
                <?php echo e(__('form.qty_code')); ?>: <input type="number" value="1" name="total" class="qty_code">
            <p><?php echo e(isset($mess)?$mess:''); ?></p>
            </div>
            <div class="user " style="display: none">
                <input type="text" class="form-control email" placeholder="<?php echo e(__('form.each_email')); ?>" name="email">
                <div class="scroll">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th></th>
                                <th><?php echo e(__('form.name')); ?></th>
                                <th><?php echo e(__('form.email')); ?></th>
                                <th>
                                    <input type="checkbox" class="sort_total" title="<?php echo e(__('form.sort')); ?>">
                                    <?php echo e(__('form.total')); ?> <?php echo e(__('admin.order')); ?>

                                </th>
                                <th>
                                    <input type="checkbox" class="sort_total" title="<?php echo e(__('form.sort')); ?>">
                                    <?php echo e(__('form.price')); ?> VNĐ
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><input type="checkbox" class="choose" name="choose" value="<?php echo e($user->email); ?>" ></td>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->order->count()); ?></td>
                                <td><?php echo e(number_format($user->price())); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <input type="checkbox" name="add_more" checked="">  
            <button type="submit" class="btn btn-primary " ><?php echo e(__('home.send')); ?></button>
        </form>
    </div>
    <hr>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript" src="<?php echo e(url('/')); ?>/public/js/sale.js"></script>
<script type="text/javascript" >
     $(document).ready(function(){
        $(document).on('keyup', '.qty_code', function(){
            var qty = $(this).val();
            if (qty > 0) {
                $('.qty').html(qty);
            }
        });

        $(document).on('click', '.select_user', function(){
            var select = $(this).val();
            var qty = $('.qty-code').val();
            if (select == 2) {
                $('.user').show();
                $('.random').hide();
            } else {
                $('.random').show();
                $('.user').hide();
            }
        }); 

        $(document).on('keyup', '.email', function(){
            var emails = $(this).val();
            console.log(emails.split(",").length);
        });

        $(document).on('change', '.all', function(){
            $('.choose').prop('checked', this.checked);  
        });

        $(document).on('change', '.choose', function(){
            var email = $(this).val();
            var emails = $('.email').val();

            if ($(this).is(':checked','')) {
                $('.email').val(emails+' '+email);
            } else {
                emails = emails.replace(" "+email, "");
                $('.email').val(emails);
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>