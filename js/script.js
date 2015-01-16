
$(function() {
	
	$('.add_to_cart').on('click', function() {
		var count = $('#cart_count').text();
		$('#cart_count').text(parseInt(count) + 1);
		return false;
	});
	
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
