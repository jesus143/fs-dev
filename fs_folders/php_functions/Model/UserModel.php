<?php
    require ('../Class/User.php');
    require ('../Database/Database.php');

    $db = new Database();
    $db->connect();
    $mno = 136;
    $user = new User($mno, $db);




/*
    $response = $user->updateEmail('mrjesuserwinsuarez@gmail.com1232');
    if($response == 1) {
        print('successfully updated');
    } else if($response == 2){
        print('email exist 1');
    } else {
        print('failed to update');
    }
*/

//$result = $db->select('fs_member_accounts', '*', null, "email = '1mrjesuserwinsuarez@gmail.com'");
//echo $db->getTotalRes();



//validate password and email


/*
$password = 'hepburnas';
$email    = 'limtdeditionstyling@gmail.com';

if($user->validatePasswordAndEmail($password, $email)) {
    echo "valid input data";
} else {
    echo "invalid input data";
}
*/

?>