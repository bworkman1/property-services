<?php
	
	$firstName = 	isset($_POST['first_name']) 	? htmlspecialchars($_POST['first_name']) 	: 'Brian';
	$lastName = 	isset($_POST['last_name']) 		? htmlspecialchars($_POST['last_name']) 	: 'Workman';
	$email = 		isset($_POST['email']) 			? htmlspecialchars($_POST['email']) 		: 'brian@yourwebdeveloper.us';
	$phone = 		isset($_POST['phone']) 			? htmlspecialchars($_POST['phone']) 		: '555-555-5555';
	$budget = 		isset($_POST['budget']) 		? htmlspecialchars($_POST['budget']) 		: 'Just Looking';
	$projectDate = 	isset($_POST['project_date']) 	? htmlspecialchars($_POST['project_date']) 	: '05/12/2019';
	$project = 		isset($_POST['project']) 		? htmlspecialchars($_POST['project']) 		: 'This is where the project description would go based on what the customer is wanting';
?>

<html>
	<body style="background-color: #cecece;">
		<div style="max-width: 800px; margin: 0 auto; background: #fff; padding:5px;">
			<h1>Samson Concrete Quote Request</h1>	
			<p>A potential customer has filled out the form located at <a target="_blank" href="<?php echo base_url('/contact-us/'); ?>"><?php echo base_url('/contact-us/'); ?></a> and the details are below.</p>

			<div style="border:1px solid #444">
				<div style="width:28%; float:left; padding: 5px"><b>First Name:</b></div>
				<div style="width:68%; float:left; padding: 5px"><?php echo $firstName; ?></div>
				<div style="clear:both;"></div>

				<div style="width:28%; float:left; padding: 5px"><b>Last Name:</b></div>
				<div style="width:68%; float:left; padding: 5px"><?php echo $lastName; ?></div>
				<div style="clear:both;"></div>

				<div style="width:28%; float:left; padding: 5px"><b>Email:</b></div>
				<div style="width:68%; float:left; padding: 5px"><?php echo $email; ?></div>
				<div style="clear:both;"></div>

				<div style="width:28%; float:left; padding: 5px"><b>Phone:</b></div>
				<div style="width:68%; float:left; padding: 5px"><?php echo $phone; ?></div>
				<div style="clear:both;"></div>

				<div style="width:28%; float:left; padding: 5px"><b>Budget:</b></div>
				<div style="width:68%; float:left; padding: 5px"><?php echo $budget; ?></div>
				<div style="clear:both;"></div>

				<div style="width:28%; float:left; padding: 5px"><b>Project Date:</b></div>
				<div style="width:68%; float:left; padding: 5px"><?php echo $projectDate; ?></div>
				<div style="clear:both;"></div>

				<div style="width:28%; float:left; padding: 5px"><b>Project:</b></div>
				<div style="width:68%; float:left; padding: 5px"><?php echo $project; ?></div>
				<div style="clear:both;"></div>
			</div>
		</div>
	</body>
</html>