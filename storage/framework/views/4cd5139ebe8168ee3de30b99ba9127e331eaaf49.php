<!-- Latest compiled and minified CSS & JS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<div class="jumbotron">
	<div class="container">
		<h1><?php echo e(__('passwords.hello')); ?> <?php echo e(Auth::user()->name); ?></h1>
		<p>
			<?php echo e(__('passwords.mess_register')); ?> <a href="<?php echo e(route('verify')); ?>" class="label"><?php echo e(__('passwords.register')); ?></a>
		</p>
	</div>
</div>

