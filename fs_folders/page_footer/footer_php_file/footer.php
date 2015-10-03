<?php

      $url = 'http://dev.fashionsponge.com';
      // $url = 'http://localhost/fs/new_fs/alphatest';

?>



<style>

    #fs-footer-wrapper {
        margin:0px auto;
        text-align: center;
        margin-left: -71px;
        height: 235px;
        background-color: rgb(34, 91, 153);
    }

    #fs-footer-white {
        color:white !important;
    }

    #fs-footer-container {
        width: 100%;
        margin: 0px auto;
        padding-top: 40px;
        margin-left: -40px;
    }
 

    #fs-footer-wrapper span {
        color:rgb(174, 179, 189);
        font-family: 'roman';
        font-size: 12px;
    }

    #fs-footer-wrapper a span:hover { 
        text-decoration: underline;
    } 

    #fs-footer-wrapper ul {
        padding:0px;
        margin:0px;
    }

    #fs-footer-wrapper ul li {
        list-style: none;
        /*border:1px solid red;*/
        float:right;
        width:24.7%;
        background-color: #225b99;
        color:white;
        height: 155px;
        padding-top:10px;
    }

    #fs-footer-wrapper ul li table {
        margin: 0px auto;
    }

    #fs-footer-wrapper ul li table td {
    }

    #fs-footer-wrapper ul li:nth-child(1) {
        width: 24%;
        padding-left: 2%;
        padding-right: 3px;
    }

    #fs-footer-wrapper ul li:nth-child(1) span {
        font-family: 'roman';
    }

    #fs-footer-wrapper ul li:nth-child(1) div:nth-child(1) {
        padding-top:8px;
        width: 81%;
        margin: 0px auto;
    }


    #fs-footer-wrapper ul li:nth-child(1) div:nth-child(1) div {
        padding-top:10px;
    }


    #fs-footer-wrapper ul li:nth-child(1) input , #fs-footer-wrapper ul li:nth-child(1) select{
        width: 100%;
        border:0px;
        padding: 6px;
        outline: none !important;
        height: 30px;
    }

    #fs-footer-wrapper ul li:nth-child(1) input:nth-child(1) , #fs-footer-wrapper ul li:nth-child(1) select {
        /*border-bottom: 1px solid grey;*/
        border-radius: 5px 5px 0px 0px;
    }

    #fs-footer-wrapper ul li:nth-child(1)  input:nth-child(2) {

    }

    #fs-footer-wrapper ul li:nth-child(1)  input:nth-child(4) {
        color:white;
        /*background-color: #4BB438;*/
        border-radius: 0px 0px 5px 5px;
        background-image: url("<?php echo $url; ?>/fs_folders/images/icons/footer/subscribe-1.png");
        background-repeat: no-repeat;
        background-size: 100% 101%

    }

    #fs-footer-wrapper ul li:nth-child(1)  input:nth-child(4):hover {
        color:white;
        /*background-color: #4BB438;*/
        border-radius: 0px 0px 5px 5px;
        background-image: url("<?php echo $url; ?>/fs_folders/images/icons/footer/subscribe-mouse-over-1.png");
        background-repeat: no-repeat;
        background-size: 100% 101%;
    }

    #fs-footer-wrapper ul li:nth-child(1)  input:nth-child(4):hover {
        color:white;
        background-color: #73D062;
        border-radius: 0px 0px 5px 5px;
    }

    #fs-footer-wrapper ul li:nth-child(2) {
        border-right:1px solid white;
        width: 15%;
    }

    #fs-footer-wrapper ul li:nth-child(2) table td {
        padding:7px;
    }

    #fs-footer-wrapper ul li:nth-child(2) table td img {
        width:auto;
    }

    #fs-footer-wrapper ul li:nth-child(3) {
        border-right:1px solid white;
        width: 28%;
    }

    #fs-footer-wrapper ul li:nth-child(3) table {
    }

    #fs-footer-wrapper ul li:nth-child(3) table td {
        padding:8px;
    }

    #fs-footer-wrapper ul li:nth-child(4) {
        border-right:1px solid white;
        width: 19%;
        padding-right: 20px;
    }

    #fs-footer-wrapper ul li:nth-child(4) table {
        width: 100%;
        text-align: left;
        margin-top: 9px;
    }

    #fs-footer-wrapper ul li:nth-child(4) table td {
    }

    #fs-footer-wrapper ul li:nth-child(4) table td img{
        margin-left:5px;
        padding-bottom: 2px;
        width: 70px;
    }


    #fs-footer-wrapper ul li:nth-child(4) table span {
    }

</style>


