     




<?php 
    post_article_website_test( );
    // future_speed_of_modals_next_prev( );

?>



<?php 

    function post_article_website_test( ) { ?>
        
        <?php 
                $image = array(
                    'http://cdn.sheknows.com/authors/profile/headshot_chrissy_callahan.jpg',
                    'http://cdn1-www.thefashionspot.com/assets/uploads/2014/07/tanktop-p-230x338.jpg',
                    'http://cdn.sheknows.com/articles/2014/07/get-the-look-kate-hudson-collage.jpg',
                    'http://cdn3-www.thefashionspot.com/assets/uploads/2014/08/kristin-k-wardrobe-p-230x338.jpg',
                    'http://ris.fashion.telegraph.co.uk/RichImageService.svc/imagecontent/1/TMG11012461/l/VB-GETTY-MAIN_2996628a.jpg',
                    'http://ris.fashion.telegraph.co.uk/RichImageService.svc/imagecontent/1/TMG11000372/v/AW14DetailP-344_2991437a.jpg'
                 );

        ?>


        <title>this is the title </title>
        <table border="1" cellpadding="0" cellspacing="0" >
            <tr>
                <td>
                    <iframe src="//player.vimeo.com/video/102399221" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> <p><a href="http://vimeo.com/93491795">Voice</a> from <a href="http://vimeo.com/charlesschwab">Charles Schwab</a> on <a href="https://vimeo.com">Vimeo</a>.</p>
                    <iframe width="420" height="315" src="//www.youtube.com/embed/CoxopsRSfdU" frameborder="0" allowfullscreen></iframe>
                    <iframe  type="text/html"  width="640"  height="435" src="http://vube.com/embed/video/W8nM24DqUw?t=s?autoplay=false&fit=true" allowfullscreen  frameborder="0"></iframe>
                    <iframe width="560" height="315" src="//www.youtube.com/embed/-cC9tYUjnjU" frameborder="0" allowfullscreen></iframe>
                    <iframe width="420" height="315" src="//www.youtube.com/embed/9LMQfOp9w8k" frameborder="0" allowfullscreen></iframe>

                </td>
                <td> 
                    <?php   
                        foreach ( $image as $src  ) { 
                            echo " <img src= '$src' />";  
                        }  
                    ?> 
                </td>
        </table>

 






     <?php 
    }

 ?>



