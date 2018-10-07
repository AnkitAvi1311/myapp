<?php

session_start();

@$conn = new mysqli("localhost", "root", "", "myapp");

if($conn->connect_error){
    echo "Connection error:".$conn->connect_error;
    exit;
}

$email = $_POST['email'];
$pwd = $_POST['password'];

$sql = "SELECT id, fname, lname, pwd FROM userinfo WHERE email = '$email'";

$result = $conn->query($sql);
$error = "email or password doesn't match";

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if(password_verify($pwd,$row['pwd'])){
        $_SESSION['id'] = $row['id'];
        header("location: ../home/index.php");
        exit;
    }else{
        header("location: ../index.php?login_error=$error && #signup");
    }
}else{
    header("location: ../index.php?login_error=$error && #signup");
    exit;
}
