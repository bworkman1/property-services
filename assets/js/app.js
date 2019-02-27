$(function() {
	$('#loading').addClass('hide');

	const load = $('#script').attr('data-load');
	eval(load+'()');
})

let login = {
	init: function() {
		login.loginListener();
	},

	loginListener: function() {
		$('#login-btn').click(function(event) {
			event.preventDefault();

			$('#loading').removeClass('hide');

			const form = $('#login-form').serialize();

			$.post($('#login-form').attr('action'), form, function(data) {
				if(data.success) {
					alertify.success(data.msg);
					window.location.replace(data.redirect);
				} else {
					alertify.error(data.msg);
					$('input[name="csrf_test_name"]').val(data.hash);
				}
			}, 'json').fail(function() {
				alertify.error($('#login-form').attr('data-fail'));
			}).always(function() {
				$('#loading').addClass('hide');
				$('#InputPassword').val('');
			});
		});
	}
};
