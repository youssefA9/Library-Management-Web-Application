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
<title>Add a book</title>
</head>
<body>
    <div class="container">
        <h1>Add New Books</h1>
        <form class="book" action="" method="post" style="text-align:center;">
        <div class="form-area">                   
    
         <input name="bookid" type="text" required="" placeholder="Enter Book ID..">
         <input name="name" type="text" required="" placeholder="Enter Book name..">
         <input name="author" type="text" required="" placeholder="Enter Author of the book..">
         <input name="edition" type="text" required="" placeholder="Enter Edition.. ">
         <input name="status" type="text" required="" placeholder="Enter Status..">
         <input name="quantity" type="text" required="" placeholder="Enter Quantity.. ">
         <button class="btn btn-default" type="submit" name="submit">Add a new book </button>
        
        </div>

        <?php
        
            if(isset($_POST['submit'])){
                if(isset($_SESSION['username'])){
                    $sql = "INSERT INTO books VALUES('$_POST[bookid]','$_POST[name]','$_POST[author]',
                    '$_POST[edition]','$_POST[status]','$_POST[quantity]')";
                  if(mysqli_query($link,$sql))
                  {
                      ?>
                      <script type="text/javascript">
                           alert("Book has been added!");
                           window.location="request.php";
                       </script>
                   <?php
                     
                  }
                  else{
                      ?>
                      <script type="text/javascript">
                           alert("You can't add two books with the same ID");
                         
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
             
        </form>
    </div>
</body>
</html>