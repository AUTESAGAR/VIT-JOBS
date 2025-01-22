<?php 
    session_start();
    if(!$_SESSION['email']){
        header("Location:login.php");
    }
?>

<h1>Single Page</h1>