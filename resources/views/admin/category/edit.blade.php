@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Sửa danh mục</div>
    @if(isset($thongbao))
        <h1>{{$thongbao}}</h1>
    @endif
    <!-- Table -->
    <!-- S4NvZQ5LKbVZwRJ5Xwf87e6mEbPYv45GAsvcD55D -->
    <div class="panel-body">
        <form action="" method="POST" role="form">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <input type="hidden" name="status" value="1">
           <div class="form-group">
               <label for="">Tên danh mục</label>
               <input type="text" class="form-control" name="name" placeholder="Tên danh mục" value="{{$cat->name}}" id="name">
               @if($errors->has('name'))
               <div class="help-block">
                   {{$errors->first('name')}}
               </div>
               @endif
           </div>
            <div class="form-group">
               <label for="">Đường dẫn tĩnh</label>
               <input type="text" class="form-control" name="slug" placeholder="Đường dẫn tĩnh" id="slug" value="{{$cat->slug}}">
               @if($errors->has('slug'))
               <div class="help-block">
                   {{$errors->first('slug')}}
               </div>
               @endif
           </div>
           <div class="form-group">
             <label for="">Danh mục cha</label>
             <select name="parent" id="">
              </option>
               <option 
                  @if($cat->parent == 0)
                   {{"selected"}}
                  @endif
               value="0">Là danh mục cha</option>
               @foreach($cats as $catt)
                <option 
                  @if($cat->parent == $catt->id)
                  {{"selected"}}
                  @endif
                value="{{$catt->id}}">{{$catt->name}}</option>
               @endforeach
             </select>
           </div>

           
           <button type="submit" class="btn btn-primary">Sửa</button>
       </form>
    </div>
</div>
@stop()