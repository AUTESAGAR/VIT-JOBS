<?php 
    session_start();
    if(!$_SESSION['uname']){
        header("Location:login.php");
    }
?>

<h1>Single Page</h1>