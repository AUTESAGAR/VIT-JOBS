<?php
    session_start();
    // error_reporting(0);
    $conn = mysqli_connect("localhost","root","","vit_jobs") or die("Not Connect");
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
        
    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

    if(isset($_POST["reg"]) && $_POST['name'] && $_POST['uname'] && $_POST['pwd'] && $_POST['email'] && $_POST['mobile'] && $_FILES['profile'])
    {
        $name = $_POST['name'];
        $uname = $_POST['uname'];
        $pwd = $_POST['pwd'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $profile=$_FILES['profile']['name'];
        $tmp =   $_FILES['profile']['tmp_name'];
        $folder ="../uploads/".$profile;
        move_uploaded_file($tmp,$folder);
        $query = "INSERT INTO `users` VALUES('','$name','$uname','$pwd','$email','$mobile','$folder','','')";
        $run = mysqli_query($conn,$query);
        if($run){
            echo "Your Account Has Been Created";
            header("refresh:1;url=login.php");
        }
        else{
            echo "<script> alert('Your Account Has Been Not Created');</script>";
        }
    }    
    
    else if(isset($_POST["login"]) && $_POST['uname'] && $_POST['pwd']){
        $uname = $_POST['uname'];
        $pwd = $_POST['pwd'];
        $query = "SELECT * FROM `users` WHERE `uname`='$uname' AND `pwd`='$pwd'";
        $run = mysqli_query($conn,$query);
        $data = mysqli_fetch_assoc($run);
        if($run){
            $_SESSION['uname'] = $data['uname'];
            header("Location:home.php");
        }
        else{
            echo "<script> alert('Enter Valid Credentials');</script>";
        }
    }

    else if(isset($_POST["edit_profile"])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];        
        $query = "UPDATE `users` SET `name`='$name',`email`='$email',`mobile`='$mobile' WHERE `id`='$id'" ;
        $run = mysqli_query($conn,$query);
        if($run){
            header("Location:home.php");
        }
    }

    else if(isset($_POST["change_profile"])){
        $id = $_POST['id'];
        $photo = $_FILES['photo']['name'];
        $tmp = $_FILES['photo']['tmp_name'];
        $folder = "./uploads/".$photo;
        move_uploaded_file($tmp,$folder);
        $query = "UPDATE `users` SET `photo`='$folder' WHERE `id`='$id'";
        $run = mysqli_query($conn,$query);
        if($run){
            header("Location:home.php");
        }
    }
    
    else if(isset($_POST["send_otp"])){
        $email = $_POST['email'];
        $query = "SELECT * FROM users WHERE `email`='$email'";
        $run = mysqli_query($conn,$query);
        $data = mysqli_fetch_assoc($run);
        if($email===$data['email']){
            
            $text = "123456789009876543212";
            $random = str_shuffle($text);
            $otp = substr($random,0,6);

            $mail = new PHPMailer(true);
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'autesagar56@gmail.com';
            $mail->Password   = 'fuyqtyskngaojmao';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;
            $mail->setFrom('autesagar56@gmail.com', 'Admin');
            $mail->addAddress($email, $data['name']);
            $mail->addAttachment('./static/logo/job.jpg', 'VIT_JOBS.jpg');
            $mail->isHTML(true);
            $mail->Subject = 'ONE TIME PASSWORD';
            $mail->Body    = '<mark>OTP : </mark>'.$otp;
            $mail->send();            
            echo 'Message has been sent';            
            $query1 = "UPDATE `users` SET `otp`='$otp' WHERE `email`='$email'";
            $run1 = mysqli_query($conn,$query1);
            if($run1){
                echo "<script>window.location.replace('http://localhost/4PM%20PHP/VIT%20JOBS/User_Portal/change_password.php')</script>";
            }
        }
        else{            
            echo "<script>alert('Enter Valid Email')</script>";
            header("refresh:1,url=login.php");
        }
    }

    if(isset($_POST['change_password']) && $_POST['otp'] && $_POST['pwd'] && $_POST['c_pwd']){
        $otp = $_POST['otp'];
        $pwd = $_POST['pwd'];
        $c_pwd = $_POST['c_pwd'];
        if($pwd==$c_pwd){
            $query = "UPDATE `users` SET `pwd`='$c_pwd' WHERE `otp`='$otp'";
            $run = mysqli_query($conn,$query);
            if($run){
                echo "<script>alert('Your Password Has Been Changed')</script>";
                header("refresh:1,url=login.php");
            }
        }
    }

    // Resume Submission
    if(isset($_POST['resume_submit']) && $_POST['join_id'] && $_POST['name'] && $_POST['email']  && $_POST['mobile'] && $_POST['apply_for'] && $_FILES['resume']['name'])
    {        
        $join_id = $_POST['join_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $apply_for = $_POST['apply_for'];
        $resume_name = $_FILES['resume']['name'];
        $tmp = $_FILES['resume']['tmp_name'];
        $folder = "../uploads/resume/".$resume_name;
        move_uploaded_file($tmp,$folder);
        $query="INSERT INTO `cv` VALUES('','$name','$email','$mobile','$apply_for','$folder','$join_id')";
        $run = mysqli_query($conn,$query);
        if($run){
            header("Location:Home.php");
        }
    }

    else if(isset($_GET["logout"])){
        session_destroy();
        header("Location:login.php");
    }

    else if(isset($_GET["delete"])){
        $email = $_GET["delete"];
        $query = "DELETE FROM `users` WHERE `email`='$email'";
        $run = mysqli_query($conn,$query);
        if($run){
            echo "Account Delete Successfully";
            session_destroy();
            header("refresh:3,url=reg.php");
        }
    }
?>