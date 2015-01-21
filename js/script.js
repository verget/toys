
$(function() {
	$('.add_to_cart').on('click', function() {
		var item_id = $(this).attr('id');
		$.getJSON('/to_cart/'+item_id,  function(data){
			$('#cart_count').text(data);
		});
		return true;
	});
	
	$('#cart').on('click', function() {
	    $('.cart_list').text('');
	    $('.cart_summ').text('');
	    var summ = 0;
        $.getJSON('/get_cart/',  function(data){
            $.each(data, function(item, value) {
                summ = summ + parseInt(value.price);
                $('.cart_list').append("<tr><td class = 'title'>"+value.title + 
                        "</td><td class = 'price'>" + value.price+"р. </tr>");
            });
            $('.cart_summ').text(summ);
        });
        return true;
    });
	
	$('.set_order').on('click', function() {
        var name = $('#inputName').val();
        var address = $('#inputAddress').val();
        if(!name || !address) {
            alert ("Не заполнены поля!")
        }else{
    	    $.ajax({
    	        url: '/new_order',
    	        type: 'POST',
    	        dataType: 'json', 
    	        data: { 'name':name, 'address': address },
    	        success: function(data){ alert('Спасибо за покупку! Номер Вашего заказа #'+data); }
    	    });
    	    $('.cart_list').text('');
            $('.cart_summ').text('');
            $('#cart_count').text(0);
        }
        return true;
	});
	
	
	
	
	 $( ".draggable" ).draggable({
	     containment: 'window'
    });
	
    $(".bootstrap_validate_form").validate({
        rules: {
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
