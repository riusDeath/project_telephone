@extends('admin.layouts.admin')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight ecommerce">
    <div class="ibox-content m-b-sm border-bottom">
    <div class="row">
        <form action="" method="get" class="form-inline" role="form">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <div class="form-group">
                <input type="text" class="form-control" name="search" placeholder="Search name or id">
            </div>                                       
            <button type="submit"  class="btn btn-primary">{{ __('form.search') }}</button>
            <a href="{{ route('add-sale') }}">{{ __('admin.add', ['name' => '']) }}</a>
        </form>
    </div>
    <div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                <thead>
                    <tr>                                 
                        <th data-toggle="true">ID</th>
                        <th data-toggle="true">{{ __('form.name') }}</th>
                        <th data-hide="phone">{{ __('form.image') }}</th>
                        <th data-hide="phone">{{ __('home.sale') }}</th>
                        <th data-hide="phone">{{ __('form.status') }}</th>
                        <th data-hide="phone">{{ __('form.total') }}</th>
                        <th data-hide="phone">{{ __('form.date_create') }}</th>
                        <th data-hide="phone">{{ __('form.date_end') }}</th>
                        <th class="text-right" data-sort-ignore="true">{{ __('form.Action') }}</th>
                </thead>
                <tbody>
                @foreach($sales as $sale)
                    <tr>
                        <td> {{  $sale->id }} </td>
                        <td> {{  $sale->name }} </td>
                        <td>
                            <img src="../uploads/<?php echo $sale->image ?>" alt="" width="50px"> 
                        </td>                      
                        <td>
                            {{  $sale->sale }} %
                        </td>
                        <td>
                            <span class="label label-primary">
                                {{  $sale->status==1?__('form.show'):__('form.hidden')  }}
                            </span>
                        </td>
                        <td>{{ $sale->total }}</td>
                        <td>
                            {{ $sale->date_create }}
                        </td>
                        <td>
                            {{ $sale->date_end }}
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <a href="{{ route('edit-sale',['id' => $sale->id ]) }}" class="btn-white btn btn-xs btn-info">{{ __('form.update') }}</a>
                                <a href="{{ route('change-sale',['id' => $sale->id]) }}" >{{ __('form.change') }}</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                {{ $sales->links() }}
            </table>
        </div>
        </div>
    </div>
    </div>
</div>
    

@endsection
