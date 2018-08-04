  <!-- Header -->
<header>
    <div class="header-container">
        <div class="header-top">
            <div class="container">
            <div class="row">
            <div class="col-lg-4 col-sm-4 hidden-xs"> 
              <!-- Default Welcome Message -->
                <div class="welcome-msg ">{{__('home.hello')}}</div>
                <span class="phone hidden-sm">Phone: +123.456.789</span> </div>
            
            <!-- top links -->
                <div class="headerlinkmenu col-lg-8 col-md-7 col-sm-8 col-xs-12">
                <div class="links">
                <div class="myaccount">
                    <a title="My Account" href="#"><i class="fa fa-user"></i>
                    <span class="hidden-xs">
                    @if(Auth::check())
                        <a href="{{route('viewOrders',['id' => $user_login->id])}}" title="Lịch sử mua hàng">{{$user_login->name}} {{__('home.account')}}</a>
                    @else
                        {{__('home.account')}}
                    @endif
                    </span>
                    </a>
                </div>
                
                <div class="wishlist">
                    <a title="My Wishlist" href="">
                        <a href="{!! route('user.change-language', ['en']) !!}">English</a>
                        <a href="{!! route('user.change-language', ['vi']) !!}">Vietnam</a>
                    </a>
                </div>
                <div class="blog">
                    <a title="Blog" href="{{route('register')}}">
                        <i class="fa fa-rss"></i><span class="hidden-xs">{{__('home.register')}}</span>
                    </a>
                </div>               
                @if(isset($user_login))
                <div class="login">
                    <a href="{{route('logout_user')}}">
                        <i class="fa fa-unlock-alt"></i><span class="hidden-xs">{{__('home.logout')}}</span>
                    </a>
                </div>
                @else
                <div class="login">
                    <a href="{{route('login')}}">
                        <i class="fa fa-unlock-alt"></i><span class="hidden-xs">{{__('home.login')}}</span>
                    </a>
                </div>
                @endif
                <div class="login">
                    @if(Auth::check())
                    @if( Auth::user()->grade == 'boss' || Auth::user()->grade == 'admin')
                    <a href="{{route('login-Admin')}}">
                        <i class="fa fa-unlock-alt"></i><span class="hidden-xs">{{__('home.admin')}}</span>
                    </a>
                    @endif
                    @endif
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
                <a title="e-commerce" href=""><img alt="e-commerce" src="{{asset('uploads/logo.png')}}"></a> 
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
                            @foreach($parent_categories as $parent)
                            <option value="$parent->id">{{$parent->name}}</option>
                            @foreach($categories as $category)
                            @if($category->parent == $parent->id)
                            <option value="{{$category->id}}">&nbsp;&nbsp;&nbsp;{{$category->name}}</option>
                            @endif
                            @endforeach
                            @endforeach
                        </select> -->
                        <input type="hidden" value="<?php echo csrf_token() ?>" name ="_token">
                        <input type="text" class="form-control" placeholder="{{__('home.search')}}" name="search">
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
                    <a href="{{route('viewOrder')}}">
                    <div class="cart-icon"><i class="fa fa-shopping-cart"></i></div>
                    <div class="shoppingcart-inner hidden-xs"><span class="cart-title">{{__('home.cart')}}</span> 
                    @if(Cart::count() !=0)
                    <span class="cart-total">{{Cart::count()}} {{__('home.product')}}: {{Cart::total()}} VNĐ</span>
                    @endif
                    </div>
                    </a>
            </div>
                @if(Cart::count() !=0)
                <div class="top-cart-content">
                <div class="block-subtitle hidden-xs">{{__('home.product_in_cart')}}</div>
                <ul id="cart-sidebar" class="mini-products-list">
                        @foreach(Cart::content() as $cart)
                        <li class="item odd"> 
                            <a href="{{route('product_details',['id' => $cart->id])}}" title="{{$cart->name}}" class="product-image">
                                <img src="{{asset('uploads/'.$cart->options['image'])}}" alt="Lorem ipsum dolor" width="65">
                            </a>
                            <div class="product-details"> 
                                <a href="{{route('deleteCart',['rowId' => $cart->rowId])}}" title="{{__('form.deleteCart')}}" class="" onclick="confirm('Bạn muốn xóa sản phẩm {{$cart->name}} ra khỏi giỏ hàng?')">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                                <p class="product-name"><a href="#">{{$cart->name}}</a> </p>
                                <strong>{{$cart->qty}}</strong> x 
                                <span class="price">{{number_format($cart->price)}}</span> 
                            </div>
                        </li>
                        @endforeach
                </ul>
                <div class="top-subtotal">{{__('form.subtotal')}}: <span class="price">{{Cart::subtotal()}} VNĐ</span></div>
                <div class="actions">
                        <a class="btn-checkout" href="{{route('checkout')}}">
                            <i class="fa fa-check"></i><span>{{__('home.checkout')}}</span>
                        </a>
                        <a class="view-cart" href="{{route('viewOrder')}}">
                            <i class="fa fa-shopping-cart"></i> <span>{{__('home.my_order')}}</span>
                        </a>
                </div>
                </div>
                @endif
            </div>
            </div>
            </div>
            </div>         
            </div>
        </div>
        </div>
</header>