@extends('admin.layouts.admin')

@section('content') 
    <div class="container"> 
        <form action="" method="POST" role="form" enctype="multipart/form-data">
            <legend>{{__('admin.add',['name' => trans('admin.product')])}}</legend>
            <p>{{ isset($mess)?$mess:'' }}</p>
            @foreach($errors->all() as $err)
            <div class="alert alert-danger">
            {{$err}} 
            <br/>
            </div>
            @endforeach
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">      
            <div class="form-group">
                <label for="">{{__('form.name')}}</label>
                <input type="text" name="name" class="form-control has-error"  placeholder="{{__('form.name')}}" required="required" value="{{old('name')}}">
                @if($errors->has('name'))
                <div class="help-block">
                   {{$errors->first('name')}}
               </div>
               @endif               
            </div>
            <div class="form-group">
                <label for="">{{__('admin.category')}}y</label>
                <select name="category_id" id="input" class="form-control has-error" required="required" >
                    @foreach($categoris as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>   
            </div>
            <div class="form-group">
                <label for="">{{__('form.image')}}</label>
                <input type="file" name="link" class="form-control"  placeholder="image" required="">
            </div>
            <div class="form-group">
                <label for="">{{__('form.total')}}</label>
                <input type="number" name="total" class="form-control" required="required" min="0" value="{{old('total')}}">
            </div>
            <div class="form-group">
                <label for="">{{__('admin.product')}} hot: </label>
                <input type="radio" value="1" name="hot" > Hot
                <input type="radio" value="0" name="hot" checked=""> {{__('form.normal')}}
            </div>
            <div class="form-group">
            <label for="">{{__('form.description')}}</label>
            <textarea name="description" id="description" rows="10" cols="80" required="">{{old('description')}} </textarea>
            <script>
                CKEDITOR.replace( 'description',
                {
                    filebrowserBrowseUrl : '/browser/browse.php',
                    filebrowserUploadUrl : '/uploads/'
                });

            </script>

            </div>
            <div class="form-group">
                <label for="">{{__('form.price')}}</label>
                <input type="number" name="price" class="form-control" required="required" min="0" value="{{old('price')}}" required>
            </div>
            <div class="form-group">
                <label for="">{{__('form.price_sale')}}</label>
                <input type="number" name="price_sale" class="form-control"  min="0" value="{{old('price_sale')}}">
            </div>
                        
            <div class="form-group">
                <label for="">{{__('form.warranty_period')}}</label>                
                <select name="warranty_period_id" id="input" class="form-control" required="required">
                    @foreach($warranty_periods as $warr)
                    <option value="{{$warr->id}}">{{$warr->time}} {{$warr->type}}</option>
                    @endforeach
                </select>   
            </div>          
            <div class="form-group">
                <label for="">{{__('form.brand')}}</label>
                <select name="brand_id" id="input" class="form-control" required="required">
                    @foreach($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </select>               
            </div>              
            <div class="form-group">
                <label for="">{{__('form.status')}}</label>
                <input type="radio" value="1" name="status" checked=""> {{__('form.show')}}
                <input type="radio" value="0" name="status"> {{__('form.hidden')}}
            </div>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-inline">
                <input type="hidden" name="dem" value="0" class="dem">
                <legend>{{__('form.list_image')}}</legend>
                <div class="my_form">
                    <div class="form-group">
                    <input type="text" class="form-control color0 " id="" placeholder="Color" name="color0" required="">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control total" id="" placeholder="total" name="total0" required="" min="1" value="0">
                    </div>
                    <div class="form-group">
                        <input type="file" name="image0" class="form-control"  placeholder="image" required="" >
                    </div>
                    <a class="add_color form-group">
                        <img src="{{asset('uploads/search.png')}}" width="50px">
                    </a>
                </div>  
                <div class="double_div"></div>
            </div>
            <input type="checkbox" name="add_more" checked="">  
            <button type="submit" class="btn btn-primary">{{__('admin.add',['name' => ''])}}</button>
        </form>
    </div>
    <hr>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            var dem = 0;
            $(document).on('click', '.add_color', function(e){
                e.preventDefault();
                var color = '.color'+dem;
                var total = '.total'+dem;
                var color = $(color).val();
                var total = $(total).val();
                if (color.length !=0 && total !=0) {
                    dem ++;
                    $('.double_div').append('<div class="my_form"><div class="form-group"><input type="text" class="form-control color'+dem+' color" id="" placeholder="Color" name="color'+dem+'"></div><div class="form-group"><input type="number" min="1" class="form-control total'+dem+'" id="" placeholder="total" name="total'+dem+'"></div><div class="form-group"><input type="file" class="form-control " id="" placeholder="image" name="image'+dem+'"></div><a class="add_color form-group"><img src="{{url('/')}}/uploads/search.png" width="50px"></a></div>');
                    $('.dem').val(dem);
                } else {
                    alert('not ok');
                }           
            });
            $(document).on('keyup', '.color', function(e){
                e.preventDefault();
                for (var i = dem - 1; i >= 0; i--) {
                    var c = '.color'+i;
                    if ($(this).val() == $(c).val()) {
                        $(this).val('');
                        break;
                    }   
                }
            });
        });
    </script>
@endsection

