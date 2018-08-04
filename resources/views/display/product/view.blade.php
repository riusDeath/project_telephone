 
@extends('layouts.index')

@section('main')

@section('link')
    <link rel="stylesheet" href="{{asset('public/css/my.css')}}">                                  
@endsection

<div class="main-container col1-layout">
    <div class="container">
        <div class="row">
            <div class="col-main">
                <div class="product-view-area">
                    <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
                        <div class="icon-sale-label sale-left">Sale</div>
                        <div class="large-image"> 
                            <a href="{{asset('uploads/'.$product->image)}}" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> 
                                <img class="zoom-img zoom_avatar" src="{{asset('uploads/'.$product->image)}}" alt="products " width="500px"> 
                            </a> 
                        </div>
                        <div class="flexslider flexslider-thumb">
                            <ul class="previews-list slides">
                                <li>
                                    <a href="{{asset('uploads/'.$product->image)}}" class='cloud-zoom-gallery avatar'>
                                        <img  style="width:50px"  src="{{asset('uploads/'.$product->image)}}" alt = "Thumbnail 2"/>
                                    </a>
                                </li>
                                @foreach($product->list_images as $image)
                                <li>
                                    <a href="{{asset('uploads/'.$image->image)}}" class='cloud-zoom-gallery avatar' rel="useZoom: 'zoom1', smallImage: 'img01.jpg' ">
                                        <img  style="width:50px"  src="{{asset('uploads/'.$image->image)}}" alt = "Thumbnail 2"/>{{$image->color}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>              
                    </div>
                    <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">        
                        <div class="product-name">
                            <h1>{{$product->name}}</h1>
                        </div>
                        <div class="price-box">
                            @if($product->price_sale != 0)
                            <p class="special-price"> 
                                <span class="price-label">Special Price</span> 
                                <span class="price"> {{number_format($product->price_sale)}}  VNĐ</span>
                            </p>
                            <p class="old-price"> 
                                <span class="price-label">Regular Price:</span> 
                                <span class="price">{{number_format($product->price)}}  VNĐ </span> 
                            </p>
                            @else
                            <p class="special-price"> 
                                <span class="price-label">Special Price</span> 
                                <span class="price"> {{number_format($product->price)}}  VNĐ  </span> 
                            </p>
                            @endif
                        </div>
                        <div class="ratings">
                            <div class="rating">                        
                                <div class="rate-star">
                                    <div class="rated-star" style="width:{{($product->rate_avg1()!=0)?($product->rate_avg1()/5*100):0}}%;">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>                  
                            <p class="availability in-stock pull-right">{{__('form.status')}}: 
                                <span class="total_stock">                          
                                    @if($product->total>=1)
                                    {{__('home.still')}}
                                    {{$product->total}} {{__('admin.product')}}
                                    @else
                                    {{__('home.out_up_stock')}}
                                    @endif
                                </span>
                            </p>
                        </div>
                        <h4>{{__('admin.brand')}}</h4>
                        <p>{{$product->warranty_period->time}} {{$product->warranty_period->type}}</p>
                        <form action="{{route('cart',['id' => $product->id])}}" method="post">
                            @if(count($product->list_images) !=0)
                            <select name="color" id="inputColor"  required="required" class="select_color" href="{{url('product/total-list-image')}}">
                                @foreach($product->list_images as $image)
                                <option value="{{$image->id}}" selected="">
                                   {{__('form.color')}}: {{$image->color}}
                                </option>
                                @endforeach
                            </select>
                            @endif
                            <div class="product-variation">                
                                <input type="hidden" value="{{csrf_token()}}" name="_token">  
                                @if($product->total >0)                
                                <div class="cart-plus-minus">
                                    <label for="qty">{{__('form.total')}}: </label>
                                    <div class="numbers-row">
                                        <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="dec qtybutton">
                                            <i class="fa fa-minus">&nbsp;</i>
                                        </div>
                                        <input type="number" class="qty" title="Qty" min="1" value="1" maxlength="12" id="qty" name="total" max="{{$product->total}}">
                                        <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="inc qtybutton">
                                            <i class="fa fa-plus">&nbsp;</i>
                                        </div>
                                    </div>
                                </div>
                                <button class="button pro-add-to-cart" title="Add to Cart" type="submit">
                                    <span><i class="fa fa-shopping-cart"></i>{{__('home.add_to_cart')}}</span>
                                </button>
                                @endif
                            </div>
                        </form>
                        <div class="product-cart-option">
                            <ul>
                                <li><a href="#"><i class="fa fa-heart"></i><span>Add to Wishlist</span></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i><span>Add to Compare</span></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i><span>Email to a Friend</span></a></li>
                            </ul>            
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-overview-tab">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="product-tab-inner"> 
                                <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                                    <li class="active"> 
                                        <a href="#description" data-toggle="tab">{{__('form.description')}} </a>
                                    </li>                
                                    <li> 
                                        <a href="#reviews" data-toggle="tab">Reviews</a> 
                                    </li>
                                    <li>
                                        <a href="#product_tags" data-toggle="tab">{{__('home.comment')}}</a>
                                    </li>
                                </ul>
                                <div id="productTabContent" class="tab-content">
                                    <div class="tab-pane fade in active" id="description">
                                        <div class="std">
                                            <p><?php echo $product->description; ?></p>
                                        </div>
                                        <div class="short-description">
                                            <h2>{{__('home.information')}}</h2>
                                            <p><?php echo $product->description; ?> </p>
                                        </div>
                                        @if(count($product->attribute) !=0)
                                            <h4>
                                            {{__('admin.Specification')}}: 
                                            </h4>                
                                            <div class="product-color">
                                                <div class="color-area">                    
                                                    <div class="color">
                                                        <ul>
                                                            @foreach($product->attribute  as $atribute)
                                                            <li>
                                                              {{$atribute->name}}  {{$atribute->value}}
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>                
                                            </div>
                                        @endif
                                    </div> 
                                                
                                <div id="reviews" class="tab-pane fade">
                                        <div class="col-sm-5 col-lg-5 col-md-5 rate_table">
                                            <div class="reviews-content-left">
                                                @if(Auth::check())
                                                <h2> {{$rate_total}} {{__('home.rating')}} {{$product->name}}</h2>
                                                @else 
                                                {{__('home.message')}}
                                                @endif
                                                <div class="review-ratting">
                                                    <div class="rating">
                                                        <h1 class="ajax_rate_avg">{{(float)$product->rate_avg1()}} <i class="fa fa-star"></i></h1> 
                                                    </div>
                                                    <p><a href="#">{{__('home.great')}}</a></p>
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="rating">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i>{{$rate_five}} {{__('home.rating')}}</i>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="rating">
                                                                    <i class="fa fa-star"></i> 
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i> 
                                                                    <i class="fa fa-star"></i> 
                                                                    <i class="fa fa-star-o"></i> 
                                                                    <i>{{$rate_four}} {{__('home.rating')}}</i>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="review-ratting">
                                                    <p><a href="#">Tốt</a> </p>
                                                    <table>
                                                      <tbody>
                                                        <tr>
                                                        <td>
                                                            <div class="rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i>{{$rate_three}} {{__('home.rating')}}</i>
                                                            </div>
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i>{{$rate_tow}} {{__('home.rating')}}</i>
                                                              </div>
                                                            </td>
                                                        </tr> 
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="review-ratting">
                                                <p><a href="#">{{__('form.normal')}}</a></p>
                                                <table>
                                                    <tbody>
                                                    <tr>
                                                    <td>
                                                        <div class="rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i>{{$rate_one}} {{__('home.rating')}}</i>
                                                        </div>
                                                    </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                </div>                                      
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-lg-7 col-md-7">
                                            <div class="reviews-content-right">
                                            <form method="post" action="" >
                                                <input type="hidden" value="{{csrf_token()}}" name="_token">
                                                <input type="hidden" value="{{$product->id}}" name="product_id">
                                                @if(isset($user_login))
                                                    <input type="hidden" value="{{$user_login->id}}" name="user_id">
                                                @endif
                                                <h3>{{__('home.rating')}}:  </h3>
                                                <h4>Bạn cảm thấy sản phẩm ở mức độ nào ?<em>*</em></h4>
                                                <div class="table-responsive reviews-table">
                                                    <table>
                                                        <tbody>
                                                        <tr>
                                                            <th></th>
                                                            <th>1 star</th>
                                                            <th>2 stars</th>
                                                            <th>3 stars</th>
                                                            <th>4 stars</th>
                                                            <th>5 stars</th>
                                                        </tr>
                                                        <tr>
                                                            <td>stars</td>
                                                            <td><input type="radio" name="rate" value="1"></td>
                                                            <td><input type="radio" name="rate" value="2"></td>
                                                            <td><input type="radio" name="rate" value="3"></td>
                                                            <td><input type="radio" name="rate" value="4"></td>
                                                            <td><input type="radio" name="rate" value="5" ></td>
                                                        </tr>                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="buttons-set">
                                                    @if(Auth::check())
                                                    <button class="button  btn_rate" title="Submit Review" type="submit" href="{{route('add-rate',['id' => $product->id ])}}">
                                                    <span><i class="fa fa-thumbs-up"></i> &nbsp;{{__('home.rating')}}</span>                           
                                                    </button>
                                                    @else 
                                                    <a href="{{route('login')}}">
                                                        {{__('home.message')}}       
                                                    </a>
                                                    @endif
                                                </div>
                                            </form> 
                                            </div>
                                        </div>
                                </div>
                                             
                                <div class="tab-pane fade" id="product_tags">
                                <div class="box-collateral box-tags">
                                    <div class="tags">
                                    <form id="" action="" method="post" >
                                        <div class="form-add-tags">
                                            <div class="input-box">
                                                <label for="productTagName"> </label>
                                               
                                                <input type="hidden" value="{{csrf_token()}}" name="_token">
                                                <h4>{{__('home.write_comment')}}....</h4>
                                                @if(isset($user_login))
                                                <div class="form-group">
                                                    <textarea placeholder="{{__('home.answer_question')}}" rows="5" maxlength="300" type="text" height="100%" data-id="{{$product->id}}" name="comment" style="border-radius: 20px" class="form-control comment"></textarea>
                                                </div>
                                                
                                                <input type="hidden" value="{{$user_login->id}}" name="user_id">
                                                @endif
                                                @if(Auth::check())
                                                <button type="button" href="{{route('add-comment',['id' => $product->id])}}" class="next-btn next-btn-primary next-btn-medium qna-ask-btn" class="btn_comment">{{__('home.comment')}}</button>
                                                @else
                                                <a href="{{route('login')}}">
                                                {{__('home.message')}}                               
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div>
                                            <span class="lazada lazada-noReview lazada-icon qna-empty-icon"></span>
                                            <div class="qna-empty-text">{{__('home.message2')}}</div>
                                        </div>                                       
                                    </form>
                                    
                                    <div class="show-comment">
                                        <h3>{{__('form.table_commet')}}</h3>
                                            @foreach($comments as $comment)
                                            <div class="media " data-spy="scroll">
                                                <a class="pull-left" href="#">
                                                    <img src="https://www.gravatar.com/avatar/{{ md5($comment->user->email)}}?s=30" class="user-image" alt="User Image">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading">  {{$comment->user->name}}</h4>
                                                    <p>{{$comment->comment}}</p>
                                                </div>     
                                                
                                                <div style="" class="replies{{$comment->id}} container">
                                                    @foreach($comment->replies as $reply)
                                                    <a class="pull-left" href="#">
                                                        <img src="https://www.gravatar.com/avatar/{{ md5($reply->user->email)}}?s=30" class="user-image" alt="User Image">
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">  {{$reply->user->name}}</h4>
                                                        <p>{{$reply->comment}}</p>
                                                    </div>
                                                    @endforeach
                                                    <form action="" method="POST" role="form" class="form-inline container">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control comment{{$comment->id}}" id="" placeholder="{{__('home.reply')}}">
                                                        </div>                       
                                                        <button type="button" class="btn btn-primary reply_comment" comment_id="{{$comment->id}}">{{__('home.send')}}</button>
                                                    </form>
                                                </div>
                                                <button style="button" class="reply" comment_id = "{{$comment->id}}">{{__('home.reply')}}</button>
                                            </div>
                                            @endforeach
                                        <div>
                                            {{$comments->links()}}
                                        </div>  
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="related-product-area">       
                    <div class="page-header">
                        <h2>{{__('home.product_same_category')}} {{$product->category->name}}</h2>
                    </div>
                    <div class="related-products-pro">
                        <div class="slider-items-products">
                            <div id="related-product-slider" class="product-flexslider hidden-buttons">
                                <div class="slider-items slider-width-col4 fadeInUp">
                                    @foreach($products as $product)
                                    <div class="product-grid-area">
                                        <ul class="products-grid">
                                            <li class="item ">
                                                <div class="product-item">
                                                    <div class="item-inner">
                                                        <div class="product-thumbnail">
                                                            <div class="icon-sale-label sale-left">Sale</div>
                                                            <div class="icon-new-label new-right">New</div>
                                                            <div class="pr-img-area"> 
                                                                <a title="Ipsums Dolors Untra" href="{{route('product_details',['id' => $product->id])}}">
                                                                <div> 
                                                                    <img class="first-img" src="{{asset('uploads/'.$product->image)}}" alt=""> 
                                                                    <img class="hover-img" src="{{asset('uploads/'.$product->image)}}" alt="">
                                                                </div>
                                                                </a>
                                                                <div class="modal fade" id="modal-id">
                                                                    <div class="modal-dialog" >
                                                                        <div class="modal-content">
                                                                            <div class="modal-body">
                                                                                <form action="{{route('cart',['id' => $product->id])}}" method="post" role="form">        
                                                                                        <input type="hidden" value="<?php echo csrf_token() ?>" name="_token">                          
                                                                                        <div class="col-md-6">
                                                                                            <h3>{{$product->name}}</h3>
                                                                                            <div class="col-md-6">
                                                                                                <a href="{{route('product_details',['id' => $product->id])}}">
                                                                                                    <img src="{{asset('uploads/'.$product->image)}}" alt="" width="200px">
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="price-box">
                                                                                                    @if($product->price_sale != 0)
                                                                                                    <p class="special-price"> 
                                                                                                        <span class="price-label">{{__('form.price_sale')}}:</span> 
                                                                                                        <span class="price"> {{number_format($product->price_sale)}}  VNĐ</span> 
                                                                                                    </p>
                                                                                                    <p class="old-price"> 
                                                                                                        <span class="price-label">{{__('form.price')}}:</span> 
                                                                                                        <span class="price">{{number_format($product->price)}}  VNĐ </span> 
                                                                                                    </p>
                                                                                                    @else
                                                                                                    <p class="special-price"> 
                                                                                                        <span class="price-label">{{__('form.price')}}: </span> 
                                                                                                        <span class="price"> {{number_format($product->price)}}  VNĐ  </span> 
                                                                                                    </p>
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <h3>{{__('home.add_to_cart')}}</h3>
                                                                                            <p>{{__('form.total')}}: 
                                                                                            <input type="number" id="price_min" min="0" class="c30Om7" placeholder="Số lượng" value="1" pattern="[0-9]*" name="total" max="{{$product->total}}">
                                                                                            </p>
                                                                                        </div>
                                                                                        <button type="submit" class="label label-danger">{{__('home.buy_now')}}</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <span>
                                                                    <a class="add-to-cart-mt " data-toggle="modal" href='#modal-id'>
                                                                        <i class="fa fa-shopping-cart"></i>{{__('home.add_to_cart')}}
                                                                    </a>
                                                                </span>                                
                                                            </div>
                                                            <div class="pr-info-area">
                                                                <div class="pr-button">
                                                                    <div class="mt-button add_to_wishlist"> 
                                                                        <a href="wishlist.html"> <i class="fa fa-heart"></i> </a> 
                                                                    </div>
                                                                    <div class="mt-button add_to_compare"> 
                                                                        <a href="compare.html"> <i class="fa fa-signal"></i> </a> 
                                                                    </div>
                                                                    <div class="mt-button quick-view"> 
                                                                        <a href="quick_view.html"> <i class="fa fa-search"></i> </a> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="info-inner">
                                                                <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">{{$product->name}} </a> </div>
                                                                <div class="item-content">
                                                                    <div class="rating"> 
                                                                        <i class="fa fa-star"></i> 
                                                                        <i class="fa fa-star"></i> 
                                                                        <i class="fa fa-star"></i> 
                                                                        <i class="fa fa-star-o"></i> 
                                                                        <i class="fa fa-star-o"></i> 
                                                                    </div>
                                                                    <div class="item-price">
                                                                        <div class="price-box"> 
                                                                            <span class="regular-price"> 
                                                                                <span class="price">{{$product->price_sale==0?number_format($product->price):number_format($product->price_sale)}} VND
                                                                                </span> 
                                                                            </span> 
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    @endforeach                           
                                </div>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        </div>
    </div>
    <section class="upsell-product-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">         
                    <div class="page-header">
                        <h2>{{__('home.product_same_brand')}} {{$product->brand->name}}</h2>
                    </div>
                    <div class="slider-items-products">
                        <div id="upsell-product-slider" class="product-flexslider hidden-buttons">
                            <div class="slider-items slider-width-col4">
                                @foreach($product_brand as $product)
                                <div class="product-grid-area">
                                    <ul class="products-grid">
                                        <li class="item ">
                                            <div class="product-item">
                                                <div class="item-inner">
                                                    <div class="product-thumbnail">
                                                        <div class="icon-sale-label sale-left">Sale</div>
                                                        <div class="icon-new-label new-right">New</div>
                                                        <div class="pr-img-area"> 
                                                                <a title="Ipsums Dolors Untra" href="{{route('product_details',['id' => $product->id])}}">
                                                                    <div> 
                                                                        <img class="first-img" src="{{asset('uploads/'.$product->image)}}" alt=""> 
                                                                        <img class="hover-img" src="{{asset('uploads/'.$product->image)}}" alt="">
                                                                    </div>
                                                                </a>
                                                                <div class="modal fade" id="modal-id">
                                                                    <div class="modal-dialog" >
                                                                        <div class="modal-content">
                                                                            <div class="modal-body">
                                                                                <form action="{{route('cart',['id' => $product->id])}}" method="post" role="form">        
                                                                                    <input type="hidden" value="<?php echo csrf_token() ?>" name="_token">                          
                                                                                    <div class="col-md-6">
                                                                                        <h3>{{$product->name}}</h3>
                                                                                        <div class="col-md-6">
                                                                                            <a href="{{route('product_details',['id' => $product->id])}}">
                                                                                                <img src="{{asset('uploads/'.$product->image)}}" alt="" width="200px">
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <div class="price-box">
                                                                                                @if($product->price_sale != 0)
                                                                                                <p class="special-price"> 
                                                                                                    <span class="price-label">Giá sale:</span> 
                                                                                                    <span class="price"> {{number_format($product->price_sale)}}  VNĐ</span> 
                                                                                                </p>
                                                                                                <p class="old-price"> 
                                                                                                    <span class="price-label">Giá gốc:</span> 
                                                                                                    <span class="price">{{number_format($product->price)}}  VNĐ </span> 
                                                                                                </p>
                                                                                                @else
                                                                                                <p class="special-price"> 
                                                                                                    <span class="price-label">Giá: </span> 
                                                                                                    <span class="price"> {{number_format($product->price)}}  VNĐ  </span> 
                                                                                                </p>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                            <h3>{{__('home.add_to_cart')}}</h3>
                                                                                            <p>Số lượng: 
                                                                                                <input type="number" id="price_min" min="0" class="c30Om7" placeholder="Số lượng" value="1" pattern="[0-9]*" name="total" max="{{$product->total}}">
                                                                                            </p>
                                                                                    </div>
                                                                                    <button type="submit" class="label label-danger">{{__('home.buy_now')}}</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <span>
                                                                    <a class="add-to-cart-mt " data-toggle="modal" href='#modal-id'>
                                                                        <i class="fa fa-shopping-cart"></i>{{__('home.add_to_cart')}}
                                                                    </a>
                                                                </span> 
                                                        </div>
                                                        <div class="pr-info-area">
                                                            <div class="pr-button">
                                                                <div class="mt-button add_to_wishlist"> 
                                                                    <a href="wishlist.html"> <i class="fa fa-heart"></i> </a> 
                                                                </div>
                                                                <div class="mt-button add_to_compare"> 
                                                                    <a href="compare.html"> <i class="fa fa-signal"></i> </a> 
                                                                </div>
                                                                <div class="mt-button quick-view"> 
                                                                    <a href="quick_view.html"> <i class="fa fa-search"></i> </a> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">{{$product->name}} </a> </div>
                                                            <div class="item-content">
                                                                <div class="rating"> 
                                                                    <i class="fa fa-star"></i> 
                                                                    <i class="fa fa-star"></i> 
                                                                    <i class="fa fa-star"></i> 
                                                                    <i class="fa fa-star-o"></i> 
                                                                    <i class="fa fa-star-o"></i> 
                                                                </div>
                                                                <div class="item-price">
                                                                    <div class="price-box"> 
                                                                        <span class="regular-price"> 
                                                                            <span class="price">{{$product->price_sale==0?number_format($product->price):number_format($product->price_sale)}} VND</span> 
                                                                        </span> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                @endforeach                           
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section("script")  
    <script type="text/javascript" src="{{asset('public/js/display.product.view.js')}}">    
    </script>
    <script type="text/javascript" src="{{asset('public/js/views.product.js')}}">    
    </script>
@endsection
