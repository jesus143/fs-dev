<?php
    require ("fs_folders/php_functions/connect.php"); 
    require ("fs_folders/php_functions/function.php");
    require ("fs_folders/php_functions/library.php");
    require ("fs_folders/php_functions/source.php");
    require ("fs_folders/php_functions/myclass.php");   
  	$mc = new myclass();  
  	$pa = new postarticle ( );
  	$sc = new scrape();    

 
  	// $sc->update_url('United State','EST'); 
  	// echo"<hr>";
  	// $sc->update_url('philippines','UTC'); 
  	// echo"<hr>";
  	// $sc->update_url('brazil','BRST'); 
  	// echo"<hr>";




	// $sc->get_time_zone_time('http://www.timeanddate.com/time/zones/est');
    //  echo"<hr>";


   
  	// $sc->get_time_zone_time('http://www.timeanddate.com/worldclock/usa/new-york',$mc); 
  	// $sc->get_time_zone_time('http://www.timeanddate.com/worldclock/brazil/sao-paulo',$mc); 
  	// $sc->get_time_zone_time('http://www.timeanddate.com/worldclock/philippines/manila',$mc); 
    // $sc->get_time_zone_time('http://www.timeanddate.com/worldclock/uk/london',$mc);  


  	// array( 
  	// 	'EST'=>'http://www.timeanddate.com/worldclock/usa/new-york',
  	// 	'BRST'=>'http://www.timeanddate.com/worldclock/brazil/sao-paulo',
 	 //   	'UTC'=>'http://www.timeanddate.com/worldclock/philippines/manila',
  	// 	'GMT'=>'http://www.timeanddate.com/worldclock/uk/london',  
  	// 	'CET'=>'http://www.timeanddate.com/worldclock/germany/berlin',
  	// )






   


  	// echo " time zone   = $sc->url <br>";
  	// echo " server time = $sc->ServerTime <br>";



  	

// UNITED STATES (349797)
// BRAZIL (121089)
// PHILIPPINES (115388)
// UNITED KINGDOM (103551)
// GERMANY (69288)
// CHINA (58787)
// CANADA (56926)
// POLAND (48698)
// FRANCE (47658)
// TAIWAN (40687)
// THAILAND (39982)
// AUSTRALIA (36568)
// MEXICO (35446)
// INDONESIA (34908)
// RUSSIAN FEDERATION (34284)
// ITALY (30274)
// SPAIN (29390)
// NETHERLANDS (27728)
// VIETNAM (23624)
// MOROCCO (21835)
// ROMANIA (21831)
// SWEDEN (21552)
// MALAYSIA (20897)
// SINGAPORE (20146)
// TURKEY (18541)
// HONG KONG (15623)
// JAPAN (15175)
// KOREA (14416)
// PORTUGAL (12941)
// UKRAINE (12065)
// INDIA (11791)
// NORWAY (10921)
// BELGIUM (10231)
// ARGENTINA (10013)
// DENMARK (9722)
// COLOMBIA (9577)
// CZECH REPUBLIC (9428)
// FINLAND (8884)
// SWITZERLAND (8824)
// PERU (8726)
// NEW ZEALAND (8522)
// HUNGARY (8480)
// GREECE (8475)
// AFGHANISTAN (8211)
// CHILE (8144)
// IRELAND (8108)
// SOUTH AFRICA (7501)
// AUSTRIA (7152)
// ISRAEL (6484)
// LITHUANIA (5651)
// SLOVAKIA (4518)
// SAUDI ARABIA (4241)
// CROATIA (3960)
// VENEZUELA (3841)
// SERBIA (3695)
// UNITED ARAB EMIRATES (3063)
// LATVIA (3010)
// EUROPE (2914)
// EGYPT (2855)
// BOSNIA AND HERZEGOVINA (2682)
// BELARUS (2579)
// BULGARIA (2530)
// KAZAKHSTAN (2243)
// SLOVENIA (2207)
// URUGUAY (2066)
// ESTONIA (2031)
// ALGERIA (2024)
// MOLDOVA (1984)
// PUERTO RICO (1960)
// COSTA RICA (1802)
// ALBANIA (1644)
// ECUADOR (1601)
// GEORGIA (1573)
// PAKISTAN (1533)
// MONGOLIA (1521)
// MACEDONIA (1434)
// TUNISIA (1429)
// DOMINICAN REPUBLIC (1382)
// SATELLITE PROVIDER (1300)
// ICELAND (1265)
// NIGERIA (1244)
// NEPAL (1152)
// BANGLADESH (1143)
// GUATEMALA (1078)
// MALTA (993)
// ARMENIA (990)
// EL SALVADOR (904)
// KENYA (896)
// BOLIVIA (883)
// AZERBAIJAN (824)
// MACAU (824)
// LUXEMBOURG (812)
// CYPRUS (754)
// KUWAIT (753)
// QATAR (736)
// PANAMA (695)
// HONDURAS (658)
// IRAQ (638)
// LEBANON (579)
// JAMAICA (575)










   











