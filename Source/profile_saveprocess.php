<?php
    session_start();
     define('DB_HOST','localhost');
     define('DB_USER','root');
     define('DB_PASS','');
     define('DB_NAME','lms');
 
    //Variables
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $oldusername = $_SESSION['username'];
    $_SESSION['username']=$username;
    $_SESSION['email']=$email;
    $_SESSION['phone']=$phone;

    //Connect to the Database
    $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    
    if($conn->connect_error){
        die('Database error:' . $conn->connect_error);
    }
    else {
    
        $password = password_hash($password,PASSWORD_DEFAULT);
    $sql = "UPDATE users SET username='$username' ,email='$email', password='$password' , phone_number = '$phone'  WHERE username='$oldusername'";
    
    // Prepare statement
  $stmt = $conn->prepare($sql);

  // execute the query
  $stmt->execute();

  header('location: profile.php');
}
    
?>