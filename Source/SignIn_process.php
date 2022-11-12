<?php
   session_start();
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','lms');

    //Variables
    $username = $_POST['username'];
    $password = $_POST['password'];
   
    //Connect to the Database
    $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    //Fetch the password stored to compare it
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn,$sql) or die (mysql_error());
    $row = mysqli_fetch_assoc($result);
    $query = $conn->query($sql);
    
    if ($query->num_rows == 0) {
        ?>
                        <script type="text/javascript">
                             alert("username or password doesn't match");
                             window.location="login.php";
                         </script>
                     <?php
    }
    else{
    if(password_verify($password, $row['password'])){
        //Compare the password with the one stored
       $_SESSION['username'] = $username;
       $_SESSION['email'] = $row['email'];
       $_SESSION['phone'] = $row['phone_number'];
       $_SESSION['state'] = $row['state'];
       header('location: home.php');
    }
    else{
        ?>
        <script type="text/javascript">
             alert("username or password doesn't match");
             window.location="login.php";
         </script>
     <?php
    }
}
    
?>