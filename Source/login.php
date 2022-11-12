<?php
include "connection.php";
include "navbar2.php";
?>
<html>
<head>
<title>Login form page</title>
   <link rel="stylesheet"type="text/css"href="login.css">
<body>
    <div class="Loginbox">
	<form action="SignIn_process.php" method="POST">
	<img src="imagee.png" class="avatar">
	 <h1>Login</h1>
	   <p>Username</p>
	   <input type="text" id="username" name="username" required placeholder="Enter Username">
	   <p>Password</p>
	   <input type="Password" id="password" name="password" required placeholder="Enter Password">
	   <input type="Submit" name=""value="Login">
	   <input type="checkbox"checked="checked">Remember me<br>
	   <label>Are you haven't an account? register now</label>
	   
	   <a href="sign_up.php">sign up</a>
	</div>
	</form>
</body>
</head>
</html>
