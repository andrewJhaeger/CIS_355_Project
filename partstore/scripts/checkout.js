$(function () {

	$.validator.setDefaults({
	    highlight: function(element) {
	        $(element).closest('.form-group').removeClass('has-success');
	        $(element).closest('.form-group').addClass('has-error');
	    },
	    unhighlight: function(element) {
	        $(element).closest('.form-group').removeClass('has-error');
	        $(element).closest('.form-group').addClass('has-success');
	    },
	    errorElement: 'span',
	    errorClass: 'help-block',
	    errorPlacement: function(error, element) {
	        if(element.parent('.input-group').length) {
	            error.insertAfter(element.parent());
	        } else {
	            error.insertAfter(element);
	        }
	    }
	});
	$.validator.messages.required = 'Required';

	$('#checkoutForm').validate({
		rules: {
			cardholderName: {required: true, maxlength: 100 },
			cardNumber: {required: true, maxlength: 16},
			expirationMonth: {required: true},
			expirationYear: {required: true},
			securityCode: {required: true, maxlength: 3}
		}
	});
});