@extends('admin.layouts.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{ __('admin.category') }}</div>
    <div class="panel-body">
        <form action="" class="form-inline" role="form">        
            <div class="form-group">
                <input class="form-control" name="search" placeholder="Serch name category...">
            </div>        
            <button type="submit" class="btn btn-primary">{{ __('form.search') }}</button>
            <a href="{{ route('add_category') }}" class="btn btn-success">{{ __('admin.add', ['name' => '']) }}</a>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('form.name') }}</th>
                <th>{{ __('form.create') }}</th>
                <th>{{ __('form.status') }}</th>
                <th>{{ __('form.Action') }}</th>
            </tr>            
        </thead>
        <tbody>
        @foreach($cats as $cat)
            <tr>
                <td>{{ $cat->id }}</td>
                <td>{{ $cat->name }}</td>
                <td>{{ $cat->created_at }}</td>
                <td>
                    {{ $cat->status==1?trans('form.show'):trans('form.hidden') }}
                </td>
                <td>
                    <a href="{{ route('update_category',['id' =>$cat->id]) }}" class="label label-success">{{ __('admin.update',  ['name' => trans('admin.category')]) }}</a>
                    <a href="{{ route('delete_category',['id' => $cat->id]) }}" class="label label-danger" onclick=" return confirm('You want to chage status {{ $cat->name }}?')">{{ __('form.change') }} {{ __('form.status') }}</a>
                </td>
            </tr>
            @foreach($cat_child as $cat_ch)
            @if($cat_ch->parent == $cat->id)
                <tr >
                <td></td>
                <td>{{ $cat_ch->id }}: {{ $cat_ch->name }}</td>
                <td>{{ $cat_ch->created_at }}</td>
                <td>
                    {{ $cat_ch->status==1?trans('form.show'):trans('form.hidden') }}
                </td>
                <td>
                    <a href="{{ route('update_category',['id' =>$cat_ch->id]) }}" class="label label-success">{{ __('admin.update',  ['name' => trans('admin.category')]) }}</a>
                    <a href="{{ route('delete_category',['id' => $cat_ch->id]) }}" class="label label-danger" onclick=" return confirm('You want to chage status {{ $cat_ch->name }}?')">{{ __('form.change') }} {{ __('form.status') }}</a>
                </td>
            </tr>
            @endif
            @endforeach
        @endforeach
        </tbody>
    </table>
     <div class="panel-footer">
        {{ $cats->links() }}
    </div>
</div>
@stop()