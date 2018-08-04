@extends('admin.layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{__('admin.add',['name' => trans('admin.Account')])}}</div>
        @if(isset($mess))
            <h3>{{$mess}}</h3>
        @endif
        @foreach($errors->all() as $err)
         <div class="alert alert-danger">
             {{$err}} <br/>
       </div>
        @endforeach
    <div class="panel-body">
        <form action="" method="POST" role="form">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <div class="form-group">
                <label for="">{{__('admin.grade')}}: </label>
                    @if(Auth::user()->grade == 'boss')
                    <input type="radio" name="grade" value="boss"> boss
                    <input type="radio" name="grade" value="admin"> admin
                    @endif
                    <input type="radio" name="grade" value="customer"> customer 
              </select>
            </div>
            <div class="form-group">
                <label for="">{{__('form.name')}}</label>
                <input type="text" class="form-control" name="name" placeholder="{{__('form.name')}}" value="{{old('name')}}" >
            </div>
            <div class="form-group">
                <label for="">{{__('form.adress')}}</label>
                <input type="text" class="form-control" name="adress" placeholder="{{__('form.adress')}}" value="{{old('adress')}}" >
            </div>
            <div class="form-group">
                <label for="">{{__('form.phone')}}</label>
                <input type="number" class="form-control" name="phone" placeholder="{{__('form.phone')}}" value="{{old('phone')}}" >
           </div>
           <div class="form-group">
                <label for="">{{__('form.email')}}</label>
                <input type="email" class="form-control" name="email" placeholder="{{__('form.email')}} adress" value="" >
           </div>                 
            <div class="form-group">
                <label for="">{{__('form.password')}}</label>
                <input type="password" class="form-control password"  placeholder="{{__('form.password')}}" name="password" >
            </div>           
            <button type="submit" class="btn btn-primary">{{__('form.add')}}</button>
       </form>
    </div>
</div>


@stop()