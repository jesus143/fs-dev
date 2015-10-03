<?php
    require ("../../../fs_folders/php_functions/connect.php");
    require ("../../../fs_folders/php_functions/function.php");
    require ("../../../fs_folders/php_functions/library.php");
    require ("../../../fs_folders/php_functions/source.php");
    require ("../../../fs_folders/php_functions/myclass.php");

    $mc = new myclass();
    $_SESSION['mno'] = $mc->get_cookie( 'mno' , 136 );
    $mno = $mc->get_cookie( 'mno' , 136 );

    $pagenum      = intval($_GET['pagenum']);
    $rate_style   = mysql_real_escape_string($_GET['rate_style']);
    $rate_looks   = $_GET['rate_looks'];
    $rate_status  = $_GET['rate_status'];
    $rate_limit   = intval($_GET['rate_limit']);
    $retrievedas  = !empty( $_GET['retrievedas'] ) ? $_GET['retrievedas'] : null ;

    $rate_style        = $_GET['rate_style'];
    $rate_gender       = $_GET['rate_gender'];
    $rate_plus_blogger = $_GET['rate_plus_blogger'];
    $rate_latest       = $_GET['rate_latest'];
    $rate_status       = $_GET['rate_status'];
    $table_name        = $_GET['rate_table_name'];
    $rate_look_topic   = ($_GET['rate_look_topic'] == 'Select Topic') ? '' : $_GET['rate_look_topic'];


    echo "
        rate_style = $rate_style      <br>
        rate_gender = $rate_gender        <br>
        rate_plus_blogger = $rate_plus_blogger  <br>
        rate_latest = $rate_latest       <br>
        rate_status = $rate_status <br>
        table_name  = $table_name  <br>
        rate_look_topic =  $rate_look_topic <br>
    ";
    echo "rating pages <br>";

    echo " <span  style='color:black'> "; 
        switch ($retrievedas) {
            case 'rate-next-prev': 
                echo "<h4> next prev numbers </h4><br>"; 
                //this is set that the user can't view his own modal uploaded because of mno<>$mno
                // if ($rate_style == 'All Style') {
                //     $looks = select_v3(
                //         'postedlooks',
                //         '*',
                //         "active = 1 and mno <> $mno "
                //     );
                // } else {
                //     $looks = select_v3(
                //         'postedlooks',
                //         '*',
                //         "active = 1 and  style = '$rate_style' and mno <> $mno"
                //     );
                // }

                /** Fetch modals if looks or article */
               $looks = $mc->get_looks_filtered(
                   $mno,
                   $rate_style,
                   $rate_gender,
                   $rate_plus_blogger,
                   $mc->get_rate_looks_order_by($rate_latest),
                   0,
                   $rate_limit,
                   $table_name,
                   $rate_look_topic
                );

                /** Fetch look or article by basic all sortings */
                //$mylookrated = $mc->get_all_my_rated_looks_by_month($mno, $mc->date_dif['month_firstday'], $rate_status, $table_name);


                /**
                 * To filter the
                 */
                // $plnos = $mc->remove_rated_looks( $looks , $mylookrated ,  $rate_status  );
                //$plnos = $mc->ratedUnrated($looks, $mylookrated, $rate_status, $table_name);


                /**
                 * display the next prev numbers
                 * arrow left and right
                 */
                $tres = count($looks);
                $np = $mc->generate_next_prev_numbers(intval($tres), $rate_limit);
                echo "<nextprev1>";
                $mc->print_next_prev_numbers($np, null, 'rate-look', 'loader-down');
                echo "<nextprev1>";
                echo "<nextprev2>";
                $mc->print_next_prev_numbers($np, null, 'rate-look', 'loader-up');
                echo "<nextprev2>";
                echo "<span style='display:none' ><tres>$tres<tres></span>";
                break;
            default:


                echo " this is the page rating..";

                echo "<h4> modals display </h4><br>";
                // modals
                $start = $mc->get_loop_start($pagenum, $rate_limit);
                $end = $mc->get_loop_end($pagenum, $rate_limit);
                $counter = $mc->set_loop_counter(1);

                /** Fetch look or article by basic all sortings */
                $orderby = $mc->get_rate_looks_order_by($rate_latest);
                $mylookrated = $mc->get_all_my_rated_looks_by_month($mno, $mc->date_dif['month_firstday'], $rate_status, $table_name);

                // print_r($mylookrated);
                /*
                    echo " <br>my look rated by this month <br>";
                    $c=0;
                    for ($i=0; $i < count($mylookrated) ; $i++) {
                        $c++;
                        echo "  $c.)  ".$mylookrated[$i]['plno'].'<br>';
                    }
                */

                #get look with filter
                //                echo "
                //                            rate_style = $rate_style      <br>
                //                            rate_gender = $rate_gender        <br>
                //                            rate_plus_blogger = $rate_plus_blogger  <br>
                //                            rate_latest = $rate_latest       <br>
                //                            rate_status = $rate_status <br>
                //                         ";
                //
                //
                //                echo "My Rated looksASDASD ASD ASD ASD ASD ASD ASD ASD ASD ASD ASD ASD ASDASD ASD ASD ASD <br><br><br>";
                //                print_r($mylookrated);
                //                echo "<br><br>";

                /** Fetch modals if looks or article */

              echo "<h2> Order by $orderby </h2>";
                $looks = $mc->get_looks_filtered(
                    $mno,
                    $rate_style,
                    $rate_gender,
                    $rate_plus_blogger,
                    $orderby,
                    $start,
                    $rate_limit,
                    $table_name, 
                    $rate_look_topic 
                );

                //
                              echo "<br><BR>filtered looksfiltered looksfiltered looksfiltered looksfiltered looks<bbr><br><br><Br>";
                //                print_r($looks);
                //                echo "<br><br>";


                /*
                    echo "<br>  rated look not elimated yet <br> ";
                    echo " total look res ".count($looks).'<br>';
                    $c=0;
                    for ($i=0; $i < count($looks) ; $i++) {
                        $c++;
                        echo "  $c.)  ".$looks[$i]['plno'].' style = '.$looks[$i]['style'].' pltratings =  '.$looks[$i]['pltratings'].'<br>';
                        $j = count($mylookrated);
                    }
                    echo " Rate Look Modals now <br> pagenum = $pagenum <br> start = $start <br> end = $end  <br> limit = $rate_limit  <br> rate_style = $rate_style  <br> rate_looks = $rate_looks <br> rate_status = $rate_status <BR> ";
                    echo " <h4> rertrieved from database </h4> ";
                    // print_r($looks);
                    echo "<h4>  rated look was cleaned by elimation  </h4> ";
                */

                #display look  and fetch with rated and un rated.
                //$plnos = $mc->remove_rated_looks( $looks , $mylookrated ,  $rate_status  );
                $plnos = $mc->ratedUnrated($looks, $mylookrated, $rate_status, $table_name);
                //                echo "final result";
                //                print_r($plnos); 
                $mc->print_look_modals($plnos, $table_name); 
                break;
        }
    echo "</span> ";
?>

