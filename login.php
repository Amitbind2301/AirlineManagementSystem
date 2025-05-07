<?php
   $email = $_POST['email'];
   $password = $_POST['password'];

//database connection here
$con = new mysqli("localhost","root","","usersdata");
if($con->connect_error){
    die("Failed to connect : ".$con->connect_error);
}
else{
    $stmt = $con->prepare("select * from login_details where email= ?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
        if($data['password'] === $password){
           /* echo "<h1>Welcome to the Login page</h1>";
            echo "<h2>Login succesfully</h2>";*/
            include('home.html');
        }
        else{
            echo "<h2>Invalid Email or12212 Password</h2>";
        }
    }else{
        echo "<h2>Invalid Email or12322 Password</h2>";
    }
}
?>