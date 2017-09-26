 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/site_css.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Didact+Gothic|Exo+2|Open+Sans|Ubuntu" rel="stylesheet">

    
    <head>
        <style>

        </style>
    </head>
<!--Import HEADER-->
<?php

require_once 'dbConn.php';


$sql10 = "SELECT*FROM news ORDER BY news_published_on LIMIT 1 ";
$run6 = mysqli_query($dbc, $sql10);
$fetch1 = mysqli_fetch_assoc($run6);
$a=$fetch1['news_id'];
    
// Fetch author's data
$sql22 = "SELECT user_name FROM user, news WHERE news_id = '$a' AND user.user_id = news.user_id";
$run8 = mysqli_query($dbc, $sql22);
$fetch2 = mysqli_fetch_assoc($run8);
?> 







<div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-10 d">
                
            

                <!-- First Blog Post -->
                <h2 style="font-family:'Exo 2', sans-serif; font-weight:bold;">
                    <a  href="full_news.php?news_id=<?php echo $newsID; ?>"><?php echo $fetch1['news_title']; ?></a>
                </h2>
                <p class="lead">
                    by <a href="#"><?php echo $fetch2['user_name'] ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $fetch1['news_published_on']; ?></p>
                <hr>
                <img class="img-responsive" src="<?php echo $fetch1['news_image']; ?>" alt="">
                <hr>
                <p><?php echo $fetch1['news_short_description']; ?></p>
                <a class="btn btn-primary" href="full_news.php?news_id=<?php echo $newsID; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            </div>
    </div>
    </div>