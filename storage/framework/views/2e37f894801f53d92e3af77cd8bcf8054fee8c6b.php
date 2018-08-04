<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading"><?php echo e(__('admin.Active')); ?></div>
    <div class="panel-body">
        <form action="<?php echo e(route('logs')); ?>" class="form-inline" role="form" method ="post">
            <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
            <?php if(isset($mess)): ?>
                <script>
                    alert($mess);
                </script>
            <?php endif; ?>
            <div class="form-group">
                <input class="form-control" name="search" placeholder="search name admin" title="id ỏ name admin">
            </div>  
            <div class="form-group">
                <select name="object" id="input" class="form-control" required="required">
                <option value="0">Object</option>
                <?php $__currentLoopData = $objects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($object->object); ?>"><?php echo e($object->object); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>                                    
            <button type="submit" class="btn btn-primary">Search</button>        
        </form>
    </div>
    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>ID admin</th>
                <th>Admin</th>
                <th>Action</th>
                <th>Object</th>
                <th>Create</th>
            </tr>            
        </thead>
        <tbody>
        <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($log->id); ?></td>
                <td>id: <?php echo e($log->user_id); ?></td>
                <td> <?php echo e($log->user->name); ?></td>
                <td><?php echo e($log->action); ?></td>
                <td><?php echo e($log->object); ?></td>
                <td><?php echo e($log->created_at); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div>
        <?php echo e($logs->links()); ?>

    </div>     
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>