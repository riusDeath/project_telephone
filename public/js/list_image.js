$(document).ready(function(){
        var dem = 0;
        $(document).on('click', '.add_color', function(e){
            e.preventDefault();
            var color = '.color'+dem;
            var total = '.total'+dem;
            var color = $(color).val();
            var total = $(total).val();
            if (color.length !=0 && total !=0) {
                dem ++;
                $('.double_div').append('<div class="my_form"><div class="form-group"><input type="text" class="form-control color'+dem+' color" id="" placeholder="Color" name="color'+dem+'"></div><div class="form-group"><input type="number" min="1" class="form-control total'+dem+'" id="" placeholder="total" name="total'+dem+'"></div><div class="form-group"><input type="file" class="form-control " id="" placeholder="image" name="image'+dem+'"></div><a class="add_color form-group"><img src="{{url('/')}}/uploads/search.png" width="50px"></a></div>');
                $('.dem').val(dem);
            } else {
                alert('not ok');
            }           
        });
        $(document).on('keyup', '.color', function(e){
            e.preventDefault();
            for (var i = dem - 1; i >= 0; i--) {
                var c = '.color'+i;
                if ($(this).val() == $(c).val()) {
                $(this).val('');
                break;
            }   
        }
    });
});