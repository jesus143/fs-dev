<!--
    create container of the back and continue
    add function container div that doing the next and prev hide and show
    click continue and next div show and current show div hide
    click back     and prev div show and current show div hide
    add child div that container the image tour
    add close popup function if all tour are being viewed.
-->


<!DOCTYPE html>
<html>
<head lang="en">
</head> 

<body style="background-color: #808080" >

    <div id="tour-1" >
        <div class="tour-wrapper" >
            <div class="tour-member-icon" >
                <img src="fs_folders/images/tour/tour-member-icon.png" >
            </div>
            <div class="tour-container" >
                <div class="tour-back-continue-container" >
                    <div class="tour-bc-arrow-up-container" >
                        <img src="fs_folders/images/tour/tour arrow up.png">
                    </div>
                    <div class="tour-message-close" id="tour-message-close" onclick="tour_done( )" >
                        x
                    </div>
                    <ul>
                        <li>
                            <table>
                                <tr>
                                    <td>
                                        <p id="1-tour-bullet-content-1" style="display: block" >
                                            Discover new members to follow. See which Facebook
                                            friends is on Fashion Sponge or invite the one you think
                                            will like the site.
                                        </p>
                                        <!---
                                        <p id="1-tour-bullet-content-2" >
                                            Discover new members to follow. See which Facebook
                                            friends is on Fashion Sponge or invite the onnes you think
                                            will like the site. 2
                                        </p>
                                        <p id="1-tour-bullet-content-3" >
                                            Discover new members to follow. See which Facebook
                                            friends is on Fashion Sponge or invite the onnes you think
                                            will like the site. 3
                                        </p>
                                        <p id="1-tour-bullet-content-4"  >
                                            Discover new members to follow. See which Facebook
                                            friends is on Fashion Sponge or invite the onnes you think
                                            will like the site. 4
                                        </p>
                                        -->
                                    </td>
                                    <td> </td>
                            </table>
                        </li>
                        <li>
                            <table>
                                <tr>
                                    <td>
                                        <span  class="bullet-points"  id="1-tour-bullet-1" onclick="tour_bullet_points(1, 4, '#1-tour-bullet-content-', '#1-tour-bullet-')" style="color:black" >
                                            .
                                        </span>
                                         <span  class="bullet-points" id="1-tour-bullet-2" >
                                            .
                                        </span>
                                         <span class="bullet-points"  id="1-tour-bullet-3" >
                                            .
                                        </span>
                                         <span class="bullet-points"  id="1-tour-bullet-4" >
                                            .
                                        </span>
                                        <span class="bullet-points"  id="1-tour-bullet-4" >
                                            .
                                        </span>
                                        <!--
                                        <span  class="bullet-points"  id="1-tour-bullet-1" onclick="tour_bullet_points(1, 4, '#1-tour-bullet-content-', '#1-tour-bullet-')" style="color:black" >
                                            .
                                        </span>
                                         <span  class="bullet-points" id="1-tour-bullet-2" onclick="tour_bullet_points(2, 4, '#1-tour-bullet-content-', '#1-tour-bullet-')" >
                                            .
                                        </span>
                                         <span class="bullet-points"  id="1-tour-bullet-3" onclick="tour_bullet_points(3, 4, '#1-tour-bullet-content-', '#1-tour-bullet-')" >
                                            .
                                        </span>
                                         <span class="bullet-points"  id="1-tour-bullet-4" onclick="tour_bullet_points(4, 4, '#1-tour-bullet-content-', '#1-tour-bullet-')" >
                                            .
                                        </span>
                                        -->
                                    </td>
                                    <td>
                                        <input type="button" value="Back" class="button-grey"  style="visibility: hidden" />
                                        <input type="button" value="Continue" class="button-blue" onclick="tour_next('#tour-1','#tour-2')" />
                                    </td>
                            </table>
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="tour-2" >
        <div class="tour-wrapper" >
            <div class="tour-member-icon" >
                <img src="fs_folders/images/tour/tour latest post icon.png"  >
            </div>
            <div class="tour-container" >
                <div class="tour-back-continue-container" >
                    <div class="tour-bc-arrow-up-container" >
                        <img src="fs_folders/images/tour/tour arrow up.png">
                    </div>
                    <div class="tour-message-close" id="tour-message-close" onclick="tour_done( )" >
                        x
                    </div>
                    <ul>
                        <li>
                            <table>
                                <tr>
                                    <td>
                                        <p id="2-tour-bullet-content-1" style="display: block" >
                                            Never miss a single post again. Click here to see all the post
                                            you have not seen by the people you follow.
                                        </p>
                                        <p id="2-tour-bullet-content-2" >
                                            2 Discover new members to follow. See which Facebook
                                            friends is on Fashion Sponge or invite the onnes you think
                                            will like the site.
                                        </p>
                                        <p id="2-tour-bullet-content-3" >
                                            3 Discover new members to follow. See which Facebook
                                            friends is on Fashion Sponge or invite the onnes you think
                                            will like the site.
                                        </p>
                                        <p id="2-tour-bullet-content-4"  >
                                            4 Discover new members to follow. See which Facebook
                                            friends is on Fashion Sponge or invite the onnes you think
                                            will like the site.
                                        </p>
                                    </td>
                                    <td> </td>
                            </table>
                        </li>
                        <li>
                            <table>
                                <tr>
                                    <td>


                                         <span  class="bullet-points" id="2-tour-bullet-2"   >
                                            .
                                        </span>
                                          <span  class="bullet-points"  id="2-tour-bullet-1" onclick="tour_bullet_points(1, 4, '#2-tour-bullet-content-', '#2-tour-bullet-')" style="color:black" >
                                            .
                                        </span>
                                         <span class="bullet-points"  id="2-tour-bullet-3" >
                                            .
                                        </span>
                                         <span class="bullet-points"  id="2-tour-bullet-4" >
                                            .
                                        </span>
                                         <span  class="bullet-points" id="2-tour-bullet-2"   >
                                            .
                                        </span>


                                        <!--
                                        <span  class="bullet-points"  id="2-tour-bullet-1" onclick="tour_bullet_points(1, 4, '#2-tour-bullet-content-', '#2-tour-bullet-')" style="color:black" >
                                            .
                                        </span>
                                         <span  class="bullet-points" id="2-tour-bullet-2" onclick="tour_bullet_points(2, 4, '#2-tour-bullet-content-', '#2-tour-bullet-')" >
                                            .
                                        </span>
                                         <span class="bullet-points"  id="2-tour-bullet-3" onclick="tour_bullet_points(3, 4, '#2-tour-bullet-content-', '#2-tour-bullet-')" >
                                            .
                                        </span>
                                         <span class="bullet-points"  id="2-tour-bullet-4" onclick="tour_bullet_points(4, 4, '#2-tour-bullet-content-', '#2-tour-bullet-')" >
                                            .
                                        </span>
                                        -->
                                    </td>
                                    <td>
                                        <input type="button" value="Back" class="button-grey" onclick="tour_next('#tour-2','#tour-1')" />
                                        <input type="button" value="Continue" class="button-blue" onclick="tour_next('#tour-2','#tour-3')"  />
                                    </td>
                            </table>
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="tour-3" >
        <div class="tour-wrapper" >
            <div class="tour-member-icon"  >
                <img src="fs_folders/images/tour/tour post icon.png"  >
            </div>
            <div class="tour-container" >
                <div class="tour-back-continue-container" >
                    <div class="tour-bc-arrow-up-container" style="margin-left:460px;" >
                        <img src="fs_folders/images/tour/tour arrow up.png">
                    </div>
                    <div class="tour-message-close" id="tour-message-close" onclick="tour_done( )" >
                        x
                    </div>
                    <ul>
                        <li>
                            <table>
                                <tr>
                                    <td>


                                        <p id="3-tour-bullet-content-1" style="display: block" >
                                            Share your latest article or look with the Fashion Sponge community.
                                            You can only post 1 look and 3 articles a day.
                                        </p>
                                        <p id="3-tour-bullet-content-2" >
                                            2 Discover new members to follow. See which Facebook
                                            friends is on Fashion Sponge or invite the onnes you think
                                            will like the site.
                                        </p>
                                        <p id="3-tour-bullet-content-3" >
                                            3 Discover new members to follow. See which Facebook
                                            friends is on Fashion Sponge or invite the onnes you think
                                            will like the site.
                                        </p>
                                        <p id="3-tour-bullet-content-4"  >
                                            4 Discover new members to follow. See which Facebook
                                            friends is on Fashion Sponge or invite the onnes you think
                                            will like the site.
                                        </p>


                                    </td>
                                    <td> </td>
                            </table>
                        </li>
                        <li>
                            <table>
                                <tr>
                                    <td>

                                         <span  class="bullet-points" id="3-tour-bullet-2"   >
                                            .
                                        </span>
                                         <span class="bullet-points"  id="3-tour-bullet-3"   >
                                            .
                                        </span>
                                          <span  class="bullet-points"  id="3-tour-bullet-1" onclick="tour_bullet_points(1, 4, '#3-tour-bullet-content-', '#3-tour-bullet-')" style="color:black">
                                            .
                                        </span>
                                         <span class="bullet-points"  id="3-tour-bullet-4"   >
                                            .
                                        </span>
                                          <span class="bullet-points"  id="3-tour-bullet-3"   >
                                            .
                                        </span>

                                        <!--
                                        <span  class="bullet-points"  id="3-tour-bullet-1" onclick="tour_bullet_points(1, 4, '#3-tour-bullet-content-', '#3-tour-bullet-')" style="color:black">
                                            .
                                        </span>
                                         <span  class="bullet-points" id="3-tour-bullet-2" onclick="tour_bullet_points(2, 4, '#3-tour-bullet-content-', '#3-tour-bullet-')" >
                                            .
                                        </span>
                                         <span class="bullet-points"  id="3-tour-bullet-3" onclick="tour_bullet_points(3, 4, '#3-tour-bullet-content-', '#3-tour-bullet-')" >
                                            .
                                        </span>
                                         <span class="bullet-points"  id="3-tour-bullet-4" onclick="tour_bullet_points(4, 4, '#3-tour-bullet-content-', '#3-tour-bullet-')" >
                                            .
                                        </span>
                                        -->
                                    </td>
                                    <td>
                                        <input type="button" value="Back" class="button-grey" onclick="tour_next('#tour-3','#tour-2')" />
                                        <input type="button" value="Continue" class="button-blue" onclick="tour_next('#tour-3','#tour-4')" />
                                    </td>
                            </table>
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="tour-4" >
        <div class="tour-wrapper" >
            <div class="tour-member-icon"  >
                <img src="fs_folders/images/tour/tour member image.png"  >
            </div>
            <div class="tour-container" >
                <div class="tour-back-continue-container" >
                    <div class="tour-bc-arrow-up-container" style="margin-left:220px;" >
                        <img src="fs_folders/images/tour/tour arrow up.png">
                    </div>
                    <div class="tour-message-close" id="tour-message-close" onclick="tour_done( )" >
                        x
                    </div>
                    <ul>
                        <li>
                            <table>
                                <tr>
                                    <td>
                                        <p id="4-tour-bullet-content-1" style="display: block" >
                                           Click the icons number to see all the post made by the member.
                                        </p>
                                        <p id="4-tour-bullet-content-2" >
                                            2 Discover new members to follow. See which Facebook
                                            friends is on Fashion Sponge or invite the onnes you think
                                            will like the site.
                                        </p>
                                        <p id="4-tour-bullet-content-3" >
                                            3 Discover new members to follow. See which Facebook
                                            friends is on Fashion Sponge or invite the onnes you think
                                            will like the site.
                                        </p>
                                        <p id="4-tour-bullet-content-4"  >
                                            4 Discover new members to follow. See which Facebook
                                            friends is on Fashion Sponge or invite the onnes you think
                                            will like the site.
                                        </p>
                                    </td>
                                    <td> </td>
                            </table>
                        </li>
                        <li>
                            <table>
                                <tr>
                                    <td>


                                         <span  class="bullet-points" id="4-tour-bullet-2"   >
                                            .
                                        </span>
                                         <span class="bullet-points"  id="4-tour-bullet-3"  >
                                            .
                                        </span>
                                         <span class="bullet-points"  id="4-tour-bullet-4"  >
                                            .
                                        </span>
                                        <span  class="bullet-points"  id="4-tour-bullet-1" onclick="tour_bullet_points(1, 4, '#4-tour-bullet-content-', '#4-tour-bullet-')" style="color:black" >
                                            .
                                        </span>
                                         <span class="bullet-points"  id="4-tour-bullet-4"  >
                                            .
                                        </span>


                                        <!--
                                        <span  class="bullet-points"  id="4-tour-bullet-1" onclick="tour_bullet_points(1, 4, '#4-tour-bullet-content-', '#4-tour-bullet-')" style="color:black" >
                                            .
                                        </span>
                                         <span  class="bullet-points" id="4-tour-bullet-2" onclick="tour_bullet_points(2, 4, '#4-tour-bullet-content-', '#4-tour-bullet-')" >
                                            .
                                        </span>
                                         <span class="bullet-points"  id="4-tour-bullet-3" onclick="tour_bullet_points(3, 4, '#4-tour-bullet-content-', '#4-tour-bullet-')" >
                                            .
                                        </span>
                                         <span class="bullet-points"  id="4-tour-bullet-4" onclick="tour_bullet_points(4, 4, '#4-tour-bullet-content-', '#4-tour-bullet-')" >
                                            .
                                        </span>
                                        -->
                                    </td>
                                    <td>
                                    <td>
                                        <input type="button" value="Back" class="button-grey" onclick="tour_next('#tour-4','#tour-3')" />
                                        <input type="button" value="Continue" class="button-blue" onclick="tour_next('#tour-4','#tour-5')" />
                                    </td>
                            </table>
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="tour-5" >
        <div class="tour-wrapper" >
            <div class="tour-member-icon"   >
                <img src="fs_folders/images/tour/tour post image.png"   >
            </div>
            <div class="tour-container" >
                <div class="tour-back-continue-container" >
                    <div class="tour-bc-arrow-up-container" style="margin-left:220px;" >
                        <img src="fs_folders/images/tour/tour arrow up.png">
                    </div>
                    <div class="tour-message-close"  onclick="tour_done( )" onclick="tour_done( )" >
                        x
                    </div>
                    <ul>
                        <li>
                            <table>
                                <tr>
                                    <td>
                                        <p id="5-tour-bullet-content-1" style="display: block" >
                                           Like, share with followers, favorite to read later, share to the social sphere or hide from feed.
                                        </p>
                                        <p id="5-tour-bullet-content-2" >
                                            2 Discover new members to follow. See which Facebook
                                            friends is on Fashion Sponge or invite the onnes you think
                                            will like the site.
                                        </p>
                                        <p id="5-tour-bullet-content-3" >
                                            3 Discover new members to follow. See which Facebook
                                            friends is on Fashion Sponge or invite the onnes you think
                                            will like the site.
                                        </p>
                                        <p id="5-tour-bullet-content-4"  >
                                            4 Discover new members to follow. See which Facebook
                                            friends is on Fashion Sponge or invite the onnes you think
                                            will like the site.
                                        </p>
                                    </td>
                                    <td> </td>
                            </table>
                        </li>
                        <li>
                            <table>
                                <tr>
                                    <td>
                                         <span  class="bullet-points" id="5-tour-bullet-2"   >
                                            .
                                        </span>
                                         <span class="bullet-points"  id="5-tour-bullet-3" >
                                            .
                                        </span>
                                         <span class="bullet-points"  id="5-tour-bullet-4" >
                                            .
                                        </span>
                                           <span class="bullet-points"  id="5-tour-bullet-4"  >
                                            .
                                        </span>
                                           <span  class="bullet-points"  id="5-tour-bullet-1" onclick="tour_bullet_points(1, 4, '#5-tour-bullet-content-', '#5-tour-bullet-')" style="color:black" >
                                            .
                                        </span>
                                        <!--
                                        <span  class="bullet-points"  id="5-tour-bullet-1" onclick="tour_bullet_points(1, 4, '#5-tour-bullet-content-', '#5-tour-bullet-')" style="color:black" >
                                            .
                                        </span>
                                         <span  class="bullet-points" id="5-tour-bullet-2" onclick="tour_bullet_points(2, 4, '#5-tour-bullet-content-', '#5-tour-bullet-')" >
                                            .
                                        </span>
                                         <span class="bullet-points"  id="5-tour-bullet-3" onclick="tour_bullet_points(3, 4, '#5-tour-bullet-content-', '#5-tour-bullet-')" >
                                            .
                                        </span>
                                         <span class="bullet-points"  id="5-tour-bullet-4" onclick="tour_bullet_points(4, 4, '#5-tour-bullet-content-', '#5-tour-bullet-')" >
                                            .
                                        </span>
                                           <span class="bullet-points"  id="5-tour-bullet-4" onclick="tour_bullet_points(4, 4, '#5-tour-bullet-content-', '#5-tour-bullet-')" >
                                            .
                                        </span>
                                        -->
                                    </td>
                                    <td>
                                    <td>
                                        <input type="button" value="Back" class="button-grey" onclick="tour_next('#tour-5','#tour-4')" />
                                        <input type="button" value="Continue" class="button-blue" onclick="tour_done()" />
                                    </td>
                            </table>
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
      
</body>
</html>