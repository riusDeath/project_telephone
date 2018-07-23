@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Thêm tài khoản</div>
      @if(isset($thongbao))
        <h3>Bạn đã thêm thành công</h3>
     @endif

        @foreach($errors->all() as $err)
         <div class="alert alert-danger">

             {{$err}} <br/>
       </div>

        @endforeach


    <!-- Table -->
    <!-- S4NvZQ5LKbVZwRJ5Xwf87e6mEbPYv45GAsvcD55D -->
    <div class="panel-body">
        <form action="" method="POST" role="form">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <div class="form-group">
              <label for="">Quyền truy cập</label>
              <select name="grade" id="inputGrade" class="form-control" required="required">
                @if(Auth::user()->grade == 'boss')
                <option value="admin">boss</option>
                @endif
                <option value="admin">admin</option>
                <option value="customer">customer</option>
              </select>
            </div>
           <div class="form-group">
               <label for="">Họ và tên</label>
               <input type="text" class="form-control" name="name" placeholder="Tên admin" value="{{old('name')}}" >
           </div>
            <div class="form-group">
               <label for="">Địa chỉ</label>
               <input type="text" class="form-control" name="adress" placeholder="Địa chỉ" value="{{old('adress')}}" >
           </div>
           <div class="form-group">
               <label for="">Số điện thoại</label>
               <input type="number" class="form-control" name="phone" placeholder="Số điện thoại" value="{{old('phone')}}" >
           </div>
           <div class="form-group">
             <label for="">Email</label>
               <input type="email" class="form-control" name="email" placeholder="Địa chỉ" value="" >
           </div>                 
          <div class="form-group">
               <label for="">Nhập mật khẩu</label>
                <input type="password" class="form-control password"  placeholder="password" name="password" >
          </div>
                   

           
           <button type="submit" class="btn btn-primary">Thêm mới</button>
       </form>
    </div>
</div>

@stop()