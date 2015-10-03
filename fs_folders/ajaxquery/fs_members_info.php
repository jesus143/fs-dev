<?php 
	session_start();
	require("../connect.php");
	require ("../function.php");
	require ("../source.php");
	  // $your_data=get_data_from_fs_members();
      // $men_brand=get_men_brands_list_db();
      // $women_brand=get_women_brands_list_db();
	// echo "update now!<br>";
	// echo $_GET["occupation"]."<br>";
	// echo get_preffered_style_name($_GET["prefferedstyle"])."<br>";
	// echo $_GET["blog_domain"]."<br>";
 //    echo $_GET["website"]."<br>";
 //    echo $_GET["country"]."<br>";
 //    echo $_GET["state"]."<br>";
 //    echo $_GET["city"]."<br>";
 //    echo $_GET["zipcode"]."<br>";
 //    echo $_GET["cyear"]."<br>";
 //    echo $_GET["describe_yourself"]."<br>";
 //    echo $_GET["gender"]."<br>";
	// mno	lastname	middlename	firstname	gender	website	bdate	
	// occupation	country	state_	city	zip	blogdom	aboutme	ispicset	
	// fbid	twid	isVal	datejoined
	// $whereArray = array('mno',134);





	updateArray('fs_members',
					array('occupation','preffered_style','blogdom','website','country','state_','city','zip','bdate','aboutme','gender'),
					array(get_occupation_name($_GET["occupation"]),get_preffered_style_name($_GET["prefferedstyle"]),$_GET["blog_domain"],$_GET["website"],$_GET["country"],$_GET["state"],$_GET["city"],$_GET["zipcode"],set_year($_GET["cyear"]),$_GET["describe_yourself"],gender($_GET["gender"])),
					'mno',$_SESSION['mno']);

	
 	// echo "gender = ".gender($_GET["gender"])."<br>";
	// echo "gender = ".year($_GET["cyear"])."<br>";
	// print_r($your_data);

    if ($_GET["gender"] == 1){
    	// print_r($men_brand);
    	 
    	$_SESSION['gender']=1;
   		echo "<table border=0 class='blist'>";
			   // brands_men($brands_men,$bname=null,$id=null,$class=null)
			   brands_men(brands_men_list(),'brands_men','id_men_','cl_men_'); 
		echo "</table>";
		// echo "<input type='button' onclick='getCheckedBoxes();gotoSlide(2)' value='SAVE' > ";
		echo "
			<br><br><br>
	 		<center>
				<input type=button onclick='getCheckedBoxes_men();gotoSlide(2)' value='SAVE' class='m' style='width:200px;height:50px;font-size:20pt;box-shadow:2px 2px 2px #aaa;border:0; ' /> 
	 		</center>
		";
    }else{
    	// print_r($women_brand);
    	$_SESSION['gender']=2;
    	echo "<table border=0 class='blist'  >";
			   brands_women(brands_women_list(),'brands_women','id_women_','cl_women_'); 
		echo "</table>";
	 	// echo "<input type='button' onclick='getCheckedBoxes();gotoSlide(2)' value='SAVE'style='width:200px;height:50px;font-size:20pt;box-shadow:2px 2px 2px #aaa;border:0;' > ";
		echo "
			<br><br><br>
	 		<center>
				<input type=button onclick='getCheckedBoxes_women();gotoSlide(2)' value='SAVE' class='m' style='width:200px;height:50px;font-size:20pt;box-shadow:2px 2px 2px #aaa;border:0; ' /> 
	 		</center>
		";
    }		
 ?>