<?php
    require_once "../../../fs_folders/php_functions/Database/Database.php";
    require_once "../../../fs_folders/php_functions/Database/InvitedLocation.php";
    require_once "../../../fs_folders/php_functions/Time/Time.php";
    $database = new Database();
    $database->connect();
    $invitedPeopleDb = new FashionSponge\InvitedLocation();
    $invitedPeopleDb->addIfThereIsNewLocationInInvitedPeople($database);
    
    $time = new Time();
    
    $locations  = $invitedPeopleDb->getAllLocation($database);
    
    
    
   
    
    
    
    
?>

<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head lang="en">-->

    <!--header meta for responsive mobile-->

<!--    <meta charset="utf-8">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--    <meta name="description" content="">-->
<!--    <meta name="author" content="">-->
<!---->
    <!--css -->
<!--    <link rel="stylesheet" href="../../../fs_folders/Assets/css/bootstrap-theme.css" >-->
<!--    <link rel="stylesheet" href="../../../fs_folders/Assets/css/bootstrap.min.css" >-->
<!--    <link rel="stylesheet" href="../../../fs_folders/Assets/css/bootstrap.css" >-->
<!--    <link rel="stylesheet" href="../../../fs_folders/Assets/css/style.css" >-->
<!--    <!-- js -->
<!--    <script src="../../../fs_folders/Assets/js/jquery-1.11.2.js" ></script>-->
<!--    <script src="../../../fs_folders/Assets/js/bootstrap.min.js" ></script>-->
<!--    <script src="../../../fs_folders/Assets/js/javascript.js" ></script>-->
<!--    <script src="../../../fs_folders/Assets/js/jquery.js" ></script>-->
<!--    <script src="../../../fs_folders/js/function_js.js" ></script>-->
<!--    <script src="../../../fs_folders/js/Scrape.js" ></script>-->


<!--    <title> Location </title>-->
<!--</head>-->
<!--<body>-->
<!--<div class="container">-->
<!---->
<!--    <div id="response" >-->
<!--    </div>-->
<!--    <div class="table-responsive">-->
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Location</th>
                <th>Time1</th>
                <th>Time2</th>
                <th>Time3</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
                <?php
                	$not_accepted = array('WIB', 'A', 'ACDT', 'AEST', 'WITA', 'AWST');
                	$dateTime = 'not allowed';
                	$style = '';
                    for($i=0; $i<count($locations); $i++):
                        $id    = $locations[$i]['fs_invited_location_id_pk'];
                        $name  = $locations[$i]['fs_invited_location_name'];
                        $time1 = $locations[$i]['fs_invited_location_send_tim1'];
                        $time2 = $locations[$i]['fs_invited_location_send_tim2'];
                        $time3 = $locations[$i]['fs_invited_location_send_tim3'];
                        $tz    = $locations[$i]['fs_invited_location_timezone'];
                        $date  = $locations[$i]['fs_invited_location_date'];
                        
                        
                        
                        if(!in_array($tz, $not_accepted)) 
                        {
							$time->setTimeZoneDateTime($tz); 
                        	$dateTime= $time->getTimeZoneDateTime12(); 
                        	
                        	if(strpos($dateTime, 'PM') > 0) 
                        	{
								$style = 'color:red';
							}
							else
							{
								$style = 'color:green';	
							}
						}
                     	 
                        ?>
                        <tr>
                        <td><?php echo $name . ' (' . $tz . " ) [<b style='$style'   >" . $dateTime . '</b>]'; ?></td>
                        <td><?php echo Time::convertTime24ToTime12($time1); ?></td>
                        <td><?php echo Time::convertTime24ToTime12($time2); ?></td>
                        <td><?php echo Time::convertTime24ToTime12($time3); ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo<?php echo $id; ?>">
                                Update
                            </button>
                            <img src="http://www.fashionsponge.com/fs_folders/images/attr/loading%202.gif" id="fs_invited_location_send_tim1-<?php echo $id; ?>-loader" style="visibility:hidden"  />
                        </td>
                        </tr>
                        <tr id="demo<?php echo $id; ?>" class="collapse Out" >
                            <td> 
                                <input type="text" class="form-control" value="<?php echo $tz; ?>" id="location-time-zone-<?php echo $id; ?>" />
                                <button type="button" class="btn btn-default" onclick="fsInvitedChangeTimeZone('#location-time-zone-<?php echo $id; ?>', '#fs_invited_location_send_tim1-<?php echo $id; ?>-loader', '<?php echo $id; ?>')" >Update</button> 
                            </td>
                            <td>
                                <select onchange="fsInvitedChangeTime(this)" id="fs_invited_location_send_tim1-<?php echo $id; ?>" class="selectpicker" >
                                    <?php foreach (Time::getTimeDbFormatArray() as $key => $value ): ?>
                                        <option value="<?php echo $key ?>" ><?php echo $value ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select onchange="fsInvitedChangeTime(this)" id="fs_invited_location_send_tim2-<?php echo $id; ?>" class="selectpicker" >
                                    <?php foreach (Time::getTimeDbFormatArray() as $key => $value ): ?>
                                        <option value="<?php echo $key ?>" ><?php echo $value ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select onchange="fsInvitedChangeTime(this)" id="fs_invited_location_send_tim3-<?php echo $id; ?>" class="selectpicker" >
                                    <?php foreach (Time::getTimeDbFormatArray() as $key => $value ): ?>
                                        <option value="<?php echo $key ?>" ><?php echo $value ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td></td>
                        </tr>
                <?php endfor; ?>
            </tbody>
        </table>
<!--    </div>-->
<!--</div>-->
<!---->
<!--</body>-->
<!-- Bootstrap core JavaScript
   ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
<!---->
<!--</html>-->