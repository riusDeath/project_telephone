$(document).ready(function(){
	$(document).on('click', '.edit-adress-user', function(e){
		$('.adress-edit').toggle();
	});

	
	$(document).on('change', '.adress_user', function(e){
		e.preventDefault();
		var val = $(this).val();
		$(this).attr("checked");
		if (val == 0) {
			$('#home').css('display','block');
			$('#tab').css('display','none');
		} else {
			$('#home').css('display','none');
			$('#tab').css('display','block');
		}
	});
							
	$(".province").change(function() {
		var pro_id = $(this).val();
		$.get("../ajax/county/"+pro_id, function(data){
			$(".county").html(data);
		});													
	}); 

	$(".county").change(function() {
		var county_name = $(this).val();
		$.get("../ajax/adress/"+county_name, function(data){
			$(".adress_county").html(data);
		});
	});
});