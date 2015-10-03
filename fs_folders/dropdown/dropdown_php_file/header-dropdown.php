<?php

/**
 * Created by PhpStorm.
 * User: Jesus
 * Date: 7/10/2015
 * Time: 6:52 PM
 */

require ('fs_folders/php_functions/Helper/helper.php');

$db = new Database();
$look = new Look($this->mno, $db);
$article = new \App\Article($db, $this->mno);

?>
 <div class="header-dropdown-wrapper"   >

    <!-- LOOK-->
     <div class="header-dropdown-container"   id="dropdown-header-look"  >
         <ul class="header-dropdown-ul-1-container"    >
              <li>
                  <a href="look?category=alllooks">
                      <div>
                          <div>
                              <br>
                              <br>
                              <span>All Looks</span>
                          </div>
                      </div>
                  </a>
              </li>

              <li>
                  <a href="look?category=bohemian">
                      <?php
                      $plno = $look->Top('Bohemian');
                      $src = $look->sourceCategoryDropDown($plno);
                      ?>
                      <div style="background-image:url('<?php echo $src; ?>');height: 88px;background-repeat: no-repeat;background-size: auto 123px;" >
                      </div>
                      <div>
                          <span>Bohemian</span>
                      </div>
                  </a>
              </li> 
              <li>
                  <a href="look?category=casual">
                      <?php
                      $plno = $look->Top('Casual');
                      $src = $look->sourceCategoryDropDown($plno);
                      ?>
                      <div style="background-image:url('<?php echo $src; ?>');height: 88px;background-repeat: no-repeat;background-size: auto  123px;" >
                      </div>
                      <div>
                          <span>Casual</span>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="look?category=chic">
                      <?php
                      $plno = $look->Top('Chic');
                      $src = $look->sourceCategoryDropDown($plno);
                      ?>


                      <div style="background-image:url('<?php echo $src; ?>');height: 88px;background-repeat: no-repeat;background-size: auto  123px;" >
                      </div>
                      <div>
                          <span>Chic </span>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="look?category=formal">
                      <?php
                      $plno = $look->Top('Formal');
                      $src = $look->sourceCategoryDropDown($plno);
                      ?>
                      <div style="background-image:url('<?php echo $src; ?>');height: 88px;background-repeat: no-repeat;background-size: auto  123px;" >
                      </div>

                      <div>
                          <span>Formal</span>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="look?category=grunge">
                      <?php
                          $plno = $look->Top('Grunge');
                          $src = $look->sourceCategoryDropDown($plno);
                      ?>
                      <div style="background-image:url('<?php echo $src; ?>');height: 88px;background-repeat: no-repeat;background-size: auto 123;" > </div>
                      <div> <span>Grunge</span> </div>
                  </a>
              </li>
              <li>
                  <a href="look?category=menswear">

                      <?php
                      $plno = $look->Top('Menswear');
                      $src = $look->sourceCategoryDropDown($plno);
                      ?>
                      <div style="background-image:url('<?php echo $src; ?>');height: 88px;background-repeat: no-repeat;background-size: auto  123px;" >
                      </div>
                      <div>
                          <span>Menswear</span>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="look?category=preppy">

                      <?php
                      $plno = $look->Top('Preppy');
                      $src = $look->sourceCategoryDropDown($plno);
                      ?>
                      <div style="background-image:url('<?php echo $src; ?>');height: 88px;background-repeat: no-repeat;background-size: auto  123px;" >
                      </div>
                      <div>
                          <span>Preppy</span>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="look?category=streetwear">
                      <?php
                      $plno = $look->Top('Streetwear');
                      $src = $look->sourceCategoryDropDown($plno);
                      ?>
                      <div style="background-image:url('<?php echo $src; ?>');height: 88px;background-repeat: no-repeat;background-size: auto  123px;" >
                      </div>
                      <div>
                          <span>Streetwear</span>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="look?category=alllook&toplook=toprated">
                      <div>
                          <br>
                          <br>
                          <span>Top Looks</span>
                      </div>
                  </a>
              </li>
          </ul>
         <div class="clear" >
         </div>
     </div>

    <!-- FASHION -->
    <div class="header-dropdown-container"    id="dropdown-header-fashion"   >
        <ul class="header-dropdown-ul-1-container"    >
            <li>
                <a href="article?category=fashion">
                    <div>
                        <div>
                            <br>
                            <br>
                            <span>All Fashion</span>
                        </div>
                    </div>
                </a>
            </li>
            <?php
                $r = $article->recentUploaded('Fashion');
                foreach($r as $art) {
            ?>
            <li>
                <a href="#">
                    <?php $src = $article->sourceCategoryDropDown($art['artno']); ?>
                    <div style="background-image:url('<?php echo $src; ?>');height: 88px;background-repeat: no-repeat;background-size: auto 123px;" >
                    </div>
                    <div>
                        <span><?php echo string_limit($art['topic'], 11, '...') ; ?></span>
                    </div>
                </a>
            </li>
            <?php } ?>
            <li>
                <a href="look?category=alllook&toplook=toprated">
                    <div>
                        <br>
                        <br>
                        <span>Top Fashion</span>
                    </div>
                </a>
            </li>
        </ul>
        <div class="clear" >
        </div>
    </div>

    <!-- BEAUTY -->
    <div class="header-dropdown-container"    id="dropdown-header-beauty"   >
        <ul class="header-dropdown-ul-1-container"    >
            <li>
                <a href="article?category=beauty">
                    <div>
                        <div>
                            <br>
                            <br>
                            <span>All Beauty</span>
                        </div>
                    </div>
                </a>
            </li>
            <?php
            $r = $article->recentUploaded('Beauty');
            foreach($r as $art) {
                ?>
                <li>
                    <a href="#">
                        <?php $src = $article->sourceCategoryDropDown($art['artno']); ?>
                        <div style="background-image:url('<?php echo $src; ?>');height: 88px;background-repeat: no-repeat;background-size: auto 123px;" >
                        </div>
                        <div>
                            <span><?php echo string_limit($art['topic'], 11, '...') ; ?></span>
                        </div>
                    </a>
                </li>
            <?php } ?>
            <li>
                <a href="article?category=beauty">
                    <div>
                        <br>
                        <br>
                        <span>Top Fashion</span>
                    </div>
                </a>
            </li>
        </ul>
        <div class="clear" >
        </div>
    </div>

    <!-- LIFESTYLE -->
    <div class="header-dropdown-container"    id="dropdown-header-lifestyle"   >
        <ul class="header-dropdown-ul-1-container"    >
            <li>
                <a href="#" >
                    <div>
                        <div>
                            <br>
                            <br>
                            <span>All Lifestyle</span>
                        </div>
                    </div>
                </a>
            </li>
            <?php
            $r = $article->recentUploaded('Lifestyle');
            foreach($r as $art) {
                ?>
                <li>
                    <a href="#">
                        <?php $src = $article->sourceCategoryDropDown($art['artno']); ?>
                        <div style="background-image:url('<?php echo $src; ?>');height: 88px;background-repeat: no-repeat;background-size: auto 123px;" >
                        </div>
                        <div>
                            <span><?php echo string_limit($art['topic'], 11, '...') ; ?></span>
                        </div>
                    </a>
                </li>
            <?php } ?>
            <li>
                <a href="article?category=lifestyle" >
                    <div>
                        <br>
                        <br>
                        <span>Top Lifestyle</span>
                    </div>
                </a>
            </li>
        </ul>
        <div class="clear" >
        </div>
    </div>

    <!-- ENTERTAINMENT -->
    <div class="header-dropdown-container"    id="dropdown-header-entertainment"   >
        <ul class="header-dropdown-ul-1-container"    >
            <li>
                <a href="article?category=entertainment" >
                    <div>
                        <div>
                            <br>
                            <br>
                            <span>All Entertainment</span>
                        </div>
                    </div>
                </a>
            </li>
            <?php
            $r = $article->recentUploaded('Entertainment');
            foreach($r as $art) {
                ?>
                <li>
                    <a href="#">
                        <?php $src = $article->sourceCategoryDropDown($art['artno']); ?>
                        <div style="background-image:url('<?php echo $src; ?>');height: 88px;background-repeat: no-repeat;background-size: auto 123px;" >
                        </div>
                        <div>
                            <span><?php echo string_limit($art['topic'], 11, '...') ; ?></span>
                        </div>
                    </a>
                </li>
            <?php } ?>
            <li>
                <a href="article?category=entertainment" >
                    <div>
                        <br>
                        <br>
                        <span>Top Entertainment</span>
                    </div>
                </a>
            </li>
        </ul>
        <div class="clear" >
        </div>
    </div>

 </div>