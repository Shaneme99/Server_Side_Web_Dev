<?php
$first_name = 'Shane';
$last_name = 'Menzigian';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Shane Menzigian -->
	<title>Hello World</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Hello World</h1>
	<h2>
	<?php echo "This is $first_name $last_name's first line."; ?>
	</h2>
	<?php echo '<h2> This is ' . $first_name . ' ' . $last_name . '\'s second line </h2>';?>
	<h3>Goodbye</h3>
</body>
</html>
