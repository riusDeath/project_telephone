@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Sửa thông tin</div>
    @if(isset($thongbao))
        <h1>Bạn đã sửa thành công</h1>
    @endif
  @if(count($errors) >0)
  <div class="alert alert-danger">
    @foreach($errors->all() as $err)
        {{$err}} <br/>
    @endforeach
  </div>
  @endif
    <!-- Table -->
    <!-- S4NvZQ5LKbVZwRJ5Xwf87e6mEbPYv45GAsvcD55D -->
    <div class="panel-body">
        <form action="" method="POST" role="form">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <input type="hidden" name="email_confrim" value="{{$cus->email}}">
           <div class="form-group">
               <label for="">Họ và tên</label>
               <input type="text" class="form-control" name="name" placeholder="Tên cus" value="{{$cus->name}}" >
           </div>
            <div class="form-group">
               <label for="">Địa chỉ</label>
               <input type="text" class="form-control" name="adress" placeholder="Địa chỉ" value="{{$cus->adress}}" >

           </div>
           <div class="form-group">
             <label for="">Email</label>
               <input type="email" class="form-control" name="email" placeholder="Email" value="{{$cus->email}}" >
           </div>    
            <div class="form-group">
             <label for="">Số điện thoại</label>
               <input type="number" class="form-control" name="phone" placeholder="phone" value="{{$cus->phone}}" >
           </div>        
            <div class="form-group">
             <label for="">
            <input type="checkbox" id="changePassword" name="changePassword">
             Đổi mật khẩu</label>
               <input type="password" class="form-control password" name="password" placeholder="password" value="" disabled="">

           </div>
         
          <div class="form-group">
               <label for="">Nhập lại mật khẩu</label>
                <input type="password" class="form-control password" name="passwordAgain" placeholder="password" disabled>
          </div>
                   

           
           <button type="submit" class="btn btn-primary">Sửa</button>
       </form>
    </div>
</div>


@section('script')
    <script type="text/javascript" src="{{asset('public/js/admin.js')}}"></script>
@endsection
@stop()