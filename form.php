<?php
ob_start();
$login=$password="";
$err = array();
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
background-image: url(back.jpg);
    opacity:0.8;}
#mainBlock {

margin: 0 auto;
margin-top: 10%;
padding: 50px;
    width:500px;
background-color: grey;
border-radius:2px;
    border:1px solid black;
text-align: center;
}
</style>
</head>

    <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(empty($_POST['login'])){
            $err[]="Login field is empty";
        }else{
            $login=trim($_POST['login']);
        }
        if(empty($_POST['password'])){
            $err[]="Password field is empty";
        }else{
            $password=trim($_POST['password']);
        }
    }
    ?>
    <div id="mainBlock" class="">
      <span class="glyphicon glyphicon-info-sign " style="font-size:35px;"> Admin Panel</span>
        <hr>
        <br><br>
        <form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">

            <div class="form-group">
                
                 <span class="glyphicon glyphicon-user"></span>
                <label for="login">Login:</label>
                <input class="form-control" id="login" type="text" name="login">
            </div>
            <div class="form-group">
                <span class="glyphicon glyphicon-lock"></span>
                <label for="password">Password:</label>
                
                <input class="form-control" id="password" type="password" name="password">
            </div>
        
    
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(!empty($err)) {
        echo ' <p style="padding:3px" class="bg-danger">' . implode(', ' , $err) . '</p>';
   
        } else {
       require 'dbConn.php';
            
            $matchUser = "SELECT login, password FROM users WHERE login='$login' AND password= SHA1('$password') ";
            $run = mysqli_query($dbc, $matchUser);
                $matched = mysqli_fetch_array($run, MYSQLI_ASSOC);
        
    
if($matched != null) {
// NOT FINAL CODE, cokkies are required in final result!!!
    session_start();
    $_SESSION['login']=$login;
    
    header("Location: welcome.php?function=");
    exit();
    }else{
        $err="pochka dochka";
        echo $err;
}
         mysqli_close($dbc);
    }
    }
         
    ob_end_flush();

    ?>
            <button class="btn btn-default "><span class="glyphicon glyphicon-ok-sign"> Login</span></button>

    </form>
    </div>
    </html>
    <div class="card">
    <div class="card-block">

<!--
      
        <div class="form-header  purple darken-4">
            <h3><i class="fa fa-lock"></i> Login:</h3>
        </div>

      
        <div class="md-form">
            <i class="fa fa-envelope prefix"></i>
            <input type="text" id="form2" class="form-control">
            <label for="form2">Your email</label>
        </div>

        <div class="md-form">
            <i class="fa fa-lock prefix"></i>
            <input type="password" id="form4" class="form-control">
            <label for="form4">Your password</label>
        </div>

        <div class="text-center">
            <button class="btn btn-deep-purple">Login</button>
        </div>

    </div>

  
    <div class="modal-footer">
        <div class="options">
            <p>Not a member? <a href="#">Sign Up</a></p>
            <p>Forgot <a href="#">Password?</a></p>
        </div>
    </div>

</div>
-->
<!--/Form with header-->
