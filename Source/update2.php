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
<title>Update a book</title>

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
        <h1>Update Books</h1>
        <form class="book" action="" method="post" style="text-align:center;">
        <div class="form-area">    
        <label>Enter ID of the book you want to update </label>
        <input name="bookidd" type="text" required="" placeholder="Enter Book ID..">                   
    
        <label>Update book </label>
        <input name="name" type="text" required="" placeholder="Enter New Book name..">
        <input name="author" type="text" required="" placeholder="Enter New Author of the book..">
        <input name="edition" type="text" required="" placeholder="Enter New Edition.. ">
        <input name="status" type="text" required="" placeholder="Enter New Status..">
        <input name="quantity" type="text" required="" placeholder="Enter New Quantity.. ">
         <button class="btn btn-default" type="submit" name="submit">Update Book </button>
        
        </div>

        <?php

            if(isset($_POST['submit'])){
                if(isset($_SESSION['username'])){
                    $sql = "UPDATE books SET books.name='$_POST[name]',books.author='$_POST[author]'
                    ,books.edition='$_POST[edition]', books.quantity='$_POST[quantity]' where books.bookid='$_POST[bookidd]' ";
                    if(mysqli_query($link,$sql))
                    {
                        ?>
                        <script type="text/javascript">
                            alert("Book has been updated");
                        </script>
                    <?php
                    
                    }
                    else{

                        ?>
                        <script type="text/javascript">
                            alert("Can't find this book");
                        </script>
                    <?php

                    }
            } 
            else{
            ?>
                <script type="text/javascript">
                    alert("you need to login first to update a book");
                </script>
            <?php
            }  
            }
        
           
        
        ?>
        </form>
    </div>
</body>
</html>