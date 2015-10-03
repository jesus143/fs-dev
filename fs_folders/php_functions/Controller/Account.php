<?php
session_start();
require ('../Database/Database.php');
require ('../Class/User.php');
//require ('../Class/Email.php');
require ('../Email/Email.php');


// Initialized error session
$_SESSION['error'] = '';

// Initialized mno
$mno 			 =  $_COOKIE['mno'];
$_SESSION['mno'] =  $_COOKIE['mno'];

// Declare
$db              = new Database();
$user            = new User($mno, $db);
$email           = new Email($mno, $db);

// Connect to database
$db->connect();


print($mno);

// used to identify where the error will display.
$type = $_GET['type'];

//start code execution
if(isset($_POST['esave'])) {

    $cemail   = $_POST['cemail'];
    $nemail   = $_POST['nemail'];
    $rnemail  = $_POST['rnemail'];
    $password = $_POST['password'];
    print("cemail = $cemail, nemail = $nemail, rnemail = $rnemail, password = $password");

    if($nemail == NULL) {
        $_SESSION['error'] =  "<span class='error' >New Email must not be empty</span>";
    }
    else if($rnemail == NULL) {
        $_SESSION['error'] =  "<span class='error' >Re-Type New Email must not be empty</span>";
    }
    else if($user->validatePasswordAndEmail($password, $cemail)) {
        echo "<br>valid input data";

        if($nemail == $rnemail) {

            $response = $user->updateEmail($nemail);

            if($response == 1) {

                //print('successfully updated');
                $_SESSION['error'] = "<span class='success' >Successfully updated</span>";


                //check and send new email confirmation.

                if($user->emailConfirmationStatus() == FALSE){
                    //send confirmation email
                    if($email->sendConfirmationEmail($nemail)) {
                        $_SESSION['error'] .= '. Email not yet approved new confirmation email sent. ';
                    } else {
                        $_SESSION['error'] .= '. Email not yet approved new confirmation email failed to sent.';
                    }
                }

            } else if($response == 2) {

                // print('email exist');
                $_SESSION['error'] = "<span class='error' >Email exist</span>";
            } else {

                //print('failed to update');
                $_SESSION['error'] = "<span class='error' >Failed to update</span>";
            }

        } else {

            //print('new email and retype new email not same');
            $_SESSION['error'] =  "<span class='error' >New email and retype new email not same</span>";
        }

    } else {
        //echo "<br>invalid input data";
        $_SESSION['error'] =  "<span class='error' >Invalid password</span>";
    }
}
else if(isset($_POST['spass'])) {

    $cpass     = $_POST['cpass'];
    $cemail    = $_POST['cemail'];
    $npass     = $_POST['npass'];
    $rtnpass   = $_POST['rtnpass'];


    if($npass == NULL || $rtnpass == NULL) {

        $_SESSION['error'] =  "<span class='error' >New password must not be empty.</span>";

    } else if($npass == $rtnpass) {

        // check if password and email matched
        if($user->validatePasswordAndEmail($cpass, $cemail)) {

            // update password now
            $response = $user->updatePassword($npass);

            if($response == 1) {

                $_SESSION['error'] =  "<span class='success' >Password successfully change.</span>";

            } else if($response == 2) {

                $_SESSION['error'] =  "<span class='error' >Member info update but account is not.</span>";

            } else {

                $_SESSION['error'] =  "<span class='error' >Password failed to change.</span>";
            }

        } else {

            $_SESSION['error'] =  "<span class='error' >Current password not correct.</span>";
        }

    } else {

        $_SESSION['error'] =  "<span class='error' >New password didn't match.</span>";
    }








}
else if(isset($_POST['sgender'])) {

    $gender = $_POST['gender'];

    if($user->updateGender($gender)){

        $_SESSION['error'] =  "<span class='success' >Gender successfully updated.</span>";

    } else {

        $_SESSION['error'] =  "<span class='error' >Failed to update.</span>";
    }
}
else if(isset($_POST['bloggerType'])) {


    if($user->updateBloggerType($_POST['blogger_type'])) {
        $_SESSION['error'] =  "<span class='success' >Updated Successfully.</span>";
    } else {
        $_SESSION['error'] =  "<span class='error' >Failed to updated.</span>";
    }
}

else if(isset($_POST['deactivate'])) {
    if($user->deActivateAccount()){
        $_SESSION['error'] =  "<span class='success' >This account successfully deactivated</span>";
    } else {

        $_SESSION['error'] =  "<span class='error' >This account failed to deactivate.</span>";
    }
}

?>

<script>
    var type = '<?php echo $type ?>';
    document.location = 'http://dev.fashionsponge.com/account?at=7&type=' + type ;
</script>



