@extends('layouts.admin')

@section('content')
	<div class="wrapper wrapper-content animated fadeInRight ecommerce">
		<div class="">
		<div class="jumbotron" style="padding:10px">
			@if(isset($thongbao))
				<div class="alert alert-success">{{$thongbao}}</div>
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
				<p>Địa chỉ: {{$user_login->adress}}</p>
				<p>Số điện thoại: {{$user_login->phone}}</p>
				<p>Quyền truy cập: {{$user_login->grade}}</p>	
				</div>
			</div>
			<!-- <div class="panel-body"> -->
	      <div class="col-md-7">
	      	  <form action="{{route('sua-ho-so-admin',['id' => $user_login->id])}}" method="POST" role="form">
	      	    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
	      	    
	      	   <div class="form-group">
	      	       <label for="">Họ và tên</label>
	      	       <input type="text" class="form-control" name="name" placeholder="Tên admin" value="{{$user_login->name}}" >
	      	   </div>
	      	    <div class="form-group">
	      	       <label for="">Địa chỉ</label>
	      	       <input type="text" class="form-control" name="adress" placeholder="Địa chỉ" value="{{$user_login->adress}}" >
	      	
	      	   </div>
	      	   <div class="form-group">
	      	   	<input type="checkbox" id="chagneEmail">
	      	     <label for="">Email</label>
	      	       <input type="email" class="form-control email" name="email" placeholder="Email" value="{{$user_login->email}}" readonly>
	      	   </div> 
	      	   <div class="form-group">
	      	     <label for="">Số điện thoại</label>
	      	       <input type="number" class="form-control" name="email" placeholder="Email" value="{{$user_login->phone}}" >
	      	   </div>        
	      	    <div class="form-group">
	      	     <label for="">
	      	    <input type="checkbox" id="changePassword" name="changePassword">
	      	     Đổi mật khẩu</label>
	      	       <input type="password" class="form-control password" name="password" placeholder="password" value="" disabled="">
	      	
	      	   </div>
            <input type="hidden" name="email_confrim" value="{{$user_login->email}}">
            
	      	 
	      	  <div class="form-group">
	      	       <label for="">Nhập lại mật khẩu</label>
	      	        <input type="password" class="form-control password passwordAgain" name="passwordAgain" placeholder="password" disabled>
	      	  </div>  	
	      	   
	      	   <button type="submit" class="btn btn-primary">Sửa thông tin</button>
	      	</form>
	     	 </div>
   			 <!-- </div>									 -->
			</div>
			

		</div>
	</div>
</div>
	</div>
@endsection
@section('script')
    <script type="text/javascript">
         $(document).ready(function(){
            $('#changePassword').change(function(){
                if($(this).is(":checked")){
                  $(".password").removeAttr('disabled');
                }else{
                  $(".password").attr('disabled','');
                }
            });
            $('#chagneEmail').change(function(){
            	if($(this).is(":checked")){
            		$('.email').removeAttr('readonly');

            	}else{
            		$('.email').attr('readonly','');
  

            	}
            });
         });
    </script>
@endsection
