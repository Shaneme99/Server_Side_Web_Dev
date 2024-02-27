<?php 

	require 'includes/header.php';
	require_once '../../pdo_connect.php';
	$sql = 'SELECT * FROM JJ_images';
	$result = $dbc->query($sql);
	$error = $dbc->errorInfo()[2];
	if (!$error) {
		$numRows= $result->rowCount();
	} 
	else{
		echo "We are unable to process your request at  this  time. Please try again later.";
		include 'includes/footer.php'; 
		exit;
	}
	
	//This function creates a title from the filename of each image
	function shortTitle ($title){
		$title = substr($title, 0, -4); #remove the .ext from each title
		$title = str_replace('_', ' ', $title); #replace underscores with blanks
		$title = ucwords($title); #capitalize each word
		return $title;
	}
		
	?>
  <main>
	<h2>Images of Japan</h2>
	<h3>Each of our lovely images may be purchased for you to enjoy in your home or to give as a gift</h3>     
    <table>
        <tr>
            <th>Title</th>
			<th>Image</th>
        </tr>
		<tr>
        <?php foreach($result as $row) { 
			$short = shortTitle($row['filename'])?> 
			<tr>
				<td><?=$short?></td>
				<td><img src = "./images/<?php echo $row['filename']?>" alt = <?php echo $row['details']?>></td>
			</tr>
		
    <?php } //end while loop ?>
		</tr>
    </table>
  </main>
<?php include 'includes/footer.php'; ?>