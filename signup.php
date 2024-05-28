<?php require 'connection.php' ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <?php require 'partials/head.php' ?>
    <link rel="stylesheet" href="./css/style1.css">
    <title>Register</title>
  </head>
  <body>
    <?php require 'partials/nav.php' ?>
    
    <div class="container">
    <h1>Register Now!</h1>
<form action="#" method="POST">
    <div class="row">
    <label for="email">Name</label>
    <input type="fullname" name="fullname" autocomplete="off" placeholder="Full Name" required>
  </div>
  <div class="row">
    <label for="email">Email</label>
    <input type="email" name="email" autocomplete="off" placeholder="email@example.com" required>
  </div>
  <div class="row">
    <label for="password">Password</label>
    <input type="password" name="password" required>
  </div>
  <div class ="row">
  <label for="role">Role</label>
    <select name="role" id="option">
        <option value="user">user</option>
        <option value="admin">admin</option>
    </select
</div>
  <button type="submit" name= "register">Register</button>
   <p class="last">Already have an Account?<a href="login.php">Login</a></p>
</form>
  </div>
  </body>
</html>

<?php
if (isset($_POST['register'])) {
    $full_name = $_POST['fullname'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $role = $_POST['role']; 
    
    if ($full_name != "" && $email != "" && $pwd != "") {
        $select = "SELECT * FROM user_details WHERE email='$email'";
        $result = mysqli_query($conn, $select);
     
        if (mysqli_num_rows($result) > 0) {
            $error[] = 'User already exists!';
        } else {
            $query = "INSERT INTO user_details (fullname, email, password, role) VALUES('$full_name','$email','$pwd','$role')";
            $data = mysqli_query($conn, $query);

            if ($data) {
                // echo "Data inserted into database";
                header('location: login.php');
                // exit(); // Stop further execution
            } else {
                echo "Failed to insert data";
            }
        }
    } else {
        echo "Please fill the required details";
    }
}
?>
