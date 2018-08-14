@extends('admin.layouts.admin')

@section('content') 
    <div class="container"> 
        <form action="" method="POST" role="form" enctype="multipart/form-data">
            <legend>{{ __('admin.add',['name' => trans('admin.code')]) }}</legend>           
            @foreach($errors->all() as $err)
            <div class="alert alert-danger">
            {{ $err }} 
            <br/>
            </div>
            @endforeach
            <div class="form-group">
                    <label for="">{{ __('home.sale') }}:(%) </label>
                    <input type="number" name="sale" class="form-control" required="required" min="0" value="{{ old('total') }}" min="0" max="100"> 
                </div>
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">  
            <div class="form-group form-inline">               
                {{ __('form.date_create') }}: <input type="date" name="date_create" id="input" class="form-control date_create" value="" required="required" title="">
                {{ __('form.date_end') }}: <input type="date" name="date_end" id="input" class="form-control date_end" value="" required="required" title="">
            </div>
            <div class="form-group form-inline">
                <input type="radio" value="1" name="select_user" checked="" class="select_user" >{{ __('form.random') }} <span class="qty">1</span> {{ __('admin.user') }}   
                <input type="radio" value="2" name="select_user" class="select_user" > {{ __('form.choose_email') }}   
            </div>
            <div class="random">
                {{ __('form.qty_code') }}: <input type="number" value="1" name="total" class="qty_code">
            <p>{{  isset($mess)?$mess:''  }}</p>
            </div>
            <div class="user " style="display: none">
                <input type="text" class="form-control email" placeholder="{{ __('form.each_email') }}" name="email">
                <div class="scroll">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th></th>
                                <th>{{ __('form.name') }}</th>
                                <th>{{ __('form.email') }}</th>
                                <th>
                                    <input type="checkbox" class="sort_total" title="{{ __('form.sort') }}">
                                    {{ __('form.total') }} {{ __('admin.order') }}
                                </th>
                                <th>
                                    <input type="checkbox" class="sort_total" title="{{ __('form.sort') }}">
                                    {{ __('form.price') }} VNĐ
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td><input type="checkbox" class="choose" name="choose" value="{{ $user->email }}" ></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->order->count() }}</td>
                                <td>{{ number_format($user->price()) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <input type="checkbox" name="add_more" checked="">  
            <button type="submit" class="btn btn-primary " >{{ __('home.send') }}</button>
        </form>
    </div>
    <hr>
@endsection

@section('script')
<script type="text/javascript" src="{{ url('/') }}/public/js/sale.js"></script>
<script type="text/javascript" >
     $(document).ready(function(){
        $(document).on('keyup', '.qty_code', function(){
            var qty = $(this).val();
            if (qty > 0) {
                $('.qty').html(qty);
            }
        });

        $(document).on('click', '.select_user', function(){
            var select = $(this).val();
            var qty = $('.qty-code').val();
            if (select == 2) {
                $('.user').show();
                $('.random').hide();
            } else {
                $('.random').show();
                $('.user').hide();
            }
        }); 

        $(document).on('keyup', '.email', function(){
            var emails = $(this).val();
            console.log(emails.split(",").length);
        });

        $(document).on('change', '.all', function(){
            $('.choose').prop('checked', this.checked);  
        });

        $(document).on('change', '.choose', function(){
            var email = $(this).val();
            var emails = $('.email').val();

            if ($(this).is(':checked','')) {
                $('.email').val(emails+' '+email);
            } else {
                emails = emails.replace(" "+email, "");
                $('.email').val(emails);
            }
        });
    });
</script>
@endsection
