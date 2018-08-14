$(document).ready(function(){
    $('#changePassword').change(function(){
        
        if($(this).is(":checked")){
            $(".password").removeAttr('disabled');
        }else{
            $(".password").attr('disabled','');
        }
        });
        $('#chagneEmail').change(function(){

        if ($(this).is(":checked")) {
            $('.email').removeAttr('readonly');
        } else {
            $('.email').attr('readonly','');
        }
    });
});