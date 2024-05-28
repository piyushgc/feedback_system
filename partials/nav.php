<style>
/* --------------- Created By InCoder --------------- */

@import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

.navbar {
  width: 100%;
  height: 3rem;
  color: #fff;
  display: flex;
  background-color: #202020;
  justify-content: space-between;
}

.logo {
  display: flex;
  font-weight: 600;
  font-size: 1.5rem;
  margin-left: 1rem;
  align-items: center;
  letter-spacing: 1px;
}

.navbar ul {
  display: flex;
  align-items: center;
}

.navbar ul li {
  list-style: none;
  margin: 0px 10px;
  position: relative;
  max-width: max-content;
}

.navbar ul a:last-child {
  margin-right: 1rem;
}

.navbar ul a {
  color: #fff;
  text-decoration: none;
  text-transform: capitalize;
}

.menuToggle {
  display: none;
}

@media (max-width: 620px) {
  .navbar.open ul {
    display: grid;
    transition: .3s;
  }
  .navbar ul::before {
    content: "";
    width: 1rem;
    height: 1rem;
    top: -0.5rem;
    right: 1.4rem;
    position: absolute;
    transform: rotate(45deg);
    background-color: #202020;
  }

  .navbar {
    position: relative;
  }
  
  .navbar ul {
    top: 3.8rem;
    width: 100%;
    display: none;
    padding: 12px 0px;
    position: absolute;
    align-items: center;
    justify-content: center;
    background-color: #202020;
  }
  
  .navbar ul a {
    margin-bottom: 15px;
  }
  
  .navbar ul a:last-child {
    margin: 0px;
  }
  
  .menuToggle {
    display: flex;
    font-size: 25px;
    cursor: pointer;
    align-items: center;
    margin: 0px 20px 0px 0px;
  }
}
/* 
.navbar ul a:hover li::after {
  left: 0;
  top: 1.5rem;
  content: "";
  width: 100%;
  height: 1px;
  position: absolute;
  animation: increase 1s;
  background-color: #fff;
} */

@keyframes increase {
  0% {
    width: 0%;
  }
  100% {
    width: 100%;
  }
}
</style>

<?php 
    // include("check.php"); 
    
    session_start();
    // $_SESSION['admin_name'] = $row['fullname'];
    // var_dump($_SESSION['admin_name']);
  
?>
  
  <nav class="navbar">
    
    <div class="logo">
      <p>IconicShop</p>
    </div>
    
    <ul class="open">
        <?php if(isset($_SESSION['admin_name'])) { ?>
            <li>Welcome, <?php echo $_SESSION['admin_name']; ?></li>
            <a href="logout.php"><li>Logout</li></a>

        <?php } elseif(isset($_SESSION['user_name'])) { ?>
            <li>Welcome, <?php echo $_SESSION['user_name']; ?></li>
            <a href="logout.php"><li>Logout</li></a>

        <?php } else { ?>
            <a href="home.php"><li>Home</li></a>
            <a href="signup.php"><li>Create Account</li></a>
            <a href="login.php"><li>Login</li></a>
        <?php } ?>
    </ul>
  <!-- //       <a href="home.php">
  //           <li>Home</li>
  //       </a>
  //     <a href="signup.php">
  //       <li>Create Account</li>
  //     </a>
  //     <a href="login.php">
  //       <li>Login</li>
  //     </a> 
  //   </ul> -->
    <div class="menuToggle">
      <i class="fas fa-bars"></i>
    </div>
  </nav>

</body>

</html>