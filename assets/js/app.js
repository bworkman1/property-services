$(function() {

	// CONTACT FORM EVENT LISTENERS
	if(document.getElementById('contact-form') != null) { // IS FORM ON PAGE?

		$('.phone').mask('999-999-9999');
		
		document.getElementById('first_name').addEventListener("focusout",  
			function() { ContactForm.inputLettersOnly(document.getElementById('first_name'),  2)
		});

		document.getElementById('last_name').addEventListener("focusout",  
			function() { ContactForm.inputLettersOnly(document.getElementById('last_name'),  2)
		});

		document.getElementById('budget').addEventListener("change",  
			function() { ContactForm.hasValue(document.getElementById('budget')) 
		});

		document.getElementById('email').addEventListener("focusout", ContactForm.isValidEmail);

		document.getElementById('project').addEventListener("focusout",  
			function() { ContactForm.minLengthRequired(document.getElementById('project'),  50)
		});

		document.getElementById('submit-form').addEventListener("click", 
			function() { ContactForm.processForm(event) 
		});

	}

	document.getElementById('loading').classList.add('hide');

});



var ContactForm = {

	FormInputIds: ['project', 'project_date', 'budget', 'phone', 'email', 'last_name', 'first_name', 'g-recaptcha-response'],

	processForm(event) {
		event.preventDefault();

		const feedback = document.getElementById('form-feedback');
		feedback.classList.remove('alert', 'alert-success');
		feedback.innerHTML = '';

		document.getElementById('loading').classList.remove('hide');

		const form = $('#contact-form').serialize();

		$.post($('#contact-form').attr('action'), form).done(function(data) {
			const res = $.parseJSON(data);
			
			if(res.success) {
				document.getElementById('loading').classList.add('hide');
				ContactForm.resetForm();
				feedback.classList.add('alert', 'alert-success');
			} else {
				ContactForm.displayFormErrors(res.data);
				document.getElementById('loading').classList.add('hide');
				ContactForm.resetGoogleRecaptcha();
				feedback.classList.add('alert', 'alert-danger');
			}

			feedback.innerHTML = res.msg;
			document.getElementById('contact-form').scrollIntoView();

  		}).fail(function() {
  			ContactForm.resetGoogleRecaptcha();
    		document.getElementById('loading').classList.add('hide');
  		});
	},

	resetForm() {
		document.getElementById("contact-form").reset();
		ContactForm.resetGoogleRecaptcha();
		$('.is-valid').removeClass('is-valid');
		$('.is-invalid').removeClass('is-invalid');
	},

	resetGoogleRecaptcha() {
		grecaptcha.execute($('#contact-form').attr('data-sitekey'), {action: 'contactus'}).then(function(token) {
  			document.getElementById('g-recaptcha-response').value = token;
  		});
	},

	minLengthRequired(elem, length = 0) {
		elem.value.length > length ? ContactForm.markInputValid(elem) : ContactForm.markInputInvalid(elem);
	},

	hasValue(elem) {
		elem.value.length === 0 ? ContactForm.markInputInvalid(elem) : ContactForm.markInputValid(elem);
	},

	isErrors(elements) {
		var isErrors = false;
		FormInputNames
		return isErrors;
	},

	inputLettersOnly(elem, minLength = 0) { // LETTERS AND SPACES ONLY
		const regex = /^[a-zA-Z]*$/;  

		var isValid = regex.test(String(elem.value).toLowerCase());
	
		if(minLength > 0 && isValid) {
			isValid = elem.value.length < minLength ? false : true;
		}

		!isValid ? ContactForm.markInputInvalid(elem) : ContactForm.markInputValid(elem);
	},

	isValidEmail() {
		const regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

		const emailElem = document.getElementById('email');

		const isValid = regex.test(String(emailElem.value).toLowerCase());

		!isValid ? ContactForm.markInputInvalid(emailElem) : ContactForm.markInputValid(emailElem);
	},

	resetInput(elem) {
		elem.classList.remove("is-valid");
		elem.classList.remove("is-invalid");
	},

	markInputInvalid(elem) {
		ContactForm.resetInput(elem);
		elem.classList.add('is-invalid');
	},

	markInputValid(elem) {
		ContactForm.resetInput(elem);
		elem.classList.add('is-valid');
	},

	displayFormErrors(errors) {
		if(errors) {
			for(var i in errors) {			
				$('#'+i).addClass('is-invalid').parent().find('.invalid-feedback').html(errors[i]);        
			}
		}     
	},
}

