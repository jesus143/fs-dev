			<?php
				require("connect.php");
				require ("program.php");
				require ("../function.php");
				require ("../source.php");
				require ("../myclass.php");

				

				$from=$_GET["page"];
				// $to=$page*20;
				// $from=$to-20;
				// $rows=20;
				
				//$q = "SELECT * from activity act where act.action='posted' or act.action='joined' order by act.ano desc limit $from,$rows "; 
				//$q = "SELECT * from activity act where act.action='posted' order by act.ano desc limit $from,$rows ";
				
				// echo " this is ther result";
			    look_views(array('home',$from));
			    
			?>
			
			<script>
				function showRate(id,state){
					getID("rate"+id).style.display=state;
				}
			</script>	
 