<div id="fs-footer-wrapper">

    <div id="fs-footer-container">
        <ul>
            <li>
                <div>
                    <span id="fs-footer-white" >SUBSCRIBE TO OUR NEWS LETTER</span>
                    <div>
                        <select>
                            <option>Gender</option>
                            <option>Male</option>
                            <option>Fe-Male</option>
                        </select>
                        <input type="text" placeholder="E-mail" ><br>
                        <input type="button" value="" id="fs-footer-subscribe">
                    </div>
                </div>
            </li>
            <li>
                <table>
                    <tr>
                        <td>
                            <a href="#" >
                                <img src="<?php echo $url; ?>/fs_folders/images/icons/footer/facebook.png"
                                     id="footer-facebook-icon"
                                     onmouseover="change_image_src('#footer-facebook-icon' , '<?php echo $url; ?>/fs_folders/images/icons/footer/facebook-mouse-over.png')"
                                     onmouseout="change_image_src('#footer-facebook-icon' , '<?php echo $url; ?>/fs_folders/images/icons/footer/facebook.png')">
                            </a>
                        </td>
                        <td>
                            <a href="#" >
                                <span>Facebook</span>
                            </a>
                        </td>
                    <tr>
                        <td>
                            <a href="#" >
                                 <img src="<?php echo $url; ?>/fs_folders/images/icons/footer/tumblr.png"
                                     id="footer-tumblr-icon"
                                     onmouseover="change_image_src('#footer-tumblr-icon' , '<?php echo $url; ?>/fs_folders/images/icons/footer/tumblr-mouse-over.png')"
                                     onmouseout="change_image_src('#footer-tumblr-icon' , '<?php echo $url; ?>/fs_folders/images/icons/footer/tumblr.png')">
                            </a>
                        <td>
                            <a href="#" >
                                <span>Tumblr</span>
                            </a>
                        </td>
                    <tr>
                        <td>
                            <a href="#" >
                                <img src="<?php echo $url; ?>/fs_folders/images/icons/footer/instagram.png"
                                     id="footer-instagram-icon"
                                     onmouseover="change_image_src('#footer-instagram-icon' , '<?php echo $url; ?>/fs_folders/images/icons/footer/instagram-mouse-over.png')"
                                     onmouseout="change_image_src('#footer-instagram-icon' , '<?php echo $url; ?>/fs_folders/images/icons/footer/instagram.png')">
                            </a>
                       <td>
                            <a href="#">
                                <span>Instagram</span>
                            </a>
                        </td>
                    <tr>
                        <td>
                            <a href="#">
                                <img src="<?php echo $url; ?>/fs_folders/images/icons/footer/pinterest.png"
                                     id="footer-pinterest-icon"
                                     onmouseover="change_image_src('#footer-pinterest-icon' , '<?php echo $url; ?>/fs_folders/images/icons/footer/pinterest-mouse-over.png')"
                                     onmouseout="change_image_src('#footer-pinterest-icon' , '<?php echo $url; ?>/fs_folders/images/icons/footer/pinterest.png')">
                            </a>
                        <td>
                            <a href="#">
                                <span>Pinterest</span>
                            </a>
                        </td>
                </table>
            </li>
            <li>
<!--                 <table>
                    <tr>
                        <td> <a href="#"> <span id="fs-footer-white" >FASHION</span></a></td>         <td> <a href="#"><span>About</span></a>            </td> <tr>
                        <td> <a href="#"> <span id="fs-footer-white" >BEAUTY</span></a></td>          <td> <a href="#"><span>Contact</span></a>          </td> <tr>
                        <td> <a href="#"> <span id="fs-footer-white" >LIFESTYLE</span></a></td>       <td> <a href="#"><span>Term Of Service</span></a>  </td> <tr>
                        <td> <a href="#"> <span id="fs-footer-white" >ENTERTAINMENT</span></a></td>   <td> <a href="#"><span>Privacy Policy</span></a>   </td> <tr>
                </table>
 -->
                <table>
                    <tbody><tr>
  
                        
                      <td> <a href="#"> <span id="fs-footer-white">LOOKS</span></a></td>         
                    <td> <a href="#"><span>About Us</span></a>            </td> </tr><tr>
                      <td> <a href="#"> <span id="fs-footer-white">FASHION</span></a></td>         <td> <a href="#"><span>FAQ</span></a>            </td> </tr><tr>
                        <td> <a href="#"> <span id="fs-footer-white">BEAUTY</span></a></td>          <td> <a href="#"><span>Posting Rules</span></a>          </td> </tr><tr>
                        <td> <a href="#"> <span id="fs-footer-white">LIFESTYLE</span></a></td>       <td> <a href="#"><span>Term Of Service</span></a>  </td> </tr><tr>
                        <td> <a href="#"> <span id="fs-footer-white">ENTERTAINMENT</span></a></td>   <td> <a href="#"><span>Privacy Policy</span></a>   </td> </tr><tr>
                </tr></tbody></table>


            </li> 
            <li>
                <table>
                    <tr>
                        <td>
                            <img src="<?php echo $url; ?>/fs_folders/images/logo/footer-logo.jpg"></td><tr>
                        <td>
                    <tr>
                        <td>
                            <span> &#169; 2015 Fashion Sponge <br> All rights reserved</span>
                        </td>
                    <tr> 
                </table>
            </li>
        </ul>
    </div>

</div>