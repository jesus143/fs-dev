<?php namespace App;

class Email {

    private $mno = 0;
    private $db  = '';

    /**
     * @param $mno
     * @param $db
     */
    function __construct($mno, $db)
    {
        $this->mno = $mno;
        $this->db  = $db;
    }

    /**
     * @param $email
     * @return bool
     */
    public function sendConfirmationEmail($email, $mno)
    {
        $from = 'BrainOfFashion@gmail.com';
        $to   = $email;
        $subject = 'Fashion Sponge Email Confirmation';

        $link = "$mno"."a".rand(10000,10000000)."v".rand(10000,10000000)."bc".rand(10000,10000000)."a".rand(10000,10000000)."v".rand(10000,10000000);
        $body = "click here to confirm  <a target='_blank' href='http://dev.fashionsponge.com/email-confirm?cid=$link'>  $link </a> ";

        return  $this->sendEmail($from, $to, $subject, $body);
    }

    private function sendEmail($from, $to, $subject, $body) {
        $headers = '';
        $headers  .= "Content-type: text/html\r\n";
        $headers  .= "From: $from\r\n";
        $headers  .= "Disposition-Notification-To: $from\n";
        $headers  .= "X-Confirm-Reading-To: $from\n";

        if (mail($to, $subject, $body, $headers)) {
            // echo " $type <span style='color:green'>successfully </span> sent to $invited_email from  $from <br> ";
            return TRUE;
        }
        else{
            // echo " $type <span style='color:red'> successfully </span> sent to $invited_email from  $from <br> ";
            return FALSE;
        }
    }

}
?>