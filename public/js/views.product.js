$(document).ready(function(){
    $(document).ready(function(){
            var href = $('.qna-ask-btn').attr('href');
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

        $(document).on('click', '.qna-ask-btn',function(e){
            var product_id  = $('.comment').attr('data-id');
            var comment = $('.comment').val();
            $.ajax({
                url : href,
                type : "GET",
                dataType : 'JSON',
                data: {'comment' : comment },
                success: function(res) {
                    var temp = '<div class="media " data-spy="scroll"><a class="pull-left" href="#"><img class="avatar" src="https://www.gravatar.com/avatar/{{  md5('+res.user.email+') }}?s=30" class="user-image" alt="User Image"></a><div class="media-body"><h4 class="media-heading">'+ res.user.name +'</h4><p>'+res.comment.comment+'</p></div><div style="display:none" class="replies'+res.comment.id+' container comment_child'+res.comment.id+'"><form action="" method="POST" role="form" class="form-inline container"><div class="form-group"><textarea placeholder="Reply" rows="5" maxlength="300" type="text" height="100%" data-id="'+product_id+'" name="comment" style="border-radius: 20px" class="form-control comment'+res.comment.id+'"></textarea></div><button type="button" class="btn btn-primary reply_comment" comment_id="'+res.comment.id+'"><i class="glyphicon glyphicon-pencil"></i></button></form></div><button style="button" class="reply" comment_id="'+res.comment.id+'"><i class="glyphicon glyphicon-pencil"></i></button></div>';                  
                    $('.comment_parent').prepend(temp);
                }
        });
    });
    
    $(document).on('click', '.reply',function(e){
        var id = $(this).attr('comment_id');
        var replies = '.replies'+id;
        $(replies).toggle();
    });

    $(document).on('click', '.reply_comment', function(){
        var comment_id = $(this).attr('comment_id');
        var com = '.comment'+comment_id;
        var comment_child = '.comment_child'+comment_id;
        var comment = $(com).val();
        $.ajax({
            url : href,
            type : "GET",
            data : {'comment' : comment, 'comment_id' : comment_id},
            success: function(res){
                console.log(res.user.email);
                $(comment_child).prepend('<a class="pull-left" href="#"><img class="avatar" src="https://www.gravatar.com/avatar/{{  md5('+res.user.email+') }}?s=30" class="user-image" alt="User Image"></a><div class="media-body "><h4 class="media-heading">  '+ res.user.name +' </h4><p>'+res.comment.comment+'</p></div>');
                $(com).val("");
            }
        });
    });

    $(document).on('click', '.delete_comment', function(e){
        e.preventDefault();
        var href = $(this).attr('href');
        alert(href);
        var del = confirm('Bạn muốn xóa comment ');
        if (del) {
            $.ajax({
                url: href,              
                type: 'GET',
                success:function(res){
                    if(res == 'ok'){
                        $('.table_comment').load(location.href + ' .table_comment>*');
                    } 
                }
            });
        } 
    });

    });
});