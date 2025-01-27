<?php
    session_start();
    // error_reporting(0);
    $conn = mysqli_connect("localhost","root","","vit_jobs") or die("Not Connect");
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;        
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';    

    if(isset($_POST["reg"])  && $_POST['name'] && $_POST['uname'] && $_POST['pwd'] && $_POST['mobile'] && $_POST['email'] && $_POST['adr'])
    {
        $name =$_POST['name'];
        $uname =$_POST['uname'];
        $pwd =$_POST['pwd'];
        $mobile =$_POST['mobile'];
        $email =$_POST['email'];        
        $query = "INSERT INTO `employer` VALUES('','$name','$uname','$pwd','$mobile','$email')";
        $run = mysqli_query($conn,$query);
        if($run){
            echo "<script> alert('Your Account Has Been Created');</script>";
            header("refresh:1;url=login.php");
        }
        else{
            echo "<script> alert('Your Account Has Been Not Created');</script>";
        }
    }    
    
    else if(isset($_POST["employer_login"]) && $_POST['uname'] && $_POST['pwd']){
        $uname = $_POST['uname'];
        $pwd = $_POST['pwd'];
        $query = "SELECT * FROM `employer` WHERE uname='$uname' AND pwd='$pwd'";
        $run = mysqli_query($conn,$query);
        $data = mysqli_fetch_assoc($run);
        if($run){
            $_SESSION['employer_user'] = $data['uname'];
            header("Location:home.php");
        }
        else{
            echo "<script> alert('Enter Valid Credentials');</script>";
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
                echo "<script>window.location.replace('http://localhost/4PM%20PHP/VIT%20JOBS/change_password.php')</script>";
            }
        }
        else{            
            echo "<script>alert('Enter Valid Email')</script>";
            header("refresh:1,url=login.php");
        }
    }
    

    else if(isset($_POST["offer_latter"])){
            $employer_name = $_POST['employer_name'];
            $employer_mobile = $_POST['employer_mobile'];
            $employer_email = $_POST['employer_email'];

            $email = $_POST['employee_email'];
            $name = $_POST['employee_name'];
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'autesagar56@gmail.com';
            $mail->Password   = 'fuyqtyskngaojmao';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;
            $mail->setFrom('autesagar56@gmail.com', 'Employer');
            $mail->addAddress($email, $name);
            $mail->addAttachment('./static/PHP_Certificate.jpg', 'VIT_JOBS.jpg');
            $mail->isHTML(true);
            $mail->Subject = 'Welcome to VIT ( Inteview Call Letter )';
            $mail->Body    = '<font size="3px">'.$employer_name.'</font> <br />
                              <font size="3px">'.$employer_mobile.'</font> <br />
                              <font size="3px">'.$employer_email.'</font> <br />';
            $mail->send();
            echo "<script>window.location.replace('http://localhost/4PM%20PHP/VIT%20JOBS/Employer/home.php')</script>";
        }
        else{            
            echo "<script>alert('Enter Valid Email')</script>";
            header("refresh:1,url=login.php");
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

    // Appplication Submitssion
    if(isset($_POST['submit_application']) && $_POST['full_name'] && $_POST['email'] && $_POST['mobile'] && $_POST['join_id'] && $_POST['apply_for'] && $_FILES['resume']['name'])
    {
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $join_id = $_POST['join_id'];
        $apply_for = $_POST['apply_for'];
        $resume_name = $_FILES['resume']['name'];
        $tmp = $_FILES['resume']['tmp_name'];
        $resume = "./uploads/resume/".$resume_name;
        move_uploaded_file($tmp,$resume);
        $gender = $_POST['gender'];
        $date_of_joining = $_POST['date_of_joining'];
        $date_of_leaving = $_POST['date_of_leaving'];
        $experience_year = $_POST['experience_year'];
        $add_info = $_POST['add_info'];
        $query="INSERT INTO `user_application` VALUES('','$full_name','$email','$mobile','$apply_for','$resume','$gender','$date_of_joining','$date_of_leaving','$experience_year','$add_info','$join_id')";
        $run = mysqli_query($conn,$query);
        if($run){
            header("Location:Home.php");
        }
    }

    else if(isset($_GET["employer_user"])){
        session_destroy();        
        header("Location:index.php");
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
    
    else{
        echo "All Fields Are Required";
    }
?>