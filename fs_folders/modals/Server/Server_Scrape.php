<?php      
	require ("../../../fs_folders/php_functions/String/String.php");
	require ("../../../fs_folders/php_functions/Database/LookbookDatabase.php");
    require ("../../../fs_folders/php_functions/Program.php");
    require ("../../../fs_folders/php_functions/Time/Time.php");
    require ("../../../fs_folders/php_functions/myclass.php");

    $time = new Time();
    $program = new Program(new Database());
    $mc = new myclass();
    $database = new Database();
    $database->connect();

    $lookBookDatabase = new LookbookDataBase();

    // $_GET['invitedIds'] = '615,614,613,612';
    // $_GET['dateTime'] = '2015-01-05 08:20:23';    
    // update data


    /*
   	$_GET['type'] = 'updateScrapedTimeSend';
    switch (string::isEmpty($_GET['type'] , 'NULL'))
    {
    	case 'updateScrapedTimeSend': 
    		$program->updateScrapedTimeSend(
    			string::isEmpty(
    				$_GET['dateTime'] , 
    				'0000-00-00 00-00-00'
    			) , 
    			string::isEmpty(
    				$_GET['invitedIds'] , 
    				'0'
    			)
    		);   
    	break; 
    	default:  
    	break;
    }
    */

    $response       = 0;
    $location       = $_GET['location'];// = 'PHILIPPINES';
    $timezone       = $_GET['timezone'];// =  'PHT';
    $id             = 0;
    $version        = 2;
    $row            = $_GET['row'];// = 'DateTimeSend2';
    $type           = $_GET['type'];// = 'default';
    $invited_status = 0; // add this to allow the update of the time DateTimeSend, DateTimeSend1 and DateTimeSend2


echo "<pre>";

    switch($type) {

        case "dateTime":
                if($version == 1) {

                    // print ids
                    // echo " ids " . $_GET['invitedIds'];
                    // convert string ids to array
                    // $idArray = explode(',', $_GET['invitedIds']);
                    //set timezone to get the time
                    foreach($idArray as $id) {

                        // print the specific time
                        echo " $id time server " . $mc->date_time;

                        //setting first day of the first time send required: dateTime
                        //get the specific timezone of the user
                        $timezone = $lookBookDatabase->getUserTimeZone($id);
                        echo "<br>this is time zone $timezone <br>";

                        //set timezone to get the time
                        $time->setTimeZoneDateTime($timezone);

                        //concat server date and send time
                        $dateTime = $time->concatDateAndTime($time->getTimezoneDate(), $time->getTimeRemoveDate($_GET['dateTime']));

                        echo "Send time " . $dateTime;
                        echo "Server Date Timezone = " . $time->getTimezoneDate();

                        //convert the time string send from the admin to date
                        $dateTime = date('Y-m-d H:i:s', strtotime($dateTime));
                        $location = 'BRISBANE';
                        //add dateTimeSend from 1 - 4 dates
                       $response = $time->addDateTmeSend($dateTime, $time->getTimeZoneDateTime24(), $id, $database, $invited_status);
                    }
                } else {

                    $time->setTimeZoneDateTime($timezone);

                    //concat server date and send time
                    $dateTime = $time->concatDateAndTime($time->getTimezoneDate(), $time->getTimeRemoveDate($_GET['dateTime']));

                    echo "Send time " . $dateTime;
                    echo "Server Date Timezone = " . $time->getTimezoneDate();

                    //convert the time string send from the admin to date
                    $dateTime = date('Y-m-d H:i:s', strtotime($dateTime));

                    //add dateTimeSend from 1 - 4 dates
                    //people are not approved will be affected with this code they will be approved and set the time
                    $response = $time->addDateTmeSend($dateTime, $time->getTimeZoneDateTime24(), $id, $database, $location, $invited_status);
                }
            break;
        default:
            if ($version == 1) {
                /**
                 *update the time only its for the second, third and fourth day.
                 *prepare the result to sent the email
                 *setting the time second and third days of the time send required: time
                 **/
                // add in the field for row and time
                // $_GET['row']  = 'DateTimeSend2';
                // $_GET['time'] = '10:21:20';
                $_GET['time'] = $time->getTimeRemoveDate($_GET['dateTime']);


                //convert string ids to array
                $idArray = explode(',', $_GET['invitedIds']);
                foreach ($idArray as $id) {

                    // get specific data the dateTimeSend1 or 2 or 3
                    $dbDateTime = $lookBookDatabase->getSpecificData('fs_invited', $_GET['row'], 'invited_id', $id);

                    //update the time of the specific row dateTimeSend1 or 2 or 3
                    $response = $time->updateTimeSend($_GET['row'], $dbDateTime, $_GET['time'], $id, $database, $location);
                }
                // update all first time row location
            } else {
                echo "version 2 and its updating the time only<br>";

                $_GET['time'] = $time->getTimeRemoveDate($_GET['dateTime']);
                // get specific data the dateTimeSend1 or 2 or 3

                // get specific row value
                $response = Database::selectV1('fs_invited', '*', "invited_status = 1 and location = '$location' order by invited_id desc limit 1");


                print_r( $response );
                $dbDateTime = $response[0][$row];


                echo "date time $dbDateTime";
                //update the time of the specific row dateTimeSend1 or 2 or 3
                $response = $time->updateTimeSend($row, $dbDateTime, $_GET['time'], $id, $database, $location);
            }
        break;
    }

    $log = Time::$log;
    echo "<response>$response<response>";
    echo "<reason>$log<reason>";






//$lookBookDatabase->getSpecificData('fs_invited','DateTimeSend1', 'location', $location);



























