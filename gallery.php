<?php 
	require 'includes/header.php'; 
	function shortTitle ($title){
		$title = substr($title, 0, -4); #remove the .ext from each title
		$title = str_replace('_', ' ', $title); #replace underscores with blanks
		$title = ucwords($title); #capitalize each word
		return $title;
	}
    // Set the database access information as constants:
        require_once "../pdo_connect.php";
        $stmt = $dbc->query("SELECT * from JJ_images");
        $num = $stmt->rowCount();
        
?>
	<main>
        <h2>Japan Journey</h2>
		<p id="picCount">Displaying 1 to <?php echo $num?> of <?php echo $num?></p>
        <section id="gallery">
            <table id="thumbs">
                <tr>
                    <th>Image</th>
                </tr>
                <tr>
                    <?php 
                    const COLS = 2;
                    $counter = 1;
                    $first = true;
                    foreach($stmt as $row) {
                        if ($counter % COLS == 1 ){ echo "<tr>";}?>
                    <td><a href="gallery.php?image=<?= $row['filename']?>">
                    <img src="./images/thumbs/<?php echo $row['filename']?>" alt="Japan thumbnail image" width="80" height="54"></a></td>
                        
                        <?php if ($counter % COLS == 0){ 
                                echo "</tr>";
                                $counter    ++;
                        }else{
                            $counter ++;
                        }
                        if($first){$first_pic = $row['filename'];$first = false;}
                        if($row['filename']==$_GET['image'] OR isset($_GET['image'])== false){
                            $img_num = $row['filename'];
                            $caption = $row['caption'];
                            $short = shortTitle($row['filename']);
                        }
                        } ?>
                </tr>
            </table>
            <figure id="main_image">

                <img src="images/<?= $img_num?>" alt=<?=$short?>>
                <figcaption><?=$caption?></figcaption>
            </figure>
        </section>
    </main>
<?php include 'includes/footer.php'; ?>