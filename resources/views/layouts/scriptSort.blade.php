@section('script')
                <script type="text/javascript">
                  $(document).ready(function(){
                      $('.mysortok').change(function(e){
                        e.preventDefault();
                        var sort = $(this).val();
                        var href =  '{{url('/')}}/home/san-pham/sap-xep-san-pham/'+sort;
                    
                        alert(href);
                        console.log(sort);
                          $.ajax({
                            url: href,
                            type : "GET",
                            dataType:'json',
                             success:function(data){
                                console.log(data);
                                var temp = "";
                                $.each(data.products, function(index, value) {
                                  // temp+= '<li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 ">'+value.description+'</li>'; 
                                  temp += '<li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 "><div class="product-item"><div class="item-inner"><div class="product-thumbnail"><div class="icon-sale-label sale-left">Sale</div><div class="icon-new-label new-right">New</div><div class="pr-img-area"><a title="Ipsums Dolors Untra" href="{{url('/')}}/home/san-pham/chi-tiet-san-pham/'+value.id+'"><div> <img class="first-img" src="{{url('/')}}/uploads/'+value.image+' "><img class="hover-img" src="{{url('/')}}/uploads/'+value.image+' "></div> </a><span><a class="add-to-cart-mt " data-toggle="modal" href="#modal-id"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a></span> </a> </a><span><a class="add-to-cart-mt " data-toggle="modal" href="#modal-id"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a></span> </a></div><div class="pr-info-area"><div class="pr-button"><div class="mt-button add_to_wishlist"> <a href=""> <i class="fa fa-heart"></i> </a> </div><div class="mt-button add_to_compare"> <a href=""> <i class="fa fa-signal"></i> </a> </div><div class="mt-button quick-view"> <a href=""> <i class="fa fa-search"></i> </a> </div></div></div></div><div class="item-info"><div class="info-inner"><div class="item-title"> <a title="Ipsums Dolors Untra" href="">'+value.name+'</a> </div><div class="item-content"><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div><div class="item-price"><div class="price-box"><span class="regular-price"> <div class="item-price"><div class="price-box"> <span class="regular-price"> <span class="price">'+value.price+' VNĐ</span> </span> </div></div></div></div> </div></div></div></li>';                                      
                                });
                                $('.products-grid').html(temp);
                             },error:function(res){
                              alert("loi");
                             }
                          });
                      });
                  });
                </script>
            @endsection
             $(document).ready(function(){
    $('.mysortok').change(function(e){
        e.preventDefault();
        var sort = $(this).val();
        var href =  $(this).attr('duong-dan')+sort;
        console.log(sort);
        $.ajax({
            url: href,
            type : "GET",
            dataType:'json',
            success:function(data){
                location.reload();                
                console.log(data.products);
                },error:function(res){
                    alert("loi");
                }
        });
    });       
 });
 