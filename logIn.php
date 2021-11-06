<?php

include 'dbBroker.php';
include 'User.php';
 session_start();

if (isset($_POST['username']) &&isset($_POST['password']))
{
   // $conn=new mysqli();
$uname=$_POST['username'];
$upass=$_POST['password'];
$korisnik=new User(1,$uname, $upass);
$odgovor=User::logInUser($uname, $upass, $conn);
if($odgovor->num_rows==1){
    echo "<script> console.log('Uspesno ste se prijavili!') </script>";
    $_SESSION['user_id']=$korisnik->id;
    header('Location: index.php');
    exit();
}
else{
    echo "<script> console.log('Niste se prijavili!') </script>";
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=div class="overlay">
    <link rel="stylesheet" href="logIn.css" type="text/css">
      
    <title>Login</title>
</head>
<body>
      <!-- LOGN IN FORM by Omar Dsoky -->
      <form method="POST" action="#" id="frmID">
        <!--   con = Container  for items in the form-->
        <div class="con">
        <!--     Start  header Content  -->
        <header class="head-form">
           <h2>Log In</h2>
           <!--     A welcome message or an explanation of the login form -->
           <p>login here using your username and password</p>
        </header>
        <!--     End  header Content  -->
        <br>
        <div class="field-set">
          
           <!--   user name -->
              <span class="input-item">
                <i class="fa fa-user-circle"></i>
              </span>
             <!--   user name Input-->
              <input class="form-input" id="txt-input" name="username" type="text" placeholder="UserName" required>
          
           <br>
          
                <!--   Password -->
          
           <span class="input-item">
             <i class="fa fa-key"></i>
            </span>
           <!--   Password Input-->
           <input class="form-input" type="password" placeholder="Password" id="pwd"  name="password" required>
          
     <!--      Show/hide password  -->
          
          
          
           <br>
     <!--        buttons -->
     <!--      button LogIn -->
           <button class="log-in" type="submit" name="submit">Log In</button>
        </div>
       
    
     
          
     <!--   End Conrainer  -->
       </div>
       
       <!-- End Form -->
     </form>
     </div initial-scale="1.0">
     <script src="logIn.js"></script>
</body>
</html>