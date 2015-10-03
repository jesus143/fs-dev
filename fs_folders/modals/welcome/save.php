<?php
/**
 * Created by PhpStorm.
 * User: Jesus
 * Date: 9/16/2015
 * Time: 12:05 PM
 */

	echo "<div style='display:block' >";
	require ("../../../fs_folders/php_functions/connect.php");
    require ("../../../fs_folders/php_functions/function.php");
    require ("../../../fs_folders/php_functions/library.php");
    require ("../../../fs_folders/php_functions/source.php");
    require ("../../../fs_folders/php_functions/myclass.php");
    require ("../../../fs_folders/php_functions/Class/Brand.php");
    require ("../../../fs_folders/php_functions/Class/User.php");

    use app\Brand;
	$mc = new myclass();
    $db = new Database();
    $db->connect();

    $brandObject = new Brand($db, $mc->mno);
    $userObject  = new User($mc->mno, $db);
    
    $fname        = $_GET['fname'];
    $lname        = $_GET['lname'];
    $uname        = $_GET['uname'];
    $bname        = $_GET['bname'];
    $burl         = $_GET['burl'];
    $gender       = $_GET['gender'];
    $plus_blogger = $_GET['plus_blogger'];
    $about        = $_GET['about'];
    $brand        = $_GET['brand'];
    $topic        = $_GET['topic']; 
    echo "</div>";
?>

 <?php
    echo "
        about $about <br>
        brand $brand <br>
        topic $topic <br> 
        fname = $fname <br>
        lname = $lname <br>
        uname = $uname <br>
        bname = $bname <br>
        burl = $burl <br>
        gender = $gender <br>
        plus_blogger = $plus_blogger <br> 
    ";


    /**
    * Update the user information 
    */
    if($userObject->updateInfo(
        array(
            'fullname'=>$fname . ' ' . $lname,
            'firstname'=>$fname,
            'lastname'=>$lname,
            'identity_username'=>$uname,
            'blogdom'=>$bname,
            'blogurl'=>$burl,
            'gender'=>$gender,
            'plus_blogger'=>$plus_blogger,
            'tlog'=>3,
            'status'=>0
        ),
        "mno = $mc->mno"
    )){
        print('about updated  <br>');
    } else {
        print('about not added <br>');
    }

    /**
    * Save the brand
    */
    if($brandObject->Save($brand)){
        print('topic added <br>');
    } else {
        print('topic not added <br>');
    }

    /**
    * Save the topic 
    */ 
    if($brandObject->Save($topic)) {
        print('brand added <br>');
    } else {
        print('brand not added <br>');
    }








    print("mno = $mc->mno <br>");










?>