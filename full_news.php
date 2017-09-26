<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!--Import HEADER-->
<?php
require_once 'header.php';
require_once 'dbConn.php';
$a=$_GET["news_id"];
///
$sql = "SELECT * FROM news WHERE news_id = '$a' ";
$run = mysqli_query($dbc, $sql);
$fetch1 = mysqli_fetch_assoc($run);

    
// Fetch author's data
$sql2 = "SELECT user_name FROM user, news WHERE news_id = '$a' AND user.user_id = news.user_id";
$run2 = mysqli_query($dbc, $sql2);
$fetch2 = mysqli_fetch_assoc($run2);
?>



<div class="container">
    <div class="" style="padding-top: 20px; padding-bottom: 20px;"> 
        <div class="row">
             <div class="col-md-8">
                 <div class="row hidden-md hidden-lg"><h1 class="text-center" ></h1></div>
                     
                 <div class="pull-left col-md-4 col-xs-12 thumb-contenido">
                     <img class="center-block img-responsive" src='<?php echo $fetch1['news_image'] ?>' /></div>
                 <div class="">
                     <h1  class="hidden-xs hidden-sm"><?php echo $fetch1['news_title']; ?></h1>
                     <hr>
                     <h5><?php echo $fetch1['news_published_on'];  ?></h5><br>
                     <h4><strong> Author: <?php echo $fetch2['user_name']  ?></strong></h4>
                     <hr>
                     <p class="text-justify"><?php echo $fetch1['news_full_content'];  ?></p></div>
             </div>
                <div class="col-md-4">
        
             <div class="well">
                    <h2>About Author</h2>
                    <img src="" class="img-rounded" />
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
                    <a href="#" class="btn btn-default">Read more</a>
                </div>
            </div>
        </div>
    </div>

</div>
    


<!--Import FOOTER-->
<?php
require_once 'footer.php';
?>
    

</html>