<?php 
	echo "<div style='display:none' >";
	require ("../../../fs_folders/php_functions/connect.php");
    require ("../../../fs_folders/php_functions/function.php");
    require ("../../../fs_folders/php_functions/library.php");
    require ("../../../fs_folders/php_functions/source.php");
    require ("../../../fs_folders/php_functions/myclass.php");
    require("../../../fs_folders/php_functions/Class/Brand.php");
    use app\Brand;

	$mc = new myclass();
    $db = new Database();
    $db->connect();
    $brandObject = new Brand($db, $mc->mno);

 	$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );  
 	$mno 			 =  $mc->get_cookie( 'mno' , 136 );   
	$brand           = strtolower($_GET['brand']);
	$page            = $_GET['page'];
	$type            = strtolower($_GET['type']);
    $gender          = ($_GET['gender'] != 'all gender') ? $_GET['gender'] : '';

	echo "</div>";
    //echo "type = $type <br>";
    $count = 0;
    if($page > 1){
        $count = $page-1;
    }
    $end  = 15;
    $start = $count*$end;

    // get topic or brand.
    if($type=='topic') {
        //echo "inside topic <br>";
        if($brand == 'all topics') {
            $brandContent = $brandObject->brand(0,$brandObject->category('','','','topic'),2,'welcome','','bno desc', "$start, $end");
        } else {
            $brandContent = $brandObject->brand(0,$brandObject->category('',$brand,'','topic')[0]['bcno'],2,'welcome','','bno desc', "$start, $end");
        }
    }
	else {
        //echo "inside brand <br>";
        if($brand == 'all style') {

            echo "all style <br>";
            $brandContent = $brandObject->brand(0,$brandObject->category('','',$gender,'brand'),2,'welcome','','bno desc', "$start, $end");
        } else {

             echo " bcno = " . $brandObject->category('',$brand,$gender,'brand')[0]['bcno'];
            echo "specific style <br>";
            $brandContent = $brandObject->brand(0,$brandObject->category('',$brand,$gender,'brand'),2,'welcome','','bno desc', "$start, $end");
        }
	}

	// Print modal and more button
	if($type == 'topic') { ?>  
		<modal>
            <?php for ($i=0; $i < count($brandContent); $i++): ?>
                <?php
                $bno  = $brandContent[$i]['bno'];
                $bcno = $brandContent[$i]['bcno'];
                $bname = $brandContent[$i]['bname'];
                $branCategoryContent = $brandObject->category($bcno);
                $type1 = $branCategoryContent[0]['type'];
                //print($type1);
                $path1 = 'fs_folders/images/uploads/brands/' . $bno . '_' . $type1 . '.jpg';
                ?>
                <li>
                    <div>
                        <img onclick=" welcome_thumbnail_select('#img-thumbnail-hover-row2-', '<?php echo $bno ?>', 'selected_2', '#welcome-show-more-row2')" onmouseout="welcome_thumbnail_out('#img-thumbnail-hover-row2-', '<?php echo $bno ?>')" id='img-thumbnail-hover-row2-<?php echo $bno ?>' class="img-thumbnail  img-thumbnail-hover img-thumbnail-row-2 img-thumnail-row-2-<?php echo $bno ?>" alt="140x140" src="fs_folders/images/welcome-popup/select-check.png" data-holder-rendered="true" style="width: 140px; height: 140px;">
                        <img onmouseover="welcome_thumbnail_hover('#img-thumbnail-hover-row2-', '<?php echo $bno ?>')" class="img-thumbnail" alt="140x140" src="<?php echo $path1; ?>" data-holder-rendered="true"  >
                    </div>
                    <div style="clear:both" ></div>
                    <div style="color:black; font-size:12px; padding-top:5px; text-align: left" > <?php echo $bname; ?> </div>
                </li>
            <?php endfor; ?>
        <modal>
        <more>  
			<?php $page++; ?>
			<input type="button" value="more topics..." id="welcome-show-more-row2" onclick="welcome_select_brand_more('<?php echo $brand; ?>', '<?php echo $page; ?>', 'topic')" >
		<more>
	<?php  }
    else {  ?>
		<modal>
            <?php for ($i=0; $i < count($brandContent); $i++): ?>
                <?php
                    $bno  = $brandContent[$i]['bno'];
                    $bcno = $brandContent[$i]['bcno'];
                    $bname = $brandContent[$i]['bname'];
                    $branCategoryContent = $brandObject->category($bcno);
                    $type1 = $branCategoryContent[0]['type'];
                    //print($type1);
                    //print($bcno);
                    $path1 = 'fs_folders/images/uploads/brands/' . $bno . '_' .  $type1 . '.jpg';
                ?>
                <li>
                    <table>
                        <tr></tr>
                        <td>

                            <div>
                                <img onclick=" welcome_thumbnail_select('#img-thumbnail-hover-row1-', '<?php echo $bno ?>', 'selected_1', '#welcome-show-more-row1')" onmouseout="welcome_thumbnail_out('#img-thumbnail-hover-row1-', '<?php echo $bno ?>')" id='img-thumbnail-hover-row1-<?php echo $bno ?>' class="img-thumbnail  img-thumbnail-hover img-thumbnail-row-1" alt="140x140" src="fs_folders/images/welcome-popup/select-check.png" data-holder-rendered="true" >
                                <img onmouseover="welcome_thumbnail_hover('#img-thumbnail-hover-row1-', '<?php echo $bno ?>')" class="img-thumbnail" alt="140x140" src="<?php echo $path1; ?>" data-holder-rendered="true"  >
                            </div>
                            <div style="clear:both" ></div>
                            <div style="color:black; font-size:12px; padding-top:5px;" > <?php echo $bname; ?> </div>
                        </td>
                    </table>
                </li>
            <?php endfor; ?>
		<modal>   
		<more>  
			<?php $page++; ?>
			<input type="button" value="more brands..." id="welcome-show-more-row1" onclick="welcome_select_brand_more('<?php echo $brand; ?>', '<?php echo $page; ?>')" >
		<more>
	<?php } ?>
<?php
/*
echo "
brand = $brand  <br>
page  = $page <br>
type  = $type <br>
gender =   $gender <br>
";
*/

?>