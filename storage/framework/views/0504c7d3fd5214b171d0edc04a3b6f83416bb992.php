<!-- Latest compiled and minified CSS & JS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<h1 style="color:red">MobileStore</h1>
<div class="col-md-6">
	<h2><?php echo e(__('home.order_confirm')); ?></h2>
	<h3><?php echo e(__('admin.user')); ?>:  <?php echo e(Auth::user()->name); ?></h3>
	<h3><?php echo e(__('message.congration')); ?></h3>
</div>
<div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                <thead>
                	<tr style="s">
                		
                	</tr>
                    <tr>                                 
                        <th data-toggle="true">ID</th>
                        <th data-hide="phone"><?php echo e(__('admin.code')); ?></th>
                        <th data-hide="phone"><?php echo e(__('home.sale')); ?></th>
                        <th data-hide="phone"><?php echo e(__('form.date_create')); ?></th>
                        <th data-hide="phone"><?php echo e(__('form.date_end')); ?></th>
                </thead>
                <tbody>
                    <tr>
                        <td> <?php echo e($code_discount->id); ?> </td>
                        <td> <?php echo e($code_discount->code); ?> </td>              
                        <td>
                            <?php echo e($code_discount->sale); ?> %
                        </td>
                        <td>
                            <?php echo e($code_discount->date_create); ?>

                        </td>
                        <td>
                            <?php echo e($code_discount->date_end); ?>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div><?php echo e(__('message.mess_code')); ?> <span style="color:red"><?php echo e($code_discount->code); ?></span></div>