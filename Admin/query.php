<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","vit_jobs") or die("Not Connect");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;        
    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

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
    else if(isset($_POST["reply"])){        
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'autesagar56@gmail.com';
        $mail->Password   = 'rughsvbpmuqtyehh';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
        $mail->setFrom('autesagar56@gmail.com', 'Admin');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = "<h1>".$message."</h1><font size='4'> Rajmata Complex Kranti Chowk <b>Chh.Sambhajinagar</b></font>" ;
        $mail->send();
        echo "<script>alert('Message Has Been Send')</script>";
        header("refresh:1,url=index.php");
    }
    else if(isset($_POST["logout"])){
        session_destroy();
        header("Location:home.php");
    }
?>


