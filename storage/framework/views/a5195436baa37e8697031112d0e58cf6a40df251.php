<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">               
                <li class="nav-header">
                    <div class="dropdown profile-element"> 
                        <span>
                            <!-- <img alt="image" class="img-circle" src="img/profile_small.jpg" /> -->
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> 
                                <span class="block m-t-xs"> 
                                <strong class="font-bold">
                                <?php if(isset($user_login)): ?>
                                <?php echo e($user_login->name); ?>

                                <?php endif; ?>
                                </strong>
                                </span> 
                                 <span class="text-muted text-xs block">Art Director 
                                <b class="caret"></b>
                                </span> 
                            </span> 
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="<?php echo e(route('account-admin')); ?>"><?php echo e(__('admin.Account')); ?></a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo e(route('logout-Admin')); ?>"><?php echo e(__('admin.logout')); ?></a></li>
                        </ul>
                    </div>
                </li>                
                    <a href="<?php echo e(route('admin')); ?>" class="list-group-item">Dashboard</a>                    
                <li>
                    <a href="#">    
                        <i class="fa fa-table"></i> <span class="nav-label"><?php echo e(__('admin.product')); ?></span>
                        <span class="label label-warning pull-right"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo e(route('product')); ?>"><?php echo e(__('admin.list',['name' => trans('admin.product')])); ?></a></li>
                        <li><a href="<?php echo e(route('add_product')); ?>"><?php echo e(__('admin.add',['name' => trans('admin.product')])); ?></a></li>
                        <li><a href="<?php echo e(route('category')); ?>"><?php echo e(__('admin.category')); ?></a></li>
                        <li><a href="<?php echo e(route('attributes')); ?>"><?php echo e(__('admin.Specification')); ?></a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-edit"></i> 
                        <span class="nav-label"><?php echo e(__('admin.user')); ?></span><span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo e(route('user')); ?>"><?php echo e(__('admin.list',['name' => trans('admin.user')])); ?></a></li>
                        <li><a href="<?php echo e(route('add_new_account')); ?>"><?php echo e(__('admin.add',['name' => trans('admin.user')])); ?></a></li>
                    </ul>
                </li> 
                <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label"><?php echo e(__('admin.order')); ?></span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo e(route('order')); ?>"><?php echo e(__('admin.list',['name' => trans('admin.order')])); ?></a></li>
                        <li><a href="<?php echo e(route('pay')); ?>"><?php echo e(__('admin.list',['name' => trans('admin.pay')])); ?></a></li>
                        <li><a href="<?php echo e(route('ship')); ?>"><?php echo e(__('admin.list',['name' => trans('admin.ship')])); ?></a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-globe"></i> 
                        <span class="nav-label">Admin</span><span class="label label-info pull-right"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo e(route('account-admin')); ?>"><?php echo e(__('admin.Account')); ?></a></li>
                        <li><a href="<?php echo e(route('list-admin')); ?>"><?php echo e(__('admin.list', ['name' => trans('admin.Account')])); ?></a></li>
                        <li><a href="<?php echo e(route('add_new_account')); ?>"><?php echo e(__('admin.add',['name' => trans('admin.Account')])); ?></a></li>
                    </ul>
                </li> 
                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label"><?php echo e(__('admin.slider')); ?></span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo e(route('list-slide')); ?>"><?php echo e(__('admin.list', ['name' => trans('admin.slider')])); ?></a></li>
                        <li><a href="<?php echo e(route('add-slide')); ?>"><?php echo e(__('admin.add',['name' => trans('admin.slider')])); ?></a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-globe"></i> 
                        <span class="nav-label"><?php echo e(__('admin.Active')); ?></span><span class="label label-info pull-right"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo e(route('logs')); ?>"><?php echo e(__('admin.list', ['name' => trans('admin.Active')])); ?></a></li>
                    </ul>
                </li> 
                <li>
                    <a href="#">
                        <i class="fa fa-globe"></i> 
                        <span class="nav-label"><?php echo e(__('form.change_language')); ?></span><span class="label label-info pull-right"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo route('user.change-language', ['en']); ?>">English</a></li>
                        <li><a href="<?php echo route('user.change-language', ['vi']); ?>">Vietnam</a></li>
                    </ul>s
                </li>                
            </ul>
        </div>
    </nav>