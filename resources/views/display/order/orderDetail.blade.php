@extends('layouts.index')

@section('main')
  <!-- Main Container -->
<div class="myOrderDetail">
@if(Cart::count() !=0)
    <section class="main-container col1-layout ">
        <div class="main container">
            <div class="col-main">
            <div class="cart">
              
            <div class="page-content page-order"><div class="page-title">
                <h2>{{__('admin.order_detail')}}</h2>
            </div>            
            <div class="order-detail-content">
            <div class="table-responsive">
                <table class="table table-bordered cart_summary">
                    <thead>
                        <tr>
                            <th class="cart_product">{{__('admin.product')}}</th>
                            <th>{{__('form.name')}}</th>
                            <th>{{__('form.color')}}</th>
                            <th>{{__('form.price')}}</th>
                            <th>{{__('form.total')}}</th>
                            <th>{{__('form.subtotal')}}</th>
                            <th class="action ">
                                <a href="{{route('deleteAll')}}" class="delete-all"><i class="fa fa-trash-o">{{__('form.delete_all')}}</i></a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Cart::content() as $cart)
                        <tr>
                            <td class="cart_product">
                                <a href="{{route('product_details',['id' => $cart->id])}}">
                                    <img src="{{asset('uploads/'.$cart->options['image'])}}" alt="Product">
                                </a>
                            </td>
                            <td class="cart_description">
                                <p class="product-name">{{$cart->name}}</p>
                            </td> 
                            <td>
                                <p class="">{{$cart->options['options']}}</p>
                            </td>
                            <td class="price">
                                <span>{{number_format($cart->price)}} VNĐ</span>
                            </td>
                            <td class="qty">
                                <input class="form-control input-sm input-total" type="number" value="{{number_format($cart->qty)}}" duong-dan="{{route('editQty',['rowId' => $cart->rowId ])}}"> 
                            </td>
                            <td class="price">
                                <span>{{$cart->qty*$cart->price}}</span>
                            </td>
                            <td class="action">
                                <a href="{{route('deleteCart',['rowId' => $cart->rowId])}}"><i class="fa fa-trash-o"> Xóa</i></a>
                            </td>
                        </tr>
                       @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" rowspan="2"></td>
                            <td colspan="3">{{__('form.gross_product')}}</td>
                            <td colspan="2">{{Cart::count()}}</td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>{{__('form.subtotal')}}</strong></td>
                            <td colspan="2"><strong>{{Cart::subtotal()}} </strong></td>
                        </tr>
                    </tfoot>
                </table>
                </div>
                <div class="cart_navigation"> <a class="" href="{{route('home')}}"><i class="fa fa-arrow-left"> </i>&nbsp; {{__('home.buy_now')}}</a> <a class="checkout-btn" href="{{route('checkout')}}"><i class="fa fa-check"></i> {{__('home.checkout')}}</a> </div>
                </div>
            </div>
            </div>
            </div>
            </div>
    </section>
    @else
    <section class="main-container col1-layout">
            <div class="main container">
            <div class="col-main">
            <div class="cart">
                <a href="{{route('home')}}">
                    <div style="border:1px solid ; width: 200px  ; height: 100px; margin: 20px auto"  class="text-center" >Mua sắm sản phẩm</div>
                </a>
            </div>
            </div>
        </div>
    </section>
    @endif
</div>
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('public/js/order.js')}}"></script> 
@endsection


