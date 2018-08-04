$(document).ready(function(){
	$(document).on('click', '.reset', function(e){
		e.preventDefault();
		var href = $(this).attr('href');
		var email = $('input[name=email]').val();
		alert(email);
		$.ajax({
			url: href,
			type: 'GET',
			data : {'email' : email},
			dataType : 'json',
			success:function(res) {
				console.log(res);
				$('.modal-title').html('<h3>'+res.mess+'<h3>');
				$('.model-mess').modal();
			}
		});
	})
})