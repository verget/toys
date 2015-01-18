
$(function() {
	$('.add_to_cart').on('click', function() {
		var item_id = $(this).attr('id');
		$.getJSON('/to_cart/'+item_id,  function(data){
			$('#cart_count').text(data);
		});
		return true;
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
