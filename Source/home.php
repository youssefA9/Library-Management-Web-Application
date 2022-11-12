<?php
	include "connection.php";
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
<html lang="en" dir="Itr">
<head>
<meta charset="utf-8">
<title>Library management system</title>
   <link rel="stylesheet"type="text/css"href="home.css">
   <script src="https://kit.fontawesome.com/862797c282.js"crossorigin="anonymous"></script>
   </head>
<body>
	<div class="b">
  
	    <h2>WELCOME TO LIBRARY SYSTEM</h2>	  

	</div>
</body>
</html>