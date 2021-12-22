<?php
require "dbBroker.php";
require "model/user.php";

session_start();


if(isset($_POST['email']) && isset($_POST['password'])){  

  $uemail=$_POST['email'];
  $upass=$_POST['password'];


    $user = User::Login($uemail, $upass, $conn);  
    if ($user!=null) {  
    
       header("location:prikaz.php");  
       $_SESSION['user_id'] = $user->id;
       exit();

    } else {  

      echo "<script>alert('Pogrešan email/šifra!');</script>";  
     

    } 
}

?>


<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>



  
  <div class="container">
  

    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form method="post" action="#">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Enter your password" required>
              </div>
              <div class="button input-box">
              <input type="submit" value="Sumbit">
              </div>
           
            </div>
        </form>
      </div>
        
      </form>
    </div>
    </div>
    </div>
  </div>
</body>
</html>
