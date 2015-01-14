
$(function() {
	
	$('.show_all').on('click', function() {
		$('.complete_form').toggleClass('hidden_form');
		$('.left_buttons').toggleClass('hidden_form');
		return false;
	});
	$('#search_form_container').slideDown();
//	var prevTab = '';
//	$('#search_form_nav a[data-toggle="tab"]').on('click',function(){
//		if( prevTab != '' && $(this).attr('href') == prevTab && 
//				$('#search_form_container:hidden').length <= 0 )
//			$('#search_form_container').slideUp();
//		else if( $('#search_form_container:hidden').length ){
//			$('#search_form_container').slideDown();
//			prevTab = $(this).attr('href');
//		}else
//			prevTab = $(this).attr('href');
//	});


    $(".bootstrap_validate_form").validate({
        rules: {
            // simple rule, converted to {required:true}
            username:{
                required: true,
                minlength: 4,
                maxlength: 16,
                pattern: /^[A-Za-z0-9_]{4,16}$/
            },

            password:{
                required: true,
                minlength: 4,
                maxlength: 16
            },

            repeat_password:{
                equalTo: '#password'
            },

            // compound rule
            userrole: {
                required: true
            }
        }
    });

  })
