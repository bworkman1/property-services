			<hr>
			<h2 class="text-center text-danger">General Manager: George McCorkle<br>Phone: <a href="tel:17403347036">(740) 334-7036</a></h2>
			<div class="row">
				<div class="col-md-8">
					<img src="<?php echo base_url('/assets/images/samson-concrete-work-truck.png'); ?>" alt="Samson Concrete Work Truck - Central Ohio Concrete Contractor" class="mx-auto d-block img-fluid">		
				</div>
				<div class="col-md-4">
					<img src="<?php echo base_url('/assets/images/bbb-logo.png'); ?>" alt="Samson Concrete A+ Better Business Rating - Central Ohio Concrete Contractor" class="mx-auto d-block img-fluid">		
				</div>
			</div>
			<div class="spacer"></div>
			<div class="spacer"></div>
			<div class="spacer"></div>
			<img src="<?php echo base_url('/assets/images/payments.gif'); ?>" alt="Samson Concrete We accept all major credit cards - Central Ohio Concrete Contractor" class="mx-auto d-block img-fluid">
		</div>
		<p class="text-center copyright">© Copyright <?php echo date('Y'); ?> SamsonConcrete.com</p>
	</div>


	<div id="employmentModal" class="modal" tabindex="-1" role="dialog">
	  	<div class="modal-dialog modal-lg" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title">Employment Opportunities</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body">
	      			<p>We are looking for hard-working people who take pride in what they do, bring a passion for learning new skills, and want to build their careers at a fast-growing, family-focused concrete construction company. If that sounds like something you’d be interested in, we want to hear from you!</p>

	      			<div class="card">
	      				<div class="card-body">
			      			<h4>How to apply</h4>
			      			<ol>
			      				<li>Click the "Download Application" button below</li>
			      				<li>Fill out the application.</li>
			      				<li>Once finished with the applciation email it to 
			      					<?php echo safe_mailto('george@samsonconrete.com', 'george@samsonconrete.com'); ?></li>
			      			</ol>
		      			</div>
					</div>
					<br>
	        		<a href="<?php echo base_url('assets/forms/samson-concerte-application.pdf'); ?>" class="btn btn-danger" download>Download Application</a>

	        		<hr>

	        		<P>*<small>Samson Concrete is an equal-opportunity employer and is pleased to comply with the United States Civil Rights Act of 1964 (as amended). We do not discriminate with respect to a candidate's race, age, sex, color, national origin, marital status, military service and/or disability. Samson Concrete performs background checks on all of its accepted candidates to better ensure the quality of our working environment. These checks may include verification of your social security information, criminal convictions, driving records, and past employment.</small></P>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      		</div>
	    	</div>
	  	</div>
	</div>


	<script
	  src="https://code.jquery.com/jquery-2.2.4.min.js"
	  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
	  crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url('assets/js/ie10-viewport-bug-workaround.js'); ?>"></script>
    <script src="<?php echo base_url('/third_party/lightbox/js/lightbox.min.js'); ?>"></script>
    <script src="<?php echo base_url('/third_party/mask/jquery.mask.js'); ?>"></script>
    <script src="<?php echo base_url('/assets/js/app.js'); ?>"></script>
  </body>
</html>