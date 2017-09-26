<?php
    require_once 'dbConn.php';
    $current_page=$total_pages=$news_limit_onpage=$pagination="";
    // SQL query to DB, in order to get all rows
    $sql_pagin = "SELECT * FROM news";
    $run_pagination = mysqli_query($dbc, $sql_pagin);

    $num_news = mysqli_num_rows($run_pagination); // counter of all news
    $news_limit_onpage = 3; // Limit news on one page
    $pages_limit_row = 4;
    $total_pages = ceil($num_news / $news_limit_onpage); // number of all pages
    $target_page = '$_SERVER["PHP_SELF"]';
    $last_page = $total_pages;
    $first_page = 1;



    if(isset($_GET['page'])) { // If is not set set current page to 0
        $current_page = $_GET['page'];
    }
    else { $current_page = 1; }

// Set prev and next variables, $start variable as well :3
    $start =  ($current_page - 1) * $news_limit_onpage; // OFSET
    $prev_page =  (int) $current_page - 1;
    $next_page =  (int) $current_page + 1;



    if($current_page == 1) { // If we are at the begining of pagination
        $pagination .= '<li class="disabled"><a href="#">«</a></li>';
        
    /////////    
        if($total_pages <4){ // If total pages less than four
             for($i = 1; $i<=$total_pages; $i++) {
             if($i == $current_page) {
                  $pagination .= '<li class="active"><a href="?page=' . $i . '">' . $i . '</a></li>';
             } else{ 
                  $pagination .= '<li class=""><a href="?page=' . $i . '">' . $i . '</a></li>';
             }
             }
                   $pagination .= '<li class="disabled"><a href="?page=' . $last_page . '">»</a></li>';
             }
            else{  // If more than 4 pages, then we use limit boundries
             for($i = 1; $i<=$pages_limit_row; $i++) {
                 if($i == $current_page) {
                      $pagination .= '<li class="active"><a href="?page=' . $i . '">' . $i . '</a></li>';
                 } else{ 
                 $pagination .= '<li><a href="?page=' . $i . '">' . $i . '</a></li>';
                 }

            }
                 $pagination .= '<li class=""><a href="?page=' . $last_page . '">»</a></li>';
            }
              
            }
    ///// If there is no data from the database - show disabled pagination
    elseif($total_pages == 0) {
        $pagination .= '<li class="disabled"><a href="#">«</a></li>';
        $pagination .= '<li class="disabled"><a href="#">»</a></li>';
        
    }

        /////////
    elseif($current_page == $total_pages) { // If we are at the end of pagination
        $pagination .= '<li class=""><a href="?page=' . $prev_page . '">«</a></li>';
        $pagination .= '<li class="active"><a href="?page=' . $current_page . '">' . $current_page . '</a></li>';
        $pagination .= ' <li class="disabled"><a href="#">»</a></li>';         
        }


    /////////    
    else { // if we are in the middle of the pagination(between begining and the end)
        $pagination .= '<li class=""><a href="?page=' . $first_page . '">«</a></li>';
        for($i = $current_page-1; $i<=$current_page+1; $i++) { 
            if($i == $current_page) {
                $pagination .= '<li class="active"><a href="?page=' . $i . '">' . $i . '</a></li>';
            } else {
                $pagination .= '<li><a href="?page=' . $i . '">' . $i . '</a></li>';   
            }
 
        }
            $pagination .= '<li class=""><a href="?page=' . $last_page . '">»</a></li>';
    }

   

?>