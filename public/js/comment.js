$(document).ready(function(){
	$(document).on('click', '.delete_comment', function(e){
		e.preventDefault();
		var href = $(this).attr('href');
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