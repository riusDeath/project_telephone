
 $(document).ready(function(){
        $(document).on('click', '.add-to-cart-mt', function(e){
            e.preventDefault();
            var add = confirm('Bạn muốn thêm sản phẩm vào giỏ hàng ');
            if (add) {
                var href = $(this).attr('href');
                $.ajax({
                    url: href,
                    type: 'GET',
                    dataType: 'json',
                    success:function(data){
                        $('.mini-cart-list').load(location.href + " .mini-cart-list>*");
                        $('#mini-cart-list1').load(location.href + " #mini-cart-list1>*");
                    }
                });
            }     
        });  
}) ;