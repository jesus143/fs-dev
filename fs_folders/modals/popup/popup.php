<?php 
  	require ("../../../fs_folders/php_functions/connect.php");
    require ("../../../fs_folders/php_functions/function.php");
    require ("../../../fs_folders/php_functions/library.php");
    require ("../../../fs_folders/php_functions/source.php");
    require ("../../../fs_folders/php_functions/myclass.php");  
    $mc = new myclass();  
    $mc->auto_detect_path();   


    $kind = ( !empty($_GET['kind']) ) ? $_GET['kind'] : null ;

    switch ( $kind ) {
        case 'post-look-popup': 

                // echo " this is the post look popup. <br> "; 
                echo "  

                    <div onclick='close_category_popup()' style='margin-left:220px;cursor:pointer' > x </div> 

                    <div id='post-look-category-and-keyword-popup' > 

                        <form method='POST' action='post-contest' > 

                            <div style='border:1px solid none;width: 150px;text-align:left;font-family:arial;font-size:12px;padding-bottom:10px;color:#fff;' > 
                                <b>
                                    Select Your Look Style and Keyword
                                </b>
                            </div>

                            <div> 
                                <select name='look_style' >  
                                    <option>Chic</option> 
                                    <option>Menswear</option> 
                                    <option>Preppy</option>  
                                    <option>Streetwear</option>  
                                </select>  
                            </div>   
 
                            <div> 
                                <input type='text' name='look_keyword'  placeholder='keyword' autocomplete='off'  /> 
                            </div>  
                            <div> 
                                <input type='submit' name='look_style_keyword_submit' value='SAVE'/> 
                            </div>  
                        </form> 

                    </div>   
                "; 
            break; 
        default: 
            #pop up for the rating , flag and so on for the modals.

                $action = ( !empty( $_GET['action'])) ? $_GET['action'] : '' ;  
                $plno   = ( !empty( $_GET['plno']))   ? $_GET['plno']   : 0  ;  
                $type   = ( !empty( $_GET['type']))   ? $_GET['type']   : 0  ;  
                $mno    = ( !empty( $_GET['mno']))    ? $_GET['mno']    : 0  ;   
                $mno1   = ( !empty( $_GET['mno1']))   ? $_GET['mno1']   : 0 ;   

                $_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );  
                $mno             =  $mc->get_cookie( 'mno' , 136 );  
                // echo "string";
                // $action = 123;
                // $plno = 1; 
                // echo " action $action , plno $plno <br> ";   
                switch ($type) {
                    case 'Rated': 
                            $mc->print_more_friends_doing_the_same_action( $mno , $plno , $action );   
                        break; 
                    case 'Rated-Flag': 
                            $mc->flag( $mno , $mno1  , $plno , 'Rated' , $mc->date_time , 'look' );
                        break;
                    default: 
                        break;
                }   

            break;
    }





?> 




