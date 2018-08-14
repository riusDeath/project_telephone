@extends('admin.layouts.admin')

@section('content')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Admin</div>
    @if(isset($mess))
        <div class="alert">{{ $mess }}</div>     
    @endif
    <div class="panel-body">
        <form action="" class="form-inline" role="form">
            <div class="form-group">
                <input class="form-control" name="search" placeholder="Search name ...">
            </div>                           
            <button type="submit" class="btn btn-primary">{{ __('form.search') }}</button>          
        </form>
    </div>
    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('form.name') }}</th>
                <th>{{ __('form.email') }}</th>
                <th>{{ __('form.phone') }}</th>
                <th>{{ __('admin.grade') }}</th>
                <th>{{ __('form.status') }}</th>
                <th>{{ __('form.create') }}</th>
                <th>{{ __('form.Action') }}</th>
            </tr>            
        </thead>
        <tbody>
        @foreach($admins as $admin)
            <tr>
                <td>{{ $admin->id }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->phone }}</td>
                <td>{{ $admin->grade }}</td>
                <td>
                    @if($admin->status==1)
                    <label for="" class="label label-info">{{ __('form.permission') }}</label>
                    @else
                    <label for="" class="label label-warning">{{ __('form.not_have_access') }}</label>
                    @endif
                </td>
                <td>{{ date_format($admin->created_at,'d/m/y') }}</td>
                <td>    
                    <a href="{{ route('update-admin',[ 'id'=> $admin->id ]) }}" class="label label-info">{{ __('form.update') }}</a>
                    @if(Auth::user()->grade == 'boss' && $admin->id != Auth::user()->id )
                    @if($admin->status==1  )
                    <a href="{{ route('delete-admin',['id' => $admin->id]) }}" class="label label-danger" onclick="confirm('{{ __('form.remoce_access') }} admin {{ $admin->name }}?')">{{ __('form.remoce_access') }}</a>
                    @else
                    <a href="{{ route('delete-user',['id' => $admin->id]) }}" class="label label-danger" onclick="confirm('{{ __('form.grand_access') }} {{ $admin->name }}?')">{{ __('form.grand_access') }}</a>
                    @endif                                    
                    @endif                                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>     
</div>
@stop()!