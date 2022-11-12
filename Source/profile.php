<?php
session_start();
if(isset($_SESSION['username'])){
	if($_SESSION['state']=='admin'){
        include "navbar.php";
    }
    else if ($_SESSION['state']=='student'){
        include "navbar3.php";
    }
}else{
	include "navbar2.php";

}
?>
<html>
<head>
<title>Profile card</title>
<link rel="stylesheet" type="text/css" href="profile.css">
</head>
<form action="profile2.php">
<body>
<div class="card">
<div class="upper">
<div class="image">
<img src="imagee.png">
</div>
</div>
<div class="lower">
<div><h3>PROFILE</h3></div>
<div class="info">
     <p>Username:</p><div class="username"><?php echo $_SESSION['username'] ?></div>
     <p>E-mail:</p><div class="email"><?php echo $_SESSION['email'] ?></div>
     <p>Phone:</p><div class="phone"><?php echo $_SESSION['phone'] ?></div>
	 <button type="submit">Edit</button>
</div>
</div>
</div>
</form>
</body>