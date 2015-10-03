<?php  session_start();
    include('http://fashionsponge.com/fs_folders/php_functions/Database/Database.php');
    $database = new Database();
    $database->connect();
    $mno = $_SESSION['mno'];
    $user_account = $database->selectV1('fs_member_accounts', '*', "mno = $mno");
    $user_profile = $database->selectV1('fs_members', '*', "mno = $mno");
    $lastname     = (!empty($user_profile[0]['lastname']) ? $user_profile[0]['lastname']  : '');
    $firstname    = (!empty($user_profile[0]['firstname'])? $user_profile[0]['firstname'] : '');
    $username     = (!empty($user_account[0]['username']) ? $user_account[0]['username']  : '');
//    print_r($user_profile);
//    print_r($user_account);
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">-->

    <!-- Optional theme -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">-->

    <!--css-->
    <link rel="stylesheet" href="http://fashionsponge.com/fs_folders/login/pages/welcome/welcome-about-user-style.css" >

    <!--<link rel="stylesheet" href="welcome-about-user-normalize.css" >-->
    <!--<link rel="stylesheet" href="welcome-about-user-style.css" >-->

</head>



<body style="background-color: #d3d3d3" >

<!--<div style="border:1px solid red; width:50%; margin: 0px auto" >-->
<!--sdfsdfsdf-->
<!--<ul class="ul container">-->
<!--<li> 1</li>-->
<!--<li> 2</li>-->
<!--<li> 3</li>-->
<!--<li> 4</li>-->
<!--<li> 5</li>-->
<!--<li> 6</li>-->
<!--</ul>-->
<!--</div>-->

<div class="container"   >
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item">
                    <label  for="fname" > First Name </label>
                    <input type="text" class="form-control" id="fname" value="<?php echo $lastname; ?>"  style=" margin-top: 6; "  />
                    <div style="border:1px solid none; text-align: left; font-size: 11px; color:red; display:none" id="fname-error" >first name required</div>
                </li>
                <li class="list-group-item">
                    <!--<labe for="lname" > Last Name </labe><br>-->
                    <input type="text" class="form-control" id="lname" placeholder="Last Name" value="<?php echo $firstname; ?>" />
                    <div style="border:1px solid none; text-align: left; font-size: 11px; color:red; display:none" id="lname-error" >last name required</div>
                </li>
                <li class="list-group-item">
                    <table border="0" style="width: 100%;" >
                        <tr>  </tr>
                        <td> </td>
                        <td  > <label for="lname" >Username</label> </td>
                        <tr> </tr>
                        <td style="width: 10%; " >
                            <span  style="margin: 5px; border:none" >Fashionsponge.com/</span>
                        </td>
                        <td>
                            <input type="text" id="uname"  value="<?php echo $username; ?>" style="width: 97%; padding:3%;border-radius: 5px;border: 1px solid #CACACA;" />
                        </td>
                        <tr></tr>
                        <td></td>
                        <td> <div style="border:1px solid none; text-align: left; font-size: 11px; color:red; display:none" id="uname-error" >user exist</div> </td>
                    </table>
                </li>
                <li class="list-group-item">
                    <label> Gender </label><br>
                    <select class="gender" id="gender" style="border: 1px solid rgb(180, 180, 180) !important;" >
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </li>
                <li class="list-group-item">
                    <div style="text-align:center" >
                        <h4> Profile Image</h4>
                    </div>
                    <div style="border:1px solid #d3d3d3; padding: 10px; " >
                        <!--<img src="http://fashionsponge.com/fs_folders/images/uploads/members/mem_profile/male-default-avatar.png"  class="img-responsive"  alt="Cinque Terre" width="100%" height="100%">-->
                        <center>
                            <img id="img_prev" class="profile-pic-default" src="../../../../fs_folders/images/genImg/new-postalook-post-arrow-up.png" onclick="$('#f_image_profile_pic').click( )" >
                        </center>
                        <form action="../../../../profile_crop_display.php" method="POST" enctype="multipart/form-data" id="upload-profile-pic">
                            <input type="file" id="f_image_profile_pic" name="file" runat="server" style="display:none;">
                            <!--<img id="avatar-right-uploadprofile" src="../../../../fs_folders/images/genImg/change-profile.png" onclick="$('#f_image_profile_pic').click( );">-->
                        </form>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="" id="checkbox" checked disabled>Crop</label>
                    </div>
                </li>
                <li class="list-group-item">
                    <img id="welcome-about-loader" src="../../../../fs_folders/images/attr/loading 2.gif" />
                    <input type="button" class="btn btn-lg btn-default" id="welcome-about-done" value="Done" >
                </li>
                <li class="list-group-item">
                    <div id="popup-result" style="color:#000;"> </div>
                </li>
            </ul>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

</body>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://www.fashionsponge.com/fs_folders/Assets/js/bootstrap.min.js" ></script>
<!--js-->

<script src="http://fashionsponge.com/fs_folders/login/pages/welcome/welcome-about-js.js"> </script>
</html>





