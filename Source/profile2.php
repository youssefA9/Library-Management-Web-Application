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
 <script src="https://kit.fontawesome.com/862797c282.js"crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="profile2.css">
</head>
<body>
<div class="card">
<div class="upper">
<div class="image">
<img src="imagee.png">
</div>
</div>
<div class="lower">
<form action="profile_saveprocess.php" method="POST">
<div><h3>Edit Profile</h3></div>
     <div class="form-area">  	 
     <input id="username" name="username" type="text" required placeholder="Edit Username">
	 </div>
	 <div class="form-area"> 	 
     <input id="email" name="email" type="Email" required placeholder="Edit Email Address">
	 </div>
	 <div class="form-area"> 	 
     <input id="password" name="password" type="password" required placeholder="Edit Password">
	 </div>
	 <div class="form-area">  	 
     <input id="phone" name="phone" type="text" required placeholder="Edit Phone Number">
	 </div>
	 <button type="submit">Save</button>
	 </form>
</div>
</div>
</body>
</html>