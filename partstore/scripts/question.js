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

	$('#questionReplyForm').validate({
		rules: {
			questionReply: {required: true, maxlength: 2000},
		}
	});
});