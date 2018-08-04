@extends('layouts.index')

@section('main')

<section class="main-container col2-right-layout">
  	<div class="main container">
		<div class="row">
		  	<div class="col-main col-sm-9 col-xs-12">
		 		<div class="page-content checkout-page">
		 			<h3>{{__('admin.user')}}:  {{Auth::user()->name}}</h3>
		 			<h4>{{__('admin.order')}}</h4>
		 			<div class="page-title">
			 			<div class="col-md-8">
			 				@foreach(Cart::content() as $cart)
			 				<div class="col-md-3">
			 					<a href="{{route('product_details',['id' => $cart->id])}}">
			 						<img src="{{asset('uploads/'.$cart->options['image'])}}" alt="Product" width="100px">
			 					</a>
			 				</div>
			 				<div class="col-md-9">
			 				    <h4 class="product-name">{{$cart->name}}</h4>
			 					<span>{{__('form.price')}}: {{number_format($cart->price)}} VNĐ</span>
			 					<div>{{__('form.total')}}: {{number_format($cart->qty)}} sản phẩm</div>
			 				</div>
			 				<div class="clearfix"></div>
			 				@endforeach
			 			</div>
					</div>	
					<div class="col-md-4">
						<h3 style="color:red">{{__('form.gross_product')}}: {{Cart::count()}}</h3>
						<p>{{__('form.subtotal')}}: {{Cart::subtotal()}} VNĐ</p>
						<a class="" href="{{route('home')}}"><i class="fa fa-arrow-left"> </i>&nbsp;{{__('home.buy_now')}}</a>
					</div>	
					<div class="box-border">
						<hr>
						<div class="row">
							<div class="col-sm-9">
								<h4>{{__('form.fill_information')}}</h4>
								<hr>
								<form method="post" action="{{route('checkoutOrder')}}">	
									<input type="hidden" value="{{csrf_token()}}" name="_token">								
									<div  id="home" >
										<div class="" >
											<h4 class="complete">{{__('form.adress_customer')}}:</h4> 
											<input type="radio" name="adress_user" id="input"  value="{{Auth::user()->adress}}" checked="" pattern="" title="">*  {{Auth::user()->adress}} 
											<p>
												<a class="edit-adress-user" style="color:red; cursor: pointer;">
												{{__('form.change')}}: </a>	
												<div class="adress-edit" style="display: none;" >
													{{__('form.adress_confirm')}}: 
													<input type="text" value="{{Auth::user()->adress}}" style="width: 400px;  padding: 20px; line-height: 10px; border-radius: 5px" name="adress">
												</div>						
											</p>
										</div>
									</div>
									<hr>
									<div class="block-content " style="font-size: 16px">
										<h4 class="complete">{{__('admin.pay')}}</h4>
										<p class="complete">
											<div>
												@foreach($pays as $pay)
												<div class="container">
													<div class="radio">
														<p>
															<input type="radio" name="pay" value="{{$pay->id}}" checked="checked"> {{$pay->name}}
															<p><?php echo $pay->description; ?></p>
														</p>
													</div>
												</div>
												@endforeach
											</div>
										</p>
										<hr>
										<dt class="complete">{{__('admin.ship')}}</dt>
										<p class="complete">
											<div>
												@foreach($ships as $ship)
												<div class="container">
													<div class="radio">
														<p>
															<input type="radio" name="ship" value="{{$ship->id}}" checked="checked"> {{$ship->name}}
															<p>* {{$ship->description}}</p>
															<p for="">* {{number_format($ship->price)}} VNĐ</p>
														</p>
													</div>
												</div>
												@endforeach
											</div>
										</p>				 
								  	</div>
									<h4 class="complete">{{__('form.phone')}}</h4>
									<input type="number" class="form-control input" placeholder="Số điện thoại người nhận" value="{{Auth::user()->phone}}" name="phone">    
									<button type="submit" style="margin: 20px 0; padding: 10px; background: #fed700; border-radius: 5px"  onclick="alert({{trans('form.check_mail')}})">
										&nbsp; 
										<span>{{__('home.checkout')}}</span>
									</button>                				
								</form>
							</div>				
						</div>
					</div>
				</div>
			</div>
			<aside class="right sidebar col-sm-3 col-xs-12">
				<div class="sidebar-checkout block">
					<div class="sidebar-bar-title">
						<h3>
							<a href="">{{__('home.my_order')}}</a>
						</h3>
					</div>
					<div class="block-content" style="font-size: 16px">
						<h3 class="complete">{{__('admin.pay')}}</h3>
						<p class="complete">
							<adress>
								@foreach($wars as $war)
								<p><span class="glyphicon glyphicon-certificate"></span>  {{$war->time}} {{$war->type}}</p>
								@endforeach
							</adress>
						</p>
						<dt class="complete">{{__('admin.ship')}}</dt>
						<p class="complete">
							<adress>
								@foreach($ships as $ship)
								<div class="radio">
									<label>
										<input type="radio" name="ship" value="{{$ship->id}}" checked="checked">
										{{$ship->name}}
									</label>
									<label for="">{{number_format($ship->price)}} VNĐ</label>
								</div>
								@endforeach
							</adress>
						</p>				 
				  	</div>
				</div>
			</aside>
		</div>
 	</div>
</section>
 
@endsection

@section('script')
	<script type="text/javascript" src="{{asset('public/js/checkout.js')}}">						
	</script>
@endsection