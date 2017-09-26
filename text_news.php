<?php

    $id=$title=$date=$short_desc=$full_content=$author=$image="";

    echo '<section>';
        echo '<ul>';
     
        echo '<header>';
        echo '<h2>'."News".'</h2>';
echo "<br>";
      
    $getData="SELECT*FROM news ";
    $result=mysqli_query($dbc,$getData);
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $title=$row['news_title'];
            $short_desc=$row["news_short_description"];
            $full_content=$row['news_full_content'];
            $author=$row['news_author'];
            $date=$row["news_published_on"];
            $image=$row["news_image"];


       
        echo '<li><a href="full_desc.php">'.$title.'</a></li>';
        echo '<br>';
        echo "<hr>";
     
    }
  echo '</header>';
echo '</ul>';
echo '</section>';
?>
            
<!--


                            <section>
								<header>
									<h2>Gravida praesent</h2>
									<span class="byline">Praesent lacus congue rutrum</span>
								</header>
								<p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum. Maecenas luctus lectus at sapien. Consectetuer adipiscing elit.</p>
								<ul class="default">
									<li><a href="#">Pellentesque quis lectus gravida blandit.</a></li>
									<li><a href="#">Lorem ipsum consectetuer adipiscing elit.</a></li>
									<li><a href="#">Phasellus nec nibh pellentesque congue.</a></li>
									<li><a href="#">Cras aliquam risus pellentesque pharetra.</a></li>
									<li><a href="#">Duis non metus commodo euismod lobortis.</a></li>
									<li><a href="#">Lorem ipsum dolor adipiscing elit.</a></li>
								</ul>
							</section>-->
