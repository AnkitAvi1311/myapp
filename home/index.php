<?php

session_start();

if(!isset($_SESSION['id'])){
    header("location: ../index.php");
}

echo "You are logged in <br/>";
echo "User id = ".$_SESSION['id'];

?>

<a href="../logout/logout.php?logout=userlogout">Logout</a>