<?php 
    session_start();
    error_reporting(0);
    if($_SESSION['email']){
        header("Location:home.php");
    }    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @import url('./static/style.css');
    </style>
</head>

<body>
    <?php include_once("./components/header.php"); ?>
    <div class="row">
        <div class="col-5 m-auto border border-5 my-2 py-2">
            <form action="query.php" method="post">
                <h1 class="text-center fs-2 fw-bold bg-warning">
                    Change Password
                </h1>
                <input type="text" name="otp" id="" class="form-control border border-dark my-2" placeholder="Enter OTP">
                <input type="text" name="pwd" id="" class="form-control border border-dark my-2" placeholder="Enter New Password">
                <input type="text" name="c_pwd" id="" class="form-control border border-dark my-2" placeholder="Enter Confirm Password">
                <div class="text-center my-2">
                    <input type="submit" class="btn btn-success" name="change_password" value="Change Password">
                </div>
            </form>
        </div>       
    </div>


    <?php include_once("./components/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>