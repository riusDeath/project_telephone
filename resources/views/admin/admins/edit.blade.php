@extends('admin.layouts.admin')

@section('content')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">{{ __('admin.update',['name' => trans('admin.Account')]) }}</div>
    @if(isset($mess))
        <h1>{{ $mess }}</h1>
    @endif
    @if(count($errors) >0)
    <div class="alert alert-danger">
    @foreach($errors->all() as $err)
        {{ $err }} <br/>
    @endforeach
    </div>
     @endif
    <!-- Table -->
    <div class="panel-body">
        <form action="" method="POST" role="form">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <input type="hidden" name="email_confrim" value="{{ $admin->email }}">
            <div class="form-group">
                <label for="">{{ __('form.name') }}</label>
                <input type="text" class="form-control" name="name" placeholder="{{ __('form.name') }}" value="{{ $admin->name }}" >
            </div>
            <div class="form-group">
                <label for="">{{ __('form.adress') }}</label>
                <input type="text" class="form-control" name="adress" placeholder="{{ __('form.adress') }}" value="{{ $admin->adress }}" >
            </div>
            <div class="form-group">
                <label for="">{{ __('form.email') }}</label>
                <input type="email" class="form-control" name="email" placeholder="{{ __('form.email') }}" value="{{ $admin->email }}" >
            </div>    
            <div class="form-group">
                <label for="">{{ __('form.phone') }}</label>
                <input type="number" class="form-control" name="phone" placeholder="{{ __('form.phone') }}" value="{{ $admin->phone }}" >
            </div>        
            <div class="form-group">
                <label for="">
                <input type="checkbox" id="changePassword" name="changePassword">
                {{ __('form.password') }}</label>
                <input type="password" class="form-control password" name="password" placeholder="{{ __('form.password') }}" value="" disabled="">
            </div>         
            <div class="form-group">
                <label for="">{{ __('form.password_confirm') }}</label>
                <input type="password" class="form-control password" name="passwordAgain" placeholder="{{ __('form.password_confirm') }}" disabled>
            </div>                           
           <button type="submit" class="btn btn-primary">{{ __('form.update') }}</button>
       </form>
    </div>
</div>


@section('script')
    <script type="text/javascript" src="{{ asset('public/js/admin.js') }}"></script>
@endsection
@stop()