@extends('admin.layouts.admin')

@section('content')
	<div class="wrapper wrapper-content animated fadeInRight ecommerce">
		<div class="">
		<div class="" style="padding:10px">
		<div class="row">
			<h3>{{ $product->name }}</h3>

			<div class="col-md-4">
				<img src="{{ url('/') }}/uploads/<?php echo $product['image']?>" alt="" class="reponsive" width="300px">
			</div>
            <div class="col-md-8"  style="padding:0px"> 
            <div class="col-md-6">
			    <p>ID: {{ $product->id }}| {{ date('d/m/Y',strtotime($product->created_at)) }}  </p>           
			    <h3 for="">{{ number_format($product['price']) }}  VNĐ</h3>
                <p>{{ __('admin.category') }}: {{ $product->category->name }}</p>
                <p>{{ __('form.brand') }}: {{ $product->brand->name }}</p>
                            <p>{{ __('form.warranty_period') }}: {{ $product->warranty_period->time }} {{ $product->warranty_period->type }}</p>
            </div>
			<div class="col-md-6">
                <p>{{ __('form.total') }} : {{ $product->total }} cái</p>
                <p>{{ __('form.price') }}: {{ number_format($product['price']) }} VNĐ</p>
                <p>{{ __('form.price_sale') }}: {{ number_format($product['price_sale']) }} VNĐ</p>
                <p>Rate: {{ $product->avg_rate }} /5 starts</p>    
                <a href="{{ route('update_product',['id' => $product->id]) }}" class="btn btn-success">{{ __('form.update') }}</a>                                    
                </div>
            </div>	
        <div class="col-md-12">
            <p>
            <label for="">{{ __('form.description') }}:</label>
            <p>
                <?php echo $product->description; ?>        
            </p>
            </p>
            @if(count($product->list_images) !=0)
            <h3>
                <a class="list_image">{{ __('form.list_image') }}</a>
            </h3>
            <div class="table_list_image">
                <table class="table table-hover " >
                <thead>                 
                    <tr>
                        <th>{{ __('form.image') }}</th>
                        <th>{{ __('form.color') }}</th>
                        <th>{{ __('form.total') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product->list_images as $image)
                    <tr>
                        <td>
                            <img src="{{ url('/') }}/uploads/{{ $image->image }}" alt="" class="reponsive" width="100px">
                        </td>
                        <td>{{ $image->color }}</td>
                        <td>{{ $image->total }}</td>
                        <td>
                            <a href="" class="label label-danger">{{ __('form.delete') }}</a>
                        </td>                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <form action="{{ route('list-image', ['id' => $product->id]) }}" method="POST" role="form" class="form-inline" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="dem" value="0" class="dem">
                <legend>{{ __('form.list_image') }}</legend>
                <div class="my_form">
                    <div class="form-group">
                    <input type="text" class="form-control color0 " id="" placeholder="Color" name="color0" required="">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control total" id="" placeholder="total" name="total0" required="" min="1" value="0">
                    </div>
                    <div class="form-group">
                        <input type="file" name="image0" class="form-control"  placeholder="image" required="" >
                    </div>
                    <a class="add_color form-group">
                        <img src="{{ asset('uploads/search.png') }}" width="50px">
                    </a>
                </div>  
                <div class="double_div"></div>
                <button type="submit" class="btn btn-primary">{{ __('admin.add', ['name' => '']) }}</button>
            </form>
            </div>                    
            @endif
        </div>
        @if(count($comments) !=0) 
        <hr>       
        <h3>{{ __('form.table_commet') }}</h3>
        <table class="table table_comment">
        <thead>
            <tr>
                <th>id {{ __('admin.user') }}</th>
                <th>{{ __('admin.user') }}</th>
                <th>{{ __('form.description') }}</th>
                <th>{{ __('form.create') }}</th>
                <th>{{ __('form.Action') }}</th>
            </tr>            
        </thead>
        <tbody>
        @foreach($comments as $cm)
            <tr>
                <td>{{ $cm->user->id }}</td>
                <td>{{ $cm->user->name }}</td>
                <td>{{ $cm->comment }}</td>
                <td>{{ date_format($cm->created_at,'d/m/y') }}</td>
                <td>
                    <a href="{{ route('delete-comment',[
                        'id' => $cm->id,
                        'product_id' => $product->id
                    ]) }}" class="label label-danger delete_comment" >{{ __('form.delete') }}</a>
                </td>
            </tr>
            @foreach($comments_child as $cm_child)
            @if($cm_child->comment_style == $cm->id)
            <tr >
                <td></td>
                <td>{{ $cm_child->user->id }}: {{ $cm_child->user->name }}</td>
                <td>{{ $cm_child->comment }}</td>
                <td>{{ date_format($cm_child->created_at,'d/m/y') }}</td>
                <td>
                    <a href="{{ route('delete-comment',[
                        'id' => $cm_child->id,
                        'product_id' => $product->id
                    ]) }}" class="label label-danger delete_comment" >{{ __('form.delete') }}</a>
                </td>
            </tr>
            @endif
            @endforeach
        @endforeach
        </tbody>
        </table>
        @endif
        @if(count($product->rates) !=0)  
        <hr>    
        <h3>{{ __('form.rate') }}</h3>
        <table class="table ">
            <thead>
                <tr>
                    <th>id {{ __('admin.user') }}</th>
                    <th>{{ __('admin.user') }}</th>
                    <th>rate</th>
                    <th>{{ __('form.create') }}</th>
                </tr>            
            </thead>
            <tbody>
            @foreach($product->rates as $rate)
                <tr>
                    <td>{{ $rate->user->id }}</td>
                    <td>{{ $rate->user->name }}</td>
                    <td>{{ $rate->rate }}</td>
                    <td>{{ $rate->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @endif
		</div>		
	</div>
</div>
</div>
<input type="hidden" class="list_image" value="{{ $product->list_images[0] }}">

@endsection

@section('script')
<script type="text/javascript" src="{{ asset('public/js/views.product.js') }}"> 
</script>
<script type="text/javascript" src="{{ asset('public/js/list_image.js') }}">
</script>
<script type="text/javascript" src="{{ asset('public/js/comment.js') }}"></script>
@endsection