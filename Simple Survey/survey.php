<?php require('includes/header.php')?>
		<form action="survey_data.php" method="get">
			<fieldset>
				<legend>Enter your information in the form below:</legend>

				<p>
					<label for = "first">First name: </label>
					<input type="text" name="name" size="20" maxlength="40" id="first">
				</p>

				<p>
					<label for="email">Email Address: </label>
					<input type="email" name="email" size="40" maxlength="60" id="email">
				</p>
				<p>Gender: 
					<input type="radio" name="gender" value="M" id="m"> <label for="m"> Male</label>&nbsp;&nbsp;
					<input type="radio" name="gender" value="F" id="f"> <label for = "f"> Female</label>&nbsp;&nbsp;
					<input type="radio" name="gender" value="N" id="n"> <label for="n"> Prefer not to answer</label>
				</p>
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