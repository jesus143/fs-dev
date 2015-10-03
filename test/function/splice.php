<?php
/**
 * Created by PhpStorm.
 * User: Jesus
 * Date: 7/14/2015
 * Time: 5:18 PM
 */



$mnos = array(1,2,3,4,5,6,7,8,9,10);
print_r($mnos );
echo "before <br>";
$mnos = array_slice($mnos, 4 , 1 );
echo "after <br>";
print_r($mnos);