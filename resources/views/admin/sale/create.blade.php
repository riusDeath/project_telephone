@extends('admin.layouts.admin')

@section('content') 
    <div class="container"> 
        <form action="" method="POST" role="form" enctype="multipart/form-data">
            <legend>{{ __('admin.add',['name' => trans('admin.sale')]) }}</legend>
            <p>{{  isset($mess)?$mess:''  }}</p>
            @foreach($errors->all() as $err)
            <div class="alert alert-danger">
            {{ $err }} 
            <br/>
            </div>
            @endforeach
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">      
            <div class="form-group">
                <label for="">{{ __('form.name') }}</label>
                <input type="text" name="name" class="form-control has-error"  placeholder="{{ __('form.name') }}" required="required" value="{{ old('name') }}">
                @if($errors->has('name'))
                <div class="help-block">
                   {{ $errors->first('name') }}
               </div>
               @endif               
            </div>
            <div class="form-inline">
                <div class="form-group">
                    <label for="">{{ __('form.image') }}</label>
                    <input type="file" name="link" class="form-control"  placeholder="image" required="">
                </div>
                <div class="form-group">
                    <label for="">{{ __('home.sale') }}</label>
                    <input type="number" name="sale" class="form-control" required="required" min="0" value="{{ old('total') }}"> %
                </div>
                <div class="form-group">
                    <label for="">{{ __('form.total') }}</label>
                    <input type="number" name="total" required min="1"> 
                </div>
            </div>           
            <div class="form-group">
            <label for="">{{ __('form.description') }}</label>
            <textarea name="description" id="description" rows="10" cols="80" required="">{{ old('description') }} </textarea>
            <script>
                CKEDITOR.replace( 'description',
                {
                    filebrowserBrowseUrl: 'http://localhost:8080/shop/shop1/public/ckfinder/ckfinder.html',
                    filebrowserUploadUrl: 'http://localhost:8080/shop/shop1/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
                });

            </script>
            </div>
            <div class="form-inline">                
                {{ __('form.date_create') }}<input type="date" name="date_create" id="input" class="form-control date_create" value="" required="required" title="">
                {{ __('form.date_end') }}<input type="date" name="date_end" id="input" class="form-control date_end" value="" required="required" title="">
            </div>
            <div class="form-group">
                    <label for="">{{ __('form.status') }}</label>
                    <input type="radio" value="1" name="status" checked=""> {{ __('form.show') }}
                    <input type="radio" value="0" name="status"> {{ __('form.hidden') }}
                </div>
            <input type="checkbox" name="add_more" checked="">  
            <button type="submit" class="btn btn-primary">{{ __('admin.add',['name' => '']) }}</button>
        </form>
    </div>
    <hr>
@endsection

@section('script')
<script type="text/javascript" src="{{ url('/') }}/public/js/sale.js"></script>
@endsection
