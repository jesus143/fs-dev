<?php

    require_once "../../../fs_folders/php_functions/Database/Database.php";
    require_once "../../../fs_folders/php_functions/Database/LookbookDatabase.php";
    require_once "../../../fs_folders/php_functions/Extends/LookbookExtends.php";
    require_once "../../../fs_folders/php_functions/Class/Lookbook.php";
    require_once "../../../fs_folders/php_functions/String/String.php";

    $string = new String();
    $database = new Database();
    $lookBook = new Lookbook();
    $lookbookDatabase = new LookbookDatabase();
    $database->connect();

    //print_r($lookBook->getTopCityArray());
    //echo "<pre>";
    //print_r($lookBook->getTopCityTotalPages());
    //echo "</pre>";


    /**
     * i hear code query scrapping
     */
    $iHeartMax = $database->selectV1('fs_invited', "*" ,  "scrape_src LIKE '%heartifb%' ORDER BY invited_id desc limit 1");
    $page_iHeart = $iHeartMax[0]['page'];
    $scrape_src_iHeart = $iHeartMax[0]['scrape_src'];

    //  echo "this is   amazing ";

    //  print_r($iHeartMax);











?>

<!---->
<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head lang="en">-->
<!--    <!--header meta for responsive mobile-->
<!--    <meta charset="utf-8">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--    <meta name="description" content="">-->
<!--    <meta name="author" content="">-->
<!--    <!--css -->
<!--    <link rel="stylesheet" href="../../../fs_folders/Assets/css/bootstrap-theme.css" >-->
<!--    <link rel="stylesheet" href="../../../fs_folders/Assets/css/bootstrap.min.css" >-->
<!--    <link rel="stylesheet" href="../../../fs_folders/Assets/css/bootstrap.css" >-->
<!--    <script src="../../../fs_folders/Assets/js/jquery-1.11.2.js" ></script>-->
<!--    <script src="../../../fs_folders/Assets/js/bootstrap.min.js" ></script>-->
<!--    <script src="../../../fs_folders/Assets/js/javascript.js" ></script>-->
<!--    <script src="../../../fs_folders/Assets/js/jquery.js" ></script>-->
<!--    <link rel="stylesheet" href="../../../fs_folders/Assets/css/style.css" >-->
<!--    <script src="../../../fs_folders/js/function_js.js" ></script>-->
<!--    <script src="../../../fs_folders/js/Scrape.js" ></script>-->
<!--    <title> Activity </title>-->
<!--</head>-->
<!--<body>-->
<!--<div class="container">-->
<!---->
<!---->


    <div class="row">
        <div class="col-md-4">
            <div class="list-group">
                <a href="#" class="list-group-item active">Look Book</a>
                <?php

                foreach($lookBook->getTopCityTotalPages() as $key=> $value):
                    $city = $value['city'];
                    $tPages = $value['totalPages'];
                    $city = $string->removeLeadingAndTrailingSpaces($city);
                       // echo "city $value <br>";
                    $lookbookDatabase->setLastPageScrapped($city);

                    ?>
                    <a class="list-group-item" onclick="openNewWindow('http://fashionsponge.com/project/scrape/test.php?location=<?php echo  $city; ?>')"  ><?php echo $city; ?><span class="badge"><?php echo $lookbookDatabase->getLastPageScrapped(); ?>/<?php echo $tPages; ?></span> </a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-md-4">

            <div class="list-group">
                <a href="#" class="list-group-item active">IHeartFb</a>
                <a href="#" class="list-group-item" onclick="openNewWindow('http://fashionsponge.com/project/heartifb/index.php/view/<?php echo $scrape_src_iHeart; ?>')" >
                    I HEART
                    <span class="badge"><?php echo number_format($page_iHeart); ?>/1,000</span> </a>

            </div>

        </div>
        <div class="col-md-4">

            <div class="list-group">
                <a href="#" class="list-group-item active">Other Site</a>
                <a href="#" class="list-group-item">Dapibus ac facilisis in <span class="badge">14/200</span> </a>
                <a href="#" class="list-group-item">Morbi leo risus<span class="badge">14/200</span></a>
                <a href="#" class="list-group-item">Porta ac consectetur ac<span class="badge">14/200</span></a>
                <a href="#" class="list-group-item">Vestibulum at eros<span class="badge">14/200</span></a>
            </div>
        </div>
    </div>
<!--</div>-->
<!--</body>-->
<!--<!-- Bootstrap core JavaScript-->
<!--   ================================================== -->
<!--<!-- Placed at the end of the document so the pages load faster -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
<!---->
<!--</html>-->