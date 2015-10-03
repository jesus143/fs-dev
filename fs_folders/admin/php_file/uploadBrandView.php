<?php
/**
 * Created by PhpStorm.
 * User: Jesus
 * Date: 9/9/2015
 * Time: 9:11 PM
 */ ?>

<?php
require("../../../fs_folders/php_functions/connect.php");
require("../../../fs_folders/php_functions/function.php");
require("../../../fs_folders/php_functions/myclass.php");
require("../../../fs_folders/php_functions/library.php");
require("../../../fs_folders/php_functions/source.php");
?>
<!--get brands and category that has no image yet-->
<?php

$db->select('fs_brands', '*', null, 'visible = 2', ' bno desc ');
$res = $db->getResult();
//print_r($res);
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thumbnail Gallery - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


    <!-- Custom CSS -->
    <link href="css/thumbnail-gallery.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


<!-- Page Content -->
<div class="container"  >

    <div class="row">

        <div class="col-lg-12">
            <h1 class="page-header">Brand Gallery</h1>
        </div>
        <?php
        $path = '../../../fs_folders/images/uploads/brands';
        for($i=0; $i<count($res); $i++){
            //get brand
            $bno     = $res[$i]['bno'];
            $bcno    = $res[$i]['bcno'];
            $bname   = $res[$i]['bname'];
            $page    = $res[$i]['page'];
            //echo "$i $bno $bcno<br>";
            //select category
            $res1 = select_v3('fs_brand_category', '*', 'bcno = ' . $bcno);
            $type    = $res1[0]['type'];
            $imgPath = $path . "/$bno" . "_$type.jpg";
            ?>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <?php echo $bname;  ?>
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="<?php echo $imgPath; ?>" alt="">
                </a>
            </div> <?php
        } ?>


    </div>

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
        </div>
    </footer>

</div>
<!-- /.container -->
</body>

</html>
