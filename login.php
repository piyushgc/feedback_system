<?php require 'connection.php' ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <?php require 'partials/head.php' ?>
    <link rel="stylesheet" href="./css/style.css">
    <title>Login</title>
  </head>
  <body>
    <?php require 'partials/nav.php' ?>
    
    <div class="container">
    <h1>Login</h1>
<form method="POST">
  <?php
      if(isset($error)){
        foreach($error as $error){
          echo '<span class ="error-msg">'.$error.'</span>';
        }
      }
  ?>
  <div class="row">
    <label for="fullname">Username</label>
    <input type="text" name="fullname" autocomplete="off" placeholder="username">
  </div>
  <div class="row">
    <label for="password">Password</label>
    <input type="password" name="password">
  </div>
  <button type="submit" name ="login">Login</button>
   <p class="last">Don't have an Account?<a href="signup.php">Register</a></p>
</form>
  </div>
    
    

  </body>
</html>



<?php
  $login =false;
  $err_msg ="";
  // --------------->
  if(isset($_POST['login']))
  {
    $username  = $_POST['fullname'];
    $pwd       = $_POST['password'];
    // $role      = $_POST['role'];
    // if($full_name != "" && $email != "" && $pwd != "" )
    // {
     $select = "SELECT * FROM user_details WHERE fullname ='$username' && password='$pwd'";
     $result = mysqli_query($conn,$select);
     $num  = mysqli_num_rows($result);
     
      if($num == 1){
          $row = mysqli_fetch_assoc($result);

          if($row['role']=='admin'){
              $login=true;
              $_SESSION['admin_name'] = $row['fullname'];
              header('location:admin.php');
          }
          elseif($row['role']=='user'){
            $login=true;
            
            $_SESSION['user_name'] =$row['fullname'];
            header('location:userform.php');
        }
      
        else{
          $err_msg = 'incorrect email/password';
        }
      }

    // }
    else{
      echo "please fill the required detials";
    }
    }
    // var_dump($_SESSION['admin_name'], $_SESSION['user_name']);
?>