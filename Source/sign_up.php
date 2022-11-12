<?php
include "navbar2.php";
?>
<html>
<head>
    <meta charset="UTF-8">
      <title>LIBRARY</title>
	  <script src="https://kit.fontawesome.com/862797c282.js"crossorigin="anonymous"></script>
	      <link rel="stylesheet"href="sign_up.css">
	
</head>
<body>
   <div class="wrapper">
     <div class="header-area">
       <h2>LIBRARY</h2>
	     <p> Are you already have an account?</p>
   </div>
   <div class="login-area">
   <input type="submit" name=""value="Login">
   </div>
   <form class="form" id="form" action="SignUp_process.php" method="POST">
   
   <div class="form-area">                   
     <i class="fas fa-User"></i>
     <input id="username" name="username" type="text"required placeholder="Enter Username">
	 <small>Erorr message</small>
	 </div>
	 <div class="form-area">   
     <i class="fas fa-envelope"></i>
     <input id="email" name="email" type="text" required placeholder="Enter Email Address">
	 <small>Erorr message</small>
	 </div>
	 <div class="form-area">   
     <i class="fas fa-key"></i>
     <input id="password" name="password" type="password" required placeholder="Enter Password">
	 <small>Erorr message</small>
	 </div>
	 <div class="form-area">   
	 <div id = "pass">
     <i class="fas fa-key"></i>
     <input id="cpassword" name="cpassword"type="password"required placeholder="Confirm Password">
	 <small>Erorr message</small>
	 </div>
	 </div>
	 <div class="form-area">   
     <i class="fas fa-phone"></i>
     <input id="phone" name="phone"type="text"required placeholder="Enter Phone Number">
	 <small>Erorr message</small>
	 </div>
	 <div class="form-area">
	 <div class="radio">
	 <p>How do you want to login ?</p>
	 <label class="radio">
	 <input type="radio" value="Admin" name="kind">
	 Admin
	 <span></span>
	 </label>
	 <label class="radio">
	 <input type="radio" value="Student" name="kind">
	 Student
	 <span></span>
	 </label>
	 </div>
     <input id="1" required type="checkbox" value="Agree and accept">
	 <label for="1">Agree and accept.</label>
	 <button type="submit" id="signup_btn">Sign up</button>
	 </div>
	 </form>
    </div>
	<!--
<script defer src="sign.js"></script>
-->
</body>
</html>