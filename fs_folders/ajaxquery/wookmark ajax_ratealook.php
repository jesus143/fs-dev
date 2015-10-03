<?php

				require("connect.php");
				require ("program.php");
				require ("../function.php");
				require ("../source.php");
				// require ("../library.php");
				require ("../myclass.php");
				$from=$_GET["page"];

				// $page=$_GET["page"];
		 
				// $to=$page*20;
				// $from=$to-20;
				// $rows=20;
				
				
				// if($_GET["sort"]=="Date, oldest first")
				// 	$sort="order by date_ ";
				// else if($_GET["sort"]=="Date, newest first")
					$sort="order by date_ desc";
				// else if($_GET["sort"]=="Look name")
				// 	$sort="order by pl.lookName ";


					
				// $q = "SELECT * from postedlooks pl,fs_members fm where (pl.lookName like '%".$_GET['keyword']."%' or pl.lookAbout like '%".$_GET['keyword']."%') 
					// and pl.mno=fm.mno $sort  limit $from,20"; 
				if (!empty($_GET['keyword'])) {

					$q = "SELECT * from postedlooks pl,fs_members fm where (pl.lookName like '%".$_GET['keyword']."%' or pl.lookAbout like '%".$_GET['keyword']."%') 
					and pl.mno=fm.mno $sort  limit $from,20"; 
					search($q);
				}else{
			    	look_views(array('ratealook',$from));	
				}
?>

			<script>
				function showRate(id,state){
					getID("rate"+id).style.display=state;
				}
			</script>	
