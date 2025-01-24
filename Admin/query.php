<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","vit_jobs") or die("Not Connect");

    if(isset($_POST["admin_login"])){
        $uname = $_POST['uname'];
        $pwd = $_POST['pwd'];
        $query = "SELECT * FROM `admin` WHERE uname='$uname' AND pwd='$pwd'";
        $run = mysqli_query($conn,$query);
        $data = mysqli_fetch_assoc($run);
        if($run){
            $_SESSION['admin_uname'] = $data['uname'];
            header("Location:home.php");
        }
        else{
            echo "<script> alert('Your Account Has Been Not Created');</script>";
        }
    }

    else if(isset($_POST["add"])){
        $title = $_POST["title"];
        $description = $_POST["description"];
        $location = $_POST["location"];
        $banner = $_FILES["banner"]['name'];
        $tmp = $_FILES["banner"]['tmp_name'];
        $folder = "../uploads/job_post/".$banner;
        move_uploaded_file($tmp,$folder);
        $query = "INSERT INTO `post` VALUES('','$title','$description','$location','$folder','')";
        $run = mysqli_query($conn,$query);
        if($run){
            header("Location:home.php");
        }
        else{
            echo "<script> alert('Your Post Has Been Not Created');</script>";
        }
    }
    else if(isset($_POST["update"])){
        $id = $_POST["id"];
        $title = $_POST["title"];
        $description = $_POST["description"];
        $location = $_POST["location"];
        if($_FILES["banner"]['name']){
            $banner = $_FILES["banner"]['name'];
            $tmp = $_FILES["banner"]['tmp_name'];
            $folder = "../uploads/".$banner;
            move_uploaded_file($tmp,$folder);
            $query = "UPDATE `post` SET `title`='$title',`description`='$description',`banner`='$folder',`location`='$location' WHERE `id`='$id' ";
            $run = mysqli_query($conn,$query);
            if($run){
                header("Location:home.php");
            }
            else{
                echo "<script> alert('Your Post Has Been Not Created');</script>";
            }
        }
        else if(!$_FILES["banner"]['name']){
            $query = "UPDATE `post` SET `title`='$title',`description`='$description',`location`='$location' WHERE `id`='$id' ";
            $run = mysqli_query($conn,$query);
            if($run){
                header("Location:home.php");
            }
            else{
                echo "<script> alert('Your Post Has Been Not Created');</script>";
            }
        }
    }    
    else if(isset($_POST["delete"])){
        $id = $_POST["delete"];
        $query = "DELETE FROM `post` WHERE `id`='$id'";
        $run = mysqli_query($conn,$query);
        if($run){
            header("Location:home.php");
        }
        else{
            echo "<script> alert('Your Post Has Been Not Created');</script>";
        }        
    }

    else if(isset($_POST["logout"])){
        session_destroy();
        header("Location:home.php");
    }
?>


