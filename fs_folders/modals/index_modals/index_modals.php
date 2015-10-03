<?php 
   	require ("../../../fs_folders/php_functions/connect.php");
    require ("../../../fs_folders/php_functions/function.php");
    require ("../../../fs_folders/php_functions/library.php");
    require ("../../../fs_folders/php_functions/source.php");
    require ("../../../fs_folders/php_functions/myclass.php"); 

	$mc = new myclass();  
    $mc->auto_detect_path();


    echo "<div style='display:none' >";

    $pref_style = $_GET['pref_style'];
    $gender = $_GET['gender'];
    $email = $_GET['email'];  



    echo " this is the result for the sign up news letter $pref_style $gender $email <BR>"; 
    ; 



    /**
    *  feb 13 , 2014 
    */
    class indexModals extends indexModalsCode {
 
        public function insert_sign_up_newsletter( $email , $pref_style , $gender , $mc ) { 
            $e = selectv1( 
                '*',
                'fs_newsletter_signups',
                array('newsletter_email'=>$email)
            ); 
            if ( empty($e) ) {
                $b = insert(
                    'fs_newsletter_signups',
                    array('newsletter_gender','newsletter_preferred_style','newsletter_email','newsletter_signup_date'),
                    array( $gender , $pref_style  , $email ,  date("Y-m-d") ),
                    'nlsno'
                );         

                if ( $b ) {
                    echo " successfully sign up! ";
                }else{
                    echo " failled to sign up";
                }
                echo " not yet sign up";
                // $mc->send_email_to_user( "FASHIONISTA" ,  $email ); 
                // $this->send_newsletter_signup_to_admin( $email , $pref_style , $gender  ); 
            }else{
                echo "already sign uped";
            }   
            $this->send_newsletter_signup_to_admin( $email , $pref_style , $gender  ); 
        }     
        public function send_newsletter_signup_to_admin( $email , $pref_style , $gender ) { 
            $to1 = "mrjesuserwinsuarez@gmail.com"; 
            $to2 = "info@fashionsponge.com";
            $subject = "New Newsletter sign up from $email"; 
            $senderMail = "FashionSponge@";   
            $from = $senderMail;   

            // $email , $pref_style , $gender
            $headers  = "From: $from\r\n"; 
            $headers .= "Content-type: text/html\r\n"; 
            $body = " 
                email : $email \n 
                gender : $gender \n 
                preferred style : $pref_style \n 
            "; 
            mail($to1, $subject, $body, $headers);  
            mail($to2, $subject, $body, $headers);
        }
    }  
    class  indexModalsCode {      
    }  

    $im = new indexModals (); 

    $im->insert_sign_up_newsletter( $email , $pref_style , $gender , $mc );
    

    echo "</div>";



?>