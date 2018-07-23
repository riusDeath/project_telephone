@extends('layouts.index')

@section('main')

	
			<div class="container">
				<div class="dang_nhap">
					<form action="" method="POST" role="form">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<legend>Đăng ký ngay!</legend>
					
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Tên đăng ký*</label>
								<input type="text" class="form-control" id="" placeholder="Vui lòng nhập tên của bạn" name="name" required>
							<div class="form-group">
								<label for="">Địa chỉ *</label>
								<input type="text" class="form-control" id="" placeholder="Vui lòng nhập địa chỉ của bạn" name="adress" required>
							</div>
							<div class="form-group">
								<label for="">Số điện thoại *</label>
								<input type="number" class="form-control" id="" placeholder="Vui lòng nhập số điện thoại của bạn" name="phone" required>
							</div>
							
							
						</div>
					
						
					<div class="col-md-6">
						</div>
							<div class="form-group">
								<label for="">Địa chỉ email*</label>
								<input type="email" class="form-control" id="" placeholder="Vui lòng nhập email của bạn" name="email" required>
							</div>
							<div class="form-group">
									<label for="">Mật khẩu*</label>
									<input type="password" class="form-control" id="" placeholder="Vui lòng nhập mật khẩu của bạn" name="password" required>
							</div>
							<div class="form-group">
									<label for="">Nhập lại Mật khẩu*</label>
									<input type="password" class="form-control" id="" placeholder="Vui lòng nhập mật khẩu của bạn" name="password_confirm" required>
							</div>

						
							
						<input type="submit" name="btn" class="btn btn-info  sign_up" value="Đăng ký">
						
						<label for="" class="sign_up_text">Bạn đã có tài khoản? <a href="{{route('dang-nhap')}}" class="label label-success">Đăng nhập</a> tại đây</label>
					</div>
					</form>
						</div>
			</div>
	

@endsection

