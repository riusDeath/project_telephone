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
                // console.log(data.products);
                // $('#product-grid').load(location.href + ' #product-grid>*');
                // },error:function(res){
                //     alert("loi");
                // }
          });
        });       
    
 });
 $(document).ready(function(){
        $(document).on('click', '.add-to-cart-mt', function(e){
            e.preventDefault();
            var add = confirm('Bạn muốn thêm sản phẩm vào giỏ hàng ');
            if(add){
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
    });     