<?php
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','lms');

    //Variables
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conf_password = $_POST['cpassword'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $state = "";
    $error = "";
    $_SESSION['error']="";

    if($_POST['kind'] == "Admin"){
	    $state = "admin";
    }
    else if($_POST['kind'] == "Student"){
        $state = "student";
    }
   
    $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    if($conn->connect_error){
        die('Database error:' . $conn->connect_error);
    }
    else {
        if($state == ""){
            ?>
                        <script type="text/javascript">
                             alert("Must Check one of the boxes if Admin or Student");
                             window.location="sign_up.php";
                         </script>
                     <?php
        }
        else{
            if(count(explode(' ', $username)) > 1){
            ?>
                        <script type="text/javascript">
                             alert("Invalid username (Can't contain spaces)");
                             window.location="sign_up.php";
                         </script>
                     <?php
            }
            else if(!is_numeric($phone)){
            ?>
            <script type="text/javascript">
                 alert("Invalid Phone number");
                 window.location="sign_up.php";
             </script>
         <?php
            }
            else if($password != $conf_password){
                ?>
            <script type="text/javascript">
                 alert("Confirmation Password doesn't match");
                 window.location="sign_up.php";
             </script>
         <?php
            }
            else{
            $password = password_hash($password,PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password, phone_number, state) VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssss', $username, $email, $password, $phone, $state);
    if($stmt->execute()){
        ?>
                        <script type="text/javascript">
                             alert("You have Signed in Successfully");
                             window.location="login.php";
                         </script>
                     <?php
    }
    else {
        $error['db_error'] = "Database error: failed to Register";
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $query = $conn->query($sql);

        if ($query->num_rows > 0) {
            ?>
                        <script type="text/javascript">
                             alert("This username is unavailable");
                             window.location="sign_up.php";
                         </script>
                     <?php
        }
        
        }
    }
}
}
?>