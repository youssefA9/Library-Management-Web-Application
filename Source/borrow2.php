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
<link rel="stylesheet"type="text/css"href="add.css">
<title>borrow a book</title>

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
</style>
</head>
<body>
    <div class="container">
        <h1>Borrow a book</h1>
        <form class="book" action="" method="post" style="text-align:center;">
        <div class="form-area">    
        <label>Enter Book ID</label>
        <input name="ID" type="text" required="" placeholder="....">                
        <label>Enter Borrow date</label>
        <input name="borrow" type="text" required="" placeholder="DD/MM/YY..">
        <label>Enter Return date</label>
        <input name="retur" type="text" required="" placeholder="DD/MM/YY..">
         <button class="btn btn-default" type="submit" name="submit">Borrow </button>
        
        </div>

        <?php
            if(isset($_POST['submit'])){
                if(isset($_SESSION['username'])){
                    $q=mysqli_query($db,"SELECT * from books where bookid='$_POST[ID]' ");
                    if(mysqli_num_rows($q)>0){
                    $sql2 = "INSERT INTO borrow VALUES('$_SESSION[username]','$_POST[ID]','Borrowed',
                    '$_POST[borrow]','$_POST[retur]')";
                    
                    if(mysqli_query($link,$sql2))
                    {
                        ?>
                        <script type="text/javascript">
                             alert("Book has been borrowed");
                             window.location="request.php";
                         </script>
                     <?php
                       
                    }
                    else{
                        ?>
                        <script type="text/javascript">
                             alert("Book isn't available or had been borrowed before!");
                           
                         </script>
                     <?php
                    }}
                    else{
                        ?>
                        <script type="text/javascript">
                             alert("Book isn't available or had been borrowed before!");
                           
                         </script>
                     <?php
                    }
                   
                 
           } 
           else{
             ?>
                <script type="text/javascript">
                     alert("you need to login first to borrow a book");
                 </script>
             <?php
           }  
        }

            
        
        ?>
        </form>
    </div>
</body>
</html>