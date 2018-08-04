@extends('admin.layouts.admin')

@section('content')	
	<div class="container"> 
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			<legend>{{__('admin.update',['name' => trans('admin.product')])}}</legend>
		@if(isset($mess))
			<div class="alert alert-success">{{$mess}}</div>
		@endif		
		<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">		
			<div class="form-group">
				<label for="">{{__('form.name')}}</label>
				<input type="text" name="name" class="form-control"  placeholder="{{__('form.name')}}" required="required" value="{{$product->name}}">
				@if($errors->has('name'))
				<div class="help-block">
                   {{$errors->first('name')}}
               </div>
               @endif				
			</div>
			<div class="form-inline" style="margin:20px 0">				
			<div class="form-group">
				<label for="">{{__('form.warranty_period')}}</label>				
				<select name="warranty_period_id" id="input" class="form-control" required="required">
					@foreach($warranty_periods as $warr)
					<option 
					@if($product->warranty_period_id == $warr->id)
							{{"selected"}}
					@endif
					 value="{{$warr->id}}">{{$warr->time}} {{$warr->type}}</option>
					@endforeach
				</select>	
			</div>			
			<div class="form-group">
				<label for="">{{__('form.brand')}}</label>
				<select name="brand_id" id="input" class="form-control" required="required">
					@foreach($brands as $brand)
					<option 
					@if($product->brand_id == $brand->id)
							{{"selected"}}
					@endif
					 value="{{$brand->id}}">{{$brand->name}}</option>
					@endforeach
				</select>				
			</div>	
			<div class="form-group">
				<label for="">{{__('admin.category')}}</label>
				<select name="category_id" id="input" class="form-control" required="required">
					@foreach($categories as $cat)
					<option
						@if($product->category_id == $cat->id)
							{{"selected"}}
						@endif
					 value="{{$cat->id}}">{{$cat->name}}</option>
					@endforeach
				</select>	
			</div>
		</div>			
			<div class="form-group">
				<label for="">{{__('form.image')}}</label>
				<input type="file" name="link" class="form-control"  placeholder="Ảnh đại diện">
				<img src="{{asset('uploads/'.$product->image)}}" alt="" width="300px">
				<input type="text" name="imaget" value="{{$product->image}}">
			</div>
			
			<div class="form-group">
				<label for="">{{__('form.total')}}</label>
				<input type="number" name="total" class="form-control" required="required" min="0" value="{{$product->total}}">
			</div>
			<div class="form-group">
          	<label for="">{{__('form.description')}}</label>
         	<textarea name="description" id="description" rows="10" cols="80"> {{$product->description}} </textarea>
			<script>
				CKEDITOR.replace( 'description',
                {
			    extraPlugins: 'easyimage',
			    cloudServices_tokenUrl: 'https://example.com/cs-token-endpoint',
			    cloudServices_uploadUrl: 'https://your-organization-id.cke-cs.com/easyimage/upload/'
			    } );
			</script>
        	</div>
		<div class="form-inline">
			<div class="form-group">
				<label for="">{{__('form.price')}}</label>
				<input type="number" name="price" class="form-control" required="required" min="0" value="{{$product->price}}">
				@if($errors->has('price'))
				<div class="help-block">
                   {{$errors->first('price')}}
               </div>
               @endif
			</div>
			<div class="form-group">
				<label for="">{{__('form.price_sale')}}</label>
				<input type="number" name="price_sale" class="form-control" required="required" min="0" value="{{$product->price_sale}}" >
				@if($errors->has('price_sale'))
				<div class="help-block">
                   {{$errors->first('price_sale')}}
               </div>
               @endif
			</div>		
		</div>
			<div class="form-group">
				<label for="">Hot: </label>
				<input type="radio" value="1" name="hot" {{$product->hot == 1 ? 'checked':''}}> Hot
				<input type="radio" value="0" name="hot" {{$product->hot == 0 ? 'checked':''}}> {{__('form.normal')}}
			</div>		
			<div class="form-group">
				<label for="">{{__('form.status')}}</label>
				<input type="radio" value="1" name="status" {{$product->status==1?'checked':''}} >{{__('form.show')}}
				<input type="radio" value="0" name="status" {{$product->status==0?'checked':''}}> {{__('form.hidden')}}
			</div>
			<button type="submit" class="btn btn-primary">{{__('admin.update',['name' => trans('admin.product')])}}</button>
		</form>
	</div>
	@if(count($product->comments) !=0) 
    <hr>       
    <h3>{{__('form.table_commet')}}</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID </th>
                <th>{{__('admin.user')}}</th>
                <th>{{__('form.description')}}</th>
                <th>{{__('form.create')}}</th>
                <th>{{__('form.Action')}}</th>
            </tr>
            
        </thead>
        <tbody>
        @foreach($product->comments as $cm)
            <tr>
                <td>{{$cm->id}}</td>
                <td>{{$cm->user->name}}</td>
                <td>{{$cm->comment}}</td>
                <td>{{date_format($cm->created_at, 'd/m/y')}}</td>
                <td>
                    <a href="{{route('delete-comment',[
						'id' => $cm->id,
						'product_id' => $product->id
                    ])}}" class="label label-danger" onclick="confirm('Bạn muốn xóa comment {{$cm->id}}?')">{{__('form.delete')}}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>@endif
    <div class="panel-footer">   
    </div>	
@endsection



