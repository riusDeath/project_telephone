@extends('admin.layouts.admin')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h3>{{__('admin.update',['name' => trans('admin.ship')])}}</h3>
			@if(isset($mess))
			<p>{{$mess}}</p>
			@endif
	
		    <div class="col-md-6">
				<p id="ship"></p>
				<form action="" method="POST" role="form">
					<input type="hidden" value="<?php echo csrf_token() ?>" name="_token">
					<div class="form-group">
						<label for="">{{__('form.name')}}</label>
						<input type="text" class="form-control" id="" placeholder="name ship" name="name" value="{{$ship->name}}">
					</div>	
					<div class="form-group">
						<label for="">{{__('form.price')}}: </label>
						<input type="text" class="form-control" id="" placeholder="{{__('form.price')}}" name="price" value="{{$ship->price}}">
					</div>	
					<div class="form-group">
						<label for="">{{__('form.adress')}}: </label>
						<input type="text" class="form-control" id="" placeholder="{{__('form.adress')}}" name="adress" value="{{$ship->adress}}">
					</div>		
					 <div class="form-group">
					 	<textarea name="description" id="description_ship" rows="10" cols="80"> {{$ship->description}} </textarea>
					 </div>
				<script>
				      CKEDITOR.replace( 'description_ship' );
				</script>										
					<button type="submit" class="btn btn-primary">{{__('admin.update',['name' => ''])}}</button>

				</form>
			</div>
		</div>
	</div>
@endsection

@section('script')

@endsection
