<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Walkhoff</title>
  <link rel="stylesheet" href="./css/style-login.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/d12a5234ba.js" crossorigin="anonymous"></script>
</head>

<body>
  <section id="main" class="main">
    <div id="navbar" class="navbar">
      <div class="logo">
        <img src="./images/logo.png" alt="logo" height="110" width="100" />
        <h1 class="logo-word"><span class="text-primary">Walk</span>hoff</h1>
      </div>
      <ul class="nav-list">
      <li class="nav-li list">
            <a href="./index.html">Home</a>
          </li>
          <li class="nav-li list"><a href="./about.html">About Us</a></li>
          <li class="nav-li list">
            <a  href="./services.html">Serivces</a>
          </li>
          <li class="nav-li list"><a class="current" href="./login.php">Login</a></li>
          <li class="nav-li list"><a href="./register.php">Register</a></li>
          <li class="nav-li list">
            <a href="./contact.html">Contact Us</a>
          </li>
      </ul>
    </div>
    <div class="form">
      <div class="form-logo"> <input type="image" src="./images/dentist.png" height="100px" width="100px"
          class="logo-dentist" />
        <input type="image" src="./images/man.png" height="100px" />
      </div>
      <div class="img-button-text">
        <h4 class="text-dentist">Dentist</h4>
        <h4 class="text-patient">Patient</h4>
      </div>
      <form action="./php/loginup.php" method="POST">
        <div class="form-group">
          <i class="fa fa-user icon"></i>
          <input class="input-field" type="text" placeholder="Username or Email"
          id="email" name="email">
          <br>
          <i class="fa fa-key icon"></i>
          <input class="input-field" type="password" placeholder="Password" id="pwd" name="pwd">
          <input type="submit" value="Login" class="btn-login" id="lobtn" name="lobtn" />
          <div class="forgot-create">
            <a href="#">Forgot Password</a>
            <br>
            <a href="./register.php"> Create Account </a>
          </div>
        </div>
      </form>
    </div>
  </section>
</body>

</html>