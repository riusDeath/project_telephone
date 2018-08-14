@extends('admin.layouts.admin')

@section('content')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">{{ __('admin.Active') }}</div>
    <div class="panel-body">
        <form action="{{ route('logs') }}" class="form-inline" role="form" method ="post">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            @if(isset($mess))
                <div class="alert">{{ $mess }}</div>
            @endif
           <!--  <div class="form-group">
                <input class="form-control" name="search" placeholder="search id admin" title="id of name admin">
            </div>  -->
            <div class="form-group">
                <select name="targetable_type" id="input" class="form-control" required="required">
                    <option value="all">{{ __('admin.all') }}</option>
                    <option value="product">{{ __('admin.product') }}</option>
                    <option value="category">{{ __('admin.category') }}</option>
                    <option value="user">{{ __('admin.user') }}</option>
                    <option value="code_discount">{{ __('admin.code') }}</option>
                    <option value="sale">{{ __('admin.sale') }}</option>
                    <option value="slider">{{ __('admin.slider') }}</option>
                </select>
                <label for=""> {{ __('admin.targetable_type') }} </label>
            </div>
            <div class="form-group form-inline">               
                 <input type="date" name="created_at" id="input" class="form-control date_create" value=""  title="">
                 <label for=""> {{ __('form.create') }} </label>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('form.search') }}</button>        
        </form>
    </div>
    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>Admin</th>
                <th>{{ __('form.name') }}</th>
                <th>{{ __('admin.action') }}</th>
                <th>{{ __('admin.targetable_id') }}</th>
                <th>{{ __('admin.targetable_type') }}</th>
                <th>{{ __('form.create') }}</th>
            </tr>            
        </thead>
        <tbody>
        @foreach($logs as $log)
            <tr>
                <td>id: {{ $log->user_id }}</td>
                <td> {{ $log->user->name }}</td>
                <td>{{ $log->action }}</td>
                <td>{{ $log->targetable_id }}</td>
                <td>{{ $log->targetable_type }}</td>
                <td>{{ $log->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ $logs->links() }}
    </div>     
</div>
@stop()