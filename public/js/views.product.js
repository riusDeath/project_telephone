$(document).ready(function(){
    $(document).on('click', '.list_image', function(e){
        e.preventDefault();
       	$('.table_list_image').toggle();
    });

    var href = $('.qna-ask-btn').attr('href');


    $(document).on('click', '.qna-ask-btn',function(e){
        var comment = $('.comment').val();
        alert(comment);
        $.ajax({
            url : href,
            type : "GET",
            dataType : 'JSON',
            data: {'comment' : comment },
            success: function(res) {
            	$('.show-comment').load(location.href + ' .show-comment>*');
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
        var comment = $(com).val();
        $.ajax({
            url : href,
            type : "GET",
            data : {'comment' : comment, 'comment_id' : comment_id},
            success: function(res){
                $('.show-comment').load(location.href + ' .show-comment>*');
            }
        });
    })
});