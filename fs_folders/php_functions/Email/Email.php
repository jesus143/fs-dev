<?php
/**
* Jan 15, 2015
*/
class Email
{


    private $mno = 0;
    private $db  = '';
	private static $url = '';

	function __construct($mno, $db)
	{
        $this->mno = $mno;
        $this->db  = $db;
	}
	public static function setLink($action, $email, $defaultLink, $qid)
	{
        //http://fashionsponge.com/email-redirect.php?email=mrjesuserwinsuarez@gmail.com&action=signup&qid=7&redirect=TRUE
		if ($action == 'private-beta')
		{ 
			self::$url = 'http://www.businessdictionary.com/definition/beta-test.html'; 
		}
		elseif($action == 'Signup')
		{
			self::$url = 'http://fashionsponge.com/signup?email=' . $email . '&qId=' . $qid;
		}
		elseif($action == 'Remove')
		{
			self::$url = 'http://fashionsponge.com/email?email=' . $email . '&qId=' . $qid;
		} 
		else
		{
			self::$url = $defaultLink;
		} 
		return self::$url;
	}
	public static function getLink()
	{   

		return self::$url;
	}
	public static function sendToEmail($to, $subject, $body, $from, $title)  
	{ 
		$headers = '';  
		$from      = "$title <$from>"; 
		$headers  .= "From: $from\r\n";   
		$headers  .= "Disposition-Notification-To: $from"; 
 		$headers  .= "Content-type: text/html\r\n";    

		if (mail($to, $subject, $body, $headers)) 
		{   
			return TRUE;
		}  
		else
		{ 
			return FALSE;
		}
	} 
	public function loadToSendNotificationToAdmin($embedImage)
	{
		echo "$embedImage";
	}
    public static function sendInviteEmail($from, $to, $subject, $qid, $invited_fn) {
        $from = "Fashion Sponge <$from>";  
        echo "sendInviteEmail($from, $to, $subject, $qid, $invited_fn)";
        $link_private_beta      = "http://fashionsponge.com/email-redirect.php?email=$to&action=private-beta&qid=$qid&redirect=TRUE";
        $link_signup            = "http://fashionsponge.com/email-redirect.php?email=$to&action=signup&qid=$qid&redirect=TRUE";
        $link_remove            = "http://fashionsponge.com/email-redirect.php?email=$to&action=remove&qid=$qid&redirect=TRUE";
        $content['openTracker'] = "<img style='height:0xp; width:0px;' alt='.' src='http://fashionsponge.com/email-redirect.php?email=$to&action=open&qid=$qid&redirect=TRUE';   />";

        //http://fashionsponge.com/email-redirect.php?email=mrjesuserwinsuarez@gmail.com&action=open&qid=4
        $content['invitation'] = "  ". $content['openTracker'] ."
            <p class='text-3'>Hi $invited_fn,   </p>
            <p>
                My name is <b> Mauricio</b>, I'm the Founder & Creative Director at Fashion Sponge. My reason for emailing
                you is really very straight forward. I been a fan of your work and in my opinion your blog is amongst
                the best blogs on the web.
            </p>
            <p>
                <b style='color:#c51d20' >Quick Question:</b> Are you finding it harder to get more page views,
                likes or followers? If so, I aim to help you with your dilemma.

            </p>
            <p>
                Being someone who loves fashion and lifestyle blogs I noticed a major issue... It's too many bloggers,
                it's too many online communities and too many apps out there. It's becoming harder for myself and the masses
                to see content by great bloggers like yourself. That's why I decided to create Fashion Sponge. Unlike most
                communities Fashion Sponge is invite only. By limiting memberships to bloggers who create inspirational,
                informative and entertaining content, Fashion Sponge will become a premiere destination for the best bloggers,
                articles and inspiration.
            </p>
            <p>
                Now that we are days from launching the
                <a style='color:#696969;text-decoration: underline;' href='$link_private_beta' target='_blank'>private beta</a>,
                I knew I wanted to personally invite you to check out what
                we been working on. It's no secret that everyone here at Fashion Sponge is proud of what we built, but we would
                also be grateful for feedback to make this a community everyone will enjoy.
            </p>
        ";

        $body =  "
            <html xmlns='http://www.w3.org/1999/xhtml'>
            <head>
            <!-- If you delete this tag, the sky will fall on your head -->
            <meta name='viewport' content='width=device-width, initial scale=1.0'>
            <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
            </head>

            <body bgcolor='#FFFFFF'>

            <!-- HEADER -->
            <!-- /HEADER -->

            <style type='text/css'>
                    /* -------------------------------------
                            GLOBAL
                    ------------------------------------- */
                    * {
                        margin:0;
                        padding:0;
                    }
                    * { font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; }

                    img {
                        max-width: 100%;
                    }
                    .collapse {
                        margin:0;
                        padding:0;
                    }
                    body {
                        -webkit-font-smoothing:antialiased;
                        -webkit-text-size-adjust:none;
                        width: 100%!important;
                        height: 100%;
                    }


                    /* -------------------------------------
                            ELEMENTS
                    ------------------------------------- */
                    a { color: #2BA6CB;}

                    .btn {
                        text-decoration:none;
                        color: #FFF;
                        background-color: #666;
                        padding:10px 16px;
                        font-weight:bold;
                        margin-right:10px;
                        text-align:center;
                        cursor:pointer;
                        display: inline-block;
                    }

                    p.callout {
                        padding:15px;
                        background-color:#ECF8FF;
                        margin-bottom: 15px;
                    }
                    .callout a {
                        font-weight:bold;
                        color: #2BA6CB;
                    }

                    table.social {
                    /* 	padding:15px; */
                        background-color: #ebebeb;

                    }
                    .social .soc-btn {
                        padding: 3px 7px;
                        font-size:12px;
                        margin-bottom:10px;
                        text-decoration:none;
                        color: #FFF;font-weight:bold;
                        display:block;
                        text-align:center;
                    }
                    a.fb { background-color: #3B5998!important; }
                    a.tw { background-color: #1daced!important; }
                    a.gp { background-color: #DB4A39!important; }
                    a.ms { background-color: #000!important; }

                    .sidebar .soc-btn {
                        display:block;
                        width:100%;
                    }

                    /* -------------------------------------
                            HEADER
                    ------------------------------------- */
                    table.head-wrap { width: 100%;}

                    .header.container table td.logo { padding: 15px; }
                    .header.container table td.label { padding: 15px; padding-left:0px;}


                    /* -------------------------------------
                            BODY
                    ------------------------------------- */
                    table.body-wrap { width: 100%;}


                    /* -------------------------------------
                            FOOTER
                    ------------------------------------- */
                    table.footer-wrap { width: 100%;	clear:both!important;
                    }
                    .footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
                    .footer-wrap .container td.content p {
                        font-size:10px;
                        font-weight: bold;

                    }


                    /* -------------------------------------
                            TYPOGRAPHY
                    ------------------------------------- */
                    h1,h2,h3,h4,h5,h6 {
                    font-family: 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
                    }
                    h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }

                    h1 { font-weight:200; font-size: 44px;}
                    h2 { font-weight:200; font-size: 37px;}
                    h3 { font-weight:500; font-size: 27px;}
                    h4 { font-weight:500; font-size: 23px;}
                    h5 { font-weight:900; font-size: 17px;}
                    h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#444;}

                    .collapse { margin:0!important;}

                    p, ul {
                        margin-bottom: 10px;
                        font-weight: normal;
                        font-size:14px;
                        line-height:1.6;
                    }
                    p.lead { font-size:17px; padding-top: 15px;text-align: left;color: #000000;}
                    p.last { margin-bottom:0px;}

                    ul li {
                        margin-left:5px;
                        list-style-position: inside;
                    }

                    /* -------------------------------------
                            SIDEBAR
                    ------------------------------------- */
                    ul.sidebar {
                        background:#ebebeb;
                        display:block;
                        list-style-type: none;
                    }
                    ul.sidebar li { display: block; margin:0;}
                    ul.sidebar li a {
                        text-decoration:none;
                        color: #666;
                        padding:10px 16px;
                    /* 	font-weight:bold; */
                        margin-right:10px;
                    /* 	text-align:center; */
                        cursor:pointer;
                        border-bottom: 1px solid #777777;
                        border-top: 1px solid #FFFFFF;
                        display:block;
                        margin:0;
                    }
                    ul.sidebar li a.last { border-bottom-width:0px;}
                    ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}



                    /* ---------------------------------------------------
                            RESPONSIVENESS
                            Nuke it from orbit. It's the only way to be sure.
                    ------------------------------------------------------ */

                    /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
                    .container {
                        display:block!important;
                        max-width:600px!important;
                        margin:0 auto!important; /* makes it centered */
                        clear:both!important;
                    }

                    /* This should also be a block element, so that it will fill 100% of the .container */
                    .content {
                        padding:15px;
                        max-width:600px;
                        margin:0 auto;
                        display:block;
                    }

                    /* Let's make sure tables in the content area are 100% wide */
                    .content table { width: 100%; }


                    /* Odds and ends */
                    .column {
                        width: 300px;
                        float:left;
                    }
                    .column tr td { padding: 15px; }
                    .column-wrap {
                        padding:0!important;
                        margin:0 auto;
                        max-width:600px!important;
                    }
                    .column table { width:100%;}
                    .social .column {
                        width: 280px;
                        min-width: 279px;
                        float:left;
                    }

                    /* Be sure to place a .clear element after each set of columns, just to be safe */
                    .clear { display: block; clear: both; }


                    /* -------------------------------------------
                            PHONE
                            For clients that support media queries.
                            Nothing fancy.
                    -------------------------------------------- */
                    @media only screen and (max-width: 600px) {

                        a[class='btn'] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}

                        div[class='column'] { width: auto!important; float:none!important;}

                        table.social div[class='column'] {
                            width:auto!important;
                        }
                    }

                    .header-1 {
                    /* border:1px solid red; */
                        text-align:center;
                    }
                    .header-1 div  {
                        margin:auto;
                    }
                    .text-1 {
                        color: 1a386a;
                        font-size: 23px;
                        font-family:arial;
                        color:#c51d20;
                        border-top:1px solid #ccc;
                        border-bottom:1px solid #ccc;
                        padding: 15px 0px 15px 0px;
                        line-height: 1;
                        font-weight:bold;
                    }
                    .text-2{
                        font-weight:bold;
                    }
                    .image{
                        padding-bottom:20px;
                        padding-top:20px;
                    }
                    .container-1{
                        border: 1px solid #f4f3f2;
                        padding: 10px;
                    }
                    table.table-1 {
                        width: 100%;
                        padding-bottom: 10px;
                    }


                    td.logo {
                        width: 50%;
                    }

                    td.logo img {
                        float: right;
                    }

                </style>
            <!-- BODY -->
            <table class='body-wrap'>
                <tbody><tr>
                    <td> </td>
                    <td class='container' bgcolor='#FFFFFF'>
                        <div class='content'>
                        <table>
                            <tbody><tr>
                                <td class='container-1' style='border:1px solid #f4f3f2;padding:10px;color:#1a386a;font-size: 13px;' >
                                          <div class='header-1'>
                                          <center>




                                               <table style='width: 100%;'  border='0' cellspacing='0' cellpadding='0' class='table-1' >
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <div>
                                                                <img style='cursor:pointer; width:100%; ' src='http://fashionsponge.com/fs_folders/images/email/Header-image.png'>
                                                            </div>
                                                        </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                        </center></div>

                            <center>
                                <h3 class='text-1' style='color:#1a386a;font-size:23px; border-bottom: 1px solid #f4f3f2;border-top: 1px solid #f4f3f2;padding: 15px 0px 15px 0px;line-height: 1;font-weight: bold;'> FINALLY, SOMETHING COOL FOR BLOGGERS. </h3>
                            </center>
                            <div class='lead'>
                                " . $content['invitation'] . "
                            </div>
                            <div class='lead'>
                                <p class='text-2'><b>WHAT IS FASHION SPONGE?</b></p>
                                <p>
                                    Fashion Sponge is where fashion and lifestyle bloggers can grow their audience and readers can
                                    discover the latest in Fashion, Beauty and Lifestyle.
                                </p>
                            </div>
                            <div class='lead'>
                                <p>
                                     <span style='color:#1a386a;'>
                                        Mauricio | Founder &amp; Creative Director  <br>
                                        <a style='color:#696969;'>Mauricio@fashionsponge.com</a>
                                    </span>
                                 </p>
                            </div>
                            <div style='border-top:1px solid #f4f3f2;border-bottom:1px solid #f4f3f2; padding-top: 15px; padding-bottom: 15px;font-size: 23px;font-family:arial; color:#1a386a;text-align: center;line-height: 1;'>
                                <b>  \"This is not a site. It's a discovery engine.  Discover and get discovered.\"</b>
                            </div>

                            <!-- A Real Hero (and a real human being) -->
                            <p class='image'>
                                <a href='fashionsponge.com' target='_blank'>

                                    <table border='0' cellpadding='0' cellspacing='0' style='padding:  10px 0px 10px 0px;' >
                                            <tr>
                                                <td>
                                                    <img style='width:100%; height:auto;cursor: pointer;' src='http://fashionsponge.com/fs_folders/genImg/email-discover.png'>
                                                </td>
                                                <td>
                                                    <img style='width:100%; height:auto;cursor: pointer;' src='http://fashionsponge.com/fs_folders/genImg/email-exposure.png'>
                                                </td>
                                            <tr>
                                                <td>
                                                    <img style='width:100%; height:auto;cursor: pointer;' src='http://fashionsponge.com/fs_folders/genImg/email-inspiration.png'>
                                                </td>
                                                <td>
                                                    <img style='width:100%; height:auto;cursor: pointer;' src='http://fashionsponge.com/fs_folders/genImg/email-feedback.png'>
                                                </td>
                                            <tr>
                                        </table>
                                </a>
                            <!-- footer  !-->
                                <div style='border-top:1px solid #f4f3f2;border-bottom:1px solid #f4f3f2; padding-top: 15px; padding-bottom:10px;font-size: 23px; &nbsp;'>
                                    <center>
                                    <span style='font-family:arial; color:#c51d20;'>
                                        <b style='font-size: 23px;'>SIGN UP NOW. SPACE IS LIMITED.<br></b>
                                      <b style='font-size:12px;color:#1a386a;font-family: arial;'>
                                      SIGNING UP TAKES ONLY TWO SECONDS.
                                    </b>
                                    </span><br>
                                    <a href='$link_signup' target='_blank'>
                                        <img style='width:auto;margin-top: 10px;cursor: pointer;height: 30px;' src='http://fashionsponge.com/fs_folders/images/genImg/sign-up.png'>
                                    </a>
                                    </center>
                                </div>
                                    <div style='padding-top: 10px; text-decoration:none; text-align: center;'>

                                  <p>
                                        This invitation was sent to <a style='color:#696969;'>$to</a>  If you don't want to receive emails from Fashion Sponge in the future, click <a style='color:#696969;text-decoration: underline;' href='$link_remove' target='_blank'> here </a>  to remove your email.
                                  </p>

                                </div>
                            <!-- Callout Panel -->
                            <!-- /Callout Panel -->
                            <!-- social & contact -->
                            <!-- /social & contact -->
                        </td>
                    </tr>
                </tbody></table>
                </div>
            </td>
            <td></td>
            </tr>
            </tbody></table><!-- /BODY -->
            </body>
         </html>
        ";

        return self::sendEmail($from, $to, $subject, $body);
    }
    public static function sendInviteEmail1($from, $to, $subject, $qid, $invited_fn=null) {

        $link_signup            = "http://fashionsponge.com/email-redirect.php?email=$to&action=Signup&qid=$qid&redirect=TRUE";
        $link_remove            = "http://fashionsponge.com/email-redirect.php?email=$to&action=Remove&qid=$qid&redirect=TRUE";
        $openTracker            = "<img style='height:0xp; width:0px;' alt='.' src='http://fashionsponge.com/email-redirect.php?email=$to&action=Open&qid=$qid&redirect=TRUE';   />";
        $from = "Fashion Sponge <$from>";


        $body =  "
        <html xmlns='http://www.w3.org/1999/xhtml'>
        <head>
            <!-- If you delete this tag, the sky will fall on your head -->
            <meta name='viewport' content='width=device-width, initial scale=1.0'>
            <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
            $openTracker
        </head>

        <body bgcolor='#FFFFFF'>

        <!-- HEADER -->
        <!-- /HEADER -->

        <style type='text/css'>
            /* -------------------------------------
                    GLOBAL
            ------------------------------------- */
            * {
                        margin:0;
                        padding:0;
                    }
            * { font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; }

            img {
                        max-width: 100%;
            }
            .collapse {
                        margin:0;
                        padding:0;
                    }
            body {
                        -webkit-font-smoothing:antialiased;
                -webkit-text-size-adjust:none;
                width: 100%!important;
                height: 100%;
            }


            /* -------------------------------------
                    ELEMENTS
            ------------------------------------- */
            a { color: #2BA6CB;}

                        .btn {
                            text-decoration:none;
                color: #FFF;
                background-color: #666;
                padding:10px 16px;
                font-weight:bold;
                margin-right:10px;
                text-align:center;
                cursor:pointer;
                display: inline-block;
            }

            p.callout {
                            padding:15px;
                background-color:#ECF8FF;
                margin-bottom: 15px;
            }
            .callout a {
                            font-weight:bold;
                color: #2BA6CB;
            }

            table.social {
                            /* 	padding:15px; */
                            background-color: #ebebeb;

            }
            .social .soc-btn {
                            padding: 3px 7px;
                font-size:12px;
                margin-bottom:10px;
                text-decoration:none;
                color: #FFF;font-weight:bold;
                display:block;
                text-align:center;
            }
            a.fb { background-color: #3B5998!important; }
            a.tw { background-color: #1daced!important; }
            a.gp { background-color: #DB4A39!important; }
            a.ms { background-color: #000!important; }

            .sidebar .soc-btn {
                                            display:block;
                                            width:100%;
                                        }

            /* -------------------------------------
                    HEADER
            ------------------------------------- */
            table.head-wrap { width: 100%;}

            .header.container table td.logo { padding: 15px; }
            .header.container table td.label { padding: 15px; padding-left:0px;}


            /* -------------------------------------
                    BODY
            ------------------------------------- */
            table.body-wrap { width: 100%;}


            /* -------------------------------------
                    FOOTER
            ------------------------------------- */
            table.footer-wrap { width: 100%;	clear:both!important;
            }
            .footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
            .footer-wrap .container td.content p {
                                            font-size:10px;
                font-weight: bold;

            }


            /* -------------------------------------
                    TYPOGRAPHY
            ------------------------------------- */
            h1,h2,h3,h4,h5,h6 {
                                            font-family: 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
            }
            h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }

            h1 { font-weight:200; font-size: 44px;}
            h2 { font-weight:200; font-size: 37px;}
            h3 { font-weight:500; font-size: 27px;}
            h4 { font-weight:500; font-size: 23px;}
            h5 { font-weight:900; font-size: 17px;}
            h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#444;}

            .collapse { margin:0!important;}

            p, ul {
                                                    margin-bottom: 10px;
                font-weight: normal;
                font-size:14px;
                line-height:1.6;
            }
            p.lead { font-size:17px; padding-top: 15px;text-align: left;color: #000000;}
            p.last { margin-bottom:0px;}

            ul li {
                                                        margin-left:5px;
                list-style-position: inside;
            }

            /* -------------------------------------
                    SIDEBAR
            ------------------------------------- */
            ul.sidebar {
                                                        background:#ebebeb;
                                                        display:block;
                                                        list-style-type: none;
            }
            ul.sidebar li { display: block; margin:0;}
            ul.sidebar li a {
                                                        text-decoration:none;
                color: #666;
                padding:10px 16px;
                /* 	font-weight:bold; */
                margin-right:10px;
                /* 	text-align:center; */
                cursor:pointer;
                border-bottom: 1px solid #777777;
                border-top: 1px solid #FFFFFF;
                display:block;
                margin:0;
            }
            ul.sidebar li a.last { border-bottom-width:0px;}
            ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}



            /* ---------------------------------------------------
                    RESPONSIVENESS
                    Nuke it from orbit. It's the only way to be sure.
            ------------------------------------------------------ */

            /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
            .container {
                                                        display:block!important;
                max-width:600px!important;
                margin:0 auto!important; /* makes it centered */
                clear:both!important;
            }

            /* This should also be a block element, so that it will fill 100% of the .container */
            .content {
                                                        padding:15px;
                max-width:600px;
                margin:0 auto;
                display:block;
            }

            /* Let's make sure tables in the content area are 100% wide */
            .content table { width: 100%; }


            /* Odds and ends */
            .column {
                                                        width: 300px;
                float:left;
            }
            .column tr td { padding: 15px; }
            .column-wrap {
                                                        padding:0!important;
                margin:0 auto;
                max-width:600px!important;
            }
            .column table { width:100%;}
            .social .column {
                                                        width: 280px;
                min-width: 279px;
                float:left;
            }

            /* Be sure to place a .clear element after each set of columns, just to be safe */
            .clear { display: block; clear: both; }


            /* -------------------------------------------
                    PHONE
                    For clients that support media queries.
                    Nothing fancy.
            -------------------------------------------- */
            @media only screen and (max-width: 600px) {

                a[class='btn'] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}

                div[class='column'] { width: auto!important; float:none!important;}

                table.social div[class='column'] {
                    width:auto!important;
                }
            }

            .header-1 {
                /* border:1px solid red; */
                text-align:center;
            }
            .header-1 div  {
                margin:auto;
            }
            .text-1 {
                color: 1a386a;
                font-size: 23px;
                font-family:arial;
                color:#c51d20;
                border-top:1px solid #ccc;
                border-bottom:1px solid #ccc;
                padding: 15px 0px 15px 0px;
                line-height: 1;
                font-weight:bold;
            }
            .text-2{
                font-weight:bold;
            }
            .image{
                padding-bottom:20px;
                padding-top:20px;
            }
            .container-1{
                border: 1px solid #f4f3f2;
                padding: 10px;
            }
            table.table-1 {
                width: 100%;
                padding-bottom: 10px;
            }


            td.logo {
                width: 50%;
            }

            td.logo img {
                float: right;
            }

        </style>
        <!-- BODY -->
            <table class='body-wrap'>
                <tbody><tr>
                    <td> </td>
                    <td class='container' bgcolor='#FFFFFF'>
                        <div class='content'>
                            <table>
                                <tbody><tr>
                                    <td class='container-1' style='border:1px solid #f4f3f2;padding:10px;color:#1a386a;font-size: 13px;' >
                                        <div class='header-1'>
                                            <center>
                                                <table style='width: 100%;'  border='0' cellspacing='0' cellpadding='0' class='table-1' >
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <div>
                                                                <img style='cursor:pointer; width:100%;'  src='http://fashionsponge.com/fs_folders/images/email/header-logo-1.jpg' >
                                                            </div>
                                                        </td>
                                                        <tr>
                                                        <td>
                                                            <div>
                                                                <a href='$link_signup' >
                                                                     <img style='cursor:pointer; width:100%; ' src='http://www.fashionsponge.com/fs_folders/images/email/header-slides.gif'>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </center>
                                            </div>

                                         <div class='lead' style='padding-top:10px;' >
                                         </div>

                                        <div class='lead'>

                                            <p style='font-size: 1px; color:white;position:absolute;' >
                                                FINALLY, SOMETHING COOL FOR BLOGGERS.
                                            </p>

                                            <p>
                                                My name is <b>Mauricio</b>, I'm the Founder & Creative Director at Fashion Sponge. My reason, for emailing you is really very straight forward. You were referred by another blogger so wanted to personally let you know about my invite only community.
                                            </p>
                                            <p>
                                                Fashion Sponge is a community where the best fashion and lifestyle bloggers can grow their audience and people can discover the latest in Fashion, Beauty, Lifestyle and Entertainment.
                                            </p>
                                            <p>
                                                I decided to create Fashion Sponge after noticing a major issue... It's becoming harder for myself and the masses to discover great content. The problem is its too many bloggers, it's too much content being published daily and it's too many online fashion and lifestyle communities that allow anyone to publish anything. By limiting memberships to bloggers who create content that's high quality, compelling, inspirational, informative and entertaining, Fashion Sponge will become a go-to destination for seeing the best bloggers, articles, and inspiration.
                                            </p>

                                            <p style='color:#ad2219;font-weight: bold' >
                                                Quick Question:
                                            </p>
                                            <p>
                                                Are you creating high quality content that's either compelling, inspirational, informative or entertaining, that's not getting a lot of views, likes or shares?
                                            </p>
                                            <p>
                                                If so, Fashion Sponge just maybe the answer to your dilemma. <br> <a href='$link_signup' style='color:#ad2219;' > Sign up now. Space is limited.</a>
                                            </p>
                                            <p>
                                                 <span style='color:#1a386a;'>
                                                    <b>Mauricio | Founder &amp; Creative Director</b> <br>
                                                    <a href='#' style='color: #2BA6CB;'>Mauricio@fashionsponge.com</a>
                                                </span>
                                            </p>
                                        </div>

                                        <div class='lead' style='padding-top:5px;' >
                                        </div>

                                        <div>
                                            <a href='fashionsponge.com' target='_blank'>

                                                <table border='0' cellpadding='0' cellspacing='0' style='padding:  10px 0px 10px 0px;' >
                                                    <tr>
                                                        <td>
                                                            <img style='width:100%; height:auto;cursor: pointer;' src='http://fashionsponge.com/fs_folders/genImg/email-discover.png'>
                                                        </td>
                                                        <td>
                                                            <img style='width:100%; height:auto;cursor: pointer;' src='http://fashionsponge.com/fs_folders/genImg/email-exposure.png'>
                                                        </td>
                                                    <tr>
                                                        <td>
                                                            <img style='width:100%; height:auto;cursor: pointer;' src='http://fashionsponge.com/fs_folders/genImg/email-inspiration.png'>
                                                        </td>
                                                        <td>
                                                            <img style='width:100%; height:auto;cursor: pointer;' src='http://fashionsponge.com/fs_folders/genImg/email-feedback.png'>
                                                        </td>
                                                    <tr>
                                                </table>
                                            </a>
                                        </div>

                                        <!--footer image-->
                                         <div class='lead' style='padding-top:10px;' >
                                        </div>

                                        <div>
                                            <a href='$link_signup' >
                                                <img style='cursor:pointer; width:100%; ' src='http://www.fashionsponge.com/fs_folders/images/email/footer.png' >
                                            </a>
                                        </div>

                                        <div class='lead' style='padding-top:15px;' >
                                        </div>

                                        <div>
                                            <p>
                                                        This invitation was sent to <a style='color:#696969;'>$to</a>  If you don't want to receive emails from Fashion Sponge in the future, click <a style='color:#696969;text-decoration: underline;' href='$link_remove' target='_blank'> here </a>  to remove your email.
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                                </tbody></table>
                        </div>
                    </td>
                </tr>
                </tbody></table>
            </body>
        </html>
        ";
        echo $body;
        return self::sendEmail($from, $to, $subject, $body);
    }
    public static function sendInviteEmail2($from, $to, $subject, $qid, $invited_fn=null)
    {

        $link_signup            = "http://fashionsponge.com/email-redirect.php?email=$to&action=Signup&qid=$qid&redirect=TRUE";
        $link_remove            = "http://fashionsponge.com/email-redirect.php?email=$to&action=Remove&qid=$qid&redirect=TRUE";
        $openTracker            = "<img style='height:0xp; width:0px;' alt='.' src='http://fashionsponge.com/email-redirect.php?email=$to&action=Open&qid=$qid&redirect=TRUE';   />";
        $from = "Fashion Sponge <$from>";


        $body =  "
        <html xmlns='http://www.w3.org/1999/xhtml'>
        <head>
            <!-- If you delete this tag, the sky will fall on your head -->
            <meta name='viewport' content='width=device-width, initial scale=1.0'>
            <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
            $openTracker
        </head>

        <body bgcolor='#FFFFFF'>

        <!-- HEADER -->
        <!-- /HEADER -->

        <style type='text/css'>
            /* -------------------------------------
                    GLOBAL
            ------------------------------------- */
            * {
                        margin:0;
                        padding:0;
                    }
            * { font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; }

            img {
                        max-width: 100%;
            }
            .collapse {
                        margin:0;
                        padding:0;
                    }
            body {
                        -webkit-font-smoothing:antialiased;
                -webkit-text-size-adjust:none;
                width: 100%!important;
                height: 100%;
            }


            /* -------------------------------------
                    ELEMENTS
            ------------------------------------- */
            a { color: #2BA6CB;}

                        .btn {
                            text-decoration:none;
                color: #FFF;
                background-color: #666;
                padding:10px 16px;
                font-weight:bold;
                margin-right:10px;
                text-align:center;
                cursor:pointer;
                display: inline-block;
            }

            p.callout {
                            padding:15px;
                background-color:#ECF8FF;
                margin-bottom: 15px;
            }
            .callout a {
                            font-weight:bold;
                color: #2BA6CB;
            }

            table.social {
                            /* 	padding:15px; */
                            background-color: #ebebeb;

            }
            .social .soc-btn {
                            padding: 3px 7px;
                font-size:12px;
                margin-bottom:10px;
                text-decoration:none;
                color: #FFF;font-weight:bold;
                display:block;
                text-align:center;
            }
            a.fb { background-color: #3B5998!important; }
            a.tw { background-color: #1daced!important; }
            a.gp { background-color: #DB4A39!important; }
            a.ms { background-color: #000!important; }

            .sidebar .soc-btn {
                                            display:block;
                                            width:100%;
                                        }

            /* -------------------------------------
                    HEADER
            ------------------------------------- */
            table.head-wrap { width: 100%;}

            .header.container table td.logo { padding: 15px; }
            .header.container table td.label { padding: 15px; padding-left:0px;}


            /* -------------------------------------
                    BODY
            ------------------------------------- */
            table.body-wrap { width: 100%;}


            /* -------------------------------------
                    FOOTER
            ------------------------------------- */
            table.footer-wrap { width: 100%;	clear:both!important;
            }
            .footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
            .footer-wrap .container td.content p {
                                            font-size:10px;
                font-weight: bold;

            }


            /* -------------------------------------
                    TYPOGRAPHY
            ------------------------------------- */
            h1,h2,h3,h4,h5,h6 {
                                            font-family: 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
            }
            h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }

            h1 { font-weight:200; font-size: 44px;}
            h2 { font-weight:200; font-size: 37px;}
            h3 { font-weight:500; font-size: 27px;}
            h4 { font-weight:500; font-size: 23px;}
            h5 { font-weight:900; font-size: 17px;}
            h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#444;}

            .collapse { margin:0!important;}

            p, ul {
                                                    margin-bottom: 10px;
                font-weight: normal;
                font-size:14px;
                line-height:1.6;
            }
            p.lead { font-size:17px; padding-top: 15px;text-align: left;color: #000000;}
            p.last { margin-bottom:0px;}

            ul li {
                                                        margin-left:5px;
                list-style-position: inside;
            }

            /* -------------------------------------
                    SIDEBAR
            ------------------------------------- */
            ul.sidebar {
                                                        background:#ebebeb;
                                                        display:block;
                                                        list-style-type: none;
            }
            ul.sidebar li { display: block; margin:0;}
            ul.sidebar li a {
                                                        text-decoration:none;
                color: #666;
                padding:10px 16px;
                /* 	font-weight:bold; */
                margin-right:10px;
                /* 	text-align:center; */
                cursor:pointer;
                border-bottom: 1px solid #777777;
                border-top: 1px solid #FFFFFF;
                display:block;
                margin:0;
            }
            ul.sidebar li a.last { border-bottom-width:0px;}
            ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}



            /* ---------------------------------------------------
                    RESPONSIVENESS
                    Nuke it from orbit. It's the only way to be sure.
            ------------------------------------------------------ */

            /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
            .container {
                                                        display:block!important;
                max-width:600px!important;
                margin:0 auto!important; /* makes it centered */
                clear:both!important;
            }

            /* This should also be a block element, so that it will fill 100% of the .container */
            .content {
                                                        padding:15px;
                max-width:600px;
                margin:0 auto;
                display:block;
            }

            /* Let's make sure tables in the content area are 100% wide */
            .content table { width: 100%; }


            /* Odds and ends */
            .column {
                                                        width: 300px;
                float:left;
            }
            .column tr td { padding: 15px; }
            .column-wrap {
                                                        padding:0!important;
                margin:0 auto;
                max-width:600px!important;
            }
            .column table { width:100%;}
            .social .column {
                                                        width: 280px;
                min-width: 279px;
                float:left;
            }

            /* Be sure to place a .clear element after each set of columns, just to be safe */
            .clear { display: block; clear: both; }


            /* -------------------------------------------
                    PHONE
                    For clients that support media queries.
                    Nothing fancy.
            -------------------------------------------- */
            @media only screen and (max-width: 600px) {

                a[class='btn'] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}

                div[class='column'] { width: auto!important; float:none!important;}

                table.social div[class='column'] {
                    width:auto!important;
                }
            }

            .header-1 {
                /* border:1px solid red; */
                text-align:center;
            }
            .header-1 div  {
                margin:auto;
            }
            .text-1 {
                color: 1a386a;
                font-size: 23px;
                font-family:arial;
                color:#c51d20;
                border-top:1px solid #ccc;
                border-bottom:1px solid #ccc;
                padding: 15px 0px 15px 0px;
                line-height: 1;
                font-weight:bold;
            }
            .text-2{
                font-weight:bold;
            }
            .image{
                padding-bottom:20px;
                padding-top:20px;
            }
            .container-1{
                border: 1px solid #f4f3f2;
                padding: 10px;
            }
            table.table-1 {
                width: 100%;
                padding-bottom: 10px;
            }


            td.logo {
                width: 50%;
            }

            td.logo img {
                float: right;
            }

        </style>
        <!-- BODY -->
            <table class='body-wrap'>
                <tbody><tr>
                    <td> </td>
                    <td class='container' bgcolor='#FFFFFF'>
                        <div class='content'>
                            <table>
                                <tbody><tr>
                                    <td class='container-1' style='border:1px solid #f4f3f2;padding:10px;color:#1a386a;font-size: 13px;' >
                                        <div class='header-1'>
                                            <center>
                                                <table style='width: 100%;'  border='0' cellspacing='0' cellpadding='0' class='table-1' >
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <div>
                                                                <img style='cursor:pointer; width:100%;'  src='http://www.fashionsponge.com/fs_folders/images/email/header-logo-1.jpg' >
                                                            </div>
                                                        </td>
                                                        <tr>
                                                        <td>
                                                            <div>
                                                                <img style='cursor:pointer; width:100%;' src='http://www.fashionsponge.com/fs_folders/images/email/header-slides.gif'>
                                                            </div>
                                                        </td>
                                                    <tr>
                                                        <td>
                                                            <div>
                                                                <a href='$link_signup' target='_blank'>
                                                                    <img style='cursor:pointer; width:100%;' src='http://www.fashionsponge.com/fs_folders/images/email/version2/header-6.jpg'>
                                                                 </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </center>
                                        </div>
                                        <div class='lead' style='padding-top:10px;' >
                                        </div>

                                        <div class='lead'>

                                            <p style='font-size: 1px; color:white;position:absolute;'  >
                                                FINALLY, SOMETHING COOL FOR BLOGGERS.
                                            </p>

                                            <p>
                                                My name is <b>Mauricio</b>, I'm the Founder & Creative Director at Fashion Sponge. My reason, for emailing you is really very straight forward. You were referred by another blogger so wanted to personally let you know about my invite only community.
                                            </p>
                                            <p>
                                                Fashion Sponge is a community where the best fashion and lifestyle bloggers can grow their audience and people can discover the latest in <b>Fashion</b>, <b>Beauty</b>, <b>Lifestyle</b> and <b>Entertainment</b>.
                                            </p>
                                            <p>
                                                I decided to create Fashion Sponge after noticing a major issue... It's becoming harder for myself and the masses to discover great content. The problem is its too many bloggers, it's too much content being published daily and it's too many online fashion and lifestyle communities that allow anyone to publish anything. By limiting memberships to bloggers who create content that's high quality, compelling, inspirational, informative and entertaining, Fashion Sponge will become a go-to destination for seeing the best bloggers, articles, and inspiration.
                                            </p>

                                            <p style='color:#ad2219;font-weight: bold' >
                                                Quick Question:
                                            </p>

                                            <p>
                                                <b>Are you creating high quality content that's either compelling, inspirational, informative or entertaining, that's not getting a lot of views, likes or shares?</b>
                                            </p>
                                            <p>
                                                If so, Fashion Sponge just maybe the answer to your dilemma. <br> <a href='#' style='color:#ad2219;' >Don't be fashionably late. Sign up now.</a>
                                            </p>
                                            <p>
                                                 <span style='color:#1a386a;'>
                                                    <b>Mauricio | Founder &amp; Creative Director</b> <br>
                                                    <a href='#' style='color: #2BA6CB;'>Mauricio@fashionsponge.com</a>
                                                </span>
                                            </p>
                                        </div>
                                        <!--content-->
                                        <div class='lead' style='padding-top:5px;' >
                                        </div>
                                        <div>
                                            <a href='$link_signup' target='_blank' >
                                                <img style='cursor:pointer; width:100%;' src='http://www.fashionsponge.com/fs_folders/images/email/version2/content-1-a.jpg'>
                                            </a>
                                        </div>
                                        <!--footer-->
                                        <div>
                                            <p>
                                                This invitation was sent to <a style='color:#696969;'>$to</a>. To ensure you get notice of your invite, you will revieve 2 additional emails from me. If you don't want to receive anymore emails in the future,  <a style='color:#696969;text-decoration: underline;' href='$link_remove' target='_blank'> click here </a> to remove your email.
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                                </tbody></table>
                        </div>
                    </td>
                </tr>
                </tbody></table><!-- /BODY -->
            </body>
        </html>
        ";
        echo $body;
        return self::sendEmail($from, $to, $subject, $body);
    }
    public static function sendInviteEmail3($from, $to, $subject, $qid, $tEmailSent=0, $invited_fn=null)
    {
        $countDown              = 0;
        $link_signup            = "http://fashionsponge.com/email-redirect.php?email=$to&action=Signup&qid=$qid&redirect=TRUE";
        $link_remove            = "http://fashionsponge.com/email-redirect.php?email=$to&action=Remove&qid=$qid&redirect=TRUE";
        $openTracker            = "<img style='height:0xp; width:0px;' alt='.' src='http://fashionsponge.com/email-redirect.php?email=$to&action=Open&qid=$qid&redirect=TRUE'  />";
        $from = "Fashion Sponge <$from>";




        switch ($tEmailSent)
        {
            case 0:
                    $footer_info = "This invitation was sent to <span style='color:#f5d13f'>$to</span>. To ensure you get notice of your invite, you will receive <b>2</b> additional emails. If you don't want to receive anymore emails in the future, <a style='color:#f5d13f; text-decoration: none;' href='$link_remove' target='_blank'> click here </a> to remove your email.";
                break;
            case 1:
                    $footer_info = "This invitation was sent to <span style='color:#f5d13f'>$to</span>. To ensure you get notice of your invite, you will receive <b>1</b> additional emails. If you don't want to receive anymore emails in the future, <a style='color:#f5d13f; text-decoration: none;' href='$link_remove' target='_blank'> click here </a> to remove your email.";
                break;
            default:
                    $footer_info = "This invitation was sent to <span style='color:#f5d13f'>$to</span>. If you don't want to receive anymore emails in the future, <a style='color:#f5d13f; text-decoration: none;' href='$link_remove' target='_blank'> click here </a> to remove your email.";
                break;
        }



        if ($tEmailSent == 0) {
        $countDown = 1;
        }
        elseif ($tEmailSent == 1) {
        $countDown = 2;
        }
        else {
        $countDown = 3;
        }

        $body = "
            <html xmlns='http://www.w3.org/1999/xhtml'>
                <head>
                    <!-- If you delete this tag, the sky will fall on your head -->
                    <meta name='viewport' content='width=device-width, initial scale=1.0'>
                    <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
                </head>

                <body bgcolor='#FFFFFF'>

                    <!-- HEADER -->
                    <!-- /HEADER -->

                    <style type='text/css'>
                        /* -------------------------------------
                                GLOBAL
                        ------------------------------------- */
                        * {
                            margin:0;
                            padding:0;
                        }
                        * { font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; }

                        img {
                            max-width: 100%;
                        }
                        .collapse {
                            margin:0;
                            padding:0;
                        }
                        body {
                            -webkit-font-smoothing:antialiased;
                            -webkit-text-size-adjust:none;
                            width: 100%!important;
                            height: 100%;
                        }


                        /* -------------------------------------
                                ELEMENTS
                        ------------------------------------- */
                        a { color: #2BA6CB;}

                        .btn {
                            text-decoration:none;
                            color: #FFF;
                            background-color: #666;
                            padding:10px 16px;
                            font-weight:bold;
                            margin-right:10px;
                            text-align:center;
                            cursor:pointer;
                            display: inline-block;
                        }

                        p.callout {
                            padding:15px;
                            background-color:#ECF8FF;
                            margin-bottom: 15px;
                        }
                        .callout a {
                            font-weight:bold;
                            color: #2BA6CB;
                        }

                        table.social {
                            /* 	padding:15px; */
                            background-color: #ebebeb;

                        }
                        .social .soc-btn {
                            padding: 3px 7px;
                            font-size:12px;
                            margin-bottom:10px;
                            text-decoration:none;
                            color: #FFF;font-weight:bold;
                            display:block;
                            text-align:center;
                        }
                        a.fb { background-color: #3B5998!important; }
                        a.tw { background-color: #1daced!important; }
                        a.gp { background-color: #DB4A39!important; }
                        a.ms { background-color: #000!important; }

                        .sidebar .soc-btn {
                            display:block;
                            width:100%;
                        }

                        /* -------------------------------------
                                HEADER
                        ------------------------------------- */
                        table.head-wrap { width: 100%;}

                        .header.container table td.logo { padding: 15px; }
                        .header.container table td.label { padding: 15px; padding-left:0px;}


                        /* -------------------------------------
                                BODY
                        ------------------------------------- */
                        table.body-wrap { width: 100%;}


                        /* -------------------------------------
                                FOOTER
                        ------------------------------------- */
                        table.footer-wrap { width: 100%;	clear:both!important;
                        }
                        .footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
                        .footer-wrap .container td.content p {
                            font-size:10px;
                            font-weight: bold;

                        }


                        /* -------------------------------------
                                TYPOGRAPHY
                        ------------------------------------- */
                        h1,h2,h3,h4,h5,h6 {
                            font-family: 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
                        }
                        h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }

                        h1 { font-weight:200; font-size: 44px;}
                        h2 { font-weight:200; font-size: 37px;}
                        h3 { font-weight:500; font-size: 27px;}
                        h4 { font-weight:500; font-size: 23px;}
                        h5 { font-weight:900; font-size: 17px;}
                        h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#444;}

                        .collapse { margin:0!important;}

                        p, ul {
                            margin-bottom: 10px;
                            font-weight: normal;
                            font-size:14px;
                            line-height:1.6;
                        }
                        p.lead { font-size:17px; padding-top: 15px;text-align: left;color: #000000;}
                        p.last { margin-bottom:0px;}

                        ul li {
                            margin-left:5px;
                            list-style-position: inside;
                        }

                        /* -------------------------------------
                                SIDEBAR
                        ------------------------------------- */
                        ul.sidebar {
                            background:#ebebeb;
                            display:block;
                            list-style-type: none;
                        }
                        ul.sidebar li { display: block; margin:0;}
                        ul.sidebar li a {
                            text-decoration:none;
                            color: #666;
                            padding:10px 16px;
                            /* 	font-weight:bold; */
                            margin-right:10px;
                            /* 	text-align:center; */
                            cursor:pointer;
                            border-bottom: 1px solid #777777;
                            border-top: 1px solid #FFFFFF;
                            display:block;
                            margin:0;
                        }
                        ul.sidebar li a.last { border-bottom-width:0px;}
                        ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}



                        /* ---------------------------------------------------
                                RESPONSIVENESS
                                Nuke it from orbit. It's the only way to be sure.
                        ------------------------------------------------------ */

                        /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
                        .container {
                            display:block!important;
                            max-width:600px!important;
                            margin:0 auto!important; /* makes it centered */
                            clear:both!important;
                        }

                        /* This should also be a block element, so that it will fill 100% of the .container */
                        .content {
                            padding:15px;
                            max-width:600px;
                            margin:0 auto;
                            display:block;
                        }

                        /* Let's make sure tables in the content area are 100% wide */
                        .content table { width: 100%; }


                        /* Odds and ends */
                        .column {
                            width: 300px;
                            float:left;
                        }
                        .column tr td { padding: 15px; }
                        .column-wrap {
                            padding:0!important;
                            margin:0 auto;
                            max-width:600px!important;
                        }
                        .column table { width:100%;}
                        .social .column {
                            width: 280px;
                            min-width: 279px;
                            float:left;
                        }

                        /* Be sure to place a .clear element after each set of columns, just to be safe */
                        .clear { display: block; clear: both; }


                        /* -------------------------------------------
                                PHONE
                                For clients that support media queries.
                                Nothing fancy.
                        -------------------------------------------- */
                        @media only screen and (max-width: 600px) {

                            a[class='btn'] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}

                            div[class='column'] { width: auto!important; float:none!important;}

                            table.social div[class='column'] {
                                width:auto!important;
                            }
                        }

                        .header-1 {
                            /* border:1px solid red; */
                            text-align:center;
                        }
                        .header-1 div  {
                            margin:auto;
                        }
                        .text-1 {
                            color: 1a386a;
                            font-size: 23px;
                            font-family:arial;
                            color:#c51d20;
                            border-top:1px solid #ccc;
                            border-bottom:1px solid #ccc;
                            padding: 15px 0px 15px 0px;
                            line-height: 1;
                            font-weight:bold;
                        }
                        .text-2{
                            font-weight:bold;
                        }
                        .image{
                            padding-bottom:20px;
                            padding-top:20px;
                        }
                        .container-1{
                            border: 1px solid #f4f3f2;
                            padding: 10px;
                        }
                        table.table-1 {
                            width: 100%;
                            padding-bottom: 10px;
                        }


                        td.logo {
                            width: 50%;
                        }

                        td.logo img {
                            float: right;
                        }

                    </style>
                    <!-- BODY -->
                    <table class='body-wrap'>
                        <tbody><tr>
                            <td> </td>
                            <td class='container' bgcolor='#FFFFFF'>
                                <div class='content'>
                                    <table>
                                        <tbody><tr>
                                            <td class='container-1' style='border:1px solid #f4f3f2;padding:10px;color:#1a386a;font-size: 13px;' >
                                                <div class='header-1'>
                                                    <center>
                                                        <table style='width: 100%;'  border='0' cellspacing='0' cellpadding='0' class='table-1' >
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div>
                                                                        <img style='cursor:pointer; width:100%; border-bottom: 1px solid #FFFFFF'  src='http://www.fashionsponge.com/fs_folders/images/logo/4.jpg' >

                                                                    </div>
                                                                </td>
                                                                <tr>
                                                                <td>
                                                                    <div>
                                                                        <img style='cursor:pointer; width:100%;' src='http://www.fashionsponge.com/fs_folders/images/email/header-slides.gif'>
                                                                    </div>
                                                                </td>
                                                            <tr>
                                                                <td>
                                                                    <div style='padding-top:30px;  margin:0px auto; border:1px solid none;text-align: center' >
                                                                        <img style='cursor:pointer; width:auto; ' src='http://www.fashionsponge.com/fs_folders/images/email/version3/time-$countDown.jpg'>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </center>
                                                </div>
                                                <div class='lead' style='padding-top:10px;' >
                                                </div>
                                                <div class='lead'>
                                                    <p style='font-size: 1px; color:white;position:absolute;' >
                                                        $openTracker
                                                        FINALLY, SOMETHING COOL FOR BLOGGERS.
                                                    </p>
                                                    <p style='font-size: 120%' >
                                                        My name is <b>Mauricio</b>, I'm the Founder & Creative Director at Fashion Sponge. <b style='color:#b0231c' >This is no sales email.</b> My reason, for emailing you is really very straight forward. You were referred by a friend or another blogger so wanted to personally let you know about my invite only community.
                                                    </p>
                                                    <p style='font-size: 120%'  >
                                                        Fashion Sponge is a social network where the best content creators in <b>Fashion</b>, <b>Beauty</b>, <b>Lifestyle</b> and <b>Entertainment</b> can showcase their content to people who's looking to discover the latest about people, places and things.
                                                    </p>
                                                    <p style='font-size: 120%'  >
                                                        Fashion Sponge was created as an alternative to the popular communities that allows anyone to post anything, as much as they want and anytime they want.
                                                    </p>
                                                    <p style='font-size: 120%'  >
                                                        <b>Fact:</b> Every minute, Facebook users are posting nearly 2.5 million pieces of content, Instagram user post nearly 220,000 new photos and WordPress users post over 61,000 articles in an hour. At this rate it's become harder for people to discover great content.
                                                    </p>
                                                    <p style='font-size: 120%'  >
                                                        Limiting memberships to content creators who create content that’s either compelling, inspirational, informative or entertaining, Fashion Sponge will become a go-to destination for seeing the best content by the best content creators.
                                                    </p>
                                                    <p style='color:#ad2219;font-weight: bold; font-size: 120% ' >
                                                        Quick Question:
                                                    </p>
                                                    <p style='font-size: 120%'  >
                                                        <b>Are you creating high quality content that's either compelling, inspirational, informative or entertaining, that's not getting a lot of views, likes or shares?</b>
                                                    </p>
                                                    <p style='font-size: 120%'  >
                                                        If so, Fashion Sponge just maybe the answer to your dilemma. <a href='$link_signup' style='color:#ad2219;' >Sign up now.</a>
                                                    </p>
                                                    <p>
                                                         <span style='color:#1a386a; font-size: 120% '>
                                                            <b>Mauricio | Founder &amp; Creative Director</b> <br>
                                                            <a href='#' style='color: #2BA6CB;'>Mauricio@fashionsponge.com</a>
                                                        </span>
                                                    </p>
                                                </div>
                                                <!--content-->
                                                <div class='lead' style='padding-top:5px;'>
                                                </div>


                                                <div style='padding-top:0px;'>
                                                    <a href='$link_signup'>
                                                        <img style='cursor:pointer; width:100%;' src='http://www.fashionsponge.com/fs_folders/images/email/version3/sign-up.jpg'>
                                                    </a>
                                                </div>

                                                <div style='padding-top:10px;'>
                                                    <img style='cursor:pointer; width:100%;' src='http://www.fashionsponge.com/fs_folders/images/email/version3/devices-new.jpg'>
                                                </div>

                                                <div style='padding-top:10px;'>
                                                    <img style='cursor:pointer; width:100%;' src='http://www.fashionsponge.com/fs_folders/images/email/version3/4-reason.jpg'>
                                                </div>

                                                <div style='padding-top:10px;'>
                                                    <img style='cursor:pointer; width:100%;' src='http://www.fashionsponge.com/fs_folders/images/email/version3/4-boxes.jpg'>
                                                </div>
                                            </td>
                                        <tr>
                                                <td>
                                                    <!--footer-->
                                                    <div style='background-color: #1a4178; padding:12px; color:#FFFFFF'>

                                                         <p style='font-size: 120%'  >
                                                            $footer_info
                                                        </p>
                                                    </div>
                                                </td>
                                        </tr>
                                        </tbody></table>
                                </div>
                            </td>
                        </tr>
                        </tbody></table><!-- /BODY -->

                </body>
            </html>
        ";

        return self::sendEmail($from, $to, $subject, $body);
        }
    private static function sendEmail($from, $to, $subject, $body) {
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
    public static function sendSignUpWelcomeEmail($from, $to, $subject, $firstName = ' ') {
        echo "this is the new comment";

        $from 			= "Fashion Sponge <$from>";



        $content['signup'] = "
            <div class='lead'>
                <p class='text-3'> Hi$firstName,   </p>
                <p>My name is <b>Mauricio</b>, I'm the Founder & Creative Director at Fashion Sponge. When it comes to online communities, I know you have a lot of choices, so I want to personally thank you for visiting and signing up.</p>
                <p>We would love to invite everyone but membership is restricted to bloggers who consistently create compelling high quality fashion and lifestyle content. Once someone from Fashion Sponge visits the link you provided, you will receive a response in the order you signed up.</p>
            </div>
            <div class='lead'>
                <p class='text-2' style='color: #b01e23; '>
                    <b style='font-size:13px;' >HAVE ANY QUESTIONS OR SUGGESTIONS?</b>
                </p>
                <p>
                    If you have any questions or suggestions please feel free to email me. I'm always happy to receive feedback, but most importantly I love connecting with people!
                </p>
            </div>
            <div class='lead' style='padding-top:20px;font-weight:bold'>
                <b style='font-size:13px;' >THANK YOU AGAIN FOR YOUR SUPPORT!</b>
            </div>
            <div class='lead'>
                <p>
                     <span style='color:#1a386a;'>
                        Mauricio | Founder &amp; Creative Director  <br>
                        <a style='color:#696969;'>Mauricio@fashionsponge.com</a>
                    </span>
                 </p>
            </div>
        ";

        $body = "
            <html xmlns='http://www.w3.org/1999/xhtml'>
                <head>
                    <style type='text/css'>
                        #query-response{
                            display: block;
                        }
                    </style>
                    <style type='text/css'>
                        #popUp-background{
                            display: none;
                            position:fixed;
                            z-index: 106;
                            width:100%;
                            height: 100%;
                            background-color: rgba(000,000,000,0.8);
                        }
                        .red{
                            color: red;
                        }
                        .green{
                            color: green;
                        }
                     </style>
                </head>
                <body bgcolor='#FFFFFF'>
                    <!-- If you delete this tag, the sky will fall on your head -->
                    <meta name='viewport' content='width=device-width, initial scale=1.0'>
                    <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>

                    <!-- HEADER -->
                    <!-- /HEADER -->

                    <style type='text/css'>
                            /* -------------------------------------
                                    GLOBAL
                            ------------------------------------- */
                            * {
                                margin:0;
                                padding:0;
                            }
                            * { font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; }

                            img {
                                max-width: 100%;
                            }
                            .collapse {
                                margin:0;
                                padding:0;
                            }
                            body {
                                -webkit-font-smoothing:antialiased;
                                -webkit-text-size-adjust:none;
                                width: 100%!important;
                                height: 100%;
                            }


                            /* -------------------------------------
                                    ELEMENTS
                            ------------------------------------- */
                            a { color: #2BA6CB;}

                            .btn {
                                text-decoration:none;
                                color: #FFF;
                                background-color: #666;
                                padding:10px 16px;
                                font-weight:bold;
                                margin-right:10px;
                                text-align:center;
                                cursor:pointer;
                                display: inline-block;
                            }

                            p.callout {
                                padding:15px;
                                background-color:#ECF8FF;
                                margin-bottom: 15px;
                            }
                            .callout a {
                                font-weight:bold;
                                color: #2BA6CB;
                            }

                            table.social {
                            /*  padding:15px; */
                                background-color: #ebebeb;

                            }
                            .social .soc-btn {
                                padding: 3px 7px;
                                font-size:12px;
                                margin-bottom:10px;
                                text-decoration:none;
                                color: #FFF;font-weight:bold;
                                display:block;
                                text-align:center;
                            }
                            a.fb { background-color: #3B5998!important; }
                            a.tw { background-color: #1daced!important; }
                            a.gp { background-color: #DB4A39!important; }
                            a.ms { background-color: #000!important; }

                            .sidebar .soc-btn {
                                display:block;
                                width:100%;
                            }

                            /* -------------------------------------
                                    HEADER
                            ------------------------------------- */
                            table.head-wrap { width: 100%;}

                            .header.container table td.logo { padding: 15px; }
                            .header.container table td.label { padding: 15px; padding-left:0px;}


                            /* -------------------------------------
                                    BODY
                            ------------------------------------- */
                            table.body-wrap { width: 100%;}


                            /* -------------------------------------
                                    FOOTER
                            ------------------------------------- */
                            table.footer-wrap { width: 100%;    clear:both!important;
                            }
                            .footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
                            .footer-wrap .container td.content p {
                                font-size:10px;
                                font-weight: bold;

                            }


                            /* -------------------------------------
                                    TYPOGRAPHY
                            ------------------------------------- */
                            h1,h2,h3,h4,h5,h6 {
                            font-family: 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
                            }
                            h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }

                            h1 { font-weight:200; font-size: 44px;}
                            h2 { font-weight:200; font-size: 37px;}
                            h3 { font-weight:500; font-size: 27px;}
                            h4 { font-weight:500; font-size: 23px;}
                            h5 { font-weight:900; font-size: 17px;}
                            h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#444;}

                            .collapse { margin:0!important;}

                            p, ul {
                                margin-bottom: 10px;
                                font-weight: normal;
                                font-size:14px;
                                line-height:1.6;
                            }
                            p.lead { font-size:17px; padding-top: 15px;text-align: left;color: #000000;}
                            p.last { margin-bottom:0px;}

                            ul li {
                                margin-left:5px;
                                list-style-position: inside;
                            }

                            /* -------------------------------------
                                    SIDEBAR
                            ------------------------------------- */
                            ul.sidebar {
                                background:#ebebeb;
                                display:block;
                                list-style-type: none;
                            }
                            ul.sidebar li { display: block; margin:0;}
                            ul.sidebar li a {
                                text-decoration:none;
                                color: #666;
                                padding:10px 16px;
                            /*  font-weight:bold; */
                                margin-right:10px;
                            /*  text-align:center; */
                                cursor:pointer;
                                border-bottom: 1px solid #777777;
                                border-top: 1px solid #FFFFFF;
                                display:block;
                                margin:0;
                            }
                            ul.sidebar li a.last { border-bottom-width:0px;}
                            ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}



                            /* ---------------------------------------------------
                                    RESPONSIVENESS
                                    Nuke it from orbit. It's the only way to be sure.
                            ------------------------------------------------------ */

                            /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
                            .container {
                                display:block!important;
                                max-width:600px!important;
                                margin:0 auto!important; /* makes it centered */
                                clear:both!important;
                            }

                            /* This should also be a block element, so that it will fill 100% of the .container */
                            .content {
                                padding:15px;
                                max-width:600px;
                                margin:0 auto;
                                display:block;
                            }

                            /* Let's make sure tables in the content area are 100% wide */
                            .content table { width: 100%; }


                            /* Odds and ends */
                            .column {
                                width: 300px;
                                float:left;
                            }
                            .column tr td { padding: 15px; }
                            .column-wrap {
                                padding:0!important;
                                margin:0 auto;
                                max-width:600px!important;
                            }
                            .column table { width:100%;}
                            .social .column {
                                width: 280px;
                                min-width: 279px;
                                float:left;
                            }

                            /* Be sure to place a .clear element after each set of columns, just to be safe */
                            .clear { display: block; clear: both; }


                            /* -------------------------------------------
                                    PHONE
                                    For clients that support media queries.
                                    Nothing fancy.
                            -------------------------------------------- */
                            @media only screen and (max-width: 600px) {

                                a[class='btn'] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}

                                div[class='column'] { width: auto!important; float:none!important;}

                                table.social div[class='column'] {
                                    width:auto!important;
                                }
                            }

                            .header-1 {
                            /* border:1px solid red; */
                                text-align:center;
                            }
                            .header-1 div  {
                                margin:auto;
                            }
                            .text-1 {
                                color: 1a386a;
                                font-size: 23px;
                                font-family:arial;
                                color:#c51d20;
                                border-top:1px solid #ccc;
                                border-bottom:1px solid #ccc;
                                padding: 15px 0px 15px 0px;
                                line-height: 1;
                                font-weight:bold;
                            }
                            .text-2{
                                font-weight:bold;
                            }
                            .image{
                                padding-bottom:20px;
                                padding-top:20px;
                            }
                            .container-1{
                                border: 1px solid #f4f3f2;
                                padding: 10px;
                            }
                            table.table-1 {
                                width: 100%;
                                padding-bottom: 10px;
                            }


                            td.logo {
                                width: 50%;
                            }

                            td.logo img {
                                float: right;
                            }
                    </style>
                    <!-- BODY -->


                    <table class='body-wrap'>
                        <tbody><tr>
                            <td> </td>
                            <td class='container' bgcolor='#FFFFFF'>
                                <div class='content'>
                                <table>
                                    <tbody><tr>
                                        <td class='container-1' style='border: 1px solid #f4f3f2; padding:10px;color:#1a386a;background-color: white;'>
                                        <div class='header-1' style='padding: 0px 0px 20px 0px'; >
                                            <center>
                                                <table style='width: 100%;'  border='0' cellspacing='0' cellpadding='0' class='table-1' >
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <div>
                                                                <img style='cursor:pointer; width:100%; ' src='http://fashionsponge.com/fs_folders/images/email/Header-image.png'>
                                                            </div>
                                                        </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </center>
                                        </div>
                                    <center>
                                    <span style='font-size:190%;'> LETTER FROM THE <b> FOUNDER </b> </span>
                                    </center>
                                    " . $content['signup'] . "
                                </td>
                            </tr>
                        </tbody></table>
                        </div>
                            </td>
                            <td></td>
                            </tr>
                        </tbody>
                    </table><!-- /BODY -->
                </body>
            </html>
        ";

        return self::sendEmail($from, $to, $subject, $body);
    }
    public static function inviteSubject1($version)
    {

        echo "<br><br><h3>This is the version $version </h3> <br><br>";

        if ($version == 0)
        {
            return "An Invitation to Share Your Blog Content on Fashion Sponge";
        }
        elseif ($version == 1)
        {
            return "Need more page views, followers, like or shares?";
        }
        else
        {
            return "Oh-no, your personal invite is expiring in hours!";
        }
    }
    public function sendConfirmationEmail($email)
    {
        return TRUE;
    }
}