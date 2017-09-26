<?php
    $id=$title=$date=$short_desc=$full_content=$author=$image="";

    
    $getData="SELECT*FROM news order by news_id desc";
    $result=mysqli_query($dbc,$getData);
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $title=$row['news_title'];
            $short_desc=$row["news_short_description"];
            $full_content=$row['news_full_content'];
            $author=$row['news_author'];
            $date=$row["news_published_on"];
            $image=$row["news_image"];
    }
echo $image;
    echo '<section id="content">';
    echo '<header><h2>'.$title.'</h2></header>';
    echo ' <img class="image full" src="' . $image.'  " alt="" >';
    echo '<p>'.$short_desc.'</p>';

    echo '<a href="#" class="button">Read More</a>';
echo '</section>';




?>

