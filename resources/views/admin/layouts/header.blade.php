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
                                @if(isset($user_login))
                                {{$user_login->name}}
                                @endif
                                </strong>
                                </span> 
                                 <span class="text-muted text-xs block">Art Director 
                                <b class="caret"></b>
                                </span> 
                            </span> 
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="{{route('account-admin')}}">{{__('admin.Account')}}</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('logout-Admin')}}">{{__('admin.logout')}}</a></li>
                        </ul>
                    </div>
                </li>                
                    <a href="{{route('admin')}}" class="list-group-item">Dashboard</a>                    
                <li>
                    <a href="#">    
                        <i class="fa fa-table"></i> <span class="nav-label">{{__('admin.product')}}</span>
                        <span class="label label-warning pull-right"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{route('product')}}">{{__('admin.list',['name' => trans('admin.product')])}}</a></li>
                        <li><a href="{{route('add_product')}}">{{__('admin.add',['name' => trans('admin.product')])}}</a></li>
                        <li><a href="{{route('category')}}">{{__('admin.category')}}</a></li>
                        <li><a href="{{route('attributes')}}">{{__('admin.Specification')}}</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-edit"></i> 
                        <span class="nav-label">{{__('admin.user')}}</span><span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{route('user')}}">{{__('admin.list',['name' => trans('admin.user')])}}</a></li>
                        <li><a href="{{route('add_new_account')}}">{{__('admin.add',['name' => trans('admin.user')])}}</a></li>
                    </ul>
                </li> 
                <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">{{__('admin.order')}}</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{route('order')}}">{{__('admin.list',['name' => trans('admin.order')])}}</a></li>
                        <li><a href="{{route('pay')}}">{{__('admin.list',['name' => trans('admin.pay')])}}</a></li>
                        <li><a href="{{route('ship')}}">{{__('admin.list',['name' => trans('admin.ship')])}}</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-globe"></i> 
                        <span class="nav-label">Admin</span><span class="label label-info pull-right"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{route('account-admin')}}">{{__('admin.Account')}}</a></li>
                        <li><a href="{{route('list-admin')}}">{{__('admin.list', ['name' => trans('admin.Account')])}}</a></li>
                        <li><a href="{{route('add_new_account')}}">{{__('admin.add',['name' => trans('admin.Account')])}}</a></li>
                    </ul>
                </li> 
                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">{{__('admin.slider')}}</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{route('list-slide')}}">{{__('admin.list', ['name' => trans('admin.slider')])}}</a></li>
                        <li><a href="{{route('add-slide')}}">{{__('admin.add',['name' => trans('admin.slider')])}}</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-globe"></i> 
                        <span class="nav-label">{{__('admin.Active')}}</span><span class="label label-info pull-right"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{route('logs')}}">{{__('admin.list', ['name' => trans('admin.Active')])}}</a></li>
                    </ul>
                </li> 
                <li>
                    <a href="#">
                        <i class="fa fa-globe"></i> 
                        <span class="nav-label">{{__('form.change_language')}}</span><span class="label label-info pull-right"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{!! route('user.change-language', ['en']) !!}">English</a></li>
                        <li><a href="{!! route('user.change-language', ['vi']) !!}">Vietnam</a></li>
                    </ul>s
                </li>                
            </ul>
        </div>
    </nav>