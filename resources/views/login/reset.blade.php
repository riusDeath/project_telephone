@extends('layouts.index')

@section('main')

<div class="container" style="margin: 50px">
	<div class="dang_nhap">
		<form  method="POST" role="form">
			<input type="hidden" name="_token" value="{{ csrf_token()}}">
			<legend>{{__('form.register')}}</legend>
			<div class="col-md-6">		
				<div class="form-group">
					<label for="">{{__('form.email')}}*</label>
					<input type="email" class="form-control" id="" placeholder="{{__('form.email')}}" name="email" required>
				</div>				
				<a href="{{route('resetPassword')}}"  name="btn" class="btn btn-info  reset" >	{{__('passwords.reset_password')}} </a>
				<label for="" class="sign_up_text">{{__('passwords.have_account')}} 
					<a href="{{route('login')}}" class="">{{__('passwords.login')}}</a> {{__('passwords.here')}}
				</label>
			</div>
		</form>
	</div>
</div>
<div class="modal fade model-mess" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h1 class="modal-title"></h1>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{asset('public/js/resetPassword.js')}}"></script>
@endsection

