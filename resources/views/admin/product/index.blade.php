@extends('admin.layouts.admin')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight ecommerce">
    <div class="ibox-content m-b-sm border-bottom">
    <div class="row">
        <form action="" method="get" class="form-inline" role="form">
            <input type="hidden" value="{{csrf_token()}}" name="_token">
            <div class="form-group">
                <input type="text" class="form-control" name="search" placeholder="Search name or id">
            </div>
            <div class="form-group">
                <select name="sort"  class="form-control">
                    <option value="0" selected>{{__('admin.all_product')}}</option>
                    <option value="1" >{{__('admin.item_is_empty')}}</option>
                    <option value="2">{{__('admin.sort_rate')}}</option>
                </select>
            </div>                                         
            <button type="submit"  class="btn btn-primary">{{__('form.search')}}</button>
            <a href="{{route('add_product')}}">{{__('admin.add', ['name' => ''])}}</a>
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
                        <th data-toggle="true">{{__('form.name')}}</th>
                        <th data-hide="phone">{{__('form.image')}}</th>
                        <th data-hide="phone">{{__('admin.Specification')}}</th>
                        <th data-hide="phone">{{__('form.price')}}</th>
                        <th data-hide="phone">{{__('form.price_sale')}}</th>
                        <th data-hide="phone,tablet" >{{__('form.total')}}</th>
                        <th data-hide="phone,tablet" >rate</th>
                        <th data-hide="phone">{{__('form.status')}}</th>
                        <th data-hide="phone">Hot</th>
                        <th class="text-right" data-sort-ignore="true">{{__('form.Action')}}</th>
                </thead>
                <tbody>
                @foreach($products as $pro)
                    <tr>
                        <td> {{ $pro->id}} </td>
                        <td> {{ $pro->name}} </td>
                        <td>
                            <img src="../uploads/<?php echo $pro->image ?>" alt="" width="50px"> 
                        </td>
                        <td>
                            <a href="{{route('attributes',['id' => $pro->id])}}" class="label label-info">view</a>
                        </td>
                        <td>
                            {{ number_format($pro->price)}} VND
                        </td>
                        <td>
                            {{ number_format($pro->price_sale)}} VND
                        </td>
                        <td> {{ $pro->total}} </td>
                        <td> {{ $pro->avg_rate}} </td>
                        <td>
                            <span class="label label-primary">
                                {{ $pro->status==1?"Show":"Hidden" }}
                            </span>
                        </td>
                        <td>
                            @if($pro->hot == 1)
                                <a href="{{route('product_hot',['id' => $pro->id , 'hot'=> 0 ] )}}" class="label label-danger">Hot</a>
                            @else
                                <a href="{{route('product_hot',['id' => $pro->id ,'hot'=> 1])}}" class="label label-success">{{__('form.normal')}}</a>
                            @endif
                            </td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a href="{{route('view_product',['id' => $pro->id ])}}" class="btn-white btn btn-xs btn-info">view</a>
                                        <a href="{{route('update_product',['id' => $pro->id])}}" class="btn-white btn btn-xs btn-danger">{{__('admin.update',['name' => ''])}}</a>
                                        <a href="{{route('view-list-image',['id' => $pro->id])}}" >{{__('form.list_image')}}</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                </tbody>
            </table>
            {!!$products->links() !!}                       
        </div>
        </div>
    </div>
    </div>
</div>
    

@endsection
