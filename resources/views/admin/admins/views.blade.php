@extends('admin.layouts.admin')

@section('content')
	<div class="wrapper wrapper-content animated fadeInRight ecommerce">
		<div class="">
		<div class="jumbotron" style="padding:10px">
			@if(isset($mess))
				<div class="alert alert-success">{{$mess}}</div>
			@endif
			@if(count($errors) >0)
				@foreach($errors as $err)
					{{$err}} <br>
				@endforeach
			@endif
		<div class="row">
			<div class="col-md-5">
				<h3> {{$user_login->name}}</h3>
				<p>ID: {{$user_login->id}}| {{date('d/m/Y',strtotime($user_login->created_at))}}  </p>
				<div class="col-md-6"  style="padding:0px">	
				<p>Email: {{$user_login->email}}</p>
				<p>{{__('form.adress')}}: {{$user_login->adress}}</p>
				<p>{{__('form.phone')}}: {{$user_login->phone}}</p>
				<p>{{__('admin.grade')}}: {{$user_login->grade}}</p>	
				</div>
			</div>
	      	<div class="col-md-7">
	      	  	<form action="{{route('update-admin',['id' => $user_login->id])}}" method="POST" role="form">
	      	    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">	      	    
	      	   	<div class="form-group">
	      	       <label for="">{{__('form.name')}}</label>
	      	       <input type="text" class="form-control" name="name" placeholder="{{__('form.name')}}" value="{{$user_login->name}}" >
	      	   	</div>
	      	    <div class="form-group">
	      	       <label for="">{{__('form.adress')}}</label>
	      	       <input type="text" class="form-control" name="adress" placeholder="{{__('form.adress')}}" value="{{$user_login->adress}}" >   
	      	   	</div>
	      	   	<div class="form-group">
	      	   	<input type="checkbox" id="chagneEmail">
	      	     	<label for="">{{__('form.email')}}</label>
	      	       <input type="email" class="form-control email" name="email" placeholder="{{__('form.email')}}" value="{{$user_login->email}}" readonly>
	      	   	</div> 
	      	   	<div class="form-group">
	      	     	<label for="">{{__('form.phone')}}</label>
	      	      	<input type="number" class="form-control" name="email" placeholder="{{__('form.phone')}}" value="{{$user_login->phone}}" >
	      	   	</div>        
	      	    <div class="form-group">
	      	     	<label for="">
	      	    <input type="checkbox" id="changePassword" name="changePassword">
	      	     {{__('form.password')}}</label>
	      	       <input type="password" class="form-control password" name="password" placeholder="password" value="" disabled="">
	      	
	      	   	</div>
            <input type="hidden" name="email_confrim" value="{{$user_login->email}}">	      	 
	      	  	<div class="form-group">
	      	       	<label for="">{{__('form.password_confirm')}}</label>
	      	        <input type="password" class="form-control password passwordAgain" name="passwordAgain" placeholder="password" disabled>
	      	  	</div>  		      	   
	      	   	<button type="submit" class="btn btn-primary">{{__('form.update')}}</button>
	      	</form>
	     	</div>							
			</div>			
		</div>
	</div>
</div>
</div>
@endsection
@section('script')
    <script type="text/javascript" src="{{url('/')}}/public/js/admin_views.js"></script>
@endsection
