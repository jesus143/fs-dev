<?php
/**
 * Created by PhpStorm.
 * User: Jesus
 * Date: 7/15/2015
 * Time: 11:33 AM
 */

  // Remember to copy files from the SDK's src/ directory to a
  // directory in your application on the server, such as php-sdk/
  //require('../../fs_folders/API/facebook-php-sdk-v4-5.0-dev/src/Facebook/Facebook.php');
require '../../fs_folders/API/facebook-php-sdk-master/src/facebook.php';
//$facebook = new Facebook(array(
//    'appId'  => '528594163842974',
//    'secret' => 'a411c8a3c4361556491b2c2ddf38bf21',
//));
$config = array(
  'appId' => '528594163842974',
  'secret' => 'a411c8a3c4361556491b2c2ddf38bf21',
);

  $facebook = new Facebook($config);
  $user_id = $facebook->getUser();
?>
<html>
<head></head>
<body>

<?php
if($user_id) {

    // We have a user ID, so probably a logged in user.
    // If not, we'll get an exception, which we handle below.
    try {
        $fql = 'SELECT name from user where uid = ' . $user_id;
        $ret_obj = $facebook->api(array(
            'method' => 'fql.query',
            'query' => $fql,
        ));

        // FQL queries return the results in an array, so we have
        //  to get the user's name from the first element in the array.
        echo '<pre>Name: ' . $ret_obj[0]['name'] . '</pre>';

        print_r($ret_obj);

    } catch(FacebookApiException $e) {
        // If the user is logged out, you can have a
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $login_url = $facebook->getLoginUrl();
        echo 'Please <a href="' . $login_url . '">login.</a>';
        error_log($e->getType());
        error_log($e->getMessage());
    }
} else {

    // No user, so print a link for the user to login
    $login_url = $facebook->getLoginUrl();
    echo 'Please <a href="' . $login_url . '">login.</a>';

}

?>

</body>
</html>