/*
* timezone: https://www.google.com.ph/?gfe_rd=cr&ei=FkKaVJWBOoaL8Qf7koHQCg&gws_rd=ssl#q=MANILA+url
*
*/
get_time_zone('NEW YORK');
function get_time_zone($capital_city){ 
  $url='';
  $timezone='';
  switch ($capital_city){ 
    case 'NEW YORK':
          /* nyc,york,new york
          * 24720 = limit 505 
          */ 
          $url='EST';
          $timezone='http://www.timeanddate.com/worldclock/usa/new-york';
        break;
    case 'LONDON':
          /*
          * 22,242 = 463 
          */
          $url='GMT';
          $timezone='http://www.timeanddate.com/worldclock/uk/london';
        break;
    case 'CALIFORNIA':
         /*
          * 21528 = 448
          */
          $url='PST';
          $timezone='http://www.timeanddate.com/worldclock/usa/los-angeles';
        break;
    case 'MANILA':
         /*
          * 20890 = 435
          */
         $url='PHT';
         $timezone='http://www.timeanddate.com/worldclock/philippines/manila';
        break;
    case 'LOS ANGELES':
         $url='PST';
         $timezone='http://www.timeanddate.com/worldclock/usa/los-angeles';
        break;
    case 'SÃO PAULO':
          $url='BRST';
          $timezone='http://www.timeanddate.com/worldclock/brazil/sao-paulo';
        break;
    case 'BANGKOK':
          $url='http://www.timeanddate.com/worldclock/thailand/bangkok';
          $timezone='ICT';
        break;
    case 'TAIPEI':
          $url='http://www.timeanddate.com/worldclock/taiwan/taipei';
          $timezone='CST';
        break;
    case 'PARIS':
        $url='http://www.timeanddate.com/worldclock/france/paris';
        $timezone='CET';
      break;
    case 'TORONTO':
        $url='http://www.timeanddate.com/worldclock/canada/toronto';
        $timezone='EST';
      break;
    case 'SINGAPORE':
        $url='http://www.timeanddate.com/worldclock/singapore/singapore';
        $timezone='SGT';
      break;
    case 'RIO DE JANEIRO':
        $url='http://www.timeanddate.com/worldclock/brazil/rio-de-janeiro';
        $timezone='BRST';
      break;
    case 'JAKARTA':
        $url='https://www.timeanddate.com/worldclock/indonesia/jakarta';
        $timezone='WIB';
      break;
    case 'FLORIDA':
        $url='https://www.timeanddate.com/worldclock/usa/miami';
        $timezone='EST';
      break;
    case 'SYDNEY':
        $url='http://www.timeanddate.com/worldclock/australia/sydney';
        $timezone='AEDT';
      break;
    case 'TEXAS':
        $url='http://www.timeanddate.com/worldclock/usa/houston';
        $timezone='CST';
      break;
    case 'MELBOURNE':
        $url='http://www.timeanddate.com/worldclock/australia/melbourne';
        $timezone='EDT';
      break;
    case 'MOSCOW':
        $url='http://www.timeanddate.com/worldclock/russia/moscow';
        $timezone='MSK';
      break;
    case 'HONG KONG':
        $url='http://www.timeanddate.com/worldclock/hong-kong/hong-kong';
        $timezone='HKT';
      break;
    case 'SAN FRANCISCO':
        $url='https://www.timeanddate.com/worldclock/usa/san-francisco';
        $timezone='PST';
      break;
    case 'MEXICO CITY':
        $url='http://www.timeanddate.com/worldclock/mexico/mexico-city';
        $timezone='CST';
      break;
    case 'VANCOUVER':
        $url='http://www.timeanddate.com/worldclock/canada/vancouver';
        $timezone='PST';
      break;
    case 'HANOI':
        $url='http://www.timeanddate.com/worldclock/vietnam/hanoi';
        $timezone='ICT';
      break;
    case 'MONTREAL':
        $url='http://www.timeanddate.com/worldclock/canada/montreal';
        $timezone='EST';
      break;
    case 'SEOUL':
        $url='http://www.timeanddate.com/worldclock/south-korea/seoul';
        $timezone='KST';
      break;
    case 'LIMA':
        $url='http://www.timeanddate.com/worldclock/peru/lima';
        $timezone='PET';
      break;
    case 'BERLIN':
        $url='http://www.timeanddate.com/worldclock/germany/berlin';
        $timezone='CET';
      break;
    case 'ISTANBUL':
        $url='http://www.timeanddate.com/worldclock/turkey/istanbul';
        $timezone='EET';
      break;
    case 'WASHINGTON':
        $url='https://www.timeanddate.com/worldclock/usa/seattle';
        $timezone='PST';
      break;
    case 'CHICAGO':
        $url='http://www.timeanddate.com/worldclock/usa/chicago';
        $timezone='CST';
      break;
    case 'AMSTERDAM':
        $url='http://www.timeanddate.com/worldclock/netherlands/amsterdam';
        $timezone='CET';
      break;
    case 'WARSAW':
        $url='http://www.timeanddate.com/worldclock/poland/warsaw';
        $timezone='CET';
      break;
    case 'BUENOS AIRES':
        $url='http://www.timeanddate.com/worldclock/argentina/buenos-aires';
        $timezone='ART';
      break;
    case 'NEW JERSEY':
        $url='http://www.timeanddate.com/worldclock/usa/newark';
        $timezone='EST';
      break;
    case 'ATLANTA':
        $url='http://www.timeanddate.com/worldclock/usa/atlanta';
        $timezone='EST';
      break;
    case 'MADRID':
        $url='http://www.timeanddate.com/worldclock/spain/madrid';
        $timezone='CET';
      break;
    case 'BUCHAREST':
        $url='http://www.timeanddate.com/worldclock/romania/bucharest';
        $timezone='EET';
      break;
    case 'ILLINOIS':
        $url='http://www.timeanddate.com/worldclock/usa/chicago';
        $timezone='CST';
      break;
    case 'BOGOTA':
        $url='http://www.timeanddate.com/worldclock/colombia/bogota';
        $timezone='COT';
      break;
    case 'STOCKHOLM':
        $url='http://www.timeanddate.com/worldclock/sweden/stockholm';
        $timezone='CET';
      break;
    case 'TOKYO':
        $url='http://www.timeanddate.com/worldclock/japan/tokyo';
        $timezone='JST';
      break;
    case 'SANTIAGO':
        $url='http://www.timeanddate.com/worldclock/chile/santiago';
        $timezone='CLST';
      break;
    case 'VIRGINIA':
        $url='http://www.timeanddate.com/worldclock/usa/richmond';
        $timezone='EST';
      break;
    case 'BEIJING':
        $url='http://www.timeanddate.com/worldclock/china/beijing';
        $timezone='CST';
      break;
    case 'GEORGIA':
        $url='http://www.timeanddate.com/worldclock/usa/atlanta';
        $timezone='EST';
      break;
    case 'PHILADELPHIA':
        $url='http://www.timeanddate.com/worldclock/usa/philadelphia';
        $timezone='EST';
      break;
    case 'SHANGHAI':
        $url='https://www.timeanddate.com/worldclock/china/shanghai';
        $timezone='CST';
      break;
    case 'BOSTON':
        $url='https://www.timeanddate.com/worldclock/usa/boston';
        $timezone='EST';
      break;
    case 'MICHIGAN':
        $url='http://www.timeanddate.com/worldclock/usa/detroit';
        $timezone='EST';
      break;
    case 'MILAN':
        $url='https://www.timeanddate.com/worldclock/italy/milan';
        $timezone='CET';
      break;
    case 'HOUSTON':
        $url='http://www.timeanddate.com/worldclock/usa/houston';
        $timezone='CST';
      break;
    case 'OHIO':
        $url='http://www.timeanddate.com/worldclock/usa/cleveland';
        $timezone='EST';
      break;
    case 'SEATTLE':
        $url='https://www.timeanddate.com/worldclock/usa/seattle';
        $timezone='PST';
      break;
    case 'NORTH CAROLINA':
        $url='http://www.timeanddate.com/worldclock/usa/raleigh';
        $timezone='EST';
      break;
    case 'SAN DIEGO':
        $url='https://www.timeanddate.com/worldclock/usa/san-diego';
        $timezone='PST';
      break;
    case 'KRAKOW':
        $url='http://www.timeanddate.com/worldclock/poland/krakow';
        $timezone='CET';
      break;
    case 'MASSACHUSETTS':
        $url='http://www.timeanddate.com/worldclock/usa/boston';
        $timezone='EST';
      break;
    case 'MUNICH':
        $url='https://www.timeanddate.com/worldclock/germany/munich';
        $timezone='CET';
      break;
    case 'PRAGUE':
        $url='http://www.timeanddate.com/worldclock/czech-republic/prague';
        $timezone='CET';
      break;
    case 'PENNSYLVANIA':
        $url='http://www.timeanddate.com/worldclock/usa/pittsburgh';
        $timezone='EST';
      break;
    case 'ATHENS':
        $url='http://www.timeanddate.com/worldclock/greece/athens';
        $timezone='EET';
      break;
    case 'BRISBANE':
        $url='http://www.timeanddate.com/worldclock/australia/brisbane';
        $timezone='AEST';
      break;
    case 'MARYLAND':
        $url='http://www.timeanddate.com/worldclock/usa/baltimore';
        $timezone='EST';
      break;
    case 'ARIZONA':
        $url='http://www.timeanddate.com/worldclock/usa/phoenix';
        $timezone='MST';
      break;
    case 'LAS VEGAS':
        $url='http://www.timeanddate.com/worldclock/usa/las-vegas';
        $timezone='PST';
      break;
    case 'SALVADOR':
        $url='http://www.timeanddate.com/worldclock/brazil/salvador';
        $timezone='BRT';
      break;
    case 'DALLAS':
        $url='http://www.timeanddate.com/worldclock/usa/dallas';
        $timezone='CST';
      break;
    case 'PORTLAND':
        $url='https://www.timeanddate.com/worldclock/usa/portland-or';
        $timezone='PST';
      break;
    case 'AUSTIN':
        $url='http://www.timeanddate.com/worldclock/usa/austin';
        $timezone='CST';
      break;
    case 'DELHI':
        $url='http://www.timeanddate.com/worldclock/india/new-delhi';
        $timezone='IST';
      break;
    case 'MINNESOTA':
        $url='https://www.timeanddate.com/worldclock/usa/minneapolis';
        $timezone='CST';
      break;
    case 'SAINT PETERSBURG':
        $url='https://www.timeanddate.com/worldclock/russia/saint-peterburg';
        $timezone='MSK';
      break;
    case 'BROOKLYN':
        $url='https://www.timeanddate.com/time/zone/usa/new-york';
        $timezone='EST';
      break;
    case 'DUBAI':
        $url='http://www.timeanddate.com/worldclock/united-arab-emirates/dubai';
        $timezone='GST';
      break;
    case 'COLORADO':
        $url='http://www.timeanddate.com/worldclock/usa/denver';
        $timezone='MST';
      break;
    case 'COPENHAGEN':
        $url='http://www.timeanddate.com/worldclock/denmark/copenhagen';
        $timezone='CET';
      break;
    case 'TENNESSEE':
        $url='https://www.timeanddate.com/worldclock/usa/nashville';
        $timezone='CST';
      break;
    case 'WISCONSIN':
        $url='https://www.timeanddate.com/worldclock/usa/milwaukee';
        $timezone='CST';
      break;
    case 'BRUSSELS':
        $url='http://www.timeanddate.com/worldclock/belgium/brussels';
        $timezone='CET';
      break;
    case 'ALABAMA':
        $url='https://www.timeanddate.com/worldclock/usa/montgomery';
        $timezone='CST';
      break;
    case 'FRANKFURT':
        $url='http://www.timeanddate.com/worldclock/germany/frankfurt';
        $timezone='CET';
      break;
    case 'JOHANNESBURG':
        $url='http://www.timeanddate.com/worldclock/south-africa/johannesburg';
        $timezone='SAST';
      break;
    case 'INDIANA':
        $url='http://www.timeanddate.com/worldclock/usa/indianapolis';
        $timezone='EST';
      break;
    case 'MISSOURI':
        $url='http://www.timeanddate.com/worldclock/usa/st-louis';
        $timezone='CST';
      break;
    case 'OREGON':
        $url='https://www.timeanddate.com/worldclock/usa/portland-or';
        $timezone='PST';
      break;
    case 'CONNECTICUT':
        $url='http://www.timeanddate.com/worldclock/usa/hartford';
        $timezone='EST';
      break; 
    case 'ORANGE COUNTY':
        $url='https://www.timeanddate.com/worldclock/usa/orange';
        $timezone='PST';
      break;
    case 'BALTIMORE':
        $url='http://www.timeanddate.com/worldclock/usa/baltimore';
        $timezone='EST';
      break;
    case 'WASHINGTON, D.C.':
        $url='http://www.timeanddate.com/worldclock/usa/washington-dc';
        $timezone='EST';
      break;
    case 'CAIRO':
        $url='http://www.timeanddate.com/worldclock/egypt/cairo';
        $timezone='EET';
      break;
    case 'HAWAII':
        $url='http://www.timeanddate.com/worldclock/usa/honolulu';
        $timezone='HAST';
      break;
    case 'SAN JOSE':
        $url='http://www.timeanddate.com/worldclock/usa/san-jose';
        $timezone='PST';
      break;
    case 'UTAH':
        $url='http://www.timeanddate.com/worldclock/usa/salt-lake-city';
        $timezone='MST';
      break;
    case 'LOUISIANA':
        $url='http://www.timeanddate.com/worldclock/usa/new-orleans';
        $timezone='CST';
      break;
    case 'KANSAS':
        $url='https://www.timeanddate.com/worldclock/usa/wichita';
        $timezone='CST';
      break;
    case 'OKLAHOMA':
        $url='https://www.timeanddate.com/worldclock/usa/oklahoma-city';
        $timezone='CST';
      break;
    case 'ANTWERP':
        $url='http://www.timeanddate.com/worldclock/belgium/antwerp';
        $timezone='CET';
      break;
    case 'SOUTH CAROLINA':
        $url='https://www.timeanddate.com/worldclock/usa/columbia';
        $timezone='EST';
      break;
    case 'GUANGZHOU':
        $url='http://www.timeanddate.com/worldclock/china/guangzhou';
        $timezone='CST';
      break;
    case 'CARACAS':
        $url='http://www.timeanddate.com/worldclock/venezuela/caracas';
        $timezone='VET';
      break;
    default:
      break;      
  }
  echo "url = $url  timezone = $timezone <br> ";  
}














?>

?>


<h1> This is to update the country time</h1>

<?php  	//$mc->print_r1($response);   ?>