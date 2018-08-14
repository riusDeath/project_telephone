 $(document).ready(function(){
        $(document).on('keyup', '.qty_code', function(){
            var qty = $(this).val();
            if (qty > 0) {
                $('.qty').html(qty);
            }
        });

        $(document).on('click', '.select_user', function(){
            var select = $(this).val();
            var qty = $('.qty-code').val();
            if (select == 2) {
                $('.user').show();
                $('.random').hide();
            } else {
                $('.random').show();
                $('.user').hide();
            }
        }); 

        $(document).on('keyup', '.email', function(){
            var emails = $(this).val();
            console.log(emails.split(",").length);
        });

        $(document).on('change', '.all', function(){
            $('.choose').prop('checked', this.checked);  
        });

        $(document).on('change', '.choose', function(){
            var email = $(this).val();
            var emails = $('.email').val();

            if ($(this).is(':checked','')) {
                $('.email').val(emails+' '+email);
            } else {
                emails = emails.replace(email, "");
                $('.email').val(emails);
            }
        });
    });
 src="{{url('/')}}/public/js/code.js"