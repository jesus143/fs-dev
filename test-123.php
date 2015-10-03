<?php


/**

 * Created by PhpStorm.

 * User: Jesus

 * Date: 7/20/2015

 * Time: 1:07 PM

 */





/**

 * src: http://www.ustrem.org/en/articles/send-mail-using-phpmailer-en/

 * include 'PHPMailer-master/PHPMailerAutoload.php';

 * require_once "PHPMailer-master/class.phpmailer.php";

 */



function send($content=array(), $type)

{

    /** Print Input */

    echo "<pre>";

    print_r($content);



    /** Phpmailer and mandrill init */

    $mail = new PHPMailer;

    $mail->IsSMTP();                                     // Set mailer to use SMTP

    $mail->Host = 'smtp.mandrillapp.com';                // Specify main and backup server

    $mail->Port = 587;                                    // Set the SMTP port

    $mail->SMTPAuth = true;                              // Enable SMTP authentication

    $mail->Username = 'mrjesuserwinsuarez@gmail.com';    // SMTP username

    $mail->Password = 'SmEWyEjxZPBrIIZabsTkTw';          // SMTP password

    $mail->SMTPSecure = 'tls';                           // Enable encryption, 'ssl' also accepted

    $mail->From = $content['fromAddr']; // from

    $mail->FromName = $content['fromName'];

    //'marc@businessetouchcrm.com';

    // $mail->FromName = 'Marc';

    // $mail->AddAddress('josh@example.net', 'Josh Adams');  // Add a recipient



    /** Send normal address */

    if(!empty($content['to'])) {

        echo "\nSend normal address\n";

        foreach ($content['to'] as $value) {

            echo "email => " . $value['email'] . "\n<br>";

            echo "name => " . $value['name'] . "\n<br>";

            $mail->AddAddress($value['email'], $value['name']); // to

        }

    }else{

        echo "to is empty \n <bt>";

    }



    /** Send CC address */

    if(!empty($content['toCC'])) {

        echo "\nSend CC address\n";

        foreach ($content['toCC'] as $value) {

            echo "email => " . $value['email'] . "\n<br>";

            echo "name => " . $value['name'] . "\n<br>";

            $mail->AddCC($value['email'], $value['name']);

        }

    }else{

        echo "cc is empty \n <bt>";

    }



    /** Send BCC address */

    if(!empty($content['toBCC'])) {

        echo "\nSend BCC address\n";

        foreach ($content['toBCC'] as $value) {

            echo "email => " . $value['email'] . "\n<br>";

            echo "name => " . $value['name'] . "\n<br>";

            $mail->AddBCC($value['email'], $value['name']);

        }

    }else{

        echo "bcc is empty \n <br>";

    }



    /**Send attachment  */

    if(!empty($content['attachments'])){

        echo "\nSet attachment\n";

        foreach($content['attachments'] as $value ){

            echo "email => " . $value['fileLink'] . "\n<br>";

            echo "name => " . $value['fileName'] . "\n<br>" ;

            $mail->addAttachment($value['fileLink'], $value['fileName']); // optional name

            // $mail->addAttachment('../../jesus/email/mandrill-php-mailer/PHPMailer-master/examples/images/phpmailer.png', 'phpmailer_mini.png');

        }

    }else{

        echo "attachement is empty \n <bt>";

    }





    //        /** Add attachment */

    //         $mail->addAttachment('PHPMailer-master/examples/images/phpmailer_mini.png', 'phpmailer_mini.png'); // optional name

    //         $mail->addAttachment('PHPMailer-master/examples/images/phpmailer.png'); // optional name

    //         $mail->AddAddress("mail1@domain.com", "Recepient 1");

    //         $mail->AddCC("fashionsponge78@gmail.com", 'Web Developer');

    //         $mail->AddBCC("mail1@domain.com", "Recepient 1");

    //         echo "<pre>";

    //        	print_r($content['to']);

    //          for ($i=0; $i <count($content['to']) ; $i++) {

    // 	        $mail->AddAddress($content['to'][$i]['mail'], $content['to'][$i]['name']);

    //		 	 }

    //         // $mail->AddAddress("mail1@domain.com", "Recepient 1");

    //        // $mail->AddCC("fashionsponge78@gmail.com", 'Web Developer');

    //         // $mail->AddBCC("mail1@domain.com", "Recepient 1");

    //



    /**

     * Set html or plain text email

     */

    $mail->IsHTML($content['html']);        // Set email format to HTML or Text



    /**

     * @var  Subject

     * Subject of the email

     */

    $mail->Subject = $content['subject']; //'Here is the subject';



    /**

     * @var Body

     * body of the email

     * send if html or plain text

     */

    if($content['html']) {

        echo "content is html <br>";

        $mail->Body    = $content['body'];

    } else {

        echo "content is text<br>";

        $mail->AltBody =  $content['body'];

        $mail->Body    =  $content['body'];

    }



    /**

     * Message response

     */

    if(!$mail->Send()){

        echo 'Message could not be sent.';

        echo 'Mailer Error: ' . $mail->ErrorInfo;

        error_log( date("F j, Y, g:i a") . $mail->ErrorInfo . ' page: '. $content['page'] . " \n ", 3, "email-log.log");

        return false;

    }else{


        echo 'Message has been sent';

        error_log( date("F j, Y, g:i a") . ' Message: Message has been sent.  Page: '. $content['page'] . " \n ", 3, "email-log.log");


        return true;

    }

}



