<!DOCTYPE HTML>
<!-- Shane Menzigian -->
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>Site Registration</title>   
	<style>
		label {width: 10%; text-align:right; float:left;}
		input {width: 10%;}
		h2, span {color:red;}
	</style>
</head>

<body>
	<?php 
		if (isset($_POST['submit'])) {
			$error=[];
			
			if (!empty($_POST['firstname'])){
				$first = filter_var(trim($_POST['firstname']), FILTER_SANITIZE_STRING);
			}else{
				$error['first'] = "<span>First name is required:</span>";
			}
			if (!empty($_POST['email'])){
				//Validate email
				if(filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)){
					$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
				}else{
				$error['email'] = "<span>Enter a valid email address</>";
				}
			}else{
				$error['email'] = "<span>Please enter your email</span>";
			}			
			if (!empty($_POST['pw1'])){
				$pw1 = $_POST['pw1'];
				$pw_pattern = '/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,}/'; //At least one number, at least one lowercase, at least one uppercase, 6 other.
				if(!preg_match($pw_pattern, $pw1))
					$error['pw']="<span>Please enter a password with 1 digit, 1 uppercase letter,\none lowercase letter, and at least 8 characters</span>";
			}else{
				$error['pw'] = "<span>Please enter the password twice</span>";
			}
			if (!empty($_POST['pw2'])){
				$pw2 = $_POST['pw2'];
			}else{
				$error['pw'] = "<span>Please enter the password twice</span>";
			}
			if(isset($pw1) && isset($pw2) && trim($pw1) !== trim($pw2)){
				$error['match'] = "<span>Your passwords don't match</span>";
			}
			if (!empty($_POST['zip'])){
				$zip= $_POST['zip'];
				//Check for valid zip code
				$zip_pattern = '/^(\d{5})$|^((\d{5})\-(\d{4}))$/';
				if(!preg_match($zip_pattern, $zip)){
					$error['zip']= '<span>Your zip code should eith	er be 12345 or 12345-6789</span>';
				}
			}else{
				$error['zip'] = "<span>Please enter your zip code</span>";
			}
			if (isset($_POST['source'])){
				$source = filter_var(trim($_POST['source']), FILTER_SANITIZE_STRING);
			}else{
				$error['source']="<span>Please choose one of the following:</span>";
			}
			if (!$error){
				echo "Thank you, $first, you are now registered!";
				echo "</body></html>";
				exit;
			}
		}
		?>	
		
		<h1> Register on our site</h1>
		<form method = "post" action = "reg_expr_form.php">
			<?php if($error) echo "<h2>Please correct the following: </h2>";?>
			<?php if(isset($error['first'])) echo $error['first']; ?>	
			<br>
			<label for="firstname">First name:</label>
			<input type="text" name="firstname" id="firstname"<?php if(isset($first))echo"value=\"$first\""?>>
			<br>
			<?php if(isset($error['email'])) echo $error['email']."<br>"; ?>
			<label for="address">Email address:</label>
			<input type="text" name="email" id="address"<?php if(isset($email))echo"value=\"$email\""?>>
			<br>
			<?php if(isset($error['pw'])) echo $error['pw']; ?>
			<?php if(isset($error['match'])) echo $error['match']; ?>
			<br>
			<label for="pw1">Password:</label>
			<input type="password" name="pw1" id="pw1">
			<br>
			<label for="pw2">Verify password:</label>
			<input type="password" name="pw2" id="pw2">
			<br>
			<?php if(isset($error['zip'])) echo $error['zip']; ?>
			<br>
			<label for="zip">Zip code:</label>
			<input type="text" name="zip" id="zip"<?php if(isset($zip))echo"value=\"$zip\""?>>
			<br>
			<?php if(isset($error['source'])) echo $error['source']."<br>"; ?>
			<p>How did you hear about us?</p>
			<label><input type="radio" name = "source" value="soc" <?php if(isset($source)&&$source=="soc")echo" checked"?>>Social Media</label>
			<label><input type="radio" name = "source" value="se"<?php if(isset($source)&&$source=="se")echo" checked"?>>Search Engine</label>
			<label><input type="radio" name = "source" value="other"<?php if(isset($source)&&$source=="other")echo" checked"?>>Other</label>
			<br><br>
			<input type="submit" name="submit" id="button" value="Register">
			<input type="reset" name="reset" id="reset" value="Reset"> 
		</form>
</body>
</html>

