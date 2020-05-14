<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Walkhoff</title>
      <link rel="stylesheet" href="./css/style-reg.css" />
      <link
         href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
         rel="stylesheet"
         />
      <script
         src="https://kit.fontawesome.com/d12a5234ba.js"
         crossorigin="anonymous"
         ></script>
   </head>
   <body>
      <section id="main" class="main">
         <div id="navbar" class="navbar">
            <div class="logo">
               <img src="./images/logo.png" alt="logo" height="110" width="100" />
               <h1 class="logo-word"><span class="text-primary">Walk</span>hoff</h1>
            </div>
            <ul class="nav-list">
               <li class="nav-li list"><a href="./login.html">Login</a></li>
               <li class="nav-li list"><a href="./index.html">About Us</a></li>
               <li class="nav-li list"><a class="current" href="./register.php">Register</a></li>
               <li class="nav-li list"><a href="#">Contact Us</a></li>
            </ul>
         </div>
         <div class="form">
         <div class="form-logo"> <input
            type="image"
            src="./images/dentist.png"
            height="100px"
            width="100px"
            class="logo-dentist"
            />
            <input type="image" src="./images/man.png" height="100px" />
         </div>
         <div class="img-button-text">
            <h4 class="text-dentist">Dentist</h4>
            <h4 class="text-patient">Patient</h4>
         </div>
         <form action="./php/signup.php" method="POST" >
            <div class="form-group">
               <i class="fa fa-user icon"></i> 
               <input class="input-field" type="text" placeholder=" First Name" id="fname" name="fname"> 
               <br>
               <i class="fa fa-user icon"></i> 
               <input class="input-field" type="text" placeholder="Last Name" id="lname" name="lname"> 
               <br>
               <i class="fa fa-key icon"></i> 
               <input class="input-field" type="email" placeholder="Email" id="email" name="email"> 
               <br>
               <i class="fa fa-user icon"></i> 
               <input class="input-field" type="text" placeholder="Username"id="uname" name="uname"> 
               <br>
               <i class="fa fa-key icon"></i> 
               <input class="input-field" type="text" placeholder="Password" id="pwd" name="pwd"> 
               <br>
               <i class="fa fa-key icon"></i> 
               <input class="input-field" type="text" placeholder="Re-Enter Password" id="repwd" name="repwd" >
               <!-- <i class="fa fa-user icon"></i> 
               <input class="input-field" type="number" placeholder="Mobile"id="mobno" name="mobno"> 
               <br> -->
               <br>
               <i class="fa fa-user icon"></i> 
               <label for="cars">Gender:</label>
               <select class="gender"id="gender" name="gender">
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="other">Other</option>
               </select>
               <br>
               <!-- <i class="fa fa-key icon"></i> 
               <input type="date" class="dob"id="dob" name="dob"> -->
               <br>
               <input type="submit" value='Register' class="btn-login" id="rebtn" name="rebtn" />
            </div>
         </form>
      </section>
   </body>
</html>