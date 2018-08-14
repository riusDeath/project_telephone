@extends('admin.layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{ __('admin.add', ['name' => trans('admin.category')]) }}</div>
    <div class="panel-body">
        <form action="" method="POST" role="form">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <input type="hidden" name="status" value="1">
           <div class="form-group">
               <label for="">{{ __('form.name') }}</label>
               <input type="text" class="form-control" name="name" placeholder="{{ __('form.name') }} " id="name">
               @if($errors->has('name'))
               <div class="help-block">
                   {{ $errors->first('name') }}
               </div>
               @endif
           </div>
            <div class="form-group">
               <label for="">{{ __('form.slug') }}</label>
               <input type="text" class="form-control" name="slug" placeholder="{{ __('form.slug') }}" id="slug">
               @if($errors->has('slug'))
               <div class="help-block">
                   {{ $errors->first('slug') }}
               </div>
               @endif
           </div>
           <div class="form-group">
             <label for="">{{ __('form.category_parent') }}</label>
             <select name="parent" id="">
               <option value="0">{{ __('form.category_parent') }}</option>
               @foreach($cats as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
               @endforeach
             </select>
           </div>           
           <button type="submit" class="btn btn-primary">{{ __('admin.add', ['name' => '']) }}</button>
       </form>
    </div>
</div>
@stop()