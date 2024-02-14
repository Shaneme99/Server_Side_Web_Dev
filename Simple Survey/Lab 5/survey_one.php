<?php require('includes/header.php')?>
<?php
if (isset($_GET['submit']) && $_GET['submit']=="Submit My Information") {
			if (!empty($_GET['name']))
				$name = $_GET['name'];
			else
				$missing['name'] = "A name is required:";

			if (!empty($_GET['email']))
				$email = $_GET['email'];
			else	
				$missing['email'] = "Please choose your email:";

			if (isset($_GET['gender']))
				$gender = $_GET['gender'];
			else 
				$missing['gender'] = "Please pick your gender:";
				if (isset($_GET['age']))	
				$age = $_GET['age'];
			else 
				$missing['age'] = "Please pick your age:";
			if (!$missing) {
				//Form was filled out completely and submitted. Print the submitted information:
					echo "<p>Thank you, $name, for completing our survey:<br>";
					echo "You entered <strong>$age</strong> for your birth year, and <strong>$gender</strong> for your gender<br>";
					echo "Please make sure your email address is correct so that you can be entered in our prize drawing: <strong>$email</strong><br>";
					echo 'If anything is incorrect, please <a href="survey.php">return to our survey</a></p>';
				}
		} ?>
		<form action="survey_one.php" method="get">
			<fieldset>
				<legend>Enter your information in the form below:</legend>

				<p>
				<?php if($missing['name']) echo "<p>{$missing['name']}</p>"; ?>
					<label for = "first">First name: </label>
					<input type="text" name="name" size="20" maxlength="40" id="first">
				</p>
				
				<?php if($missing['email']) echo "<p>{$missing['email']}</p>"; ?>
				<p>
					<label for="email">Email Address: </label>
					<input type="email" name="email" size="40" maxlength="60" id="email">
				</p>

				<?php if($missing['gender']) echo "<p>{$missing['gender']}</p>"; ?>

				<p>Gender: 
					<input type="radio" name="gender" value="M" id="m"> <label for="m"> Male</label>&nbsp;&nbsp;
					<input type="radio" name="gender" value="F" id="f"> <label for = "f"> Female</label>&nbsp;&nbsp;
					<input type="radio" name="gender" value="N" id="n"> <label for="n"> Prefer not to answer</label>
				</p>
				<?php if($missing['age']) echo "<p>{$missing['age']}</p>"; ?>

				<?php
					const BEGIN = 1920;
					const END = 2024;
					$years = range(BEGIN, END);
					$mid = floor((END - BEGIN) / 2  + BEGIN);
					echo '<p><label for="age">Year of Birth: </label>';
					echo '<select name="age" id="age">';
						foreach($years as $key => $value){
							if($value == $mid){
							echo "<option value=\"$value\" selected> $value </option>";
							}else{
							echo "<option value=\"$value\"> $value </option>";
						}
					}
					echo' </select>';
					?>
				</p>
			</fieldset>
			<p><input type="submit" name="submit" value="Submit My Information"></p>
		</form>

<?php require('includes/footer.html')?>