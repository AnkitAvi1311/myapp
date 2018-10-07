<?php

session_start();

$fname = htmlspecialchars(ltrim($_POST['fname']));
$lname = htmlspecialchars(ltrim($_POST['lname']));
$email = htmlspecialchars(ltrim($_POST['email']));
$password = password_hash(ltrim($_POST['password']), PASSWORD_DEFAULT);
$cnf = ltrim($_POST['cnf']);
$reg = "/^[^\.][a-zA-Z0-9\._]+@[a-zA-Z_\.]+[a-zA-Z]+$/";

if(!password_verify($cnf, $password)){
    header("location: ../index.php?error=password didn't match");
    $_SESSION['register'] = $_POST;
    exit;
}else if(preg_match($reg,$email)===0){
    header("location: ../index.php?error=invalid email");
    exit;
}

@$conn = new mysqli("localhost","root","","myapp");

if($conn->connect_error){
    echo "Connection error: ".$conn->connect_error;
    exit;
}else{
    echo "Connected succesfully";
}

$sql = "INSERT INTO userinfo (fname, lname, email, pwd) VALUES ('$fname', '$lname','$email','$password')";

if($conn->query($sql)){
    header("location: ../home/index.php");
    $_SESSION['id'] = $conn->insert_id;
    exit;
}else{
    header("location: ../index.php?error=User already exists");
    exit;
}

$conn->close();