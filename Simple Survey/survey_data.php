<?php require('includes/header.php')?>
	<?php
		if (isset($_GET['submit'])) {
		
			// Create scalar variables for the form data:
			if (!empty($_GET['name']))
				$name = $_GET['name'];
			else
				$missing['name'] = "-you didn't enter your name";
			
			if (!empty($_GET['email']))
				$email = $_GET['email'];
			else
				$missing['email'] = "-you didn't enter your email address";		
			
			if (isset($_GET['gender']))
				$gender = $_GET['gender'];
			else
				$missing['gender'] = "-you didn't select your gender";
			
			//The first option of a select list is the default, so there will always be something set
			$age = $_GET['age'];
			if ($missing) { //There is at least one element in the $missing array
				echo 'You forgot the following item(s):<br>';
				//output the contents of the $missing array
				foreach ($missing as $message){
					echo "$message<br>";
				}
				echo 'Please <a href="survey.htm">return to the survey<a>';
			}
			else {
				//Form was filled out completely and submitted. Print the submitted information:
				echo "<p>Thank you, $name, for completing our survey:<br>";
				echo "You entered <strong>$age</strong> for your birth year, and <strong>$gender</strong> for your gender<br>";
				echo "Please make sure your email address is correct so that you can be entered in our prize drawing: <strong>$email</strong><br>";
				echo 'If anything is incorrect, please <a href="survey.php">return to our survey</a></p>';
			}
		}
		else  //form was not submitted to reach this page
			echo 'You have reached this page in error.<br>Our survey is <a href="survey.php">here<a>';
		?>
<?php require('includes/footer.html')?>