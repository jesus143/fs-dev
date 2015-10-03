<?php  session_start();
include('../../../fs_folders/php_functions/Database/Database.php');

//$mno = $_SESSION['mno'];  //1016;
$mno = $_SESSION['mno'];


echo "mno = $mno <br><br>";

$database = new Database();
$database->connect();
$response = '';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $_POST['uname'];
$checkbox = $_POST['checkbox'];
$gender = $_POST['gender'];
$fullName = $fname . ' ' . $lname;

 print_r($_POST);
//check if username exist return true or false

$username = $database->selectV1('fs_member_accounts', '*', "username = '$uname' and mno <> $mno");

//print_r($username);

if($username != TRUE)
{
    //SAVE DATA
    if($database->update('fs_members', array('fullname'=>$fullName, 'firstname'=>$fname, 'lastname'=>$lname, 'gender'=>$gender), "mno = $mno"))
    {
        echo "fs_members info successfully updated<br>";

        if ($database->update('fs_member_accounts', array('username' => $uname), "mno = $mno"))
        {
            echo "account updated<br>";
            if($database->update('fs_members', array('tlog'=>3), "mno = $mno"))
            {
                echo "<br> success to updated tlog = 3";
            }
            else
            {
                echo "<br> faled to update tlog = 3";
            }
        }
        else
        {
            echo "account failled to save<br>";
        }
    }
    else
    {
        echo 'failed to updated fs_members<br>';
    }
}
else
{
    echo 'username exist <br>';
    echo "<username>exist<username>";
}


/**
 * first name field is empty
 */

if(empty($fname))
{
    echo "<fname>empty<fname>";
}

/**
 * last name field is empty
 */

if(empty($lname))
{
    echo "<lname>empty<lname>";
}











    /*
        $response = "{response[{'username':'true', 'fs_member':'true', 'fs_account':'true'} ]}";
        echo $response;
    */

//    echo ' response ' . $response;
