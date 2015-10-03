 <?php  
    require ("fs_folders/php_functions/connect.php"); 
    require ("fs_folders/php_functions/function.php");
    require ("fs_folders/php_functions/library.php");
    require ("fs_folders/php_functions/source.php");
    require ("fs_folders/php_functions/myclass.php"); 
    require ("fs_folders/php_functions/Time/Time.php");
    require ("fs_folders/php_functions/String/String.php");
    require ("fs_folders/php_functions/Database/LookbookDatabase.php");  
    require ("fs_folders/php_functions/Extends/LookbookExtends.php");  
    require ("fs_folders/php_functions/Class/Lookbook.php");  
    require ("fs_folders/php_functions/Database/ContentManagementDb.php");

    $mc              =  new myclass();     
    $pa              =  new postarticle( ); 
    $ri              =  new resizeImage (); 
    $sc              =  new scrape();   
    $lookbook        =  new lookbook();   

    LookbookDatabase::$database = $db; 
    ContentManagementDb::$database = $db;      
    
    for ($i=0; $i <count(ContentManagementDb::getListOfBlogs()) ; $i++) 
    {  
      $style = '';
      // echo " tutke " .$_GET['search']; 
      if (!empty($_GET['search'])) 
      {
        if (ContentManagementDb::getListOfBlogs()[$i]['title'] == $_GET['search']) 
        { 
          $style = 'color:red';
          // echo "equal";
        }
        else
        {
          // echo "asd";
        }
      } 
      else 
      {
         // echo"ASD";
      }  
      echo "   <a style='$style' id='cms-menu-title' href='?search=" . ContentManagementDb::getListOfBlogs()[$i]['title'] . "'   > " . ContentManagementDb::getListOfBlogs()[$i]['title'] . "</a>";    
    }  
    echo '<hr>';
    if (isset($_POST['update'])) 
    {  
      if(ContentManagementDb::updateContent(String::clean($_POST['title']), String::clean($_POST['content'])))
      { 
        echo "<br>successfully updated<br>";
      }  
      else
      {
        echo "<br>failled to updated<br>";
      } 
      ContentManagementDb::setContent(String::clean($_POST['title']));  
      echo '<pre>' . ContentManagementDb::getContent() . '</pre>';    
    }
    else if (isset($_POST['search'])) 
    {   
      ContentManagementDb::setContent(String::clean($_POST['title']));  
      echo '<pre>' . ContentManagementDb::getContent() . '</pre>';    
    }
    elseif(!empty($_GET['search']))
    {
      ContentManagementDb::setContent(String::clean($_GET['search']));  
      echo '<pre>' . ContentManagementDb::getContent() . '</pre>';    
    }
?> 
<html> 
  <head> 
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> 
      <style type="text/css">
        #cms-menu-title:hover { 
          text-decoration: underline;
          color:red;
        }
      </style>
  </head>
  <body style="padding:50" >
       <!DOCTYPE html>
<html>
<head>
   <title>Try v1.2 Bootstrap Online</title> 
</head>
<body> 
  <button type="button" class="btn btn-primary" data-toggle="collapse" 
     data-target="#demo0">
      Update Content
  </button>
  <br>
  <br>
  <form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
    <div class="input-group">
        <input name="title"   type="text" class="form-control" placeholder='search title'  >
        <span class="input-group-btn">
          <button name="search"  class="btn btn-default" type="submit">Go!</button>
        </span>
      </div><!-- /input-group -->
    </div><!-- /.col-lg-6 -->
  </form>
  <br><br>          
  <div id="demo0" class="collapse" > 
      <form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
        <div class="form-group"> 
          <input    name="title"      class="form-control" type="text" value="<?php echo ContentManagementDb::getTitle(); ?>" > 
          <textarea name="content" class="form-control" rows="20"  ><?php echo ContentManagementDb::getContent(); ?></textarea> 
          <button   name="update"  class="btn btn-default" type="submit">Go!</button>
        </div>
    </form>
  </div> 
  <hr> 
</body>
</html> 
  </body> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>  
</html>
 

