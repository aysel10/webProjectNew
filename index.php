<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--HEADER:-->
        <link href="https://fonts.googleapis.com/css?family=Comfortaa|Didact+Gothic|Exo+2|Open+Sans|Ubuntu" rel="stylesheet">

<?php
require_once 'header.php'; 
require_once 'dbConn.php';
require      'pagination.php';
    
 
    
?>

<!--HEADER'S END-->
    
<!--BODY CODE HERE-->

<!--    NEWS BLOCK AND RIGHT COLUMN BLOCK    -->
        
        <div class="container" style="margin-top: 10px;">
        <div class="container row">
            <div class="col-md-10">
            <legend class="text-center" style="color:black;"> <h1 style="color:red; font-family: 'Ubuntu', sans-serif;">Latest News:</h1></legend>
            </div>
             <?php include 'main_news.php';  ?>
            <?php
            if(isset($_GET['tag'])){
                $tag_id=$_GET['tag'];
                ?>
          
               
                
                <div class="col-md-7">
                    <?php
                        $getData="SELECT*FROM news,post WHERE
                        news.news_id=post.news_id AND tag_id=$tag_id  ORDER BY news_published_on DESC LIMIT $start,$news_limit_onpage" ;
                        $result=mysqli_query($dbc,$getData);
                        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                            $newsID=$row['news_id'];
                            ?>
                        <a  href="full_news.php?news_id=<?php echo $newsID; ?>"><h2 ><?php echo $row['news_title']; ?></h2></a>
                        <p><?php echo $row['news_short_description']; ?></p>
                        <div>
                        <span class="badge" style="background-color:#DA1616;">Posted <?php echo $row["news_published_on"]; ?></span><div class="pull-right">

        <?php   
                 
                    $getPost="SELECT tag_title FROM tag, post, news WHERE post.tag_id = tag.tag_id AND news.news_id = post.news_id AND post.news_id = '$newsID' ";
                    $res=mysqli_query($dbc,$getPost);
                    while($r=mysqli_fetch_array($res,MYSQLI_ASSOC)){ 
                    echo '<span class="label label-default" style="background-color:#DA1616;">'. $r['tag_title']  .'</span>' . ' ';
                    }
        ?>

        
      </div>         
     </div>
    <hr>
                      <?php
                        }
                ?>
                
                </div>
            
            
            <?php
            }else{
            ?>
            
            <div class="col-md-7">
                <?php
                 $getData="SELECT*FROM news ORDER BY news_published_on DESC LIMIT  $start, $news_limit_onpage";
                 $result=mysqli_query($dbc,$getData);
                 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                       $newsID = $row['news_id'];
                ?>
                
                <a  href="full_news.php?news_id=<?php echo $newsID; ?>"><h2><?php echo $row['news_title']; ?></h2></a>
                <p><?php echo $row['news_short_description']; ?></p>
                <div>
                <span class="badge" style="background-color:#DA1616;">Posted <?php echo $row["news_published_on"]; ?></span><div class="pull-right">

        <?php   
                 
                    $getPost="SELECT tag_title FROM tag, post, news WHERE post.tag_id = tag.tag_id AND news.news_id = post.news_id AND post.news_id = '$newsID' ";
                    $res=mysqli_query($dbc,$getPost);
                    while($r=mysqli_fetch_array($res,MYSQLI_ASSOC)){ 
                    echo '<span class="label label-default" style="background-color:#214FAF;">'. $r['tag_title']  .'</span>' . ' ';
                    }
        ?>

        
      </div>         
     </div>
    <hr>
                   
                    <?php
                    }
                    ?>
                 </div>
                <?php
                }
                
                ?>

                
                <!--
    <h1>Revolution has begun!</h1>
    <p>'I am bound to Tahiti for more men.'
        'Very good. Let me board you a moment—I come in peace.' With that he leaped from the canoe, swam to the boat; and climbing the gunwale, stood face to face with the captain.
        'Cross your arms, sir; throw back your head. Now, repeat after me. As soon as Steelkilt leaves me, I swear to beach this boat on yonder island, and remain there six days. If I do not, may lightning strike me!'A pretty scholar,' laughed the Lakeman. 'Adios, Senor!' and leaping into the sea, he swam back to his comrades.</p>
    <div>
        <span class="badge">Posted 2012-08-02 20:47:04</span><div class="pull-right"><span class="label label-default">alice</span> <span class="label label-primary">story</span> <span class="label label-success">blog</span> <span class="label label-info">personal</span> <span class="label label-warning">Warning</span>
<span class="label label-danger">Danger</span></div>
    </div>     
    <hr>
-->

            
            
<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading"> <span class="glyphicon glyphicon-list-alt"></span><b>  Latest 5 News</b></div>
            <div class="panel-body">
                <div class="row">
                
                        <ul id="demo3" style="height: auto; list-style-type:none;">
                            <?php
                                 $getLastNews="SELECT*FROM news LIMIT 5";
                                
                                 $run_last_news=mysqli_query($dbc,$getLastNews);
                                 while($row4=mysqli_fetch_array($run_last_news,MYSQLI_ASSOC)){
                                     $news=$row4['news_id'];
                                            echo '<li class="news-item"><span class="glyphicon glyphicon-star"></span> '.$row4['news_title'].'<a href="full_news.php?news_id=' . 
                                                $news . '">' . "  Read more...</a></li><br>";
                                           echo '<hr>';
                                            
                                 }
                            
                            ?>
                            
                           
                        </ul>
                  
                </div>
                
        </div>
        
    <div class="panel-footer"> </div>
    </div>
    
</div>
            
                  <div class="col-md-8" style="text-align: center;">
                        <div class="container">
                            <ul class="pagination">
                                <?php 
                                echo $pagination;
                                ?>
                                
                                <!--
                                <li class="disabled"><a href="#">«</a></li>
                                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">»</a></li>
                                -->
                            </ul>
                        </div>
                    </div>
                  </div>
                  </div>
        
<!--        END HERE:-->

    


<!--    FOOTER BEGINS:-->
<?php
require_once 'footer.php';
?>
<!--    FOOTER ENDS-->
    
</html>
  
  
    
    
    
    
    





    
    
    
    
    