$(document).ready(function(){
    $(document).on('keyup', '.input-total', function(e){
        e.preventDefault();
        var href = $(this).attr('duong-dan');
        var qty = $(this).val();               
        $.ajax({
            url : href,
            type : 'GET',
            data : {'qty' : qty},
            dataType : 'json',
            success:function(data) {
            if (data!= "loi") {
                location.reload();
            } else {
                alert('Lỗi khi sửa số lượng');
            }
            }
        });
    });
    $(document).on('click','.delete-all',function(e){
        e.preventDefault();
        var dele = confirm('Bạn muốn xóa tất cả sản phẩm trong giỏ hàng?');
        if (dele) {
            var href = $(this).attr('href');
            $.ajax({
                url: href,
                type: "GET",
                success:function(data) {
                    $('.myOrderDetail').html(data);
                    $('#mini-cart-list1').load(location.href + " #mini-cart-list1>*");
                 }
            });
        };
                
    });
});