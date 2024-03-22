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
        const COLS = 2;
        const ROWS = 3;
        $total_pics = COLS*ROWS;
        $counter = 1;
        $first = true;

        if(isset($_GET['page'])){
            //gets page number, sets it to one if not set
            $page = $_GET['page'];
        }else{
            $page = 1;
        }

        if ($page == 1){
            //If page is one, initialize the first image index, first index to display, and second image index.
            $first_img = 0;
            $display_first = 1;
            $second_img = $total_pics;
        }else{
            //If page isn't one, calculate the indexes to use. NOTE: Breaks with ROWS = 2. Shows 4 at a time.
            $first_img = $page*$total_pics-$total_pics;
            $display_first = $first_img+1;
            $second_img = $page*$total_pics;
        }

        $stmt = $dbc->query("SELECT * from JJ_images");//All images
        $stmt2 = $dbc->query("SELECT * from JJ_images LIMIT $first_img, $second_img");//Only needed images

        $img_total = $stmt->rowCount();
        $num = $stmt2->rowCount();
        
        if($page !=1){
            $second_img = $num + $total_pics*($page-1);
        }
?>
	<main>
        <h2>Japan Journey</h2>
		<p id="picCount">Displaying <?=$display_first?> to <?=$second_img?> of <?=$img_total?></p>
        <section id="gallery">
            <table id="thumbs">
                <tr>
                    <?php 
                    foreach($stmt2 as $row) {
                        if ($counter % COLS == 1 ){ echo "<tr>";}?>
                    <td><a href="gallery.php?image=<?= $row['image_id']?>&page=<?= $page?>">
                    <img src="./images/thumbs/<?php echo $row['filename']?>" alt="Japan thumbnail image" width="80" height="54"></a></td>
                        <?php if ($counter % COLS == 0){ 
                                echo "</tr>";
                                $counter    ++;
                        }else{
                            $counter ++;
                        }
                        if($first){$first_pic = $row['filename'];$first = false;}
                        if($row['image_id']==$_GET['image'] OR isset($_GET['image'])== false){
                            $img_num = $row['filename'];
                            $caption = $row['caption'];
                            $short = shortTitle($row['filename']);
                        }
                        } ?>
                </tr>
                <tr>
                <td>
                  <?php if ($page == 1 and $img_total > $second_img){
                    echo"</td><td><a href=\"gallery.php?image=7&page=2\"> Next>>    </a></td>";
                  } else if ($page > 1 and $img_total > $second_img){
                    $prevpage = $page - 1;
                    $previmage = $first_img - $total_pics+1;
                    $nextpage = $page + 1;
                    $nextimg = $first_img + $total_pics;
                    echo"<a href=\"gallery.php?image=$previmage&page=$prevpage\"> &lt&ltPrev    </a></td>";
                    echo"<td><a href=\"gallery.php?image=$nextimg&page=$nextpage\"> Next>>    </a></td>";
                }else if ($page > 1 and $img_total <= $second_img){
                    $prevpage = $page - 1;
                    $previmage = $first_img - $total_pics+1;
                    echo"<a href=\"gallery.php?image=$previmage&page=$prevpage\"> &lt&ltPrev    </a></td>";
                }
                    ?>
                </tr>
            </table>
            <figure id="main_image">

                <img src="images/<?= $img_num?>" alt=<?=$short?>>
                <figcaption><?=$caption?></figcaption>
            </figure>
        </section>
    </main>
<?php include 'includes/footer.php'; ?>