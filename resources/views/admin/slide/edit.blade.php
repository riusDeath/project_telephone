@extends('admin.layouts.admin')

@section('content')
<div class="panel panel-default">

    <!-- Default panel contents -->
    <div class="panel-heading">sửa Slide</div>
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
             <label for="">Location slide</label>
             <select name="name" id="" required>
               <option value="home">Home</option>
               <option value="product">Product</option>
             </select>
           </div>
           <div class="form-group">
               <label for="">content slide</label>
               <textarea name="content" id="inputContent" class="form-control" rows="3" required="required">{{$slide->content}}</textarea>
           </div>
            <div class="form-group">
               <label for="">Image</label>
               <input type="file" class="form-control" name="link" required>
               <img src="{{asset('public/slider/'.$slide->link)}}" alt="">
           </div>           
           <button type="submit" class="btn btn-primary">Update</button>
       </form>
    </div>
</div>
@stop()