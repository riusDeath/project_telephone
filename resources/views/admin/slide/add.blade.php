@extends('layouts.admin')
@section('content')
<div class="panel panel-default">

    <!-- Default panel contents -->
    <div class="panel-heading">Thêm mới danh mục</div>
  <div>
    
    @if(isset($thongbao))
    {{thongbao}}
    @endif
  </div>
    <!-- Table -->
    <!-- S4NvZQ5LKbVZwRJ5Xwf87e6mEbPYv45GAsvcD55D -->
    <div class="panel-body">
        <form action="" method="POST" role="form">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <div class="form-group">
             <label for="">Vị tríc slide</label>
             <select name="name" id="" required>
               <option value="home">Thuộc trang chủ</option>
               <option value="product">Thuộc trang Sản phẩm</option>
             </select>
           </div>
           <div class="form-group">
               <label for="">Nội dung slide</label>
               <textarea name="content" id="inputContent" class="form-control" rows="3" required="required"></textarea>
           </div>
            <div class="form-group">
               <label for="">Ảnh</label>
               <input type="file" class="form-control" name="link" required>
           </div>           
           <button type="submit" class="btn btn-primary">Thêm mới</button>
       </form>
    </div>
</div>
@stop()