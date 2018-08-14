@extends('admin.layouts.admin')

@section('content')
	 <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-2">
                <div class="ibox float-e-margins">
                    <a href="{{ route('product') }}">
                        <div class="ibox-title">
                            <span class="label label-success pull-right"></span>
                            <h5>{{ __('admin.product') }}</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">{{ $total_product }}</h1>
                            <small>{{ __('admin.number_product') }}</small>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="ibox float-e-margins">
                    <a href="{{ route('order') }}">
                        <div class="ibox-title">
                            <span class="label label-info pull-right">Annual</span>
                            <h5>{{ __('admin.order') }}</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">{{ $total_orders }}</h1>
                            <small>{{ __('admin.order_number') }}</small>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right"></span>
                        <h5>{{ __('admin.user') }}</h5>
                    </div>
                    <div class="ibox-content">
                        <a href="{{ route('user') }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <h1 class="no-margins">{{ count($users) }}</h1>
                                    <div class="font-bold text-navy">{{ __('admin.user') }}<i class="fa fa-level-up"></i> </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
@endsection