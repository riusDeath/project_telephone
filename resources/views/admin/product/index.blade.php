
@extends('layouts.admin')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight ecommerce">
    <div class="ibox-content m-b-sm border-bottom">
    <div class="row">
        <form action="" method="get" class="form-inline" role="form">
            <input type="hidden" value="{{csrf_token()}}" name="_token">
            <div class="form-group">
                <label class="sr-only" for="">Tên sản phẩm hoặc id sản phẩm</label>
                <input type="text" class="form-control" name="search" placeholder="Tìm kiếm theo tên hoặc id">
            </div>
            <div class="form-group">
                <select name="sort"  class="form-control">
                    <option value="0" selected>Tất cả sản phẩm</option>
                    <option value="1" >Sản phẩm hết hàng</option>
                    <option value="2">Độ yêu thích của sản phẩm</option>
                </select>
            </div>                                         
            <button type="submit"  class="btn btn-primary">Tìm kiếm</button>
            <a href="{{route('them-san-pham')}}">Thêm mới</a>
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
                        <th data-toggle="true">Tên sản phẩm</th>
                        <th data-hide="phone">Ảnh đại diện</th>
                        <th data-hide="phone">Thông số kỹ thuật</th>
                        <th data-hide="phone">Giá</th>
                        <th data-hide="phone">Giá sale</th>
                        <th data-hide="phone,tablet" >Số lượng</th>
                        <th data-hide="phone,tablet" >Độ sao </th>
                        <th data-hide="phone">Trạng thái</th>
                        <th data-hide="phone">Độ Hot</th>
                        <th class="text-right" data-sort-ignore="true">Thao tác</th>
                    </tr>
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
                            <a href="{{route('xem-thong-so-ky-thuat',['id' => $pro->id])}}" class="label label-info">Xem</a>
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
                                {{ $pro->status==1?"Hiển thị":"Ẩn" }}
                            </span>
                        </td>
                        <td>
                            @if($pro->hot == 1)
                                <a href="{{route('san-pham-hot',['id' => $pro->id , 'hot'=> 0 ] )}}" class="label label-danger">Hot</a>
                            @else
                                <a href="{{route('san-pham-hot',['id' => $pro->id ,'hot'=> 1])}}" class="label label-success">bình thường</a>
                            @endif
                            </td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a href="{{route('xem-san-pham',['id' => $pro->id ])}}" class="btn-white btn btn-xs btn-info">Xem</a>
                                        <a href="{{route('sua-san-pham',['id' => $pro->id])}}" class="btn-white btn btn-xs btn-danger">Sửa</a>
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