/*

 * Calling function sample

 *

send(

    array(

        'body' => '<table class="mceItemTable" style="width: 100%;" data-mce-style="width: 100%;" bgcolor="FFFFFF"><tbody><tr><td style="text-align: center; vertical-align: middle; border: solid thin black;" colspan="2" data-mce-style="text-align: center; vertical-align: middle; border: solid thin black;" bgcolor="FFFFFF" valign="top" width="50%"><img src="https://www.businessetouchcrm.com/file.php?u=358&amp;f=p19ck34pbj1rig1fqtbvk11rt1eal5.jpg&amp;o=photo.jpg&amp;t=image" alt="" data-mce-src="https://www.businessetouchcrm.com/file.php?u=358&amp;f=p19ck34pbj1rig1fqtbvk11rt1eal5.jpg&amp;o=photo.jpg&amp;t=image"><br></td><td style="text-align: center; vertical-align: middle; border: solid thin black;" colspan="2" data-mce-style="text-align: center; vertical-align: middle; border: solid thin black;" bgcolor="FFFFFF" valign="top" width="50%"><span style="font-size: 28px;" data-mce-style="font-size: 28px;">January Nesletter</span></td></tr></tbody></table>',

        'subject'=>'Here is the subject',

        'fromAddr'=>'marc@businessetouchcrm.com',

        'fromName'=>'Marc',

        'to'=>

            array(

                array('email'=>'mrjesuserwinsuarez@gmail.com', 'name'=>'Jesus Erwin Suarez'),

                array('email'=>'fashionsponge78@gmail.com', 'name'=>'Suarez'),

                array('email'=>'businessetouchdev@gmail.com', 'name'=>'BET'),

                array('email'=>'fashionsponge78@gmail.com', 'name'=>'Suarez'),

                array('email'=>'actor143@gmail.com', 'name'=>'Francis'),

                array('email'=>'suarezantiamir@gmail.com', 'name'=>'Antiamer'),

            ),

        'toBCC'=>

            array(

                    array('email'=>'mrjesuserwinsuarez@gmail.com', 'name'=>'Jesus'),

                    array('email'=>'fashionsponge78@gmail.com', 'name'=>'Suarez'),

                    array('email'=>'businessetouchdev@gmail.com', 'name'=>'BET'),

            ),

        'toCC'=>

            array(

                    array('email'=>'mrjesuserwinsuarez@gmail.com', 'name'=>'Jesus'),

                    array('email'=>'fashionsponge78@gmail.com', 'name'=>'Suarez'),

                    array('email'=>'businessetouchdev@gmail.com', 'name'=>'BET'),

            ),

        'attachments'=>

            array(

                    array('fileLink'=>'link1', 'fileName'=>'name1'),

                    array('fileLink'=>'link2', 'fileName'=>'name2'),

                    array('fileLink'=>'link3', 'fileName'=>'name3')

            ),

        'html'=>true

    )

);

*/