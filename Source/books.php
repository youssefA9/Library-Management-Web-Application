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
<!DOCTYPE html>
<html>
<head>
<title>Books</title>
<link rel="stylesheet"type="text/css"href="books.css">
</head>
<body>



    <div class="srch">
        <form class="navbar-form" method="post" name="f1">
        <input class="form-control" type="text" name="search" placeholder="search books.. " required="">
        <button class="b"  type="submit" name="submit"> Search</button>


        </form> 
    
    
    </div>
   
    <div class="borrow">
        <form class="navbar-form" method="post" name="f2">
                <button class="b2"  type="submit" name="submit2"> Borrow a book
                </button>


        </form> 
    
    
    </div>
     <h2>List of Books</h2>
    <div class="formm">
   
    <?php
        if(isset($_POST['submit'])){
                $q=mysqli_query($db,"SELECT * from books where name like '%$_POST[search]%' ");
                if(mysqli_num_rows($q)==0){
                    echo '<p class="nobooks">" No Books found with that name !"</span>';
                }
                else{
                    echo "<table class='table table-bordered table-hover'>";
                    echo "<tr style='background-color: orange;'>";
                         echo "<th>"; echo "ID"; echo "</th>";
                         echo "<th>"; echo "Book Name"; echo "</th>";
                         echo "<th>"; echo "Author"; echo "</th>";
                         echo "<th>"; echo "Edition"; echo "</th>";
                         echo "<th>"; echo "Status"; echo "</th>";
                         echo "<th>"; echo "Quantity"; echo "</th>";
                    echo "</tr>";
            
                    while($row=mysqli_fetch_assoc($q)){
                        echo "<tr>";
                        echo "<td>"; echo $row['bookid']; echo "</td>";
                        echo "<td>"; echo $row['name']; echo "</td>";
                        echo "<td>"; echo $row['author']; echo "</td>";
                        echo "<td>"; echo $row['edition']; echo "</td>";
                        echo "<td>"; echo $row['status']; echo "</td>";
                        echo "<td>"; echo $row['quantity']; echo "</td>";
            
                        echo "</tr>";
                    }
                    echo "</table>";

                }

        }else{
        $res=mysqli_query($db,"SELECT * FROM `books`;");
        echo "<table class='table table-bordered table-hover'>";
        echo "<tr style='background-color: orangered;'>";
             echo "<th>"; echo "ID"; echo "</th>";
             echo "<th>"; echo "Book Name"; echo "</th>";
             echo "<th>"; echo "Author"; echo "</th>";
             echo "<th>"; echo "Edition"; echo "</th>";
             echo "<th>"; echo "Status"; echo "</th>";
             echo "<th>"; echo "Quantity"; echo "</th>";
        echo "</tr>";

        while($row=mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo "<td>"; echo $row['bookid']; echo "</td>";
            echo "<td>"; echo $row['name']; echo "</td>";
            echo "<td>"; echo $row['author']; echo "</td>";
            echo "<td>"; echo $row['edition']; echo "</td>";
            echo "<td>"; echo $row['status']; echo "</td>";
            echo "<td>"; echo $row['quantity']; echo "</td>";

            echo "</tr>";
        }
        echo "</table>";
        
    }
    if(isset($_POST['submit2'])){
      if(isset($_SESSION['username'])){
        ?>
            <script type="text/javascript">
                window.location="borrow2.php";
            </script>

        <?php
      } 
      else{
        ?>
           <script type="text/javascript">
                alert("you need to login first to request a book");
            </script>
        <?php
      }  
    }
    ?>
</div>
</body>

</html>