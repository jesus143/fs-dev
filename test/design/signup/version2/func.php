<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 20/02/2015
 * Time: 9:52 AM
 */




function desktopHeader()
{ ?>

    <div style="float: right;">
        <img src="../../../../fs_folders/images/signup/beta.jpg" id="logo-beta-right" style="height: 64px;" >
    </div>
    <div id="signup-header-menu" style="padding: 20px;">
        <div style="float: left">
            <a href="\">
                <img src="../../../../fs_folders/images/logo/FS__logo_final-HD-Beta.png" style="height:35px;margin-top:-4px">
            </a>
        </div>
        <div style="margin: 0px auto; border:1px solid none; width:auto; text-align: center "  >
            <table style="margin: 0px auto;" >
                <tr>
                    <td>
                        <a href="#" data-toggle="modal" data-target=".about" style="color:white; padding-right: 20px;" >
                            About
                        </a>
                    </td>
                    <td>
                        <a href="#" data-toggle="modal" data-target=".feature-list" style="color:white; padding-right: 20px;" >
                            Feature List
                        </a>
                    </td>
                    <td>
                        <a href="#login"  data-toggle="modal" data-target=".login"  style="color:white; padding-right: 20px;">
                            Log in
                        </a>
                    </td>
            </table>
        </div>
    </div>



<?php
}
function mobileHeader()
{?>
    <div id="signup-header-menu">
        <nav class="navbar navbar-inverse" role="navigation" style="border:none; background-image: none;  background-color:#1a4177 !important; padding:0px; margin: 0px;" >
            <div class="container">
                <div class="navbar-header" style="border-bottom:1px solid #1a4177 ">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" style="border-color:white" >
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="\">
                        <img src="../../../../fs_folders/images/logo/FS__logo_final-HD.png" style="height:30px;">
                    </a>
                </div>
                <center>
                    <div id="navbar" class="navbar-collapse collapse" style=" height: 30px; " >
                        <ul class="nav navbar-nav" >
                            <li><a href="#about" style="color:#FFFFFF" data-toggle="modal" data-target=".about"  >About</a></li>
                            <li><a href="#feature-list" style="color:#FFFFFF" data-toggle="modal" data-target=".feature-list"  >Feature list</a></li>
                            <li><a href="#login-in" style="color:#FFFFFF" data-toggle="modal" data-target=".login"  >Log in</a></li>
                            <li><a href="#beta" style="color:#FFFFFF" > <img src="../../../../fs_folders/images/signup/beta.jpg"  style="height: 30px;"  ></a></li>
                        </ul>
                    </div>
                </center>

                <!--/.nav-collapse -->
            </div>
        </nav>
    </div>

    <?php
}