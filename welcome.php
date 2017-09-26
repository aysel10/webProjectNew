<?php 
ob_start();
session_start();

if(isset($_SESSION['login'])){
    

$author=$full_content=$date=$short_desc=$title=$user=$image="";
$err=array();
?>

<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <style>
            body {
                background-image: url(gray.jpg);
            }
            #mainBlock {
                color:black
                    ;
                margin: 0 auto;
                margin-top: 2%;
                width:500px;
                padding: 20px;
                text-align: center;
            }
            .con{

            }
            input[type="text"], textarea,input[type="number"],#s {
                color:white;
                background-color : dimgrey; 

            }
            form{
                border:1px solid white;
                padding:15px;
                border-radius:2px;
                background-color: #848484;
            }
        </style>
    </head>
    <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(empty($_POST['title'])){
            $err="Set title please";
        }else{
            $title=trim($_POST['title']);
        }
        
        if(empty($_POST['short_desc'])){
            $err="Short description";
        }else{
            $short_desc=trim($_POST['short_desc']);
        }
            if(empty($_POST['full_content'])){
            $err="Full description";
        }else{
            $full_content=$_POST['full_content'];
        }
        if(empty($_POST['image'])){
            $image="error";
        }else{
            $image=$_POST['image'];
        }
           
  
      
              
        
    }
    
    
    
    ?>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">NEWS</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"> <a href="<?php echo $_SERVER['PHP_SELF'].'?function=1'; ?>">Add news</a></li>
      <li><a href="<?php echo $_SERVER['PHP_SELF'].'?function=2'; ?>">Edit</a></li>
      <li><a href="<?php echo $_SERVER['PHP_SELF'].'?function=3'; ?>">Add tags to news</a></li>
      <li> <a href="<?php echo $_SERVER['PHP_SELF'].'?function=4'; ?>">Delete</a></li>
    </ul>
      <ul class="nav navbar-nav navbar-right">
          <li><a tabindex="-1" href="logout.php">Logout</a></li>
  </div>
    </nav>
  

    <div id="mainBlock">
        <div class="row">
               <?php
       
            if($_GET['function'] == 1) {
                ?>
                
            
        <form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
            <div class="form-group ">
                <label for="title">Title:</label>
                <input class="form-control" id="title" type="text" name="title">
            </div>
            <div>
                <label for="short_desc" id="short_desc" type="text" name="short_desc">Short description:</label>
                <input class="form-control" id="short_desc" type="text" name="short_desc">                
            </div>
            <div>
                <label for="full_content" id="full_content" type="text" name="full_content">Full content:</label>
                <textarea class="form-control" rows="5" id="full_contetn s" name="full_content"></textarea>               
            </div>
        
           
            <div>
                <label for="image" id="image" type="text" name="image">Image:</label>
                <input class="form-control" id="image" type="text" name="image">   
                
            </div>
            <hr> 
             <button class="btn btn-default pull-center" name="add">Add news</button>
        </form>
 
            <?php
                    
            //INSERT INTO NEWS
    
                   if(isset($_POST['add'])){
                      require "dbConn.php";
                                $R=$_SESSION['login'];
                            $sql="INSERT INTO news (news_title,news_short_description,news_full_content,news_published_on,user_id,news_image) VALUES('$title','$short_desc','$full_content',CURRENT_TIME(),'$R','$image')";
                            $run=mysqli_query($dbc,$sql);
                            
                        
                        mysqli_close($dbc);
                   }
                 }elseif($_GET['function']==2){
                        require "dbConn.php";
                      $sql2="SELECT*FROM news";
                      $run=mysqli_query($dbc,$sql2);
                
            ?>
            
            
            <form method="POST" action="">
                    <div class="form-group">
                        <select name="select_news" class="form-control" >
                        <?php
                        while($row2=mysqli_fetch_assoc($run)){
                            ?>
                            <option value="<?php echo $row2["news_id"]; ?>"><?php echo $row2['news_title']; ?></option>
                            <?php
                            }
                            ?>
                            ?>
                        </select>  
                   <br>
                    <button class="btn btn-default" name="edit_news">Edit</button> 
                    </div>
               
                            <?php
                 //EDIT NEWS
                            if(isset($_POST['edit_news'])) {
                                $_SESSION['news_selected'] = $_POST['select_news'];

                                $getData_for_edit =  $_POST['select_news']; 

                                $sql3="SELECT*FROM news WHERE news_id= '$getData_for_edit' ";
                                $res_edit=mysqli_query($dbc,$sql3);
                                $row_edit=mysqli_fetch_assoc($res_edit);

                                $sql4="SELECT*FROM user,news WHERE user.user_id=news.user_id";
                                $user=mysqli_query($dbc,$sql4);
                                $row_user=mysqli_fetch_assoc($user);   
                                ?>

                
             <div class="form-group ">
                 <div>
                <label for="title">Title:</label>
                <input class="form-control" id="title" type="text" name="title" value='<?php echo $row_edit["news_title"]; ?>'>
               
                </div>
                <div>
                    <label for="short_desc" id="short_desc" type="text" name="short_desc" >Short description:</label>
                    <input class="form-control"  value='<?php echo $row_edit["news_short_description"]; ?>' id="short_desc" type="text" name="short_desc">                
                </div>
                <div>
                    <label for="full_content" id="full_content" type="text" name="full_content">Full content:</label>
                    <textarea class="form-control" rows="5" id="full_contetn" name="full_content"><?php echo $row_edit['news_full_content']; ?></textarea>               
                </div>
          
            <div>
               
                    <label for="image" id="image" type="text" name="image">Image:</label>
                    <input class="form-control" id="image" type="text" name="image" value="<?php echo $row_edit['news_image']; ?>">   
                
                </div>
                <hr>
             <button class="btn btn-default pull-center" name="last_edit">Confirm</button>
                 
                 
               <?php  
                }
                //EDIT NEWS
                if(isset($_POST['last_edit'])){
                          $getData_for_edit =  $_POST['select_news']; 
                          $news_selected_last = $_SESSION['news_selected'];
                    
                          $SQL5="UPDATE news SET news_title='$title', news_short_description='$short_desc', news_full_content='$full_content', news_image='$image' WHERE news_id='$news_selected_last'";
                          $qw=mysqli_query($dbc,$SQL5);
                          header("Location:welcome.php?function=2");
                          close();   
                      }   
            }elseif($_GET['function']==3){
                require 'dbConn.php';
                $sql7='SELECT*FROM news';
                $sql8='SELECT*FROM tag';
                $r3=mysqli_query($dbc,$sql7);
                $r4=mysqli_query($dbc,$sql8);
                ?>
                <div style="float-left;">
                    <div class="row">
                    <form method="post" action="">
                    <select name="view_news" class="form-control">
                            <?php
                            while($o=mysqli_fetch_assoc($r3)){
                                ?>
                            <option value="<?php echo $o['news_id']; ?>"><?php echo $o['news_title']; ?></option>
                                <?php
                             }
                                ?>
                            </select>
                  
                            <select name="tag[]" multiple style="height:200px; width:180px;text-align:center; margin:0 auto; color:blue;" class="form-control">
                            <?php
                                while($e=mysqli_fetch_assoc($r4)){
                                    ?>
                                <option value="<?php echo $e['tag_id']; ?>"><?php echo $e['tag_title']; ?></option>              
                                <?php
                                }
                            ?>
                            </select>
                        <br>
                            <button class="btn btn-danger" name="add_tag">Add tags</button>
                        </form>
                 </div>
                    <?php
                        if(isset($_POST['add_tag'])){
                            $get_id=$_POST['view_news'];
                            $get_tags=$_POST['tag'];
                         
                           
                         
                            for($i=0;$i<count($get_tags);$i++){
                                $q="INSERT INTO post  VALUES(null, $get_id , $get_tags[$i] )";
                                $tags_query = mysqli_query($dbc,$q);
                            }
                            header("Location:welcome.php?function=3");
                           close();
                            }
                       
                ?>
                    
                    
                 <?php
            }elseif($_GET['function']==4){
                require 'dbConn.php';
                      $sql6="SELECT*FROM news";
                      $r=mysqli_query($dbc,$sql6);
            
                ?>
            <div>
                <form method="POST" action=""> 
                    <select name="delete_news" class="form-control">
                        <?php
                        while($row0=mysqli_fetch_assoc($r)){
                           ?>
                            <option value="<?php echo $row0['news_id']; ?>"><?php echo $row0['news_title']; ?></option>
                            <?php
                        }
                        ?>
                        
                        
                     </select>
                        <br>
                    <button class="btn btn-default" name="delete">DELETE</button>
                </form>
            </div>
                
                      
            </div>
                 </form>
            
                <?php   
                if(isset($_POST['delete'])){
                          $getData =  $_POST['delete_news']; 
                         echo $getData;
                            $sql5="DELETE FROM news WHERE news_id= '$getData' ";
                            mysqli_query($dbc,$sql5);
                           header("Location:welcome.php?function=4");
                          close(); 
                            
                    }
                }

                ob_end_flush();
                ?>
        
          </div>  
    </div>
            
            
            
            
            
</html>
<?php
}
?>