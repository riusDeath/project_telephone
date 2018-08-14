@extends('admin.layouts.admin')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight ecommerce">
    <div class="ibox-content m-b-sm border-bottom">
        <div class="container"> 
    </div>
    <div class="row">
        <form action="" method="post" class="form-inline" role="form">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <div class="form-group">
                <input type="text" class="form-control" name="search" placeholder="Search email or id">
            </div>                                       
            <button type="submit"  class="btn btn-primary">{{ __('form.search') }}</button>
            <a href="{{ route('add-code') }}">{{ __('admin.add', ['name' => '']) }}</a>
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
                        <th data-hide="phone">{{ __('admin.code') }}</th>
                        <th data-hide="phone">{{ __('home.sale') }}</th>
                        <th data-hide="phone">{{ __('form.mail') }}</th>
                        <th data-hide="phone">{{ __('form.status') }}</th>
                        <th data-hide="phone">{{ __('form.date_create') }}</th>
                        <th data-hide="phone">{{ __('form.date_end') }}</th>
                        <th class="text-right" data-sort-ignore="true">{{ __('form.Action') }}</th>
                </thead>
                <tbody>
                @foreach($code_discounts as $code_discount)
                    <tr>
                        <td> {{  $code_discount->id }} </td>
                        <td> {{  $code_discount->code }} </td>         
                        <td>
                            {{  $code_discount->sale }} %
                        </td>
                        <td> {{  $code_discount->mail }} </td> 
                        <td>
                            <span class="label label-primary">
                                {{  $code_discount->status==1?__('form.show'):__('form.hidden')  }}
                            </span>
                        </td>
                        <td>
                            {{ $code_discount->date_create }}
                        </td>
                        <td>
                            {{ $code_discount->date_end }}
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <a href="{{ route('change-code', ['id' => $code_discount->id]) }}">{{ __('form.change')
                                }} {{ __('form.status') }}</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                {{ $code_discounts->links() }}
            </table>
        </div>
        </div>
    </div>
    </div>
</div>
    
@endsection