<?php function future_speed_of_modals_next_prev( ) { ?>

    <!doctype html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if IE 9]>         <html class="no-js ie9"> <![endif]-->
    <!--[if IE 10]>           <html class="no-js ie10"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <html>
    <head>
    <!--[if IE]>
      <script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1000">
    <meta name="description" content="Find out about running the Sydney Morning Herald Half Marathon, secure your place using the online entry system and learn how you can run for charity."> 
    <meta name="og:description" content="I've entered into the 2015 Sydney Half Marathon to be held on May 17, 2015">
    <meta name="og:image" content="https://rb-cms.s3.amazonaws.com/live/static/smh/img/headers/banner.jpg">
    <meta name="og:title" content="The Sydney Morning Herald Half Marathon">
    <meta name="og:url" content="http://www.smhhalfmarathon.com.au/"> 
    <title>The Sydney Morning Herald Half Marathon</title>  
    <link href="https://rb-cms.s3.amazonaws.com/live/static/bundles/base.5e67e7d2c223.css" rel="stylesheet" type="text/css" />
    <link href="https://rb-cms.s3.amazonaws.com/live/static/bundles/smh.d0190e9f32be.css" rel="stylesheet" type="text/css" /> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script   type="text/javascript" src="https://rb-cms.s3.amazonaws.com/live/static/bundles/base.5294c358f987.js" charset="utf-8"></script>
    <script   type="text/javascript" src="https://rb-cms.s3.amazonaws.com/live/static/bundles/smh.2de83601c2da.js" charset="utf-8"></script>


    <script type='text/javascript'>
        var $buoop = {vs:{i:8,f:15,o:10.6,s:4,n:9}};
        $buoop.ol = window.onload;
        window.onload=function(){
            try {if ($buoop.ol) $buoop.ol();}catch (e) {}
            var e = document.createElement("script");
            e.setAttribute("type", "text/javascript");
            e.setAttribute("src", "https://rb-cms.s3.amazonaws.com/live/static/base/js/update.469dfd1199b5.js");
            document.body.appendChild(e);
        }
    </script>
    <script type="text/javascript">
        var EVENT_DATE = "May 17, 2015";
        // JavaScript Document
        $(document).ready(function() {
            $("a[href^=http]").each(function() {
                var a = new RegExp('/' + window.location.host + '/');
                if(!a.test(this.href)) {
                    var href = $(this).attr("href");
                    var thisEvent = $(this).attr("onclick");
                    $(this).click(function(event) {
                        event.preventDefault();
                        ga('send', 'event', 'outbound', 'click', href, {'hitCallback':
                            function () {
                                document.location = href;
                            }
                         });
                    });
                }
            });

            try{Typekit.load();}catch(e){}
            $("#ctime").countdown({
                date: EVENT_DATE, // defined in base.html, from settings.EVENT_DATE["october 20, 2013"],
                htmlTemplate: "%{d}<span style=\"font-size:12px;\">days</span> %{h}<span style=\"font-size:12px;\">hrs</span> %{m}<span style=\"font-size:12px;\">min</span> %{s}<span style=\"font-size:12px;\">sec</span>",
                offset: 5,
                onComplete: function( event ){
                    $(this).html("Completed");
                },
                onPause: function( event, timer ){
                    $(this).html("Pause");
                },
                onResume: function( event ){
                    $(this).html("Resumed");
                },
                leadingZero: true
            });
        });
    </script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-47571352-2', 'smhhalfmarathon.com.au');
        ga('require', 'linkid', 'linkid.js');
        ga('send', 'pageview');
    </script>


        <script type='text/javascript'>
            var googletag = googletag || {};
            googletag.cmd = googletag.cmd || [];
            (function() {
                var gads = document.createElement('script');
                gads.async = true;
                gads.type = 'text/javascript';
                var useSSL = 'https:' == document.location.protocol;
                gads.src = (useSSL ? 'https:' : 'http:') + '//www.googletagservices.com/tag/js/gpt.js';
                var node = document.getElementsByTagName('script')[0];
                node.parentNode.insertBefore(gads, node);
            })();
        </script>

        <script type='text/javascript'>
            googletag.cmd.push(function() {
                googletag.defineSlot('/4320101/Sydney_Half_Site_Banner_A',[468,60],'div-gpt-ad-1396876181209-0').addService(googletag.pubads());
                googletag.defineSlot('/4320101/Sydney_Half_Site_Banner_B',[468,60],'div-gpt-ad-1396876181209-1').addService(googletag.pubads());
                googletag.defineSlot('/4320101/Sydney_Half_Site_Tile_1',[300,150],'div-gpt-ad-1396876181209-2').addService(googletag.pubads());
                googletag.defineSlot('/4320101/Sydney_Half_Site_Tile_2',[300,150],'div-gpt-ad-1396876181209-3').addService(googletag.pubads());
                googletag.defineSlot('/4320101/Sydney_Half_Site_Tile_3',[300,150],'div-gpt-ad-1396876181209-4').addService(googletag.pubads());
                googletag.defineSlot('/4320101/Sydney_Half_Site_Tile_4',[300,150],'div-gpt-ad-1396876181209-5').addService(googletag.pubads());
                googletag.defineSlot('/4320101/Sydney_Half_Site_Tile_5',[300,150],'div-gpt-ad-1396876181209-6').addService(googletag.pubads());
                googletag.defineSlot('/4320101/Sydney_Half_Site_Tile_Title_Sponsor',[300,150],'div-gpt-ad-1396876181209-7').addService(googletag.pubads());
                googletag.defineSlot('/4320101/Sydney_Half_Site_Tile_Title_Sponsor_2',[300,150],'div-gpt-ad-1396876181209-8').addService(googletag.pubads());
                googletag.pubads().enableSingleRequest();
                googletag.enableServices();
            });
        </script>


    </head>

    <body>


    <div id="header-adverts">
        <div class="inner">
            
                <!-- Sydney_Half_Site_Banner_A -->
                <div id='div-gpt-ad-1396876181209-0' style='width:468px; height:60px; float: left;'>
                    <script type='text/javascript'>googletag.cmd.push(function(){googletag.display('div-gpt-ad-1396876181209-0');});</script>
                </div>
                <!-- Sydney_Half_Site_Banner_B -->
                <div id='div-gpt-ad-1396876181209-1' style='width:468px; height:60px; float: right;'>
                    <script type='text/javascript'>googletag.cmd.push(function(){googletag.display('div-gpt-ad-1396876181209-1');});</script>
                </div>
            
        </div>
    </div>

    <header>
        <nav class="site-navigation">
            <div class="inner" style="padding: 0px;">
                <ul>
                    <li><a href="/" class="home"></a></li>
                    


        <li class="child descendant">
            
                <a>Race Centre</a>
            

            
                <ul>
                    
                        <li><a href="/enter/entry-details/">Enter</a></li>
                    
                        <li><a href="/race-centre/race-info/">Race Info</a></li>
                    
                        <li><a href="/race-centre/accommodation/">Accommodation</a></li>
                    
                        <li><a href="/race-centre/transport-faq/">Transport FAQ</a></li>
                    
                        <li><a href="/race-centre/relay-information/">Relay Information</a></li>
                    
                        <li><a href="/expo/">Expo</a></li>
                    
                        <li><a href="/race-centre/results/">Results</a></li>
                    
                        <li><a href="/race-centre/course-details/">Course Details</a></li>
                    
                        <li><a href="/race-centre/corporate-teams/">Corporate Teams</a></li>
                    
                        <li><a href="/race-centre/history/">History</a></li>
                    
                </ul>
            
        </li>

        <li class="child descendant">
            
                <a>Training</a>
            

            
                <ul>
                    
                        <li><a href="/training-plans/beginner/">Training Plans</a></li>
                    
                </ul>
            
        </li>

        <li class="child descendant">
            
                <a>Fundraising</a>
            

            
                <ul>
                    
                        <li><a href="/fundraising/gold-charity-entries/">Gold Charity Entries</a></li>
                    
                        <li><a href="/fundraising/raising-money/">Raising Money</a></li>
                    
                </ul>
            
        </li>

        <li class="child descendant">
            
                <a>Shop</a>
            

            
                <ul>
                    
                        <li><a href="/shop/marathon-photos/">Marathon-Photos</a></li>
                    
                        <li><a href="/shop/itab/">iTaB</a></li>
                    
                </ul>
            
        </li>

        <li class="child descendant">
            
                <a>News &amp; Media</a>
            

            
                <ul>
                    
                        <li><a href="/news-media/logos/">Logos</a></li>
                    
                </ul>
            
        </li>

        <li class="child descendant">
            
                <a>Partners</a>
            

            
                <ul>
                    
                        <li><a href="/partners-menu/partners/">Partners</a></li>
                    
                </ul>
            
        </li>


                    
                    <li style="float:right;"><a class='user-profile' href='http://www.realbuzzregistrations1.com/members/login-fairfax/'><span>User profile</span></a></li>
                </ul>
            </div>
        </nav>

        <div class="inner">
            
        

    <div id="banner" class="inner" style="background-image:url(http://rb-cms.s3.amazonaws.com/smh/uploads/banners/3876f3ca4275414f9a1b53690cfa83c988e5/large.jpg)">
        
            
        
        <div class="brand-logo">
            
                <a href="/" class="logo"><img src="http://rb-cms.s3.amazonaws.com/smh/uploads/logo/7abfbd8a42bfb841a6db040d1096564b6b08/normal.jpg" class="logo" alt="The Sydney Morning Herald Half Marathon"/></a>
            
            <p>Sunday, May 17, 2015</p>
        </div>
        <div class="page-title">
            <a href="/enter/" style="color:#FFF;">
            Australia&#39;s Premier Half Marathon
            </a>
        </div>
    </div>

            


        <script type="text/javascript" src="https://rb-cms.s3.amazonaws.com/live/static/base/js/everydayhero.68eff5db2356.js"></script>
        
            <script type="text/javascript">
                $(document).ready(function() {
                    var offset;
                    
                    var edh = 'smh2015halfmarathon';

                    var api = new EverydayHero({resource: 'event_total', id: edh});
                    api.total(function(total) {
                        var newTotal = Number(total.replace(/[^0-9\.]+/g, ""));
                        if (offset) {
                            newTotal += offset;
                            newTotal = parseFloat(Math.round(newTotal * 100) / 100).toFixed(2);
                        }
                        var formattedTotal = newTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        var text = "Funds Raised :  $" + formattedTotal;
                        $('div#edh-counter').text(text);
                    });
                });
            </script>
        


    <div id="widgetbar" class="inner">
        <div>
            <div class="widget-socialmedia">
                <a target="_blank" href="https://www.facebook.com/smhhalfmarathon" class="facebook"></a>
                <a target="_blank" href="https://twitter.com/sydhalfmarathon" class="twitter"></a>
                <a target="_blank" href="http://instagram.com/smhhalfmarathon" class="instagram"></a>
                <a target="_blank" href="mailto:halfmarathon@fairfaxmedia.com.au" class="mail"></a>
            </div>
            <div class="widget-countdown">
                <div class="timer"></div>
                <span id="ctime"></span>
            </div>
            
                <a style="color: #FFF;" href="http://everydayhero.com.au/event/smh2015halfmarathon" target="_blank"><div class="widget-funds" id="edh-counter"></div></a>
            
        </div>
    </div>
        </div>
    </header>


        <div id="hp-features">
            <ul id="boxes" class="inner">
                <li>
                    <img src="http://rb-cms.s3.amazonaws.com/smh/uploads/homepage_box/25240153934aad41caf8d35010b17f213060/normal.jpg" alt="Corporate Team Program" />

    <h2>Corporate Team Program</h2>

    <p><a class="btn2" href="http://www.smhhalfmarathon.com.au/race-centre/corporate-teams/">More Information</a></p>

    <div class="bottomblock"></div>
                </li>
                <li>
                    <img src="http://rb-cms.s3.amazonaws.com/smh/uploads/homepage_box/789a2dd3bfe98a4addfb3cebd3908b59b357/normal.jpg" alt="Gold Charity Entries" />

    <h2>Gold Charity Entries</h2>

    <p><a class="btn-highlight" href="fundraising/gold-charity-entries/">Apply Now</a></p>

    <div class="bottomblock"></div>
                </li>
                <li>
                    <img src="http://rb-cms.s3.amazonaws.com/smh/uploads/homepage_box/2766e224ae116845587ab88b98d1a4f45505/normal.jpg" alt="Enter 2015" />

    <h2>Enter 2015</h2>

    <p><a class="btn2" href="http://www.realbuzzregistrations1.com/events/fairfax/the-2015-smh-half/details">Enter Now</a></p>

    <div class="bottomblock"></div>
                </li>
            </ul>
        </div><!--features-->

        <div class="inner">
            <div class="hp-featured-sponsors">
                

    <script type="text/javascript">
        $(document).ready(function() {

            var slider = $('.featured-sponsor-slider').bxSlider({
                auto: true,
                controls: true,
                pause: 5000,
                onSlideBefore: function() {
                    $('.featured-sponsor-slide-info').fadeOut();
                },
                onSlideAfter: function($slideElement, oldIndex, newIndex){
                    
                        if(newIndex == 0) {
                            $('.featured-sponsor-slide-info').fadeIn();
                            $('.featured-sponsor-slide-info h2').text("Keep running...");
                            $('.featured-sponsor-slide-info p').html("Challenge yourself on Sunday, August 10 with The <i>Sun-Herald</i> City2Surf presented by Westpac. Since 1971, the world's largest run has united participants from all over the globe. Whether you’re a serious runner, casual jogger or want to join in for the first time, City2Surf is the one to run.");
                            $('.featured-sponsor-slide-info a').attr("href", "http://www.city2surf.com.au/").text("View the The Sun-Herald City2Surf presented by Westpac");
                            
                            $('.featured-sponsor-slide-info a').removeAttr("target");
                            

                        }
                    
                        if(newIndex == 1) {
                            $('.featured-sponsor-slide-info').fadeIn();
                            $('.featured-sponsor-slide-info h2').text("Run the streets of Melbourne");
                            $('.featured-sponsor-slide-info p').html("Entries now open for The <i>Sunday Age</i> City2Sea presented by Westpac, to be held on Sunday, November 16, 2014. Runners, joggers, pram pushers and walkers can all get involved as part of the 5km fun run or take on the brand new 14km course.");
                            $('.featured-sponsor-slide-info a').attr("href", "http://www.thecity2sea.com.au/").text("Enter the City2Sea now");
                            
                            $('.featured-sponsor-slide-info a').removeAttr("target");
                            

                        }
                    
                        if(newIndex == 2) {
                            $('.featured-sponsor-slide-info').fadeIn();
                            $('.featured-sponsor-slide-info h2').text("The Canberra Times Fun Run");
                            $('.featured-sponsor-slide-info p').html("Now in its 38th year, <i>The Canberra Times</i> Fun Run presented by Westpac, returns on Sunday, September 7, 2014. Runners, joggers, pram pushers and walkers can all get involved while taking in the iconic local sites as part of the 14km, 10km run or adidas 5km walk or run.");
                            $('.featured-sponsor-slide-info a').attr("href", "http://www.canberratimesfunrun.com.au/").text("Find out more");
                            
                            $('.featured-sponsor-slide-info a').removeAttr("target");
                            

                        }
                    
                }
            });

            slider.startAuto();

            // Stop the slider when a modal is open
            $('.cms_plugin').on('dblclick', function(event) {
                slider.stopAuto();
            });

            $('a[href*="/djangocms_site_settings/sitesettings/"]').on('click', function(event) {
                slider.stopAuto();
            });

            $('a[href*="/djangocms_advert_system/advert/"]').on('click', function(event) {
                slider.stopAuto();
            });

            $('a[href*="/djangocms_advert_system/advert/add/"]').on('click', function(event) {
                slider.stopAuto();
            });

            // Restart the slider when the modal is closed
            $('.cms_modal-buttons, .cms_modal-close').on('click', function(event) {
                slider.startAuto();
            });
        });
    </script>

    <ul class="featured-sponsor-slider">
        
            <li>
                <img src="http://rb-cms.s3.amazonaws.com/smh/uploads/slider/100a1301caea9b4d62b960a43ad292ff28d7/normal.jpg" />
            </li>
        
            <li>
                <img src="http://rb-cms.s3.amazonaws.com/smh/uploads/slider/b74b5af7a690b447fd8b16669ae43113985b/normal.jpg" />
            </li>
        
            <li>
                <img src="http://rb-cms.s3.amazonaws.com/smh/uploads/slider/90b06540f7eabe41e0cb92186e98f40e13cb/normal.jpg" />
            </li>
        
    </ul>

        
            <div class="featured-sponsor-slide-info">
                <h2>Keep running...</h2>
                <p>Challenge yourself on Sunday, August 10 with The <i>Sun-Herald</i> City2Surf presented by Westpac. Since 1971, the world's largest run has united participants from all over the globe. Whether you’re a serious runner, casual jogger or want to join in for the first time, City2Surf is the one to run.</p>
                <a href="http://www.city2surf.com.au/">View the The Sun-Herald City2Surf presented by Westpac</a>
            </div>
        

        

        

            </div>
            <div class="hp-sponsor-pre-footer-adverts" style="width: 100%; float: left; margin: 10px 0;">
                

            </div>
            


    <div id="sponsors">
        <div id="sponsorslist">
            <ul class="sponsors-slider">
                



    <li style="margin-left: 20px; margin-right: 20px;">

    <a href="/click-tracker/16046/" target="_blank">
        
            <img src="http://rb-cms.s3.amazonaws.com/smh/uploads/tracker/f43da2177ee1cb451acaaa6c91ce7cd1033a/large.jpg" alt="Adidas" height="50">
        
    </a>

    </li>





    <li style="margin-left: 20px; margin-right: 20px;">

    <a href="/click-tracker/16050/" target="_blank">
        
            <img src="http://rb-cms.s3.amazonaws.com/smh/uploads/tracker/b93dca100708774a849abfc4d25de2dfd25a/large.jpg" alt="Skins" height="50">
        
    </a>

    </li>





    <li style="margin-left: 20px; margin-right: 20px;">

    <a href="/click-tracker/16047/" target="_blank">
        
            <img src="http://rb-cms.s3.amazonaws.com/smh/uploads/tracker/e85f80a930571a4b4f8be4d5f5ad24475f04/large.jpg" alt="Seiko" height="50">
        
    </a>

    </li>





    <li style="margin-left: 20px; margin-right: 20px;">

    <a href="/click-tracker/16048/" target="_blank">
        
            <img src="http://rb-cms.s3.amazonaws.com/smh/uploads/tracker/3584e495b5fde541d8b9e5538f8e910b3b26/large.jpg" alt="Rebel" height="50">
        
    </a>

    </li>





    <li style="margin-left: 20px; margin-right: 20px;">

    <a href="/click-tracker/16049/" target="_blank">
        
            <img src="http://rb-cms.s3.amazonaws.com/smh/uploads/tracker/0c378cd36be4004409db74e4fa9c9a2ff0c3/large.jpg" alt="Gatorade" height="50">
        
    </a>

    </li>


            </ul>
        </div>
    </div>
        </div>


    <div id="footer">
        <div class="inner">
            <div class="sitemap">
                <h3>Sitemap</h3>
                <ul>
                    


        <li class="child descendant">
            
                <a href="/enter/entry-details/">Race Centre</a>
            
        </li>

        <li class="child descendant">
            
                <a href="/training-plans/beginner/">Training</a>
            
        </li>

        <li class="child descendant">
            
                <a href="/fundraising/gold-charity-entries/">Fundraising</a>
            
        </li>

        <li class="child descendant">
            
                <a href="/shop/merchandise/">Shop</a>
            
        </li>

        <li class="child descendant">
            
                <a href="/news-media/logos/">News &amp; Media</a>
            
        </li>

        <li class="child descendant">
            
                <a href="/partners-menu/partners/">Partners</a>
            
        </li>

                </ul>
            </div><!--sitemap-->
            <div class="otherevents">
                <h3>Other Events</h3>
                <ul>
                    <a href="http://www.swanriverrun.com.au/" target="_blank">swanriverrun.com.au</a>
    <a href="http://www.city2surf.com.au/" target="_blank">city2surf.com.au</a>
    <a href="http://www.thecity2sea.com.au/" target="_blank">thecity2sea.com.au</a>
    <a href="http://www.city2south.com.au/" target="_blank">city2south.com.au</a>
    <a href="http://www.runsydney.com/" target="_blank">runsydney.com</a>
    <a href="http://www.canberratimesfunrun.com.au/" target="_blank">canberratimesfunrun.com.au</a>
    <a href="http://www.runningfestival.com.au/" target="_blank">runningfestival.com.au</a>
    <a href="http://www.coleclassic.com.au/" target="_blank">coleclassic.com.au</a>
    <a href="http://www.goodfoodmonth.com/" target="_blank">goodfoodmonth.com</a>
    <a href="http://www.growersmarketpyrmont.com.au/" target="_blank">growersmarketpyrmont.com.au</a>
    <a href="http://www.nswfoodandwine.com.au/" target="_blank">nswfoodandwine.com.au</a>
    <a href="http://www.thesurfswim.com.au/" target="_blank">thesurfswim.com.au</a>
    <a href="http://www.sunrun.com.au/" target="_blank">sunrun.com.au</a>

                </ul>
            </div><!--otherevents-->
            <div class="contactus">
                <h3>Contact Us</h3>
                <ul>
                    <li><a target="_blank" href="mailto:halfmarathon@fairfaxmedia.com.au">Email halfmarathon@fairfaxmedia.com.au</a></li>
                    <li><a target="_blank" href="https://twitter.com/sydhalfmarathon">Twitter</a></li>
                    <li><a target="_blank" href="https://www.facebook.com/smhhalfmarathon">Facebook</a></li>
                    <li><a target="_blank" href="http://instagram.com/smhhalfmarathon">Instagram</a></li>
                </ul>
            </div><!--contactus-->
        </div><!--footer class-->
    </div><!--footer-->

    <div id="sub-footer">
        <div class="inner">
            <div class="copyright">
                <span class="copyright-branding">&copy; 2014 All Rights Reserved</span>
            </div>
            <a target="_blank" class="events-company-logo" href="http://www.fairfaxevents.com.au/"><img src="https://rb-cms.s3.amazonaws.com/live/static/smh/img/fairfax_events_white_sml.8ac056f64508.png" alt="Fairfax Events" /></a>
        </div><!--copyright class-->
    </div><!--copyright-->




    <!--  onother test site -->



    <object class="BLOGGER-youtube-video" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" data-thumbnail-src="https://i.ytimg.com/vi/GN3Fv9qjnbg/0.jpg" height="466" width="620"><param name="movie" value="https://www.youtube.com/v/GN3Fv9qjnbg?version=3&f=user_uploads&c=google-webdrive-0&app=youtube_gdata" /><param name="bgcolor" value="#FFFFFF" /><param name="allowFullScreen" value="true" /><embed width="620" height="466"  src="https://www.youtube.com/v/GN3Fv9qjnbg?version=3&f=user_uploads&c=google-webdrive-0&app=youtube_gdata" type="application/x-shockwave-flash" allowfullscreen="true"></embed></object>














    </body>
    </html>
<?php } ?>