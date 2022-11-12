<?php
  include "connection.php";
  $link=mysqli_connect("localhost","root","","lms");
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
<!DOCTYPE html>
<html>
<head>
	<title>Book borrow</title>
	<link rel="stylesheet"type="text/css"href="books.css">
	<style type="text/css">

	
		body {
			background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5 )),url(image.jpg);
			background-repeat: no-repeat;
  	font-family: "Lato", sans-serif;
  	transition: background-color .5s;
}


.container
{
	height: 600px;
	background-color: black;
	opacity: .8;
	color: white;
}
.nobooks{
	color:white;
	left:50%
	top:50%;
	font-size:18px;
	font-family:open sans;
	position: relative;
	font-weight: bold;
	width:100%;
	ransform: translateX(-50%) translateY(-50%);
	
}
.nobooks2{
	color:white;
	left:50%
	top:50%;
	font-size:18px;
	font-family:open sans;
	position: relative;
	font-weight: bold;
	width:100%;
	ransform: translateX(-50%) translateY(-50%);
	
}
.return{
	position:absolute;
	left:55%;
	top:35%;
	transform: translateX(-50%) translateY(-50%);
	padding:10px;
	max-width: 450px;
	width:100%;
	text-align: center;
	border-radius: 5px;
	display: flex;
	
}
.lb {
	left:50%;
	top:25%;
	transform: translateX(-50%) translateY(-50%);
	position: absolute;
	font-weight: bold;
}


.b{
	border:none;
	outline:none;
	left:60%;
	padding: 11px 15px;
	top:45%;
	transform: translateX(-50%) translateY(-50%);
	background:rgba(255,102,0,0.5);
	color:whitesmoke;
	font-size:14px;
	border-radius:20px;
	position: absolute;
}

	</style>

</head>
<body>

<div class="container">
	<h2 style="text-align: center;">Borrowed Books</h2>
	<label class="lb"> Return a book </label>
	<div class="return">
        <form class="navbar-form" method="post" name="f1">
		
        <input class="form-control" type="text" name="ID" placeholder="Enter ID of the Book.. " required="">
        <button class="b"  type="submit" name="submit"> Return </button>


        </form> 
    
    
    </div>
	<?php
	
	
	if(isset($_SESSION['username']))
		{
			$q=mysqli_query($db,"SELECT * from borrow where user='$_SESSION[username]' ;");

			if(mysqli_num_rows($q)==0)
			{
				
				echo '<span class="nobooks">" There is no borrowed books!"</span>';
			
			}
			else
			{
				echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: orangered;'>";
				
				echo "<th>"; echo "Book-ID";  echo "</th>";
				echo "<th>"; echo "Approve Status";  echo "</th>";
				echo "<th>"; echo "Borrow Date";  echo "</th>";
				echo "<th>"; echo "Return Date";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['borrow']; echo "</td>";
				echo "<td>"; echo $row['retur']; echo "</td>";
				
				echo "</tr>";
			}
		echo "</table>";
			}
		}
		else
		{

			
			echo '<span class="nobooks2">" Please login first to see the informatin"</span>';
			
		}

		if(isset($_POST['submit'])){
			if(isset($_SESSION['username'])){
				$sql = "DELETE FROM borrow where bid='$_POST[ID]'";
				if(mysqli_query($link,$sql))
				{
					?>
					<script type="text/javascript">
						 alert("Book has been returned");
						 window.location="request.php";
					 </script>
				 <?php
				   
				}
				else{
					?>
					<script type="text/javascript">
						 alert("Book isn't available!");
					 </script>
				 <?php
				}
			   
		
				
	   } 
	   else{
		 ?>
			<script type="text/javascript">
				 alert("you need to login first!");
			 </script>
		 <?php
	   }  
	}
		
		?>
	</div>
</div>
</body>
</html>