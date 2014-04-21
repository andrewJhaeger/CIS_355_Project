$(function () {
	$(document).on('click', '#addBillingAddress', function() {
		if($('#billingAddressForm').length == 0) {
			var html = '<div id="billingAddressForm"><div class="form-group"><label class="col-md-3 control-label">Billing Address</label><div class="col-md-9"><input type="text" class="form-control" name="billingStreet" placeholder="Street Address" /> \
					</div></div><div class="form-group"><div class="col-md-3 col-md-offset-3"><input type="text" class="form-control" name="billingCity" placeholder="City" /></div> \
					<div class="col-md-3"><select name="billingState" class="form-control" name="billingState" placeholder="State">  \
					<option value="AK">AK</option><option value="AL">AL</option><option value="AR">AR</option><option value="AZ">AZ</option><option value="CA">CA</option><option value="CO">CO</option><option value="CT">CT</option><option value="DC">DC</option><option value="DE">DE</option><option value="FL">FL</option><option value="GA">GA</option><option value="HI">HI</option><option value="IA">IA</option><option value="ID">ID</option><option value="IL">IL</option><option value="IN">IN</option><option value="KS">KS</option><option value="KY">KY</option><option value="LA">LA</option><option value="MA">MA</option><option value="MD">MD</option><option value="ME">ME</option><option value="MI">MI</option><option value="MN">MN</option><option value="MO">MO</option><option value="MS">MS</option><option value="MT">MT</option><option value="NC">NC</option><option value="ND">ND</option><option value="NE">NE</option><option value="NH">NH</option><option value="NJ">NJ</option><option value="NM">NM</option><option value="NV">NV</option><option value="NY">NY</option><option value="OH">OH</option><option value="OK">OK</option><option value="OR">OR</option><option value="PA">PA</option><option value="RI">RI</option><option value="SC">SC</option><option value="SD">SD</option><option value="TN">TN</option><option value="TX">TX</option><option value="UT">UT</option><option value="VA">VA</option><option value="VT">VT</option><option value="WA">WA</option><option value="WI">WI</option><option value="WV">WV</option><option value="WY">WY</option> \
					</select></div><div class="col-md-3"><input type="number" class="form-control" name="billingZip" placeholder="ZIP" /></div></div></div>';
			$('#shippingAddressForm').after(html);
			$('#addBillingSpan').html("<button type='button' id='addBillingAddress' class='btn btn-info btn-xs'>Remove billing address</button>");
		}
		else {
			$('#billingAddressForm').remove();
			$('#addBillingSpan').html("<button type='button' id='addBillingAddress' class='btn btn-info btn-xs'>Add a separate billing address</button> (If different than shipping address)");
		}
	});

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
	$('#loginForm').validate({
		rules: {
			loginEmail: {required: true, email: true},
			loginPassword: "required"
		}
	});
	$('#registerForm').validate({
		rules: {
			firstName: {required: true, maxlength: 30},
			lastName: {required: true, maxlength: 30},
			middleInitial: {maxlength: 1},
			registerEmail: {required: true, email: true},
			registerPassword: {required: true, minlength: 5},
			registerConfirmPassword: {required: true, equalTo: "#registerPassword"},
			homePhone: {phoneUS: true},
			cellPhone: {phoneUS: true},
			shippingStreet: {required: true, maxlength: 100},
			shippingCity: {required: true, maxlength: 50},
			shippingState: "required",
			shippingZip: {required: true, maxlength: 10},
			billingStreet: {required: true, maxlength: 100},
			billingCity: {required: true, maxlength: 50},
			billingState: "required",
			billingZip: {required: true, maxlength: 10}
		},
		messages: {
			registerConfirmPassword: {equalTo: "Passwords must match"}
		}
	});
});