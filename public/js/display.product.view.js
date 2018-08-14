$(document).ready(function(){
        $(document).on('click','.btn_rate',function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            var rate = $("input[name*='rate']:checked").val();
            $.ajax({
                url: href,
                type:"GET",
                data:{"rate": rate },
                success:function(res){
                if (res) {
                    $('.ajax_rate_avg').load(location.href +' .ajax_rate_avg>*');
                    $('.rate_table').load(location.href +' .rate_table>*');
                } 
            }
            });
        });

        $(document).on('click', '.avatar', function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            $('.zoom_avatar').attr('src', href);
        });

        $(document).on('change', '.select_color', function(e){
            e.preventDefault();
            var val = $(this).val();
            var hr = $(this).attr('href');
            var href = hr+'/'+val;
            $.ajax({
                url: href,
                type: "GET",
                success:function(res){
                    $('.zoom_avatar').attr('src', '../../uploads/'+res.image+'') ; 
                    $('.total_stock').html(res.total );
                    $('.qty').attr('max', res.total);
                },
            });
        });
    }); 