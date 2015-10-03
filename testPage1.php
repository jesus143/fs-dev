<?php 
session_start();


  
 








// sessionTest( $_GET["sesVal"] );
// getUserIP();

getUserIP( $_GET["ip"] );


function getUserIP( $ip )
{

  if ( empty( $ip )) 
  {
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    // echo " ip $client";
    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }
  }
  // $ip = "216.115.69.144";
  $content = file_get_contents("http://www.speedguide.net/ip/$ip");
  
  

  $cty_start_pos = strpos($content, "City: </td><td>");
  $cty_start_pos+=5;
  $init_city = substr($content,$cty_start_pos , 100);
  $city_end_pos = strpos($init_city, "</td></tr>");
  $city = substr($init_city,0,$city_end_pos);


  $country_start_pos = strpos($content, "Country: </td><td>");
  $country_start_pos+=8;
  $init_country = substr($content,$country_start_pos , 100);
  $country_end_pos = strpos($init_country, "<img");
  $country = substr($init_country,0,$country_end_pos);




 echo "
 id = $ip <br>
  city = $city <br>
  country = $country <br> "; 







  // IP address:</td><td><b>
  // hostname: </td><td>
  
  // Postal code: </td><td>
// Country: </td><td>

}




// echo $user_ip; // Output IP address [Ex: 177.87.193.134]
function iptocountry($ip) {
    // $numbers = preg_split( "/\./", $ip);
    // include("ip_files/".$numbers[0].".php");
    // $code=($numbers[0] * 16777216) + ($numbers[1] * 65536) + ($numbers[2] * 256) + ($numbers[3]);
    // foreach($ranges as $key => $value){
    //     if($key<=$code){
    //         if($ranges[$key][0]>=$code){$two_letter_country_code=$ranges[$key][1];break;}
    //         }
    // }
    // if ($two_letter_country_code==""){$two_letter_country_code="unkown";}
    // return $two_letter_country_code;
}














function sessionTest( $sesVal )
{ 
    if ( !empty( $sesVal ) ) 
    { 

      $_SESSION["sesVal"] = $sesVal;
      echo " current session ". $_SESSION["sesVal"]."<br>";
    }
    else 
    { 
       echo " last session ". $_SESSION["sesVal"]."<br>";
    }
}
function send_mail( )
{
   

	$Name = "moore"; //senders name
	$email = "rico@adress.com"; //senders e-mail adress
	$recipient = "mrjesuserwinsuarez@gmail.com"; //recipient
	$mail_body = "The text for the mail..."; //mail body
	$subject = "Subject for reviever"; //subject
	$header = "From: ". $Name . " <" . $email . ">\r\n"; //optional headerfields

	ini_set('via', 'mydomain@domain.com'); //Suggested by "Some Guy"

	if  ( mail($recipient, $subject, $mail_body, $header) ){ echo "email sent now"; }   //mail command :)
}
function split_string_single($string , $long_text_tobe_plit , $cut_every )
{ 
    // echo strlen($string);

    // $cut_every = 5;
    // $long_text_tobe_plit = 20;

    $strlen = strlen($string);

    if ($strlen >= $long_text_tobe_plit) 
    {
        // echo "<br>split<br>";

        for ($i=0; $i < $strlen; $i++) 
        { 
             if ($i%$cut_every==0) 
             {
                  // echo "$i split <br>";
                  $string1 = substr($string,$i,$cut_every);

                  $string1 = $string1;
                  // echo "$i = $string1 <br>";
                  $new_string .= ' '.$string1;


                  // $new_string = substr_replace($string,'-', $i);
             }
        }
        // echo "new string is = $new_string <br>";
        return $new_string;
    }
    else  
    {
        // echo 'don\'t split <br>';
    	return $string.' '; 
    }
}

    // $string = 'my name is jesus erwin suarez from buru un iligan city.';
    // $string = 'mynameisjesuserwinsuarezfrombu ruuniligancityqweqweqweqweqweqweqweqw.';    
    // echo " original string = $string <br>";
    // split_string_multiple($string , 10 , 25);    

    function split_string_multiple($string , $long_text_tobe_plit , $cut_every)
    { 
        $stringA = explode(' ', $string);
        // print_r($stringA);
        $str_A_len = count($stringA);

        for ($i=0; $i < $str_A_len ; $i++) 
        { 
        	echo " $i =".$stringA[$i] .'<br>';
            $new_string = split_string_single($stringA[$i] , $long_text_tobe_plit , $cut_every);
            // echo $new_string.'<br>';
            $new_string1.=$new_string;
        }
        // $new_string1.=$new_string;


         echo "new string = $new_string1 <br>"; 
         // return $new_string1;
    }
?>