<div id="page-content">
	<h2 class="text-danger">Contact Us</h2>
	<hr>
	<div class="row">
		<div class="col-md-8">
			<form id="contact-form" data-sitekey="<?php echo RECAPTCHA_SITE_KEY; ?>" action="<?php echo base_url('/contact-us/send'); ?>" method="post">
				<p>Fill Out The Form Below For A Free Estimate (<em><span class="text-danger">*</span> required field</em>)</p>


				<div id="form-feedback"></div>
			
		  		<div class="form-group row">
		    		<label for="first_name" class="col-sm-4 col-form-label text-right"><span class="text-danger">*</span> First Name:</label>
		    		<div class="col-sm-8">
		      			<input type="text" class="form-control" required name="first_name" id="first_name" maxlength="30" placeholder="">
		      			<div class="invalid-feedback">Name must be letters and spaces only</div>
		    		</div>
		  		</div>

		  		<div class="form-group row">
		    		<label for="last_name" class="col-sm-4 col-form-label text-right"><span class="text-danger">*</span> Last Name:</label>
		    		<div class="col-sm-8">
		      			<input type="text" class="form-control" required name="last_name" id="last_name" maxlength="30" placeholder="">
		      			<div class="invalid-feedback">Name must be letters and spaces only</div>
		    		</div>
		  		</div>

		  		<div class="form-group row">
		    		<label for="email" class="col-sm-4 col-form-label text-right"><span class="text-danger">*</span> Email:</label>
		    		<div class="col-sm-8">
		      			<input type="text" class="form-control" required name="email" id="email" maxlength="50" placeholder="">
		      			<div class="invalid-feedback">Please enter a valid email</div>
		    		</div>
		  		</div>

		  		<div class="form-group row">
		    		<label for="phone" class="col-sm-4 col-form-label text-right">Phone:</label>
		    		<div class="col-sm-6">
		      			<input type="text" class="form-control phone" name="phone" id="phone" placeholder="">
		    		</div>
		  		</div>

		  		<div class="form-group row">
		    		<label for="budget" class="col-sm-4 col-form-label text-right"><span class="text-danger">*</span> Budget:</label>
		    		<div class="col-sm-6">
		      			<select class="custom-select mr-sm-2" required id="budget" name="budget">
					        <option value="">Select One</option>
					        <option value="Just Looking">Just Looking</option>
					        <option value="$0 to $1000">$0 to $1,000</option>
					        <option value="$1,000 to $2,000">$1,000 to $2,000</option>
					        <option value="$2,000 to $4,000">$2,000 to $4,000</option>
					        <option value="$4,000 and Up">$4,000 and Up</option>
		      			</select>
		      			<div class="invalid-feedback">Please select one</div>
		    		</div>
		  		</div>
		  		
		  		<div class="form-group row">
		    		<label for="project_date" class="col-sm-4 col-form-label text-right">Project Date:</label>
		    		<div class="col-sm-6">
		      			<input type="date" class="form-control" name="project_date" id="project_date" placeholder="">
		    		</div>
		  		</div>

				<div class="form-group row">
		    		<label for="project_date" class="col-sm-4 col-form-label text-right"><span class="text-danger">*</span> Project:</label>
		    		<div class="col-sm-8">
		      			<textarea class="form-control" required name="project" id="project" maxlength="500"></textarea>
		      			<div class="invalid-feedback">Must be a min of 50 characters</div>
		    		</div>
		  		</div>

				<div class="form-group row">
					<div class="col-sm-12 text-right">
						<button id="submit-form" class="btn btn-danger btn-lg">Submit</button>
					</div>
				</div>

				<input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
			</form>
		</div>

		<div class="col-md-4">
			<img src="<?php echo base_url('assets/images/samson-concrete-what-we-do-central-ohio.jpg'); ?>" alt="Samson Concrete Serving Central Ohio" class="img-fluid">
			<p>At Samson Concrete we put our customers first so if you have any questions or comments feel to fill out to form or call us at <a href="tel:17403347036">(740) 334-7036</a>.</p>
		</div>
	</div>
</div>


<script src="https://www.google.com/recaptcha/api.js?render=<?php echo RECAPTCHA_SITE_KEY; ?>&render=explicit"></script>
	<script>
		grecaptcha.ready(function() {
	  		grecaptcha.execute('<?php echo RECAPTCHA_SITE_KEY; ?>', {action: 'contactus'}).then(function(token) {
	  			document.getElementById('g-recaptcha-response').value = token;
	  		}
	  	);
	});
	</script>

