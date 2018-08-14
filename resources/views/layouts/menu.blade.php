<nav>
    <div class="container">
        <div class="row">
        <div class="col-md-3 col-sm-4">
            <div class="mm-toggle-wrap">
            <div class="mm-toggle"> <i class="fa fa-align-justify"></i> </div>
            <span class="mm-label">{{ __('admin.category') }}</span> </div>
            <div class="mega-container visible-lg visible-md visible-sm">
            <div class="navleft-container">
                <div class="mega-menu-title">
                    <h3>{{ __('admin.category') }}</h3>
                </div>
                <div class="mega-menu-category">
                    <ul class="nav">
                    @foreach($parent_categories as $parent)
                    <li> 
                        <a href="#"><i class="icon fa fa-camera fa-fw"></i> {{ $parent->name }}</a>
                        <div class="wrap-popup">
                        <div class="popup">
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                            @if(count($parent->parents) != 0)
                            <ul class="nav">
                                @foreach($parent->parents as $category)
                                <li><a href="{{ route('product_category',['category_id' => $category->id]) }}"><span>{{ $category->name }}</span></a></li>
                                @endforeach
                            </ul>
                            @endif
                            </div>
                        </div>
                        </div>
                        </div>
                        </li>
                    @endforeach
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
                    <a href="{{ route('home') }}">
                    <div class="title title_font"><span class="title-text">{{ __('home.home') }}</span></div>
                    </a>
                </div>              
                </li>
                <li class="mt-root">
                <div class="mt-root-item">
                    <a href="#">
                        <div class="title title_font"><span class="title-text">{{ __('admin.brand') }}</span></div>
                    </a>
                </div>
                <ul class="menu-items col-xs-4">
                    <li class="menu-item depth-1 menucol-1-3 ">
                    <ul class="submenu">
                        @foreach($brands as $brand)
                        <li class="menu-item">
                        <div class="title"> <a href="{{ route('product_brand',['brand_id' => $brand->id]) }}"> {{ $brand->name }}</a></div>
                        </li>
                        @endforeach
                    </ul>
                    </li>
                </ul>
                </li>
                <li class="mt-root">
                <div class="mt-root-item">
                    <a >
                        <div class="title title_font">
                            <span class="title-text">{{ __('home.contact') }}</span> 
                        </div>
                    </a>
                </div>
                </li>
                <li class="mt-root">
                </li>
                <li class="mt-root demo_custom_link_cms">
                <div class="mt-root-item">
                    <a href="{{ route('sale') }}">
                        <div class="title title_font"><span class="title-text">{{ __('home.sale') }}</span></div>
                    </a>
                </div>
          
                </li>
                <li class="mt-root">
                <div class="mt-root-item">
                    <div class="title title_font"><span class="title-text">Hots</span></div>
                </div>
                <ul class="menu-items col-xs-12 ">
                    <div class="scroll">
                        @foreach($product_hot as $pro_hot)
                        <li class="menu-item depth-1 product menucol-1-3 withimage">
                            <div class="product-item " >
                                <div class="item-inner">
                                <div class="product-thumbnail">
                                    @if($pro_hot->price_sale !=0 )
                                    <div class="icon-sale-label sale-left">Sale</div>
                                    @endif
                                    <div class="pr-img-area"> 
                                        <a title="Ipsums Dolors Untra" href="{{ route('product_details',['id' => $pro_hot->id]) }}">
                                        <figure> 
                                            <img class="first-img" src="{{ asset('uploads/'.$pro_hot->image) }}" alt=""> 
                                        </figure>
                                        </a>
                                        <a href="" class="add-to-cart-mt"> 
                                            <i class="fa fa-shopping-cart"></i><span> {{ __('home.add_to_cart') }}</span> 
                                        </a>
                                    </div>
                                    <div class="pr-info-area">
                                    <div class="pr-button">
                                        <div class="rating"> 
                                            <div class="rate-star">
                                                <div class="rated-star" style="width:{{ ($pro_hot->rate_avg1()!=0)?($pro_hot->rate_avg1()/5*100):0 }}%;">&nbsp;
                                            </div>
                                            <div class="">{{ $pro_hot->rate_avg1() }}/5 rate</div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                    <div class="item-title"> <a title="Ipsums Dolors Untra" href="{{ route('product_details',['id' => $pro_hot->id]) }}">{{ $pro_hot->name }} </a> </div>
                                    <div class="item-content">
                                        <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                        <div class="item-price">
                                            <div class="price-box">
                                            @if($pro_hot->price_sale != 0)
                                            <p class="special-price"> 
                                                <span class="price-label">{{ __('form.price_sale') }}:</span> 
                                                <span class="price"> {{ number_format($pro_hot->price_sale) }}  VNĐ</span> 
                                            </p>
                                            <p class="old-price"> 
                                                <span class="price-label">{{ __('form.price') }}:</span> 
                                                <span class="price">{{ number_format($pro_hot->price) }}  VNĐ </span> 
                                            </p>
                                            @else
                                            <p class="special-price"> 
                                                <span class="price-label">{{ __('form.total') }}: </span> 
                                                <span class="price"> {{ number_format($pro_hot->price) }}  VNĐ  </span> 
                                            </p>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </div>
                </ul>
                </li>
                </ul>
            </div>
        </div>
        </div>
    </div>
</nav>