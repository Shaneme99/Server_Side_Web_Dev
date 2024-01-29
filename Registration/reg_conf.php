<!DOCTYPE HTML>
<html lang="en">
<head>
	<!-- Form Submission -->
	<meta charset="utf-8">
    <title>Registration Confirmation</title>   
</head>
<body>
	<?php
	if (isset($_GET['submit'])){
		if($_GET['f_name']==''){
			$_GET['f_name'] = 'Missing';
		}
		if($_GET['l_name']==''){
			$_GET['l_name'] = 'Missing';
		}
		if($_GET['street']==''){
			$_GET['street'] = 'Missing';
		}if($_GET['city']==''){
			$_GET['city'] = 'Missing';
		}if($_GET['State']==''){
			$_GET['State'] = 'Missing';
		}if($_GET['zip_code']==''){
			$_GET['zip_code'] = 'Missing';
		}if($_GET['email']==''){
			$_GET['email'] = 'Missing';
		}if(!isset($_GET['Type'])){
			$_GET['Type'] = 'Missing';
		}if($_GET['phone']==''){
			$_GET['phone'] = 'Missing';
		}if($_GET['contact']==''){
			$_GET['contact'] = 'Missing';
		}
		echo"Thank you for ordering, ".$_GET['f_name'].' '.$_GET['l_name']."!\n";
		echo"Your address is ". $_GET['street'].", ".$_GET['city'].", ".$_GET['State'].", Zip Code ".$_GET['zip_code'];
		echo".\nYour email is ".$_GET['email']." and your ". $_GET['Type']." phone is ".$_GET['phone'] . ".\nYou prefer to be contacted through ".$_GET['contact'].", though.";
		if($_GET['pwd'] == $_GET['pwd2']){
			echo"\nYour passwords match.";
		}else{
			echo"\nYour passwords do not match.";
		}
		if($_GET['submit']){
			echo" Thanks for agreeing!";
		}
	}else{
		echo"Try again";
	}
	?>
	<method="get" action="registration.htm">
	<h1>Thank you!</h1>
	<h2>We have received your registration</h2>
</body>
</html>

